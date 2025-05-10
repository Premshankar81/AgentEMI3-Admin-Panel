@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
	    @if(Request::route()->getName() == 'admin.fd_calculator.index') 
           @include('admin.templates.fixedDeposit_calculator.add')
        @endif

        @if(Request::route()->getName() == 'admin.fd_calculator.report') 
            @include('admin.templates.fixedDeposit_calculator.report')
        @endif

    @endsection

@section('scripts')

@endsection