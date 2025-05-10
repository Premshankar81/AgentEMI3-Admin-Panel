<section class="content-header">
<h1>
RD Account Scheme
</h1>
<ol class="breadcrumb">
<li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li><a href="\RecurringDeposit\SchemeIndex">RD Account Scheme List</a></li>
<li class="active">RD Account Scheme</li>

</ol>
</section>
<section class="content padding-top-0">
<div class="row">
<div class="col-md-9">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Scheme details</h3>
            <div class="pull-right">
                <a class="btn btn-default btn-xs" href="/AccountScheme/Manage/f085aff1-07f1-4668-86cf-4e84e35a36d6">
                    <i class="fa fa-gear"></i> Commission Chart
                </a>
                <a class="btn btn-default btn-xs" href="/RecurringChargeSettings/Manage/f085aff1-07f1-4668-86cf-4e84e35a36d6">
                    <i class="fa fa-gear"></i>&nbsp; Recurring Charge Settings
                </a>
                <a class="btn btn-default btn-xs" href="/RecurringDeposit/RDReleaseRule/f085aff1-07f1-4668-86cf-4e84e35a36d6">
                    <i class="fa fa-gear"></i> RD Release Rule
                </a>
                <a class="btn btn-default btn-xs" href="{{route('admin.recurringScheme.edit',array('id' => $row['unique_code']))}}">
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
                        <td>Min. RD Amount</td>
                        <td><?= number_format($row['min_rd_amount']) ?></td>
                    </tr>
                    <tr>
                        <td>RD Frequency</td>
                         <td><?= ucfirst($row['rd_frequency']) ?></td>
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
                        <td>RD Tenure</td>
                         <td><?= ucfirst($row['rd_tenure']) ?> <?= str_replace('_',' ',ucfirst($row['rd_frequency'])) ?></td>
                    </tr>
                    <tr>
                        <td>Cancellation Charge</td>
                        <td><?= $row['cancellation_charge_value'] ?></td>
                    </tr>
                    <tr>
                        <td>Collection Charge</td>
                        <td><?= $row['collection_charge_value'] ?></td>
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
        <div class="box-body">

            <table class="table table-bordered" id="PenaltyruleTable">
                <thead style="background-color:lightgray;color:black;">
                    <tr>
                        <th>Sr No</th>
                        <th>From Days</th>
                        <th>To Days</th>
                        <th>Calculation Type</th>
                        <th>Parameter</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($PenaltyCharts as $key => $PenaltyChart)
                    <tr>
                        <td>1</td>
                        <td>{{$PenaltyChart['from_days']}}</td>
                        <td>{{$PenaltyChart['to_days']}}</td>
                        <td><?= ucfirst(str_replace('_',' ',$PenaltyChart['calculation_type'])) ?></td>
                        <td>{{$PenaltyChart['parameter']}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
</div>
</div>
</section>