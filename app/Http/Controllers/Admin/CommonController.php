<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Models\Scheme;
use App\Models\RecurringScheme;
use App\Models\FixedDepositScheme;
use App\Models\LoanScheme;

use Excel;
use Auth;
use Helper;

class CommonController extends Controller
{
  
    public function getStates_ByCountry(Request $oRequest) {
       $states = State::where('delete_status','0')->where('country_id',$oRequest->country_id)->orderBy('title', 'asc')->get();
       echo json_encode($states);
    }

    public function getCity_ByState(Request $oRequest) {
       $cities = City::where('delete_status','0')->where('state_id',$oRequest->state_id)->orderBy('title', 'asc')->get();
       echo json_encode($cities);
    }

    public function getMemberDetailsAllocate(Request $oRequest) {
      $rows = User::with('state','city')->where('delete_status','0')->where('id',$oRequest->member_id)->first();
      $html = view('admin.templates.allocate_share_certificates.memberInfo', compact('rows'))->render();
      return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    
    public function getMemberDetails(Request $oRequest) {
      $rows = User::with('state','city')->where('delete_status','0')->where('id',$oRequest->member_id)->first();
      $html = view('admin.templates.transfer_share_certificates.memberInfo', compact('rows'))->render();
      return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }

     public function getMemberInfoSavingApp(Request $oRequest) {
      $rows = User::with('state','city')->where('delete_status','0')->where('id',$oRequest->customer_id)->first();
      if($rows){
        return response()->json(array('rows'=>$rows,'status' => 1,'msg'=>'Successfully'));
      }else{
        return response()->json(array('rows'=>0,'status' => 2,'msg'=>'No Record'));
      }
    }

    public function getSchemeDetails(Request $oRequest) {
      $rows = Scheme::where('delete_status','0')->where('id',$oRequest->scheme_id)->first();
      if($rows){
        return response()->json(array('rows'=>$rows,'status' => 1,'msg'=>'Successfully'));
      }else{
        return response()->json(array('rows'=>0,'status' => 2,'msg'=>'No Record'));
      }
    }
    public function get_RD_SchemeDetails(Request $oRequest) {
      $rows = RecurringScheme::where('delete_status','0')->where('id',$oRequest->scheme_id)->first();
      if($rows){
        return response()->json(array('rows'=>$rows,'status' => 1,'msg'=>'Successfully'));
      }else{
        return response()->json(array('rows'=>0,'status' => 2,'msg'=>'No Record'));
      }
    }

    public function get_FD_SchemeDetails(Request $oRequest) {
      $rows = FixedDepositScheme::where('delete_status','0')->where('id',$oRequest->scheme_id)->first();
      if($rows){
        return response()->json(array('rows'=>$rows,'status' => 1,'msg'=>'Successfully'));
      }else{
        return response()->json(array('rows'=>0,'status' => 2,'msg'=>'No Record'));
      }
    }

     public function get_Loan_SchemeDetails(Request $oRequest) {
      $rows = LoanScheme::where('delete_status','0')->where('id',$oRequest->scheme_id)->first();
      if($rows){
        return response()->json(array('rows'=>$rows,'status' => 1,'msg'=>'Successfully'));
      }else{
        return response()->json(array('rows'=>0,'status' => 2,'msg'=>'No Record'));
      }
    }
    
    public function getMemberSavingAccount(Request $oRequest) {
      $rows = User::with('state','city')->where('delete_status','0')->where('id',$oRequest->customer_id)->first();
      if($rows){
        return response()->json(array('rows'=>$rows,'status' => 1,'msg'=>'Successfully'));
      }else{
        return response()->json(array('rows'=>0,'status' => 2,'msg'=>'No Record'));
      }
    }

    



}
