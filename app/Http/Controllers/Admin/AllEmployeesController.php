<?php

namespace App\Http\Controllers\Admin;
use App\Models\Employees;
use App\Models\LeavesTypes;
use App\Models\EmployeeLeaves;
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
    
    public function inactiveEmployees(Request $request)
    {
    
        $status = $request->query('status', 'inactive');
        $employees = Employees::where('status', $status)->get();
        $data = [
            'page_title' => 'Inactive Employees',
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
            'father_no' => 'required|string|max:15',
          'account_no' => 'required|string|max:18',
          'ifsc_code' => 'required|string|max:30',
          'branch_name' => 'required|string|max:255',
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
        'father_no' => 'required|string|max:15',
        'account_no' => 'required|string|max:18',
        'mobile' => 'required|string|max:20',
        'ifsc_code' => 'required|string|max:30',
        'branch_name' => 'required|string|max:255',
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
  
public function deleteEmployeeDetails($id){
    Employees::where('id', $id)->update(['status' => 'inactive']);
}
public function leaveTypes(Request $request) {
    $status = $request->query('status', 'active');
    $LeaveTypes = LeavesTypes::where('status', $status)->get();
    $data = [
        'page_title' => 'Leave Types',
        'leaveTypes' => $LeaveTypes,
        ];
        
    return view('admin.templates.staffManagement.all_employees',compact('data'));
}
public function addLeaveTypes(Request $request)
{
    // Log the incoming request data
    \Log::info('Incoming request data:', $request->all());

    $validated = $request->validate([
        'leave_type' => 'required|string|max:255',
    ]);

    // Insert the data into the database
    LeavesTypes::create($validated + ['status' => 'active']);

    // Redirect to the list of leave types with a success message
    return redirect()
        ->route('admin.leaveTypes', ['status' => 'active']) // Update to the correct route
        ->with('success', 'Leave added successfully!');
}


public function applyLeave(Request $request){
    $validated = $request->validate([
        'employees_id' => 'required|exists:employees,id',
        'leaves_types_id' => 'required|exists:leaves_types,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'reason' => 'required|string',
    ]);

    EmployeeLeaves::create($validated + ['status' => 'pending']);

    return response()->json(['message' => 'Leave request submitted successfully']);

}

public function showEmployeesLeaves(Request $request){
    $status = $request->query('status', null);
    // Fetch employee leave data with the employee name and leave type
    $employeeLeaves = EmployeeLeaves::with(['employee', 'leaveType']) // Eager load employee and leaveType
        ->when($status, function ($query) use ($status) {
            return $query->where('status', $status);
        })
        ->get();

          // Format the data to include employee name and leave type
    $formattedLeaves = $employeeLeaves->map(function ($leave) {
        return [
            'id' => $leave->id,
            'employee_name' => $leave->employee ? $leave->employee->employee_name : 'Unknown Employee', // Get employee name
            'leave_type' => $leave->leaveType ? $leave->leaveType->leave_type : 'Unknown Leave Type',
            'start_date' => $leave->start_date,
            'end_date' => $leave->end_date,
            'reason' => $leave->reason,
            'status' => $leave->status,
            'created_at' => $leave->created_at,
            'updated_at' => $leave->updated_at,
        ];
    });
      // Log the incoming request data
    \Log::info('Incoming request data:', $formattedLeaves->toArray());
    $data = [
        'page_title' => 'Applyed Employees Leaves',
        'employeesLeaves' => $formattedLeaves->toArray(),
        ];
        
    return view('admin.templates.staffManagement.all_employees',compact('data'));

}

public function updateEmployeeStatus(Request $request, $id)
{
    // Validate incoming request
    $validated = $request->validate([
        'status' => 'required|in:approved,rejected',
    ]);

    // Find the leave request by ID and update the status
    $leaveRequest = EmployeeLeaves::findOrFail($id);
    $leaveRequest->update(['status' => $validated['status']]);

    // Return a success response
    return response()->json([
        'success' => true,
        'message' => 'Leave status updated successfully.',
        'status' => $leaveRequest->status,
    ]);
}

}
