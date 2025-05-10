@extends('admin.layouts.master-layout')

@section('styles')
<style type="text/css">
     .img-fluid {
        width: 100%;
        height: 200px;
    }
</style>

@endsection

    @section('content')
            
        @include('admin.templates.profile.update')

    @endsection

@section('scripts')
<script type="text/javascript">
    selectPickerInitialize('default_ledger_id');
</script>


@endsection