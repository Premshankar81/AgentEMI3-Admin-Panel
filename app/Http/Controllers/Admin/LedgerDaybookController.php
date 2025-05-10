<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Daybook;
use App\Models\Cashbook;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Ledger;
use Excel;
use App\Exports\LedgerExport;
use Auth;
use Helper;

class LedgerDaybookController extends Controller
{
  
    public function index()
    {
        
        $daybook = Daybook::where('delete_status', '0')
        ->whereDate('date', Carbon::now()->toDateString())
        ->get();
          // Log the incoming request data
          \Log::info('Incoming request data:', $daybook->toArray());
        $data = [
            'page_title' => 'Daybook',
            'daybook' => $daybook,
            ];
     
        return view('admin.templates.ledger.daybook.ledger',compact('data'));
    }

    public function showCashbook()
    {
        
        $cashbook = Cashbook::where('delete_status', '0')
        ->get();
          // Log the incoming request data
        //   \Log::info('Incoming request data:', $daybook->toArray());
        $data = [
            'page_title' => 'Cashbook',
            'daybook' => $cashbook,
            ];
     
        return view('admin.templates.ledger.daybook.ledger',compact('data'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction(); // Start the transaction
    
            // Validate request data
            $request->validate([
                'date' => 'required|date',
                'description' => 'required|string|max:255',
                'transaction_type' => 'required|string|max:255',
                'credit_amount' => 'nullable|numeric',
                'debit_amount' => 'nullable|numeric',
            ]);
    
            // Fetch the last balances
            $lastBalance = Daybook::whereDate('date', Carbon::now()->toDateString())
                ->orderBy('id', 'desc')
                ->value('balance') ?? 0;
    
            $lastBalanceOfCashbook = Cashbook::orderBy('id', 'desc')
                ->value('balance') ?? 0;
    
            // Calculate the new balances
            if ($request->credit_amount && $request->debit_amount) {
                return response()->json(['status' => 0, 'msg' => 'Only one of credit or debit amount can be provided.'], 400);
            }
    
            if ($request->credit_amount) {
                $newBalance = $lastBalance + $request->credit_amount;
                $newLastBalanceOfCashbook = $lastBalanceOfCashbook + $request->credit_amount;
            } elseif ($request->debit_amount) {
                $newBalance = $lastBalance - $request->debit_amount;
                $newLastBalanceOfCashbook = $lastBalanceOfCashbook - $request->debit_amount;
            } else {
                return response()->json(['status' => 0, 'msg' => 'Either credit or debit amount must be provided.'], 400);
            }
    
            // Store the new entry in the Daybook
            $addResult = Daybook::create([
                'date' => $request->date,
                'description' => $request->description,
                'transaction_type' => $request->transaction_type,
                'debit_amount' => $request->debit_amount,
                'credit_amount' => $request->credit_amount,
                'balance' => $newBalance,
            ]);
    
            // Store the new entry in the Cashbook
            $addCashbook = Cashbook::create([
                'date' => $request->date,
                'description' => $request->description,
                'transaction_type' => $request->transaction_type,
                'debit_amount' => $request->debit_amount,
                'credit_amount' => $request->credit_amount,
                'balance' => $newLastBalanceOfCashbook,
            ]);
    
            DB::commit(); // Commit the transaction
    
            return response()->json(['status' => 1, 'msg' => 'Record successfully inserted']);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction on error
    
            // Log the exception for debugging
            Log::error('Error in store method:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
    
            return response()->json(['status' => 0, 'msg' => 'An unexpected error occurred. Please try again.'], 500);
        }
    }
    
    function list()
    {
        $rows = Helper::get_ledgers();
        $html = view('admin.templates.ledger.daybook.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function get_row(Request $oRequest)
    {
        $row  = Ledger::where('id',$oRequest->id)->first();
        
        return response()->json(['data' => $row,'status' => '1']);
    }

   public function update_row(Request $oRequest)
{
    \Log::info('Request data:', $oRequest->all());
    try {
        DB::beginTransaction(); // Start the transaction
        // Fetch the second last balances
        $lastBalance = Daybook::whereDate('date', Carbon::now()->toDateString())
            ->orderBy('id', 'desc')
            ->skip(1) // Skip the first row (last row)
            ->value('balance') ?? 0;

        $lastBalanceOfCashbook = Cashbook::orderBy('id', 'desc')
            ->skip(1) // Skip the first row (last row)
            ->value('balance') ?? 0;

        $cashbookId = Cashbook::orderBy('id', 'desc')
            ->value('id') ?? 0;

        // Calculate the new balances
        if ($oRequest->credit_amount && $oRequest->debit_amount) {
            return response()->json(['status' => 0, 'msg' => 'Only one of credit or debit amount can be provided.'], 400);
        }

        $newBalance = $lastBalance;
        $newLastBalanceOfCashbook = $lastBalanceOfCashbook;

        if ($oRequest->edit_credit_amount) {
            $newBalance += $oRequest->edit_credit_amount;
            $newLastBalanceOfCashbook += $oRequest->edit_credit_amount;
        } elseif ($oRequest->edit_debit_amount) {
            $newBalance -= $oRequest->edit_debit_amount;
            $newLastBalanceOfCashbook -= $oRequest->edit_debit_amount;
        } else {
            return response()->json(['status' => 0, 'msg' => 'Either credit or debit amount must be provided.'], 400);
        }

        // Update Daybook
        $updateDaybook = Daybook::where('id', $oRequest->id)->update([
            'date'              => $oRequest->edit_date,
            'description'       => $oRequest->edit_description,
            'transaction_type'  => $oRequest->edit_transaction_type,
            'debit_amount'      => $oRequest->edit_debit_amount,
            'credit_amount'     => $oRequest->edit_credit_amount,
            'balance'           => $newBalance,
        ]);

        // Update Cashbook
        $updateCashbook = Cashbook::where('id', $cashbookId)->update([
            'date'              => $oRequest->edit_date,
            'description'       => $oRequest->edit_description,
            'transaction_type'  => $oRequest->edit_transaction_type,
            'debit_amount'      => $oRequest->edit_debit_amount,
            'credit_amount'     => $oRequest->edit_credit_amount,
            'balance'           => $newLastBalanceOfCashbook,
        ]);
        DB::commit(); // Commit the transaction

        if ($updateDaybook && $updateCashbook) {
            return redirect()->back()->with('status', 'Record successfully updated');
        } else {
            return redirect()->back()->with('error', 'Error updating records');
        }
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback the transaction on error
    
        // Log the exception for debugging
        Log::error('Error in store method:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);
        // Catch any exception and return a proper error response
        return response()->json(['status' => 0, 'msg' => 'An error occurred: ' . $e->getMessage()], 500);
    }
}


    public function export()
    {
        $file_name = 'Ledger_'.rand().'.xlsx';
          return Excel::download(new LedgerExport,$file_name);
    }

    public function delete_row(Request $oRequest)
    {
        $Result = Ledger::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

     public function getDaybookDataByID($id)
     {
         // Find the entry by ID
         $entry = Daybook::find($id);
             \Log::info('Entry data:', $entry->toArray());
         if (!$entry) {
             return response()->json(['message' => 'Entry not found'], 404);
         }
     
         return response()->json([
             'id' => $entry->id,
             'date' => $entry->date,
             'description' => $entry->description,
             'transaction_type' => $entry->transaction_type,
             'debit_amount' => $entry->debit_amount,
             'credit_amount' => $entry->credit_amount,
             'balance' => $entry->balance,
         ]);
     }

}
