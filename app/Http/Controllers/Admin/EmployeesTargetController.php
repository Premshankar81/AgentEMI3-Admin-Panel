<?php

namespace App\Http\Controllers\Admin;
use App\Models\Target;
use App\Models\Commission;
use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class EmployeesTargetController extends Controller
{
    /**
     * Display a list of targets.
     */
    public function viewEmployeeTarget()
{
    $targets = Target::with(['employee:id,employee_name'])->get();

    // Group by employee name and start date
    $groupedTargets = $targets->groupBy(function ($item) {
        return $item->employee['employee_name'] . '-' . $item->start_date;
    });

    $data = [
        'page_title' => 'Employees Targets',
        'employeesTargets' => $groupedTargets,
    ];

    return view('admin.templates.employeeTarget.employees_target', compact('data'));
}


    /**
     * Show the form for creating a new target .
     */
    public function viewEmployeeTargetForm()
    {

       // Fetch only name and employee_id for active employees
       $employees = Employees::where('status', 'active')->select('id', 'employee_name')->get();
       // Log the active employees
        // Log::info('Active Employees:', $employees->toArray());
        $data = [
            'page_title' => 'Add Employee Targets',
            'employees' => $employees,
        ];
    
        return view('admin.templates.employeeTarget.employees_target', compact('data'));
    }



    /**
     * Update a target.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'target_type' => 'sometimes|required|string',
            'target_value' => 'sometimes|required|integer',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after_or_equal:start_date',
            'status' => 'sometimes|required|in:Pending,Completed',
        ]);

        $target = Target::findOrFail($id);
        $target->update($request->all());
        return response()->json(['message' => 'Target updated successfully', 'data' => $target]);
    }



    public function addEmployeeTarget(Request $request){
         // Validate the input data
    $validated = $request->validate([
        'employee_name' => 'required|exists:employees,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'target_select' => 'required|array',
        'target_input' => 'required|array',
        'incentive_input' => 'required|array',
        'target_select.*' => 'required|string', // Ensure each target type is a string
        'target_input.*' => 'required|numeric|min:1', // Ensure target value is a number and greater than 0
    ]);

    // Log::info('Active Employees:', $validated);
    // Insert data into the 'targets' table
    foreach ($request->target_select as $index => $targetType) {
        Target::create([
            'employees_id' => $request->employee_name,  // Employee ID
            'target_type' => $targetType,               // Target Type
            'target_value' => $request->target_input[$index], // Target Value
            'incentive' => $request->incentive_input[$index],
            'start_date' => $request->start_date,       // Start Date
            'end_date' => $request->end_date,           // End Date
            'status' => 'Pending',                       // Assuming target is active
        ]);
    }
    $targets = Target::with(['employee:id,employee_name'])->get();

    // Group by employee name and start date
    $groupedTargets = $targets->groupBy(function ($item) {
        return $item->employee['employee_name'] . '-' . $item->start_date;
    });

    $data = [
        'page_title' => 'Employees Targets',
        'employeesTargets' => $groupedTargets,
    ];

    return view('admin.templates.employeeTarget.employees_target', compact('data'));
  }

  public function viewEmployeeInsentive(){
    $Insentive = Commission::with(['employee:id,employee_name'])->get();
    // Log::info('Active Employees:',  $Insentive->toArray());
    $data = [
        'page_title' => 'Employees Insentive',
        'incentives' => $Insentive
    ];

    return view('admin.templates.employeeTarget.employees_target', compact('data'));
  }

  public function getEmployeesList(){
    $employees = Employees::where('status', 'active')->select('id', 'employee_name')->get();

      return response()->json($employees); // Return as JSON
  }

  public function getCompleteTargets(Request $request){
      // Retrieve 'employee_id' and 'date' from the query string
    $employeeId = $request->input('employee_id');
    $date = $request->input('date');
      // Log the employee ID and date as an array
    Log::info('Employees Target Fetching', [
        'employee_id' => $employeeId,
        'date' => $date
    ]);
      $month = Carbon::parse($date)->month;
      $year = Carbon::parse($date)->year;
  
      // Query the database to filter the data
      $completedTargets = DB::table('targets')
          ->where('employees_id', $employeeId)
          ->where('status', 'Completed')
          ->whereMonth('start_date', $month)
          ->whereYear('start_date', $year)
          ->get();
    //   Log::info('Active Employees:',  $completedTargets->toArray());
      return $completedTargets;
  }

  public function addIncentive(Request $request)
  {
      // Log incoming data
      Log::info('Incoming Request Data:', $request->toArray());
  
      // Validate the request
      $validated = $request->validate([
          'employee_name' => 'required|exists:employees,id',
          'incentives' => 'required|array|min:1',
          'incentives.*' => 'numeric|min:0', // Ensure each incentive is a numeric value
      ]);
  
      // Calculate the total incentive amount
      $totalIncentive = array_sum($validated['incentives']);
  
      // Log the total incentive amount for debugging
      Log::info('Total Incentive:', ['total_incentive' => $totalIncentive]);
  
      // Store the data in the Commission model
      Commission::create([
          'employees_id' => $validated['employee_name'], // Store employee_name in employee_id field
          'commission_amount' => $totalIncentive,       // Store total incentive amount in commission_amount
      ]);
  
      // Redirect back with a success message
      return redirect()->back()->with('success', 'Incentive added successfully.');
  }
  
}

