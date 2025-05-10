<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class AgentsController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Agent/Advisor';
        return view('admin.templates.agents.agents',compact('data'));
    }

    public function create()
    {



        $data['page_title'] = 'Agent/Advisor';
        $Members = Helper::GetMembers();
        $Ledgers = Helper::get_ledgers();
        $states =  Helper::getState();
        $agentRanks =  Helper::getAgentRank();
        return view('admin.templates.agents.agents',compact('data','Members','Ledgers','states','agentRanks'));
    }

   function store(Request $oRequest)
    {
       
        $oRequest->offsetSet('created_by',Auth::guard('admin')->user()->id);
        $oRequest->offsetSet('unique_code',Helper::generate_uuid());
        $oRequest->offsetSet('user_type','agent');
        
        if($oRequest->file('profile_img') != ''){
            $img_path = public_path().config('constants.PROFILE_IMG');
            $file_name = Helper::UploadMedia($oRequest->profile_img,$img_path);
            $oRequest->offsetSet('profile_img',$file_name);
        }

        $checkExist = Admin::where('delete_status','0')->where('agent_code',$oRequest->agent_code)->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This customer already added'));
        }else{

            $addResult = Admin::create($oRequest->all());
            if($addResult){
                return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
            }else{ 
                    return response()->json(array('status' => 0,'msg'=>'Error'));
            }
        }
    }
    
    function list()
    {
        $rows = Helper::getAgents();
        $html = view('admin.templates.agents.records', compact('rows'))->render();
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

    
    public function edit_row(Request $oRequest){
        $data['page_title'] = 'Agent/Advisor';
         $row  = Admin::with('agent_rank')->where('unique_code',$oRequest->id)->first();
        $Members = Helper::GetMembers();
        $Ledgers = Helper::get_ledgers();
        $states =  Helper::getState();
        $cities =  Helper::getCity_ByState($row['state_id']);
        $agentRanks =  Helper::getAgentRank();
        return view('admin.templates.agents.agents',compact('row','data','Members','Ledgers','states','agentRanks','cities'));
    }

     public function get_row(Request $oRequest){
        $row  = Admin::with('agent_rank')->where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'Director Promoters';
        return view('admin.templates.agents.agents',compact('data','row'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = Admin::where('unique_code',$oRequest->update_id)->update([
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


        if($oRequest->file('profile_img') != ''){
          
            $img_path = public_path().config('constants.PROFILE_IMG');
            $file_name = Helper::UploadMedia($oRequest->profile_img,$img_path);
            Admin::where('unique_code',$oRequest->update_id)->update([
                'profile_img' => $file_name
            ]);
        }
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $Result = DirectorPromoters::where('unique_code',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    
     public function view_row(Request $oRequest){
        $row  = Admin::where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'Agents/Advisor';
        return view('admin.templates.agents.agents',compact('data','row'));
    }

     public function view_IDCard(Request $oRequest){
        $row  = Admin::with('state','city','agent_rank')->where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'Agents/Advisor';
        return view('admin.templates.agents.agents',compact('data','row'));
    }

    public function view_formPrint(Request $oRequest){
        $row  = Admin::with('associate_customer')->where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'Agents/Advisor';
        return view('admin.templates.agents.agents',compact('data','row'));
    }
    
    public function view_UplineAgents(Request $oRequest){
        $row  = Admin::where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'Agents/Advisor';
        return view('admin.templates.agents.agents',compact('data','row'));
    }
    public function view_DownlineAgents(Request $oRequest){
        $row  = Admin::where('unique_code',$oRequest->id)->first();
        $data['page_title'] = 'Agents/Advisor';
        return view('admin.templates.agents.agents',compact('data','row'));
    }
    
    

    




}
