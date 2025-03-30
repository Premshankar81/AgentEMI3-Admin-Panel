<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\CustomerAddress;
use App\Models\CustomerBankDetails;
use App\Models\CustomerDocument;
use App\Models\CustomerElectricDetail;
use App\Models\CustomerNominee;
use App\Models\ProfessionDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\Log;
    
class MemberController extends Controller
{

    public function index(Request $request)
    {
    
        $members = Member::where('delete_status', '0')->get();
        $data = [
            'page_title' => 'Customer List',
            'members' => $members,
            ];
            Log::info('Incoming Request Data:', $members->all());
    
        // return view('admin.templates.staffManagement.all_employees',compact('data'));
    }
    
    public function storeBasicDetails(Request $request)
    {
        try {
            // Log::info('Incoming Request Data:', $request->all());
    
            $data = $request->all();

            // Create a new member record
            $member = Member::create([
                'prefix_name' => $data['prefix_name'],
                'name' => $data['name'],
                'gender' => $data['gender'] ?? null,
                'mobile_no' => $data['mobile_no'] ?? null,
                'alternate_no' => $data['alternate_no'] ?? null,
                'email' => $data['email'] ?? null,
                'status' => $data['status']??"Pending",
                'marital_status' => $data['marital_status']??null,
                'dob' => $data['dob']??null,
                'age' => $data['age']??null,
                'enrollment_date' => $data['enrollment_date']??null,
                'agent_name' => $data['agent_name']??null,
                'latitude' => $data['latitude']??null,
                'longitude' => $data['longitude']??null,
                'relative_relation' => $data['relative_relation'] ?? null,
                'relative_name' => $data['relative_name'] ?? null,
                'mother_name' => $data['mother_name'] ?? null,
                'religion' => $data['religion'] ?? null,
                'member_cast' => $data['member_cast'] ?? null,
                'adhar_card_no' => $data['adhar_card_no'] ?? null,
                'pan_no' => $data['pan_no'] ?? null,
                'voter_id_no' => $data['voter_id_no'] ?? null,
                'ration_card_no' => $data['ration_card_no'] ?? null,
                'driving_license_no' => $data['driving_license_no'] ?? null,
                'passport_no' => $data['passport_no'] ?? null,
                
            ]);

            $member->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Member added successfully',
                'status_code' => 200,
                'data' => [
                    'member' => $member
                ],
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'status_code' => 422,
                'data' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'status_code' => 500,
                'data' => ['error' => $e->getMessage()],
            ], 500);
        }
    }

    public function update_address(Request $request)
    {
        // Log the incoming request data
        // Log::info('Incoming Request Data:', $request->all());
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
            'present_ward'             => 'required|string',
            'present_area'             => 'required|string',
            'present_state'            => 'required|string',
            'present_city'             => 'required|string',
            'present_pin_code'         => 'required|digits:6',

            'permanent_residence_type' => 'required|string',
            'permanent_address1'       => 'required|string',
            'permanent_address2'       => 'nullable|string',
            'permanent_ward'           => 'required|string',
            'permanent_area'           => 'required|string',
            'permanent_state'          => 'required|string',
            'permanent_city'           => 'required|string',
            'permanent_pin_code'       => 'required|digits:6',
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
                // Log::info('bank detail ####:', [$bankDetail]);
                DB::commit(); 
                return response()->json([
                    'success' => true,
                    'message' => 'Customer address updated successfully',
                    'status_code' => 200,
                    'data' => [
                        'address' => $address,
                    ],
                ], 200);
            } else {
                // Log::info('Address insert ####:', [$validatedData]);
                $address = CustomerAddress::create($validatedData);
                DB::commit(); 
                $bankDetail = null;
                return response()->json([
                    'success' => true,
                    'message' => 'Customer address added successfully',
                    'status_code' => 200,
                    'data' => [
                        'address' => $address,
                    
                    ],
                ], 200);
            }
           
        
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'status_code' => 422,
                'data' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'status_code' => 500,
                'data' => ['error' => $e->getMessage()],
            ], 500);
        }

    }

    public function update_bankDetail(Request $request)
    {

       // Log the incoming request data
    // Log::info('Incoming Request Data:', $request->all());

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
            $bankDetail = $bankDetail->update($validatedData);
            // Log::info('Bank details updated:', [$bankDetail]);
            DB::commit();
            $memberId = $request->member_id;
            return response()->json([
                'success' => true,
                'message' => 'Customer Bank Detail updated successfully',
                'status_code' => 200,
                'data' => [
                    'bankDetails' => $bankDetail,
                
                ],
            ], 200);
        } else {
            // Insert new record
            $bankDetail = CustomerBankDetails::create($validatedData);
            // Log::info('New bank details created:', [$bankDetail]);
            DB::commit();
            $memberId = null;
            return response()->json([
                'success' => true,
                'message' => 'Customer Bank Detail added successfully',
                'status_code' => 200,
                'data' => [
                    'bankDetails' => $bankDetail,
                
                ],
            ], 200);
        }
       

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'status_code' => 422,
                'data' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'status_code' => 500,
                'data' => ['error' => $e->getMessage()],
            ], 500);
        }

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
                // Log::info('Existing record found:', $professionDetail->toArray());
        
                // Update existing record
                $professionDetail =  $professionDetail->update($validatedData);
                // $updatedProfessionDetail = $professionDetail->refresh(); // Fetch latest data
                $memberId = $request->member_id;
                DB::commit();
                return response()->json([
                    'success' => true,
                    'message' => 'Customer Employment Detail updated successfully',
                    'status_code' => 200,
                    'data' => [
                         'professionDetail' => $professionDetail,
                    
                    ],
                ], 200);
            } else {
                // Create a new record
                $professionDetail = ProfessionDetail::create($validatedData);
                // Log::info('New Profession Detail Created:', $newProfessionDetail->toArray());
                DB::commit();
                $memberId = null;
                return response()->json([
                    'success' => true,
                    'message' => 'Customer Employment Detail added successfully',
                    'status_code' => 200,
                    'data' => [
                    'professionDetail' => $professionDetail,
                    ],
                ], 200);
            }
        
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'status_code' => 422,
                'data' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'status_code' => 500,
                'data' => ['error' => $e->getMessage()],
            ], 500);
        }
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


            try {
                DB::beginTransaction();
                // Log::info('Validated Data:', $validatedData);
            
                $electricDetail =  CustomerElectricDetail::where('member_id', $request->member_id)->first();
            
                if ($electricDetail) {
                    Log::info('Existing record found:', $electricDetail->toArray());
            
                    // Update existing record
                   $electricDetail =  $electricDetail->update($validatedData);
                   
                    // Log::info('Updated Profession Detail:', $updatedElectricDetail->toArray());
                    $memberId = $request->member_id;
                    DB::commit();
                    return response()->json([
                        'success' => true,
                        'message' => 'Customer Employment Detail updated successfully',
                        'status_code' => 200,
                        'data' => [
                            
                            'electricDetail' => $electricDetail,
                        ],
                    ], 200);
                } else {
                    // Create a new record
                    $electricDetail =  CustomerElectricDetail::create($validatedData);
                    // Log::info('New Profession Detail Created:', $newElectricDetail->toArray());
                    DB::commit();
                    $memberId = null;
                    return response()->json([
                        'success' => true,
                        'message' => 'Customer Employment Detail updated successfully',
                        'status_code' => 200,
                        'data' => [
                             'electricDetail' => $electricDetail,
                        
                        ],
                    ], 200);
                }
            

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'status_code' => 422,
                'data' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'status_code' => 500,
                'data' => ['error' => $e->getMessage()],
            ], 500);
        }
 }

 public function memberNominee_update(Request $request)
 {
     try {
         Log::info('Incoming Request Data:', $request->all());
 
         $memberId = $request->member_id;
 
         $request->validate([
             'member_id'        => 'required|integer',
             'nominee_name'     => 'required|array',
             'nominee_relation' => 'required|array',
             'nominee_address'  => 'required|array',
         ]);
 
         foreach ($request->nominee_name as $index => $name) {
            $nomineeDetail =  CustomerNominee::create([
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
 
         return response()->json([
             'success' => true,
             'message' => 'Customer Nominee Detail updated successfully',
             'status_code' => 200,
             'data' => [
                    'nomineeDetail' => $nomineeDetail,
                 ],
         ], 200);
     } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'status_code' => 422,
            'data' => $e->errors(),
        ], 422);
    } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong',
            'status_code' => 500,
            'data' => ['error' => $e->getMessage()],
        ], 500);
    }
 }
 

