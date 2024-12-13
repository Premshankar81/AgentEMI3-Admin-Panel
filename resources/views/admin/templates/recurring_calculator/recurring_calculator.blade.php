@extends('admin.layouts.master-layout')

@section('styles')

@endsection

    @section('content')
            
            
	    @if(Request::route()->getName() == 'admin.rd_calculator.index') 
           @include('admin.templates.recurring_calculator.add')
        @endif

        @if(Request::route()->getName() == 'admin.rd_calculator.report') 
            @include('admin.templates.recurring_calculator.report')
        @endif

        

    @endsection

@section('scripts')

@endsection