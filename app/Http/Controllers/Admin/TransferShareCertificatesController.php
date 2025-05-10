<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferShareCertificates;
use App\Models\User;
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class TransferShareCertificatesController extends Controller
{
  
    public function index()
    {

        $data['page_title'] = 'Transfer Share Certificates';
        return view('admin.templates.transfer_share_certificates.transfer_share_certificates',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'Transfer Share';
        $Members = Helper::GetMembers();
        return view('admin.templates.transfer_share_certificates.transfer_share_certificates',compact('data','Members'));
    }
    

    function store(Request $oRequest)
    {

        $MembersDetails  = User::where('id',$oRequest->member_id_from)->first();
        if($MembersDetails->no_of_share < $oRequest->no_of_share){
            return response()->json(array('status' => 0,'msg'=>'Share not enough for selected member Please Check no of share !! '));
        }
        $oRequest->offsetSet('created_by', Auth::guard('admin')->user()->id);

        $LastRecord = TransferShareCertificates::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $RangeFirst = 0;
        if($LastRecord){
            $RangeFirst = $LastRecord->no_of_share + 1;
        }
        $NewRangeFirst = $RangeFirst;
        $NewRangeLast = $NewRangeFirst + $oRequest->no_of_share;
        
        $oRequest->offsetSet('share_range',$NewRangeFirst.'-'.$NewRangeLast);
        $oRequest->offsetSet('lot_number',Helper::get_Transfer_number());

        $addResult = TransferShareCertificates::create($oRequest->all());
        if($addResult){
            Helper::updateCustomer_NoOfShare($oRequest->member_id_from,$oRequest->no_of_share,'minus');
            Helper::updateCustomer_NoOfShare($oRequest->member_id,$oRequest->no_of_share,'add');    
            return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
        }else{ 
                return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    
    function list()
    {
        $rows = Helper::GetTransferShareCertificates();
        $html = view('admin.templates.transfer_share_certificates.records', compact('rows'))->render();
        
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function get_row(Request $oRequest)
    {
        $row  = TransferShareCertificates::where('id',$oRequest->id)->first();
        
        return response()->json(['data' => $row,'status' => '1']);
    }

    public function update_row(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $addResult = TransferShareCertificates::where('id',$oRequest->update_id)->update([
          'title'       => $oRequest->update_title,
          'country_id'  => $oRequest->update_country_id,
          'state_id'    => $oRequest->update_state_id,
          'status'      => $oRequest->update_status,
          'slug'        => $slug
        ]);

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $Result = TransferShareCertificates::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }


     public function Transfer_ShareCertificates(Request $oRequest) {
        $row  = TransferShareCertificates::with('memberDetails','memberFromDetails')->where('id',$oRequest->id)->first();
        $data['page_title'] = 'Share Certificate Details';
        $AllocatedShares = Helper::GetTransaferShareCertificatesByMember($row->member_id);
        return view('admin.templates.transfer_share_certificates.transfer_share_certificates',compact('data','row','AllocatedShares'));
    }

    public function Transfer_ShareCertificatesSH4(Request $oRequest) {
        $row  = TransferShareCertificates::with('memberDetails','memberFromDetails')->where('id',$oRequest->id)->first();
        $data['page_title'] = 'Share Certificate Details';
        $AllocatedShares = Helper::GetTransaferShareCertificatesByMember($row->member_id);
        return view('admin.templates.transfer_share_certificates.transfer_share_certificates',compact('data','row','AllocatedShares'));
    }

    

    

    




}