public function customerUploadDocuments(Request $request)
{
    try {
        // Log the incoming request data
        Log::info('Incoming Request Data:', $request->all());

        // Validate the request
        $validatedData = $request->validate([
            'member_id'        => 'required|integer',
            'aadhaar'          => 'required|file|mimes:pdf',
            'pan'              => 'required|file|mimes:pdf',
            'driving_license'  => 'nullable|file|mimes:pdf',
            'ration_card'      => 'nullable|file|mimes:pdf',
            'electricity_bill' => 'nullable|file|mimes:pdf',
            'passport_photo'   => 'nullable|file|mimes:jpg,jpeg,png',
            'signature'        => 'nullable|file|mimes:jpg,jpeg,png',
            'voter_id'         => 'nullable|file|mimes:jpg,jpeg,pdf',
            'bank_statement'   => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        // Create a new document record
        $documents = CustomerDocument::create([
            'member_id' => $request->member_id,
        ]);

        // Define file fields mapping
        $fileFields = [
            'aadhaar'          => 'aadhaar',
            'pan'              => 'pan',
            'driving_license'  => 'driving_license',
            'ration_card'      => 'ration_card',
            'electricity_bill' => 'electricity_bill',
            'passport_photo'   => 'passport_photo',
            'signature'        => 'signature',
            'voter_id'         => 'voter_id',
            'bank_statement'   => 'bank_statement',
        ];

        // Handle file uploads dynamically
        foreach ($fileFields as $inputName => $dbColumn) {
            if ($request->hasFile($inputName)) {
                $filePath = $request->file($inputName)->store('members/documents', 'public');
                Log::info(ucwords(str_replace('_', ' ', $dbColumn)) . ' document saved at: ' . $filePath);
                $documents->$dbColumn = str_replace('public/', '', $filePath);
            }
        }

        $documents->save();

        return response()->json([
            'success' => true,
            'message' => 'Customer Documents uploaded successfully',
            'status_code' => 200,
            'data' => [
                  'documents' => $documents,
                ],
        ], 200);
    } catch (ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation error',
            'status_code' => 422,
            'data' => $e->errors(),
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong',
            'status_code' => 500,
            'data' => ['error' => $e->getMessage()],
        ], 500);
    }
}



}