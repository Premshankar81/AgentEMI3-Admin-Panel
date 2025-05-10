<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Excel;
use App\Exports\CategoryExport;
use Auth;
use Helper;


class CategoryController extends Controller
{
  
    public function index()
    {
        $data['page_title'] = 'Category';
        $rows = Category::where('delete_status','0')->get();
        return view('admin.templates.category.category',compact('data','rows'));
    }

    function store(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $oRequest->offsetSet('slug', $slug );
        $oRequest->offsetSet('created_at', Auth::guard('admin')->user()->id);

        if($oRequest->file('category_image') != ''){
            $img_path = public_path().config('constants.CATEGORY');
            $file_name = Helper::UploadMedia($oRequest->category_image,$img_path);
            $oRequest->offsetSet('image',$file_name);
        }

        

        

        $checkExist = Category::where('slug',$slug)->where('delete_status','0')->first();
        if ($checkExist){
            return response()->json(array('status' => 2,'msg'=> 'This Category Already Added'));
        }else{

	        $addResult = Category::create($oRequest->all());
	        if($addResult){
	        	return response()->json(array('status' => 1,'msg'=>'Record successfully Inserted'));
	    	}else{ 
	                return response()->json(array('status' => 0,'msg'=>'Error'));
	        }
    	}
    }
    
    function list()
    {
        $rows = Category::where('delete_status','0')->orderBy('id', 'DESC')->get();
        $html = view('admin.templates.category.records', compact('rows'))->render();
        
        return response()->json(array('html'=>$html,'status' => 1,'msg'=>'Successfully Inserted'));
    }
    public function get_row(Request $oRequest)
    {
        $row  = Category::where('id',$oRequest->id)->first();
        $img_path = config('constants.CATEGORY');
        $image_url = '';
        if($row->image != ''){
            $row['image_url'] = $img_path.''.$row->image;
        }


        return response()->json(['data' => $row,'image_url'=>$image_url,'status' => '1']);
    }

    public function update_row(Request $oRequest)
    {
        $slug = Helper::slugify($oRequest->title);
        $addResult = Category::where('id',$oRequest->update_id)->update([
          'title'     => $oRequest->update_title,
          'status'    => $oRequest->update_status,
          'slug'      => $slug
        ]);

        if($oRequest->file('update_image') != ''){
            $img_path = public_path().config('constants.CATEGORY');
            $file_name = Helper::UploadMedia($oRequest->update_image,$img_path);
            Category::where('id', $oRequest->update_id)->update([
                'image' => $file_name
            ]);
        }

        if($addResult){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
    }

    public function export()
    {
        $file_name = 'category_'.rand().'.xlsx';
          return Excel::download(new CategoryExport,$file_name);
    }

    public function delete_row(Request $oRequest)
    {
        $Result = Category::where('id',$oRequest->update_id)->update([
          'delete_status'      => '1'
        ]);
        if($Result){
            return response()->json(array('status' => 1,'msg'=>'Record successfully updated'));
        } else { 
            return response()->json(array('status' => 0,'msg'=>'Error'));
        }
     }

    

    




}
