@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.ledger_view.list')

    @endsection

@section('scripts')



<script type="text/javascript">

selectPickerInitialize('ledger_id');

</script>


@endsection