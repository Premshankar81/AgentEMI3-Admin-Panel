<?php

namespace App\Http\Controllers\Admin;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AllEmployeesController extends Controller
{
    public function index(Request $request)
    {
    
        $status = $request->query('status', 'active');
        $employees = Employees::where('status', $status)->get();
        $data = [
            'page_title' => 'All Employees',
            'employees' => $employees,
            ];
            
        return view('admin.templates.staffManagement.all_employees',compact('data'));
    }

    public function addEmployeeForm()
    {
        $data['page_title'] = 'Add Employee';
        return view('admin.templates.staffManagement.all_employees',compact('data'));
    }

    // Add new staff
    public function create(Request $request)
    {
        $validated = $request->validate([
            'employee_name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'mobile' => 'required|string|max:15',
            'position' => 'required|string|max:255',
            'employee_id' => 'required|string|max:10',
            'joining_date' => 'required|date|before_or_equal:today',
        ]);

        Employees::create($validated + ['status' => 'active']);
        $status = $request->query('status', 'active');
        $employees = Employees::where('status', $status)->get();
        // Pass data to the view
       $data = [
        'page_title' => 'All Employees',
        'responseMsg' => 'Employee details added successfully',
        'success' => true,
        'employees' => $employees,
        ];
        
        return view('admin.templates.staffManagement.all_employees',compact('data'));
        // return response()->json(['message' => 'Employee details added successfully']);
    }

    public function editEmployeeDetails($id)
{
    // Find the employee by ID
    $employee = Employees::findOrFail($id);

    // Pass the employee details to the view
    $data = [
        'page_title' => 'Edit Employee',
        'employee' => $employee
    ];

    return view('admin.templates.staffManagement.all_employees', compact('data'));
}

public function updateEmployeeDetails(Request $request, $id)
{
    // Validate input
    $validated = $request->validate([
        'employee_name' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email,' . $id,
        'mobile' => 'required|string|max:15',
        'position' => 'required|string|max:255',
        'employee_id' => 'required|string|max:10',
        'joining_date' => 'required|date|before_or_equal:today',
    ]);

    // Find the employee and update details
    $employee = Employees::findOrFail($id);
    $employee->update($validated);
    $status = $request->query('status', 'active');
    $employees = Employees::where('status', $status)->get();
    $data = [
        'page_title' => 'All Employees',
        'responseMsg' => 'Employee details updated successfully',
        'success' => true,
        'employees' => $employees,
        ];
    // Redirect with a success message
    return view('admin.templates.staffManagement.all_employees', compact('data'));
}


}
