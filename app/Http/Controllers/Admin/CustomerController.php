<?php
namespace App\Http\Controllers\Admin;

use App\Exports\CustomerExport;
use App\Http\Controllers\Controller;
use App\Models\CustomerAddress;
use App\Models\CustomerBankDetails;
use App\Models\CustomerDocument;
use App\Models\State;
use App\Models\CustomerElectricDetail;
use App\Models\CustomerNominee;
use App\Models\Employees;
use App\Models\ProfessionDetail;
use App\Models\Member;
use App\Models\TransationHistory;
use App\Models\User;
use Auth;
use Excel;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function index()
    {

        $members = Member::where('delete_status', '0')->where('status', 'Pending')->get();

        $data = [
            'page_title' => 'Customer',
            'members'    => $members,
        ];
        // Log::info('Incoming Request Data:', $members->all());

        return view('admin.templates.customer.customer', compact('data'));
    }

    public function customerList()
    {

        $members = Member::where('delete_status', '0')->where('status', 'Approved') ->with('employee')->get();
      
        $data = [
            'page_title' => 'Customer',
            'members'    => $members,
        ];
        // Log::info('Incoming Request Data:', $members->all());

        return view('admin.templates.customer.customer', compact('data'));
    }

    public function viewCustomerDetails($id)
    {

        $basicDetails    = Member::where('id', $id)->where('delete_status', '0')->first();
        $address         = CustomerAddress::where('member_id', $id)->first();
        $bankDetails     = CustomerBankDetails::where('member_id', $id)->first();
        $electricDetails = CustomerElectricDetail::where('member_id', $id)->first();
        $documents       = CustomerDocument::where('member_id', $id)->first();
        $nominee         = CustomerNominee::where('member_id', $id)->first();
        // Log::info('Incoming Request Data ####:', ['data' => $documents->toArray()]);
        $data = [
            'page_title'     => 'Customer Details',
            'basicDetails'   => $basicDetails,
            'address'        => $address,
            'bankDetails'    => $bankDetails,
            'electicDetails' => $electricDetails,
            'documents'      => $documents,
            'nominee'        => $nominee,
        ];

        return view('admin.templates.customer.customer', compact('data'));
    }

    public function create()
    {
        $data['page_title'] = 'Add Customer';
        $NewCustomerCode    = Helper::get_Customer_number();
        $Classes            = Helper::getClass();
        $Ledgers            = Helper::get_ledgers();
        $banks              = Helper::getBank();
        // Fetch only name and employee_id for active employees
        $employees = Employees::where('status', 'active')->select('id', 'employee_name')->get();
        return view('admin.templates.customer.customer', compact('data', 'NewCustomerCode', 'Classes', 'Ledgers', 'banks', "employees"));
    }

    public function store_record(Request $request)
    {
        // // Log the incoming request data
        Log::info('Incoming Request Data 59303:', $request->all());

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name'                        => 'required|string|max:255',
            'gender'                      => 'required|string|max:10',
            'mobile_no'                   => 'required|string|max:15',
            'alternate_no'                => 'nullable|string|max:15',
            'email'                       => 'nullable|email|max:50',
            'dob'                         => 'required|date',
            'age'                         => 'nullable|integer',
            'enrollment_date'             => 'required|date',
            'relative_relation'           => 'nullable|string|max:255',
            'relative_name'               => 'nullable|string|max:255',
            'agent_id'                    => 'nullable|string|max:255',
            'mother_Name'                 => 'nullable|string|max:255',
            'religion'                    => 'nullable|string|max:255',
            'member_cast'                 => 'nullable|string|max:255',
            'adhar_card_no'               => 'required|string|max:20',
            'pan'                         => 'required|string|max:10',
            'voter_id_no'                 => 'nullable|string|max:20',
            'ration_card_no'              => 'nullable|string|max:20',
            'driving_license_no'          => 'nullable|string|max:20',
            'passport_no'                 => 'nullable|string|max:20',
            'class'                       => 'nullable|string',
            'member_ship_payment_mode'    => 'nullable|string',
            'member_ship_fees_amount'     => 'nullable|string',
            'allocate_share_payment_mode' => 'nullable|string',
            'allocate_share_no_of_share'  => 'nullable|string',
            'latitude'                    => 'nullable|string',
            'longitude'                   => 'nullable|string',
            'allocate_share_payment_mode' => 'nullable|string|max:50',
            'member_ship_payment_mode'    => 'nullable|string|max:50',
        ]);
        // Get validated data
        $validated = $validator->validated();

        try {
            if ($request->member_id != "") {
                DB::beginTransaction();
                $memberId = $request->member_id;
                $member   = Member::findOrFail($request->member_id);
                $member->update($validated);
                $address = CustomerAddress::where('member_id', $memberId)->first();
                // Log::info('Member Updated:', [$member]);
                // Log::info('Address:', [$address]);
                DB::commit();
            } else {

                if ($validator->fails()) {
                    Log::error('Validation Failed:', $validator->errors()->toArray());
                    return back()->withErrors($validator)->withInput();
                }

                DB::beginTransaction();
                $member   = Member::create($validated);
                $memberId = $member->id; // Get the newly created member ID
                DB::commit();
                $address = null;
            }
             $states = State::all();

            return view('admin.templates.customer.customer', compact('memberId', 'address','states'));

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error Inserting Member:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to insert data.'])->withInput();
        }

    }

    public function store_address(Request $request)
    {
        // Log the incoming request data
        Log::info('Incoming Request Data:', $request->all());

        // Validate input data
        $validatedData = $request->validate([
            'member_id'                => 'required',
            'residense_type'           => 'required|string',
            'stability'                => 'nullable|string',
            'present_residence_type'   => 'required|string',
            'present_address1'         => 'required|string|max:100',
            'present_address2'         => 'nullable|string|max:100',
            'present_ward'             => 'nullable|string|max:100',
            'present_area'             => 'nullable|string|max:100',
            'present_state'            => 'required|string|max:100',
            'present_city'             => 'required|string|max:100',
            'present_pin_code'         => 'nullable|string|max:6',
            'permanent_residence_type' => 'nullable|string',
            'permanent_address1'       => 'nullable|string|max:100',
            'permanent_address2'       => 'nullable|string|max:100',
            'permanent_ward'           => 'nullable|string|max:100',
            'permanent_area'           => 'nullable|string|max:100',
            'permanent_state'          => 'nullable|string|max:100',
            'permanent_city'           => 'nullable|string|max:100',
            'permanent_pin_code'       => 'nullable|string|max:6',
        ]);

        try {
            DB::beginTransaction();
            $address = CustomerAddress::where('id', $request->address_id)->first();
            Log::info('Address ####:', [$address]);
            if ($address) {
                Log::info('Address update ####:', [$address]);
                $address->update($validatedData);
            } else {
                Log::info('Address insert ####:', [$address]);
                // CustomerAddress::create($validatedData);
            }
            DB::commit();

            return view('admin.templates.customer.customer', ['memberId' => $request->member_id]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error Inserting/Updating Member Address:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to insert/update data.'])->withInput();
        }
    }

    public function list()
    {
        $rows = Helper::get_active_customer();
        //$rows = User::where('delete_status','0')->orderBy('id', 'DESC')->get();
        $html            = view('admin.templates.customer.records', compact('rows'))->render();
        $NewCustomerCode = Helper::get_Customer_number();
        return response()->json(['html' => $html, 'code' => $NewCustomerCode, 'status' => 1, 'msg' => 'Successfully Inserted']);
    }

    public function get_row(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'Customer';
        return view('admin.templates.customer.customer', compact('data', 'row'));
    }

    public function editBasicDetails($id)
    {

        $member   = Member::where('id', $id)->first();
        $memberId = $id;
        $data     = [
            'page_title' => 'Customer Basic Details',
        ];
        Log::info('Incoming Request Data *** :', $member->toArray());
        // Fetch only name and employee_id for active employees
        $Classes            = Helper::getClass();
        $employees = Employees::where('status', 'active')->select('id', 'employee_name')->get();

        return view('admin.templates.customer.customer', compact('data', 'member', 'employees', 'memberId','Classes'));

    }
    public function update_row(Request $oRequest)
    {
        $addResult = User::where('customer_id', $oRequest->update_id)->update([
            'joining_date'       => $oRequest->joining_date,
            'prifix_name'        => $oRequest->prifix_name,
            'name'               => $oRequest->name,
            'gender'             => $oRequest->gender,
            'dob'                => $oRequest->dob,
            'age'                => $oRequest->age,
            'marital_status'     => $oRequest->marital_status,
            'mobile'             => $oRequest->mobile,
            'alternate_mobile'   => $oRequest->alternate_mobile,
            'email'              => $oRequest->email,
            'relative_relation'  => $oRequest->relative_relation,
            'mother_Name'        => $oRequest->mother_Name,
            'religion'           => $oRequest->religion,
            'member_cast'        => $oRequest->member_cast,
            'rating'             => $oRequest->rating,
            'agent_id'           => $oRequest->agent_id,
            'latitude'           => $oRequest->latitude,
            'longitude'          => $oRequest->longitude,
            'aadharcard_no'      => $oRequest->aadharcard_no,
            'pan'                => $oRequest->pan,
            'voter_id_no'        => $oRequest->voter_id_no,
            'ration_card_no'     => $oRequest->ration_card_no,
            'driving_license_no' => $oRequest->driving_license_no,
            'passport_no'        => $oRequest->passport_no,

            'class_id'           => $oRequest->class_id,

        ]);
        if ($addResult) {
            return response()->json(['status' => 1, 'msg' => 'Record successfully updated']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Error']);
        }
    }

    public function export()
    {
        $file_name = 'Customer' . rand() . '.xlsx';
        return Excel::download(new CustomerExport, $file_name);
    }

    public function delete_row(Request $oRequest)
    {
        //
        $Result = User::where('id', $oRequest->update_id)->update([
            'delete_status' => '1',
        ]);
        if ($Result) {
            return response()->json(['status' => 1, 'msg' => 'Record successfully updated']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Error']);
        }
    }

    /* Start :: Address Get & update */

    public function address_row($id)
    {
        $address = CustomerAddress::where('member_id', $id)->first();
        Log::info('Incoming Request Data:', [$address]);
       $memberId = $address->member_id;
        return view('admin.templates.customer.customer', compact('address','memberId'));
       
    }
    public function update_address(Request $request)
    {
        // Log the incoming request data
        Log::info('Incoming Request Data:', $request->all());
        // Validate input data
        $memberId  = $request->member_id;
        $addressId  = $request->address_id;
        $validator = Validator::make($request->all(), [
            'member_id'                => 'required|integer',
            'address_id'               => 'nullable|integer',
            'residense_type'           => 'required|string',
            'stability'                => 'required|integer',
            'present_residence_type'   => 'required|string',
            'present_address1'         => 'required|string',
            'present_address2'         => 'nullable|string',
            'present_ward'             => 'nullable|string',
            'present_area'             => 'required|string',
            'present_state'            => 'required|string',
            'present_city'             => 'required|string',
            'present_pin_code'         => 'required|digits:6',

            'permanent_residence_type' => 'nullable|string',
            'permanent_address1'       => 'nullable|string',
            'permanent_address2'       => 'nullable|string',
            'permanent_ward'           => 'nullable|string',
            'permanent_area'           => 'nullable|string',
            'permanent_state'          => 'nullable|string',
            'permanent_city'           => 'nullable|string',
            'permanent_pin_code'       => 'nullable|digits:6',
        ]);

        DB::beginTransaction();

        try {
            // Ensure $validator is actually validating data correctly
            if ($validator->fails()) {
                Log::error('Validation Failed:', ['errors' => $validator->errors()]);
                return response()->json(['error' => 'Validation failed', 'details' => $validator->errors()], 422);
            }

            $validatedData = $validator->validated(); // Extract validated data

            $address = CustomerAddress::where('id', $request->address_id)->first();
            // Log::info('Address ####:', [$address]);

            if ($address) {
                $address->update($validatedData);
                $bankDetail = CustomerBankDetails::where('member_id', $memberId)->first();
                Log::info('bank detail ####:', [$bankDetail]);
            } else {
                Log::info('Address insert ####:', [$validatedData]);
                CustomerAddress::create($validatedData);
                $bankDetail = null;
            }
           
            DB::commit();
            // $customerAddress = CustomerAddress::create($request->all());
        return view('admin.templates.customer.customer', compact('memberId','addressId',"bankDetail"));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating/inserting address:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }

      

    }

    /* End :: Address Get & update */

    /* Start :: BankDetails Get & update */

    public function bankDetail_row(Request $request)
    {
        $memberId = $request->id;
        // Find the existing record based on `member_id`
        $bankDetail = CustomerBankDetails::where('member_id', $request->id)->first();
        $data['page_title'] = 'Bank Details';
        return view('admin.templates.customer.customer', compact('data', 'bankDetail',"memberId"));
    }
    public function update_bankDetail(Request $request)
    {

       // Log the incoming request data
    Log::info('Incoming Request Data:', $request->all());

    // Validate the request
    $validatedData = $request->validate([
        'member_id'    => 'required|exists:members,id',
        'ifsc_code'    => 'required|string|max:40',
        'bank_name'    => 'required|string|max:40',
        'bank_address' => 'required|string|max:250',
        'account_type' => 'required|in:saving,current',
        'account_no'   => 'required|string|max:20|unique:customer_bank_details,account_no,' . $request->member_id . ',member_id',
    ]);

    try {
        DB::beginTransaction();
        $bankDetail = CustomerBankDetails::where('member_id', $request->member_id)->first();
        
        if ($bankDetail) {
            $bankDetail->update($validatedData);
            // Log::info('Bank details updated:', [$bankDetail]);
            $memberId = $request->member_id;
        } else {
            // Insert new record
            $bankDetail = CustomerBankDetails::create($validatedData);
            // Log::info('New bank details created:', [$bankDetail]);
            $memberId = null;
        }
         DB::commit();
         $states = State::all();
         $professionDetail = ProfessionDetail::where('member_id', $request->member_id)->first();
        //  Log::info('State List:', [$states]);
            return view('admin.templates.customer.customer', compact('memberId','states','professionDetail'));

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error Inserting Member:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to insert data.'])->withInput();
        }

    }

    /* End :: BankDetails Get & update */

    /* Start :: professionDetail Get & update */

    public function professionDetail_row(Request $request)
    {
       $professionDetail = ProfessionDetail::where('member_id',$request->id )->first();
       $memberId = $request->id;
        $data['page_title'] = 'Profession Detail';
        $states  =  $states = State::all();

        return view('admin.templates.customer.customer', compact('data', 'professionDetail', 'states','memberId'));
    }

    public function professionDetail_update(Request $request)
    {
        Log::info('professionDetail:', $request->toArray());
         // Validate the request
    $validatedData = $request->validate([
            'member_id'    => 'required|exists:members,id',
            'occupation' => 'required|string|max:30',
            'employment_type' => 'required|string|max:50',
            'business_name' => 'nullable|string|max:50',
            'address1' => 'nullable|string|max:100',
            'address2' => 'nullable|string|max:100',
            'state' => 'required|string|max:100',
            'district' => 'nullable|string|max:100',
            'pin_code' => 'nullable|numeric|digits:6',
            'employer_contact' => 'nullable|numeric|digits:10',
            'employer_email' => 'nullable|email|max:50',
            'monthly_income' => 'nullable|numeric|min:0',
    ]);
        try {
            DB::beginTransaction();

            Log::info('Validated Data:', $validatedData);
        
            $professionDetail = ProfessionDetail::where('member_id', $request->member_id)->first();
        
            if ($professionDetail) {
                Log::info('Existing record found:', $professionDetail->toArray());
        
                // Update existing record
                $professionDetail->update($validatedData);
                $updatedProfessionDetail = $professionDetail->refresh(); // Fetch latest data
        
                Log::info('Updated Profession Detail:', $updatedProfessionDetail->toArray());
                $memberId = $request->member_id;
            } else {
                // Create a new record
                $newProfessionDetail = ProfessionDetail::create($validatedData);
                Log::info('New Profession Detail Created:', $newProfessionDetail->toArray());
        
                $memberId = null;
            }
            DB::commit();
            $electric = CustomerElectricDetail::where('member_id', $request->member_id)->first();
          
            return view('admin.templates.customer.customer', compact("memberId","electric"));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while saving profession details.');
        }
    }
    /* End :: professionDetail Get & update */

    /* Start :: electricBillDetail Get & update */

    public function electricBillDetail_row(Request $request)
    {
        $electricDetail =  CustomerElectricDetail::where('member_id', $request->member_id)->first();
        $memberId =  $request->member_id;
        $data['page_title'] = 'Electric Bill Detail';
        return view('admin.templates.customer.customer', compact('data', 'electricDetail','memberId'));
    }

    public function electricBillDetail_update(Request $request)
    {
        $validatedData =   $request->validate([
            'member_id'               => 'required|exists:members,id',
            'electric_meterno'        => 'required|string|max:30',
            'electric_consumer_id'    => 'required|string|max:30',
            'electric_owner_name'     => 'required|string|max:30',
            'electric_relation'       => 'nullable|string|max:20',
            'electric_last_bill_date' => 'required|date',
        ]);

        // try {
        //     DB::beginTransaction();
        //     CustomerElectricDetail::create($request->all());
        //     DB::commit();
        //     $memberId = $request->member_id;

            try {
                DB::beginTransaction();
    
                Log::info('Validated Data:', $validatedData);
            
                $electricDetail =  CustomerElectricDetail::where('member_id', $request->member_id)->first();
            
                if ($electricDetail) {
                    Log::info('Existing record found:', $electricDetail->toArray());
            
                    // Update existing record
                    $electricDetail->update($validatedData);
                    $updatedElectricDetail = $electricDetail->refresh(); // Fetch latest data
            
                    Log::info('Updated Profession Detail:', $updatedElectricDetail->toArray());
                    $memberId = $request->member_id;
                } else {
                    // Create a new record
                    $newElectricDetail =  CustomerElectricDetail::create($validatedData);
                    Log::info('New Profession Detail Created:', $newElectricDetail->toArray());
            
                    $memberId = null;
                }
                DB::commit();
                $states = State::all();
                $nomineeDetail =  CustomerNominee::where('member_id', $request->member_id)->get();
            Log::info('Member Created:', [ $nomineeDetail]);
            return view('admin.templates.customer.customer', compact('memberId','nomineeDetail','states'));

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error Inserting Member electic bill:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Failed to insert data.'])->withInput();
        }

    }

    /* end :: electricBillDetail Get & update */

    /* Start :: memberNominee Get & update */
    public function memberNominee_row(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'Member Nominee';
        return view('admin.templates.customer.customer', compact('data', 'row'));
    }

    public function memberNominee_update(Request $request)
    {
        Log::info('Incoming Request Data:', $request->all());
        $memberId = $request->member_id;
        $request->validate([
            'member_id'        => 'required|integer',
            'nominee_name'     => 'required|array',
            'nominee_relation' => 'required|array',
            'nominee_address'  => 'required|array',
        ]);

        foreach ($request->nominee_name as $index => $name) {
            CustomerNominee::create([
                'member_id'           => $request->member_id,
                'nominee_name'        => $name,
                'nominee_relation'    => $request->nominee_relation[$index],
                'nominee_dob'         => $request->nominee_dob[$index] ?? null,
                'nominee_age'         => $request->nominee_age[$index] ?? null,
                'nominee_mobile'      => $request->nominee_mobile[$index] ?? null,
                'nominee_address'     => $request->nominee_address[$index],
                'nominee_aadhar_no'   => $request->nominee_aadhar_no[$index] ?? null,
                'nominee_pan'         => $request->nominee_pan[$index] ?? null,
                'nominee_voter_id'    => $request->nominee_voter_id[$index] ?? null,
                'nominee_ration_card' => $request->nominee_ration_card[$index] ?? null,
            ]);
        }

        // try {
        //     DB::beginTransaction();
        //     CustomerElectricDetail::create($request->all());
        //     DB::commit();
        //     // Log::info('Member Created:', [$member]);
        //     return view('admin.templates.customer.customer', compact('memberId'));

        // } catch (\Exception $e) {
        //     DB::rollback();
        //     Log::error('Error Inserting Member electic bill:', ['error' => $e->getMessage()]);
        //     return back()->withErrors(['error' => 'Failed to insert data.'])->withInput();
        // }

        return view('admin.templates.customer.customer', compact('memberId'));

    }

    public function customerUploadDocuments(Request $request)
    {
        // Log the incoming request data
        Log::info('Incoming Request Data:', $request->all());
        // Get all request data (assuming it's sent as JSON)
        $data          = $request->all();
        $validatedData = $request->validate([
            'member_id'        => 'required|integer',
            'aadhaar'          => 'requied|file|mimes:pdf',
            'pan'              => 'required|file|mimes:pdf',
            'driving_license'  => 'nullable|file|mimes:pdf',
            'ration_card'      => 'nullable|file|mimes:pdf',
            'electricity_bill' => 'nullable|file|mimes:pdf',
            'passport_photo'   => 'nullable|file|mimes:jpg,jpeg,png',
            'signature'        => 'nullable|file|mimes:jpg,jpeg,png',
            'voter_id'         => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'bank_statement'   => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // Create a new member record
        $documents = CustomerDocument::create([
            'member_id' => $data['member_id'],

        ]);

        // Handle file uploads correctly
        if ($request->hasFile('aadhaarInput')) {
            $passportPath = $request->file('aadhaarInput')->store('public/members/documents');
            Log::info('Passport document saved at: ' . $passportPath);
            $documents->aadhaar = str_replace('public/', '', $passportPath);
        }

        // Handle file uploads correctly
        if ($request->hasFile('panInput')) {
            $passportPath = $request->file('panInput')->store('public/members/documents');
            Log::info('Passport document saved at: ' . $passportPath);
            $documents->pan = str_replace('public/', '', $passportPath);
        }

        // Handle file uploads correctly
        if ($request->hasFile('drivingLicenseInput')) {
            $passportPath = $request->file('drivingLicenseInput')->store('public/members/documents');
            Log::info('Passport document saved at: ' . $passportPath);
            $documents->driving_license = str_replace('public/', '', $passportPath);
        }

        // Handle file uploads correctly
        if ($request->hasFile('rationCardInput')) {
            $passportPath = $request->file('rationCardInput')->store('public/members/documents');
            Log::info('Passport document saved at: ' . $passportPath);
            $documents->ration_card = str_replace('public/', '', $passportPath);
        }

        // Handle file uploads correctly
        if ($request->hasFile('electricityBillInput')) {
            $passportPath = $request->file('electricityBillInput')->store('public/members/documents');
            Log::info('Passport document saved at: ' . $passportPath);
            $documents->electricity_bill = str_replace('public/', '', $passportPath);
        }

        // Handle file uploads correctly
        if ($request->hasFile('passportPhotographInput')) {
            $passportPath = $request->file('passportPhotographInput')->store('public/members/documents');
            Log::info('Passport document saved at: ' . $passportPath);
            $documents->passport_photo = str_replace('public/', '', $passportPath);
        }

        // Handle file uploads correctly
        if ($request->hasFile('signatureInput')) {
            $passportPath = $request->file('signatureInput')->store('public/members/documents');
            Log::info('Passport document saved at: ' . $passportPath);
            $documents->signature = str_replace('public/', '', $passportPath);
        }

        // Handle file uploads correctly
        if ($request->hasFile('voterIdInput')) {
            $passportPath = $request->file('voterIdInput')->store('public/members/documents');
            Log::info('Passport document saved at: ' . $passportPath);
            $documents->voter_id = str_replace('public/', '', $passportPath);
        }

        // Handle file uploads correctly
        if ($request->hasFile('bankStatementInput')) {
            $passportPath = $request->file('bankStatementInput')->store('public/members/documents');
            Log::info('Passport document saved at: ' . $passportPath);
            $documents->bank_statement = str_replace('public/', '', $passportPath);
        }

        $documents->save();

        $members = Member::where('delete_status', '0')->where('status', 'Pending')->get();

        $data = [
            'page_title' => 'Customer',
            'members'    => $members,
        ];
        Log::info('Incoming Request Data:', $members->all());

        return view('admin.templates.customer.customer', compact('data'));

    }

    //update customer status
    public function updateCustomerStatus(Request $request, $id)
    {
        // Validate incoming request
        Log::info('Incoming Customer Id:', $request->toArray());
        $validated = $request->validate([
            'status' => 'required|in:Approved,Rejected',
        ]);
        // Find the member by ID
        $member = Member::findOrFail($id);
        Log::info('Incoming Customer Id:', $member->toArray());
        // Update the status
        $member->update(['status' => $validated['status']]);

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Member status updated successfully.',
            'status'  => $member->status,
        ]);
    }

    /* End :: memberNominee Get & update */

    /* Start :: KYCManage Get & update */
    public function KYCManage_row(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'KYC Manage';
        return view('admin.templates.customer.customer', compact('data', 'row'));
    }

    public function KYCManage_update(Request $oRequest)
    {
        if ($oRequest->file('kyc_passport') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_passport, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_passport' => $file_name,
            ]);
        }
        if ($oRequest->file('kyc_aadhaar_card_front') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_aadhaar_card_front, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_aadhaar_card_front' => $file_name,
            ]);
        }
        if ($oRequest->file('kyc_aadhaar_card_back') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_aadhaar_card_back, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_aadhaar_card_back' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_pan') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_pan, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_pan' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_voter_card') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_voter_card, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_voter_card' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_driving_license') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_driving_license, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_driving_license' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_ration_card') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_ration_card, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_ration_card' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_passport') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_passport, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_passport' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_aadhaar_card_front') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_aadhaar_card_front, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_aadhaar_card_front' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_aadhaar_card_back') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_aadhaar_card_back, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_aadhaar_card_back' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_kyc_voter_card') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_kyc_voter_card, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_kyc_voter_card' => $file_name,
            ]);
        }
        if ($oRequest->file('kyc_address_driving_license') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_driving_license, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_driving_license' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_ration_card') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_ration_card, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_ration_card' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_telephone_bill') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_telephone_bill, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_telephone_bill' => $file_name,
            ]);
        }
        if ($oRequest->file('kyc_address_bank_statement') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_bank_statement, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_bank_statement' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_electricity_bill') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_electricity_bill, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_electricity_bill' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_lpg_gas') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_lpg_gas, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_lpg_gas' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_trade_license') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_trade_license, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_trade_license' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_address_other_government_id') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_address_other_government_id, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_address_other_government_id' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_passport_photograph') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_passport_photograph, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_passport_photograph' => $file_name,
            ]);
        }

        if ($oRequest->file('kyc_signature') != '') {
            $img_path  = public_path() . config('constants.KYC_DOC');
            $file_name = Helper::UploadMedia($oRequest->kyc_signature, $img_path);
            $addResult = User::where('customer_id', $oRequest->update_id)->update([
                'kyc_signature' => $file_name,
            ]);
        }

        return response()->json(['status' => 1, 'msg' => 'Record successfully updated']);
    }
    /* End :: KYCManage Get & update */

    /* Start :: welcomeLetter Get & update */

    public function welcomeLetter_row(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'Welcome Letter';
        return view('admin.templates.customer.customer', compact('data', 'row'));
    }

    public function welcomeLetter_print_row(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'Welcome Letter';
        return view('admin.templates.customer.print_welcomeLetter', compact('data', 'row'));
    }

    /* End :: welcomeLetter Get & update */

    /* Start ::  applicationForm Get & update */
    public function applicationForm_row(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'Application Form';
        return view('admin.templates.customer.customer', compact('data', 'row'));
    }
    /* End ::  applicationForm Get & update */

    /* Start :: ApplicationForm Get & update */
    public function applicationForm_print_row(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'Application Form';
        return view('admin.templates.customer.print_applicationForm', compact('data', 'row'));
    }

    /* End :: ApplicationForm Get & update */

    /* Start ::  MemberShipFeeManage Get & update */

    public function MemberShipFeeDetail(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'Member Fee';
        $Transations        = Helper::get_MemberShipFeeTransation($row->id);
        return view('admin.templates.customer.customer', compact('data', 'row', 'Transations'));
    }

    public function MemberShipFeeManage_row(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'Member Fee';
        $Ledgers            = Helper::get_ledgers();
        $banks              = Helper::getBank();
        return view('admin.templates.customer.customer', compact('data', 'row', 'Ledgers', 'banks'));
    }
    public function delete_MemberShipFee_row(Request $oRequest)
    {
        //
        $Result = TransationHistory::where('id', $oRequest->update_id)->update([
            'delete_status' => '1',
        ]);
        if ($Result) {
            return response()->json(['status' => 1, 'msg' => 'Record successfully updated']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Error']);
        }
    }

    public function MemberShipFeeManage_add(Request $oRequest)
    {

        $TranDetails['type']                   = 'deposit'; //deport,widthow,recurring
        $TranDetails['transation_type']        = 'debit';   //credit,debit
        $TranDetails['user_type']              = Auth::guard('admin')->user()->user_type;
        $TranDetails['user_id']                = Auth::guard('admin')->user()->id;
        $TranDetails['customer_id']            = @$oRequest->customer_id;
        $TranDetails['account_id']             = @$oRequest->customer_id;
        $TranDetails['amount']                 = @$oRequest->amount;
        $TranDetails['transation_date']        = @$oRequest->transation_date;
        $TranDetails['remarks']                = 'Membership Fees Details';
        $TranDetails['payment_mode']           = @$oRequest->payment_mode;
        $TranDetails['bank_id']                = @$oRequest->bank_id;
        $TranDetails['cheque_no']              = @$oRequest->cheque_no;
        $TranDetails['reference_no']           = @$oRequest->reference_no;
        $TranDetails['cheque_date']            = @$oRequest->cheque_date;
        $TranDetails['bank_account_ledger_id'] = @$oRequest->bank_account_ledger_id;
        $TranDetails['status']                 = 'completed';
        $TranDetails['tran_page_type']         = 'MemberShipFee';
        $addResult                             = Helper::TransationDetails($TranDetails);
        if ($addResult) {
            return response()->json(['status' => 1, 'msg' => 'Record successfully Inserted']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Error']);
        }
    }

    public function ShareCertificateDetails(Request $oRequest)
    {
        $row                = User::where('customer_id', $oRequest->id)->first();
        $data['page_title'] = 'Share Certificate Details';
        $AllocatedShares    = Helper::GetAllocateShareCertificatesByMember($row->id);
        return view('admin.templates.customer.customer', compact('data', 'row', 'AllocatedShares'));
    }

    /* End ::  MemberShipFeeManage Get & update */

}
