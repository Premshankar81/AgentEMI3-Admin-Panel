@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.CashReportUserwise.list')
        

    @endsection

@section('scripts')



<script type="text/javascript">

selectPickerInitialize('branche_id');

function transation_delete_row(update_id) {

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
        cancelButtonClass: "btn btn-danger w-xs mt-2",
        confirmButtonText: "Yes, delete it!",
        buttonsStyling: !1,
        }).then(function(t) {
        if(t.value == true){ 
            var API_URL = "{{ route('admin.fixedDeposit.transation-delete') }}";
            $.ajax({
                type: "POST",
                url: API_URL,
                data: {'update_id': update_id,'_token': '{!! csrf_token() !!}'},
                dataType: 'json',
                success: function(data) {
                if (data["status"] == 1){
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success",
                        confirmButtonClass: "btn btn-primary w-xs mt-2",
                        buttonsStyling: !1
                    }).then(function() {
                        location.reload();
                    });
                }
                    
                },
                error: function() {
                    alert('error');
                }
            })
    }

})
            
}

   
   
</script>


@endsection