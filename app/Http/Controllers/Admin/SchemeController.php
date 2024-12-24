<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scheme;
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class SchemeController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Scheme';
        return view('admin.templates.scheme.scheme',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'Scheme';
        $Members = Helper::GetMembers();
        return view('admin.templates.scheme.scheme',compact('data','Members'));
    }

   function store(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('uuid',Helper::generate_uuid());

        $checkExist = Scheme::where('delete_status','0')->where('scheme_code',$oRequest->scheme_code)->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This Scheme already added'));
        }else{

            $addResult = Scheme::create($oRequest->all());
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }
        }
    }
    
    function list()
    {
        $rows = Helper::get_scheme();
        $html = view('admin.templates.scheme.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    public function edit_row(Request $oRequest){
        $data['page_title'] = 'Update Allocate Share';
        $row  = Scheme::where('uuid',$oRequest->id)->first();
        return view('admin.templates.scheme.scheme',compact('data','row'));
    }

     public function get_row(Request $oRequest){
        $row  = Scheme::where('id',$oRequest->id)->first();
        $data['page_title'] = 'Director Promoters';
        return view('admin.templates.scheme.scheme',compact('data','row'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = Scheme::where('uuid',$oRequest->update_id)->update([
          'name'                  => $oRequest->name,
          'scheme_code'           => $oRequest->scheme_code,
          'interest_payout'       => $oRequest->interest_payout,
          'interest_rate'         => $oRequest->interest_rate,
          'minimum_balance'       => $oRequest->minimum_balance,
          'collector_commission'  => $oRequest->collector_commission,
          'daily_neft_limit'      => $oRequest->daily_neft_limit,
          'scan_pay_limit'        => $oRequest->scan_pay_limit,
          'remarks'               => $oRequest->remarks,
          'status'                => $oRequest->status,

        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $Result = Scheme::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    

    




}
