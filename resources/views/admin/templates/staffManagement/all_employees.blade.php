@extends('admin.layouts.master-layout')

@section("content")
@if(Request::route()->getName() == 'admin.AllEmployees.index') 
    @include('admin.templates.staffManagement.add')
@endif
@if(Request::route()->getName() == 'admin.AllEmployees.addEmployeeForm') 
    @include('admin.templates.staffManagement.add_employee')
@endif

@if(Request::route()->getName() == 'admin.AllEmployees.edit_employee') 
    @include('admin.templates.staffManagement.edit_employee')
@endif
@if(Request::route()->getName() == 'admin.AllEmployees.update_employee') 
    @include('admin.templates.staffManagement.add')
@endif
@if(Request::route()->getName() == 'admin.AllEmployees.add') 
    @include('admin.templates.staffManagement.add')
@endif
@if(Request::route()->getName() == 'admin.AllInactiveEmployees.index') 
    @include('admin.templates.staffManagement.add')
@endif
@if(Request::route()->getName() == 'admin.leaveTypes') 
    @include('admin.templates.staffManagement.leaves_types')
@endif
@if(Request::route()->getName() == 'admin.leaveTypes.add') 
    @include('admin.templates.staffManagement.leaves_types')
@endif
@if(Request::route()->getName() == 'admin.employees.leaves.index') 
    @include('admin.templates.staffManagement.applyed_employees_leaves')
@endif
@endsection
