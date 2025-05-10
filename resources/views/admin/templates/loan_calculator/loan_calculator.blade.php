@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
            
	    @if(Request::route()->getName() == 'admin.loan_calculator.index') 
           @include('admin.templates.loan_calculator.add')
        @endif

        @if(Request::route()->getName() == 'admin.loan_calculator.report') 
            @include('admin.templates.loan_calculator.report')
        @endif

        

    @endsection

    @section('scripts')
    <script type="text/javascript">
       $(document).on("change", '#EMIPayout', function () {
          const payoutValue = $('#EMIPayout').val();
          let captionText = "Tenure (in Months)";
    
          switch (payoutValue) {
             case "daily":
                captionText = "Tenure (in Days)";
                break;
             case "weekly":
                captionText = "Tenure (in Weeks)";
                break;
             case "bi_weekly":
                captionText = "Tenure (in Bi-Weeks)";
                break;
             case "monthly":
                captionText = "Tenure (in Months)";
                break;
             case "quarterly":
                captionText = "Tenure (in Quarters)";
                break;
             case "half_yearly":
                captionText = "Tenure (in Half Years)";
                break;
             case "yearly":
                captionText = "Tenure (in Years)";
                break;
          }
    
          $('#TenureCaption').html(captionText);
       });
    </script>
    @endsection
