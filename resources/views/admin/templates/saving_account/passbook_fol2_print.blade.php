<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | Invoice</title>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="{{ URL::to('admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/bower_components/Ionicons/css/ionicons.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('admin/assets/dist/css/AdminLTE.min.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body onload="window.print();">
<div class="wrapper">

 <section class="content padding-top-0">
  <div class="row">
    <div class="col-md-12 ">
      <div class="box box-default">
        <div class="box-header"></div>
        <div class="box-body bg-gray">
         
          
          <div id="printDiv" style="background-color:white;width:8.5in;">
            <div class="page" style="padding-left:10px;padding-top:20px;">
              <div style="font-weight: 600; font-size: 20px;text-align: center; padding: 4px;">Saving Account</div>
              <table style="font-size: 16px;font-family:monospace;width:100%;">
                <tbody>
                  <tr>
                    <td style="width:15%;">
                      <small>Bank Name</small>
                    </td>
                    <td style="width:25%;">
                      <small>:{{Auth::guard('admin')->user()->name}} </small>
                    </td>
                    <td style="width:15%;">
                      <small>Branch Code</small>
                    </td>
                    <td style="width:25%;">
                      <small>:{{Auth::guard('admin')->user()->branch_code}}</small>
                    </td>
                    <td rowspan="6" style="width:20%;padding:20px;">
                      <div style="border: 1px solid black;height:200px;width:100%;">&nbsp;</div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Virtual A/c No</small>
                    </td>
                    <td>
                      <small>:</small>
                    </td>
                    <td>
                      <small>IFSC</small>
                    </td>
                    <td>
                      <small>:</small>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Account Holder</small>
                    </td>
                    <td>
                      <small>:{{$row->customer->name}}</small>
                    </td>
                    <td>
                      <small>Member Id</small>
                    </td>
                    <td>
                      <small>:{{$row->customer->customer_code}}</small>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Account Type</small>
                    </td>
                    <td>
                      <small>:Saving Account</small>
                    </td>
                    <td>
                      <small>Scheme Name</small>
                    </td>
                    <td>
                      <small>:{{$row->scheme->customer_code}}</small>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Mobile No</small>
                    </td>
                    <td>
                      <small>:{{$row->customer->mobile}}</small>
                    </td>
                    <td>
                      <small>Father</small>
                    </td>
                    <td>
                      <small>:</small>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <small>Address</small>
                    </td>
                    <td colspan="3">
                      <small>:{{$row->customer->present_address1}},{{$row->customer->present_pin_code}},{{$row->customer->present_area}}</small>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>


</html>
