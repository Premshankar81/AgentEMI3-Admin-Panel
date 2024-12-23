<section class="content-header">
    <h1>Dashboard <small>{{ $data['page_title'] }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">{{ $data['page_title'] }}</li>
    </ol>
</section>

<section class="content">
    <form id="add_form" method="POST" name="add_form" action="{{route('admin.AllEmployees.update_employee', $data['employee']->id)}}" autocomplete="off" >
        @csrf
        @method('PATCH')
    <div class="row text-left">
      
        <div class="nav-tabs-custom">
         
          <div class="tab-content">
            <div class="tab-pane active" id="memberinfo">
             
             <div class="box-body">
                      <div class="form-horizontal">
                    
        
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">Employee Name<span class="requiredfield">*</span></label>
                <div class="col-sm-8">
                    <input class="form-control" id="employee_name" maxlength="50" name="employee_name" type="text"  value="{{ $data['employee']->employee_name }}">
                </div>
            </div>
        </div>
  
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">Email ID<span class="requiredfield">*</span></label>
                <div class="col-sm-8">
                    <input class="form-control" id="email" maxlength="50" name="email" type="email"  value="{{ $data['employee']->email }}">
                    
                </div>
            </div>
        </div>
       
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">Mobile No.<span class="requiredfield">*</span></label>
                <div class="col-sm-8">
                    <input class="form-control" id="mobile" maxlength="20" name="mobile" type="number" value="{{ $data['employee']->mobile }}">
                    
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-4 control-label">Position<span class="requiredfield">*</span></label>
                <div class="col-sm-8">
                    <input class="form-control" id="position" maxlength="20" name="position" type="text"  value="{{ $data['employee']->position }}">
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label class="col-sm-4 control-label">Employee ID<span class="requiredfield">*</span></label>
              <div class="col-sm-8">
                  <input class="form-control" id="employee_id" maxlength="20" name="employee_id" type="text"  value="{{ $data['employee']->employee_id }}">
                  
              </div>
          </div>
      </div> 
      <div class="col-md-6">
        <div class="form-group ">
          <label class="col-sm-4 control-label">Joining Date <span class="requiredfield">*</span></label>
          <div class="col-sm-8">
             <div class="input-group">
                <div class="input-group-addon">
                   <i class="fa fa-calendar"></i>
                </div>
                <input class="form-control" id="joining_date" name="joining_date" type="date" value="{{ $data['employee']->joining_date }}" required > 
             </div>
          </div>
       </div>
      </div>
    
            </div>
        </div>
              
  
              <div class="box-footer">
                <div class="col-xs-12 text-center ">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Employee</button>
                    <a class="btn btn-flat btn-danger" href="{{route('admin.AllEmployees.index')}}">Cancel</a>
                  </div>
                </div>
              </div>
  
  
            </div>
            <div class="tab-pane" id="timeline"></div>
          </div>
        </div>
      </div>
    </div>
     </form>
  </section>