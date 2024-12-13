

<section class="content-header">
    <h1>
        Business Details Update
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('admin.saving_account.index')}}">Business Details</a></li>
        <li class="active">Business Details Update</li>
    </ol>
</section>

<form method="post" action="{{ route('admin.profileupdate.update') }}" enctype="multipart/form-data">
{{csrf_field()}}
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
  
  <div class="tab-content">
      <div class="tab-pane active" id="memberinfo">
   
 
<div class="box-body">
    <div class="form-horizontal">
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="title" class="form-label">PDF Title</label>
                <input type="text" id="pdf_title" name="pdf_title"class="form-control" value="{{$Profile['pdf_title']}}" required />
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="title" class="form-label">PDF Email</label>
                <input type="text" id="pdf_email" name="pdf_email"class="form-control" value="{{$Profile['pdf_email']}}" required />
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="title" class="form-label">PDF Mobile</label>
                <input type="text" id="pdf_mobile" name="pdf_mobile"class="form-control" value="{{$Profile['pdf_mobile']}}" />
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="pdf_cin" class="form-label">PDF CIN</label>
                <input type="text" id="pdf_cin" name="pdf_cin"class="form-control" value="{{$Profile['pdf_cin']}}" />
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="pdf_address" class="form-label">PDF Address</label>
                <input type="text" id="pdf_address" name="pdf_address"class="form-control" value="{{$Profile['pdf_address']}}" />
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="pdf_address" class="form-label">PDF LOGO</label>
                <input class="form-control" type="file" name="pdf_logo" id="formFile" onchange="readURLImage(this,'business_banner_preview')" >
                @if(!empty($Profile['pdf_logo']))
                    <img id="business_banner_preview" src="{{config('constants.SYSTEM')}}{{$Profile['pdf_logo']}}" class="img-sm figure-img img-fluid rounded mt-1"  />
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


                        
      </div>






  </div>
</div>
</div>
</section>

<section class="content-header">  <h1>Default Ledger</h1></section>

<section class="content">
    
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
  
  <div class="tab-content">
      <div class="tab-pane active" id="memberinfo">
   
 
<div class="box-body">
    <div class="form-horizontal">
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="default_ledger_id" class="form-label">Default Ledger</label>
               <select class="form-control" id="default_ledger_id" name="default_ledger_id"> 
                    <option value="">Select Default Ledger</option>
                        @foreach ($Ledgers as $key => $Ledger)
                            <option <?php if($Profile['default_ledger_id'] == $Ledger->id){ echo "selected"; } ?>  value="{{$Ledger->id}}">{{$Ledger->title}}</option>
                        @endforeach
                    </select>
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


                        
      </div>


      



  </div>
</div>
</div>
</section>

</form>



