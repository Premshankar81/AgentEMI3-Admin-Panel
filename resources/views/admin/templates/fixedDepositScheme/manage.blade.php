<section class="content-header">
<h1>
FD Account Scheme

</h1>
<ol class="breadcrumb">
<li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="{{route('admin.fixedDepositScheme.index')}}">FD Account Scheme List</a></li>
<li class="active">FD Account Scheme</li>

</ol>
</section>
<section class="content padding-top-0">
<div class="row">
<div class="col-md-9">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Scheme details</h3>
            <div class="pull-right">
                
                <a class="btn btn-default btn-xs" href="{{route('admin.fixedDepositScheme.edit',array('id' => $row['unique_code']))}}">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-default btn-xs" href="/RecurringDeposit/SchemeDelete/f085aff1-07f1-4668-86cf-4e84e35a36d6">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td>Scheme Code</td>
                        <td>{{$row['scheme_code']}}</td>
                    </tr>

                    <tr>
                        <td>Scheme's Name</td>
                        <td>{{$row['name']}}</td>
                    </tr>
                    <tr>
                        <td>Min. FD Amount</td>
                        <td><?= number_format($row['min_rd_amount']) ?></td>
                    </tr>
                    <tr>
                        <td>FD Frequency</td>
                         <td><?= ucfirst($row['fd_frequency']) ?></td>
                    </tr>
                    <tr>
                        <td>Interest Compounding</td>
                        <td><?= ucfirst($row['interest_compounding']) ?></td>
                    </tr>
                    <tr>
                        <td>Interest Rate</td>
                         <td><?= $row['interest_rate'] ?></td>
                    </tr>
                    <tr>
                        <td>FD Tenure</td>
                         <td><?= ucfirst($row['fd_tenure']) ?> <?= str_replace('_',' ',ucfirst($row['fd_frequency'])) ?></td>
                    </tr>
                    <tr>
                        <td>Cancellation Charge</td>
                        <td><?= $row['cancellation_charge_value'] ?></td>
                    </tr>
                   
                    <tr>
                        <td>Collector Commission Rate</td>
                        <td><?= $row['Collector_commission_rate'] ?></td>
                    </tr>
                     <tr>
                      <td>Status</td>
                      <?php
                      $statusClass = "danger";
                      if($row['status'] == 'active'){
                        $statusClass = "success";
                      }
                      ?>
                      <td>
                        <span class="label label-<?= $statusClass ?>"><?= ucfirst($row['status']) ?></span>
                      </td>
                    </tr>
                    <tr>
                        <td>Created on</td>
                        <td>{{Helper::getFromDate($row['created_at'])}}</td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        
    </div>
</div>
</div>
</section>