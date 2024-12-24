@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.paymentCollectDeposit.list')

    @endsection

@section('scripts')

<script type="text/javascript">

get_records()
function get_records()
{
  var API_URL = "{{ route('admin.paymentCollectDeposit.list-pending') }}";
    $.ajax({
     url: API_URL,
     method: 'get',
     data: {},
     dataType: 'json',
     success: function(response)
     {
        $('#dataTables_table_init').DataTable().destroy();
        $('#TableRecordList').html(response["html"]);
        $('#dataTables_table_init').DataTable();
     }
  });
}
</script>


@endsection