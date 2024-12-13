<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllocateShareCertificates;
use App\Models\User;
use Excel;
use App\Exports\CityExport;
use Auth;
use Helper;

class AllocateShareCertificatesController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Allocate Share Certificates';
        return view('admin.templates.allocate_share_certificates.allocate_share_certificates',compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'Allocate Share';
        $Members = Helper::GetMembers();
        return view('admin.templates.allocate_share_certificates.allocate_share_certificates',compact('data','Members'));
    }

    function store(Request $oRequest)
    {
  

        $oRequest->offsetSet('created_by', Auth::guard('admin')->user()->id);
        if(count(@$oRequest['no_of_certificates']) > 0){
            for($ii=0; $ii < count($oRequest['no_of_certificates']); $ii++){ 
                $data2['no_of_certificates']                = @$oRequest['no_of_certificates'][$ii];
                $data2['no_of_shares_in_certificates']      = @$oRequest['no_of_shares_in_certificates'][$ii];
                $data2['total_certificates_shares']         = @$oRequest['total_certificates_shares'][$ii];
                $data_array2[] = $data2;                    
            }
            $oRequest->offsetSet('share_certificate_json',@json_encode($data_array2));
        }
        
        $LastRecord = AllocateShareCertificates::orderBy('id','desc')->where('created_by',Auth::guard('admin')->user()->id)->first();
        $RangeFirst = 0;
        if($LastRecord){
            $RangeFirst = $LastRecord->total_shares + 1;
        }
        $NewRangeFirst = $RangeFirst;
        $NewRangeLast = $NewRangeFirst + $oRequest->total_shares;
        
        $oRequest->offsetSet('share_range',$NewRangeFirst.'-'.$NewRangeLast);
        $oRequest->offsetSet('lot_number',Helper::get_allocate_number());
        $addResult = AllocateShareCertificates::create($oRequest->all());

        if($addResult){
            Helper::updateCustomer_NoOfShare($oRequest->member_id,$oRequest->total_shares,'add');
            return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
        }else{ 
                return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }
    
    function list()
    {
        $rows = Helper::GetAllocateShareCertificates();
        $html = view('admin.templates.allocate_share_certificates.records', compact('rows'))->render();
        
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function edit_row(Request $oRequest){
        $data['page_title'] = 'Update Allocate Share';
        $row  = AllocateShareCertificates::where('id',$oRequest->id)->first();
        $Members = Helper::GetMembers();
        return view('admin.templates.allocate_share_certificates.allocate_share_certificates',compact('data','row','Members'));
    }

    public function update_row(Request $oRequest)
    {
        $addResult = AllocateShareCertificates::where('id',$oRequest->update_id)->update([
          'member_id'      => $oRequest->member_id,
          'transfer_date'  => $oRequest->transfer_date,
        ]);
        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function delete_row(Request $oRequest)
    {
        $Result = AllocateShareCertificates::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

     public function TransferShareCertificates(Request $oRequest) {
        $row  = AllocateShareCertificates::with('memberDetails')->where('id',$oRequest->id)->first();
        $data['page_title'] = 'Share Certificate Details';
        $AllocatedShares = Helper::GetAllocateShareCertificatesByMember($row->member_id);
        return view('admin.templates.allocate_share_certificates.allocate_share_certificates',compact('data','row','AllocatedShares'));
    }

    public function TransferShareReceipt(Request $oRequest) {
        $row  = AllocateShareCertificates::with('memberDetails')->where('id',$oRequest->id)->first();
        $data['page_title'] = 'Share Certificate Details';
        $AllocatedShares = Helper::GetAllocateShareCertificatesByMember($row->member_id);
        return view('admin.templates.allocate_share_certificates.allocate_share_certificates',compact('data','row','AllocatedShares'));
    }
    


    

    




}
