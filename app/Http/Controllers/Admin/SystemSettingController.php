<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use DB;
use Helper;

class SystemSettingController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'System Setting';
        $sysSetting = SystemSetting::pluck('value', 'key');

        return view('admin.templates.systemsettings.systemsettings',compact('data','sysSetting'));
    }

     public function update(Request $oRequest)
    {
        SystemSetting::where('key','business_name')->update([
          'value'     => $oRequest->business_name
        ]);
        
        SystemSetting::where('key','business_tag_line')->update([
          'value'     => $oRequest->business_tag_line
        ]);

        SystemSetting::where('key','business_description')->update([
          'value'     => $oRequest->business_description
        ]);
    
        
        if($oRequest->file('business_logo') != ''){
            $img_path = public_path().config('constants.SYSTEM');
            $file_name = Helper::UploadMedia($oRequest->business_logo,$img_path);
            SystemSetting::where('key','business_logo')->update([
                'value' => $file_name
            ]);
        }

        if($oRequest->file('business_banner') != ''){
            $img_path = public_path().config('constants.SYSTEM');
            $file_name = Helper::UploadMedia($oRequest->business_banner,$img_path);
            SystemSetting::where('key','business_banner')->update([
                'value' => $file_name
            ]);
        }
        
        /*if($oRequest->file('pdf_logo') != ''){
            $img_path = public_path().config('constants.SYSTEM');
            $file_name = Helper::UploadMedia($oRequest->pdf_logo,$img_path);
            SystemSetting::where('key','pdf_logo')->update([
                'value' => $file_name
            ]);
        }*/


         

        //Toastr::success( translate('Successfully updated. To see the changes in app restart the app.'));
        return back();
    }


}
