

<section class="content-header">
    <h1>
        RD Application
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.saving_account.index')}}">RD Application</a></li>
        <li class="active">RD Application Update</li>
    </ol>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
  
  <div class="tab-content">
      <div class="tab-pane active" id="memberinfo">
   
 <form method="post" action="{{ route('admin.systemsetting.update') }}" enctype="multipart/form-data">
            {{csrf_field()}}
<div class="box-body">
        <div class="form-horizontal">
                      
      <div class="col-md-6">
        <div class="form-horizontal">
          
            <div class="form-group">
              <label class="col-sm-4">Business Name</label>
              <div class="col-sm-7">
                <input type="text" name="business_name" id="business_name" class="form-control" placeholder="Enter Category" value="{{$sysSetting['business_name']}}" />
              </div>
            </div>
            
            <div class="form-group">
          <label class="col-sm-4">Business Logo</label>
          <div class="col-sm-7">
            <input class="form-control" type="file" name="business_logo" id="formFile" onchange="readURLImage(this,'business_logo_preview')" >
            @if(!empty($sysSetting['business_logo']))
                <img id="business_logo_preview" src="{{config('constants.SYSTEM')}}{{$sysSetting['business_logo']}}" class="img-sm figure-img img-fluid rounded mt-1"  />
            @else
                <img id="business_logo_preview" src="{{config('constants.DEFAULT_IMAGE')}}" class="img-sm figure-img img-fluid rounded mt-1 hide"  />
            @endif
          </div>
        </div>
            
            <div class="form-group">
              <label class="col-sm-4">Business description</label>
              <div class="col-sm-7">
                <textarea rows="5" name="business_description" id="business_description" class="form-control" placeholder="Business description">{{$sysSetting['business_description']}}</textarea>
              </div>
            </div>

        </div>
      </div>
      
    <div class="col-md-6">
        
        
        <div class="form-group">
          <label class="col-sm-4">PDF Title</label>
          <div class="col-sm-7">
            <input type="text" name="pdf_title" id="pdf_title" class="form-control" value="{{$sysSetting['pdf_title']}}" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-4">PDF Email</label>
          <div class="col-sm-7">
            <input type="text" name="pdf_email" id="pdf_email" class="form-control" value="{{$sysSetting['pdf_email']}}" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-4">PDF Mobile</label>
          <div class="col-sm-7">
            <input type="text" name="pdf_mobile" id="pdf_mobile" class="form-control" value="{{$sysSetting['pdf_mobile']}}" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-4">PDF Address</label>
          <div class="col-sm-7">
            <input type="text" name="pdf_address" id="pdf_address" class="form-control" value="{{$sysSetting['pdf_address']}}" />
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-4">PDF LOGO</label>
          <div class="col-sm-7">
            <input class="form-control" type="file" name="pdf_logo" id="formFile" onchange="readURLImage(this,'business_banner_preview')" >
            @if(!empty($sysSetting['pdf_logo']))
                <img id="business_banner_preview" src="{{config('constants.SYSTEM')}}{{$sysSetting['pdf_logo']}}" class="img-sm figure-img img-fluid rounded mt-1"  />
            @else
                <img id="business_banner_preview" src="{{config('constants.DEFAULT_IMAGE')}}" class="img-sm figure-img img-fluid rounded mt-1 hide"  />
            @endif
          </div>
        </div>
    </div>
    </div>  
  </div>
</div>

    <div class="box-footer">
      <div class="col-xs-12 text-center ">
        <div class="form-group">
           <input type="submit" value="Save" class="btn btn-flat btn-success"/>
          <a class="btn btn-flat btn-danger" href="{{route('admin.fixedDeposit.index')}}">Cancel</a>
        </div>
      </div>
    </div> 

 </form>
                        
      </div>
  </div>
</div>
</div>
</section>





