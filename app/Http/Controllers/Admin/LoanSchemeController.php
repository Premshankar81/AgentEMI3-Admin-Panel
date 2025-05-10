<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LoanScheme;
use App\Models\BusinessLoan;
use App\Models\LoanSchemePenaltyCharts;
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class LoanSchemeController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Business Loan Scheme';
        return view('admin.templates.loanScheme.loanScheme',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'Business Loan Scheme';
        return view('admin.templates.loanScheme.loanScheme',compact('data'));
    }

   function store(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('unique_code',Helper::generate_uuid());
        
        $checkExist = LoanScheme::where('delete_status','0')->where('scheme_code',$oRequest->scheme_code)->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This Scheme already added'));
        }else{

            $addResult = LoanScheme::create($oRequest->all());
            if($addResult){

                if(count($oRequest->to_days) > 0){
                    for ($i=0; $i < count($oRequest->to_days) ; $i++) { 
                        LoanSchemePenaltyCharts::create([
                            'loan_scheme_id'    => $addResult->id,
                            'from_days'         => $oRequest['from_days'][$i],
                            'to_days'           => $oRequest['to_days'][$i],
                            'calculation_type'  => $oRequest['calculation_type'][$i],
                            'parameter'         => $oRequest['parameter'][$i]
                        ]);
                    }                    
                }

                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }
        }
    }
    
    function list()
    {
        $rows = Helper::getLoanScheme();
        $html = view('admin.templates.loanScheme.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    
    public function edit_row(Request $oRequest){
        $data['page_title'] = 'Business Loan Scheme';
        $row  = LoanScheme::where('unique_code',$oRequest->id)->first();
        $PenaltyCharts  = LoanSchemePenaltyCharts::where('loan_scheme_id',$row->id)->where('delete_status','0')->get();
        return view('admin.templates.loanScheme.loanScheme',compact('data','row','PenaltyCharts'));
        
    }

     public function get_row(Request $oRequest){
        $row  = LoanScheme::with('agent_rank')->where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'Business Loan Scheme';
        return view('admin.templates.loanScheme.loanScheme',compact('data','row'));
    }

    public function update_row(Request $oRequest)
    {
        $row  = LoanScheme::where('unique_code',$oRequest->update_id)->first();
        $addResult = LoanScheme::where('unique_code',$oRequest->update_id)->update([
          'scheme_code'                   => $oRequest->scheme_code,
          'name'                          => $oRequest->name,
          'min_amount'                    => $oRequest->min_amount,
          'max_amount'                    => $oRequest->max_amount,
          'interest_rate'                 => $oRequest->interest_rate,
          'pre_closure_charges'           => $oRequest->pre_closure_charges,
          'pre_closure_charges_value'     => $oRequest->pre_closure_charges_value,
          'processing_fees'               => $oRequest->processing_fees,
          'processing_fees_value'         => $oRequest->processing_fees_value,
          'collection_charge'             => $oRequest->collection_charge,
          'collection_charge_value'       => $oRequest->collection_charge_value,
          'stamp_duty_charge'             => $oRequest->stamp_duty_charge,
          'stamp_duty_charge_value'       => $oRequest->stamp_duty_charge_value,
          'emi_type'                      => $oRequest->emi_type,
          'collection_charge'             => $oRequest->collection_charge,
          'collection_charge_value'       => $oRequest->collection_charge_value,
          'Collector_commission_rate'     => $oRequest->Collector_commission_rate,
          'remarks'                       => $oRequest->remarks,
          'emi_credit_period'             => $oRequest->emi_credit_period,
          'status'                        => $oRequest->status,
        ]);

        if($addResult){

             if(isset($oRequest->penalty_id)){
                if(count($oRequest->penalty_id) > 0){
                    for ($ii=0; $ii < count($oRequest->penalty_id) ; $ii++) { 
                        LoanSchemePenaltyCharts::where('id',$oRequest->penalty_id[$ii])->update([
                          'from_days'          => $oRequest->update_from_days[$ii],
                          'to_days'            => $oRequest->update_to_days[$ii],
                          'calculation_type'   => $oRequest->update_calculation_type[$ii],
                          'parameter'          => $oRequest->update_parameter[$ii],
                        ]);
                    }                    
                }
            }

            if(count($oRequest->from_days) > 0){
                for ($i=0; $i < count($oRequest->from_days) ; $i++) { 
                    LoanSchemePenaltyCharts::create([
                        'loan_scheme_id'    => $row->id,
                        'from_days'         => $oRequest['from_days'][$i],
                        'to_days'           => $oRequest['to_days'][$i],
                        'calculation_type'  => $oRequest['calculation_type'][$i],
                        'parameter'         => $oRequest['parameter'][$i]
                    ]);
                }                    
            }

            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $CheckExist  = BusinessLoan::where('scheme_id',$oRequest->update_id)->first();
        if($CheckExist){
            return response()->json(array('status' => 0,'msg'=>'This Loan Scheme already use !!'));
        }
        
        $Result = LoanScheme::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_Paneltyrow(Request $oRequest)
    {
        $Result = LoanSchemePenaltyCharts::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    
     public function view_row(Request $oRequest){
        $row  = LoanScheme::where('unique_code',$oRequest->id)->first();
        $PenaltyCharts  = LoanSchemePenaltyCharts::where('loan_scheme_id',$row->id)->where('delete_status','0')->get();
        $data['page_title'] = 'Business Loan Scheme';
        return view('admin.templates.loanScheme.loanScheme',compact('data','row','PenaltyCharts'));
    }


}
