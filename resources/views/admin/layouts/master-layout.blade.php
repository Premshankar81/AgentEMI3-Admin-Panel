<!DOCTYPE html>
<html>
  <head>
    @include('admin.includes.head')
    @yield('styles')
    <style type="text/css">
        a.logo.logo-light {
            color: white;
            font-size: 18px;
        }
    </style>
  </head>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
         @include('admin.includes.top-navgation')
      </header>
      <aside class="main-sidebar">
        @include('admin.includes.sidebar_menu')
      </aside>

      <div class="content-wrapper">
         @yield('content')
      </div>

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.13
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io/">AdminLTE</a>. </strong> All rights reserved.
      </footer>
      <aside class="control-sidebar control-sidebar-dark" style="display: none;">
        @include('admin.includes.setting')
      </aside>
      <div class="control-sidebar-bg"></div>
    </div>




<div class="modal fade" id="modal-daterange-CollectionUserWise">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-calendar"></i> Date Range - User wise cash collection</h4>
    </div>

    <?php
        $startDate=  date('Y-m-01');
        $EndDate=  date('Y-m-t');
        if(isset($_REQUEST['from_date']) && $_REQUEST['from_date'] != ''){
            $startDate =  $_REQUEST['from_date'];    
        }
        if(isset($_REQUEST['to_date']) && $_REQUEST['to_date'] != ''){
            $EndDate=  $_REQUEST['to_date'];    
        }
        
     ?>

    <form method="get" autocomplete="off" action="{{route('admin.CashReportUserwise.index')}}">
    <div class="modal-body">
        <div class="box-body">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">From Date </label>
                        <div class="col-sm-7">
                            <input class="form-control" id="from_date" name="from_date" type="date" value="{{@$startDate}}" >
                        </div>
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">To Date </label>
                        <div class="col-sm-7">
                            <input class="form-control"id="to_date" name="to_date" type="date" value="{{@$EndDate}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="modal-daterange-CollectionAgentWise">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-calendar"></i> Date Range - Agent wise cash collection</h4>
    </div>

    <?php
        $startDate=  date('Y-m-01');
        $EndDate=  date('Y-m-t');
        if(isset($_REQUEST['from_date']) && $_REQUEST['from_date'] != ''){
            $startDate =  $_REQUEST['from_date'];    
        }
        if(isset($_REQUEST['to_date']) && $_REQUEST['to_date'] != ''){
            $EndDate=  $_REQUEST['to_date'];    
        }
        
     ?>

    <form method="get" autocomplete="off" action="{{route('admin.CollectionAgentWise.index')}}">
    <div class="modal-body">
        <div class="box-body">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">From Date </label>
                        <div class="col-sm-7">
                            <input class="form-control" id="from_date" name="from_date" type="date" value="{{@$startDate}}" >
                        </div>
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">To Date </label>
                        <div class="col-sm-7">
                            <input class="form-control"id="to_date" name="to_date" type="date" value="{{@$EndDate}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
    </form>
  </div>
</div>
</div>


<div class="modal fade" id="modal-daterange-CollectionAccountWise">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-calendar"></i> Date Range - Profit and Loss</h4>
    </div>

    <?php
        $startDate=  date('Y-m-01');
        $EndDate=  date('Y-m-t');
        if(isset($_REQUEST['pl_from_date']) && $_REQUEST['pl_from_date'] != ''){
            $startDate =  $_REQUEST['pl_from_date'];    
        }
        if(isset($_REQUEST['pl_to_date']) && $_REQUEST['pl_to_date'] != ''){
            $EndDate=  $_REQUEST['pl_to_date'];    
        }
        
     ?>

    <form method="get" autocomplete="off" action="{{route('admin.CollectionAccountWise.index')}}">
    <div class="modal-body">
        <div class="box-body">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">From Date </label>
                        <div class="col-sm-7">
                            <input class="form-control" id="from_date" name="from_date" type="date" value="{{@$startDate}}" >
                        </div>
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">To Date </label>
                        <div class="col-sm-7">
                            <input class="form-control"id="to_date" name="to_date" type="date" value="{{@$EndDate}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="modal-daterange-reportsProfitnLoss">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-calendar"></i> Date Range - Profit and Loss</h4>
    </div>

    <?php
        $startDate=  date('Y-m-01');
        $EndDate=  date('Y-m-t');
        if(isset($_REQUEST['pl_from_date']) && $_REQUEST['pl_from_date'] != ''){
            $startDate =  $_REQUEST['pl_from_date'];    
        }
        if(isset($_REQUEST['pl_to_date']) && $_REQUEST['pl_to_date'] != ''){
            $EndDate=  $_REQUEST['pl_to_date'];    
        }
        
     ?>

    <form method="get" autocomplete="off" action="{{route('admin.reportsProfitnLoss.index')}}">
    <div class="modal-body">
        <div class="box-body">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">From Date </label>
                        <div class="col-sm-7">
                            <input class="form-control" id="pl_from_date" name="pl_from_date" type="date" value="{{@$startDate}}" >
                        </div>
                    </div>
                </div> 

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">To Date </label>
                        <div class="col-sm-7">
                            <input class="form-control"id="pl_to_date" name="pl_to_date" type="date" value="{{@$EndDate}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="modal-daterange-reportsBalanceSheet">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title"><i class="fa fa-calendar"></i> Date Range - Balance Sheet</h4>
    </div>

    <?php
        $BS_startDate=  date('Y-m-01');
        $BS_EndDate=  date('Y-m-t');
        if(isset($_REQUEST['bs_from_date']) && $_REQUEST['bs_from_date'] != ''){
            $BS_startDate =  $_REQUEST['bs_from_date'];    
        }
        if(isset($_REQUEST['bs_to_date']) && $_REQUEST['bs_to_date'] != ''){
            $BS_EndDate=  $_REQUEST['bs_to_date'];    
        }
        
     ?>

    <form method="get" autocomplete="off" action="{{route('admin.reportsBalanceSheet.index')}}">
    <div class="modal-body">
        <div class="box-body">
            <div class="form-horizontal">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">From Date </label>
                        <div class="col-sm-7">
                            <input class="form-control" id="bs_from_date" name="bs_from_date" type="date" value="{{@$BS_startDate}}" >
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">To Date </label>
                        <div class="col-sm-7">
                            <input class="form-control"id="bs_to_date" name="bs_to_date" type="date" value="{{@$BS_EndDate}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      <input type="submit" value="Save" class="btn btn-primary"/>
    </div>
    </form>
  </div>
</div>
</div>



      @include('admin.includes.footer')
    @yield('scripts')
  </body>
</html>