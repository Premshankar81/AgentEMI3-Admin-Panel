<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Helper;

class ProfileUpdateController extends Controller
{
     public function index()
    {
        $data['page_title'] = 'Profile';
        $Profile = Admin::where('id',Auth::guard('admin')->user()->id)->first();
         $Ledgers = Helper::get_ledgers();
     
        return view('admin.templates.profile.profile',compact('data','Profile','Ledgers'));
    }
    
    public function updateProfile(Request $oRequest)
    {
        $updateProfile = Admin::where('id',Auth::guard('admin')->user()->id)->update([
                          'pdf_title'           => $oRequest->pdf_title,
                          'pdf_cin'             => $oRequest->pdf_cin,
                          'pdf_email'           => $oRequest->pdf_email,
                          'pdf_mobile'          => $oRequest->pdf_mobile,
                          'pdf_address'         => $oRequest->pdf_address,
                          'default_ledger_id'   => $oRequest->default_ledger_id

                        ]);
      
        if($oRequest->file('pdf_logo') != ''){
            $img_path = public_path().config('constants.SYSTEM');
            $file_name = Helper::UploadMedia($oRequest->pdf_logo,$img_path);
            Admin::where('id',Auth::guard('admin')->user()->id)->update([
                'pdf_logo' => $file_name
            ]);
        }

        //Toastr::success( translate('Successfully updated. To see the changes in app restart the app.'));
        return back();
    }

}
