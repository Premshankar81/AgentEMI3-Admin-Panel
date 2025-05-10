<section class="content-header">
        <h1>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <a href="#" class="btn btn-default flat print-button print-page" id="btnPrint"><i class="fa fa-print"></i> Print</a>
                </div>
            </div>
        </div>

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{route('admin.agents.index')}}">Agents List</a></li>
            <li><a href="{{route('admin.agents.view',array('id' => $row['unique_code']))}}">Agents View</a></li>
            <li class="active">ID Card</li>
        </ol>
    </section>
<section class="content">
   <div class="box box-solid">
      <div class="box-body">
         <div class="form-horizontal" id="printDiv">
            <div style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);  max-width: 300px;  margin: auto;  text-align: center;  font-family: arial;">
               <div style="margin: 0 auto;width:50px;height:50px;align-items:center;"><img alt="companylogo" src="https://nidhiexpert.com/AppImages/Logo/acc27fe1-a8cb-42ae-8297-4b3e00d39e48.png" style="margin: 0 auto;width:100%;height:100%;"></div>
               <p style="padding-top:0px; font-weight:bold;font-size:14px;">{{Auth::guard('admin')->user()->name}}</p>
               <p style="padding-left:5PX;padding-right:5PX; padding-top:0px; font-size:10px;">HEAD OFF. SIXMILE GUWAHATI </p>
               <hr style="margin-top:5px;">
               <div style="margin: 0 auto;border:1px solid  rgba(0, 0, 0, 0.2);width:150px;height:150px;align-items:center;">
                
                @if($row['profile_img'] != '')
                   
                    <img alt="employeeimage" src="{{config('constants.PROFILE_IMG').$row['profile_img']}}" style="margin: 0 auto;width:100%;height:100%;">
                @else
                    <img alt="employeeimage" src="https://i.ibb.co/dmdwN6L/35326856-6de4-483d-a7d8-412ca31fc326.png" style="margin: 0 auto;width:100%;height:100%;">
                @endif
                

                
              </div>
               <h2>{{$row['name']}}</h2>
               <p style="color: grey;  font-size: 14px;">AGENT</p>
               <p style="color: grey;  font-size: 14px;">Employee Code:{{$row['agent_code']}}</p>
               <p style="color: grey;  font-size: 14px;">Designation:{{$row['agent_rank']['title']}}</p>
               
               <hr style="margin-bottom:10px;">
               <p style="padding-bottom:10px; font-size:10px;">GUWAHATI  KAMRUP 781022 Assam Mob:8480005587</p>
            </div>
         </div>
      </div>
   </div>
</section>