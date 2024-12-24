<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecurringScheme;
use App\Models\SchemePenaltyChart;
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class RecurringSchemeController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'RD Account Scheme';
        return view('admin.templates.recurringScheme.recurringScheme',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'RD Account Scheme';
        return view('admin.templates.recurringScheme.recurringScheme',compact('data'));
    }

   function store(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('unique_code',Helper::generate_uuid());
        
        $checkExist = RecurringScheme::where('delete_status','0')->where('scheme_code',$oRequest->scheme_code)->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This customer already added'));
        }else{

            $addResult = RecurringScheme::create($oRequest->all());
            if($addResult){

                if(count($oRequest->to_days) > 0){
                    for ($i=0; $i < count($oRequest->to_days) ; $i++) { 
                        SchemePenaltyChart::create([
                            'recurring_scheme_id' => $addResult->id,
                            'from_days' => $oRequest['from_days'][$i],
                            'to_days' => $oRequest['to_days'][$i],
                            'calculation_type' => $oRequest['calculation_type'][$i],
                            'parameter' => $oRequest['parameter'][$i]
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
        $rows = Helper::getRecurringScheme();
        $html = view('admin.templates.recurringScheme.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    
    public function edit_row(Request $oRequest){
        $data['page_title'] = 'Agent/Advisor';
        $row  = RecurringScheme::where('unique_code',$oRequest->id)->first();
        return view('admin.templates.recurringScheme.recurringScheme',compact('row','data'));
    }

     public function get_row(Request $oRequest){
        $row  = RecurringScheme::with('agent_rank')->where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'RD Account Scheme';
        return view('admin.templates.recurringScheme.recurringScheme',compact('data','row'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = RecurringScheme::where('unique_code',$oRequest->update_id)->update([
          'join_date'           => $oRequest->join_date,
          'associate_customer_id'   => $oRequest->associate_customer_id,
          
          'prifix_name'         => $oRequest->prifix_name,
          'name'                => $oRequest->name,
          'gender'              => $oRequest->gender,
          'dob'                 => $oRequest->dob,
          'mobile'              => $oRequest->mobile,
          'email'               => $oRequest->email,
          'aadhar_no'           => $oRequest->aadhar_no,
          'city_id'             => $oRequest->city_id,
          'state_id'            => $oRequest->state_id,
          'blood_group'         => $oRequest->blood_group,
          'pan'                 => $oRequest->pan,
          'father_name'         => $oRequest->father_name,
          'address_first'       => $oRequest->address_first,
          'address_second'      => $oRequest->address_second,
          'spouse_name'         => $oRequest->spouse_name,
          'designation'         => $oRequest->designation,
          'ifsc_code'           => $oRequest->ifsc_code,
          'bank_name'           => $oRequest->bank_name,
          'account_type'        => $oRequest->account_type,
          'account_no'          => $oRequest->account_no,
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
        $Result = RecurringScheme::where('unique_code',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    
     public function view_row(Request $oRequest){
        $row  = RecurringScheme::where('unique_code',$oRequest->id)->first();
        $PenaltyCharts  = SchemePenaltyChart::where('recurring_scheme_id',$row->id)->get();

        $data['page_title'] = 'RD Account Scheme';
        return view('admin.templates.recurringScheme.recurringScheme',compact('data','row','PenaltyCharts'));
    }


}
