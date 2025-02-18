@extends('admin.layouts.master-layout')

@section("content")
@if(Request::route()->getName() == 'admin.AllEmployees.target') 
    @include('admin.templates.employeeTarget.add')
@endif
@if(Request::route()->getName() == 'admin.AllEmployees.target.add.form') 
    @include('admin.templates.employeeTarget.add_employee_target')
@endif
@if(Request::route()->getName() == 'admin.AllEmployees.target.add') 
    @include('admin.templates.employeeTarget.add')
@endif
@if(Request::route()->getName() == 'admin.AllEmployees.insentive') 
    @include('admin.templates.employeeTarget.employee_insentive')
@endif
@endsection