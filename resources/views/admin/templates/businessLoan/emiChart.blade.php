
<section class="content-header">
  <h1> {{$data['page_title']}}-<small>[{{$row['account_no']}} ]</small> <input id="returnUrl" name="returnUrl" type="hidden" value="" autocomplete="off">
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
    <li><a href="{{route('admin.businessLoan.manage',array('id' => $row['uuid']))}}">Loan Account - {{$row['account_no']}}</a></li>
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
                    <th>EMI Date</th>
                    <th>Due Date</th>
                    <th>Emi</th>
                    <th>Principal</th>
                    <th>Interest</th>
                    <th>Outstanding</th>
                    <th>Penalty</th>
                    <th>Action</th>
                    <th>Advance Amount</th>
                    <th>Paid On</th>
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
                     <tr role="row" class="<?php if($row['penalty_amount'] != 0){ echo 'text-danger'; } ?>">
                        <td>{{$index +1}}</td>
                        <td>{{Helper::getFromDate($row['emi_date'])}}</td>
                        <td>{{Helper::getFromDate($row['due_date'])}}</td>
                        <td>{{@$row['emi']}}</td>
                        <td>{{@$row['principal']}}</td>
                        <td>{{@$row['interest']}}</td>
                        <td>{{@$row['outstanding']}}</td>
                        <td>{{@$row['penalty_amount']}}</td>
                        <td><small class="label label-{{$statusClass}}"><?= ucfirst($row['status']) ?></small></td>
                        <td>{{@$row['advance_amount']}}</td>
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

    