
<section class="content-header">
  <h1> {{$data['page_title']}}-[{{$row['account_no']}} ] <input id="returnUrl" name="returnUrl" type="hidden" value="" autocomplete="off">
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    <li><a href="{{route('admin.fixedDeposit.manage',array('id' => $row['uuid']))}}">FD Account</a></li>
    <li class="active">{{$data['page_title']}}</li>
  </ol>
</section>


    <style type="text/css">
    
    </style>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">

            <div class="box-body">
              <table id="emi_dataTables_table_init" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sr No</th>
                    <th>Due Date</th>
                    <th>Amount</th>
                    <th>Inetest</th>
                    <th>Maturity Amount</th>
                    <th>Interst Due On</th>
                  </tr>
                </thead>
                <tbody>
                     @foreach($rows as $index=>$row)
                     <?php 
                         $statusClass = 'danger';
                         if($row['status'] == 'paid') { 
                            $statusClass = 'success'; 
                         } 
                     ?>
                     <tr role="row">
                        <td>{{$index +1}}</td>
                        <td>{{Helper::getFromDate($row['due_date'])}}</td>
                        <td>{{@$row['amount']}}</td>
                        <td>{{@$row['interest']}}</td>
                        <td>{{@$row['maturity_amount']}}</td>
                        <td>{{Helper::getFromDate($row['payment_date'])}}</td>
                    </tr>

                    @endforeach 
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    