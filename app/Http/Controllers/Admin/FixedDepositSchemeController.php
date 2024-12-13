<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FixedDepositScheme;
use App\Models\SchemePenaltyChart;
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class FixedDepositSchemeController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Fixed Deposit Scheme'; 
        return view('admin.templates.fixedDepositScheme.fixedDepositScheme',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'Fixed Deposit Scheme';
        return view('admin.templates.fixedDepositScheme.fixedDepositScheme',compact('data'));
    }

   function store(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('unique_code',Helper::generate_uuid());
        
        $checkExist = FixedDepositScheme::where('delete_status','0')->where('scheme_code',$oRequest->scheme_code)->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This customer already added'));
        }else{
            $addResult = FixedDepositScheme::create($oRequest->all());
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }
        }
    }
    
    function list()
    {
        $rows = Helper::getFixedDepositScheme();
        $html = view('admin.templates.fixedDepositScheme.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    
    public function edit_row(Request $oRequest){
        $data['page_title'] = 'Fixed Deposit Scheme';
        $row  = FixedDepositScheme::where('unique_code',$oRequest->id)->first();
        return view('admin.templates.fixedDepositScheme.fixedDepositScheme',compact('row','data'));
    }

     public function get_row(Request $oRequest){
        $row  = FixedDepositScheme::with('agent_rank')->where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'Fixed Deposit Scheme';
        return view('admin.templates.fixedDepositScheme.fixedDepositScheme',compact('data','row'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = FixedDepositScheme::where('id',$oRequest->update_id)->update([
          'scheme_code'               => $oRequest->scheme_code,
     
          'name'                    => $oRequest->name,
          'min_fd_amount'           => $oRequest->min_fd_amount,
          'max_fd_amount'           => $oRequest->max_fd_amount,
          'interest_rate'           => $oRequest->interest_rate,
          'fd_frequency'            => $oRequest->fd_frequency,
          'fd_tenure'               => $oRequest->fd_tenure,
          'interest_compounding'    => $oRequest->interest_compounding,
          'cancellation_charge'     => $oRequest->cancellation_charge,
          'cancellation_charge_value'             => $oRequest->cancellation_charge_value,
          'Collector_commission_rate'                     => $oRequest->Collector_commission_rate,
          'remarks'             => $oRequest->remarks,
         
          'status'            => $oRequest->status,
        ]);

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $Result = FixedDepositScheme::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    
     public function view_row(Request $oRequest){
        $row  = FixedDepositScheme::where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'Fixed Deposit Scheme';
        return view('admin.templates.fixedDepositScheme.fixedDepositScheme',compact('data','row'));
    }


}
