@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
        @include('admin.templates.trial_balance.list')

    @endsection

@section('scripts')



<script type="text/javascript">

selectPickerInitialize('ledger_id');

</script>


@endsection