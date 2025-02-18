<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\Log;
    
class MemberController extends Controller
{
    public function store(Request $request)
    {
        try {
            Log::info('Incoming Request Data:', $request->all());
    
            // Get all request data (assuming it's sent as JSON)
            $data = $request->all();
    
            // Validate request including file uploads
            $validatedData = $request->validate([
                'name' => ['required', 'string'],
                'passport_document' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
                'adhar_card_document' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
                'driving_license_document' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
                'ration_card_document' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
                'electricity_bill_document' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
                'passport_photograph' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
                'signature' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
                'voter_id_document' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
                'bank_statement' => ['nullable', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
            ]);
    
            // Create a new member record
            $member = Member::create([
                'name' => $data['name'],
                'gender' => $data['gender'] ?? null,
                'mobile_no' => $data['mobile_no'] ?? null,
                'alternate_no' => $data['alternate_no'] ?? null,
                'email' => $data['email'] ?? null,
                'relative_relation' => $data['relative_relation'] ?? null,
                'mother_name' => $data['mother_name'] ?? null,
                'religion' => $data['religion'] ?? null,
                'member_cast' => $data['member_cast'] ?? null,
                'adhar_card_no' => $data['adhar_card_no'] ?? null,
                'pan_no' => $data['pan_no'] ?? null,
                'voter_id_no' => $data['voter_id_no'] ?? null,
                'ration_card_no' => $data['ration_card_no'] ?? null,
                'driving_license_no' => $data['driving_license_no'] ?? null,
                'passport_no' => $data['passport_no'] ?? null,
                'class_id' => $data['class_id'] ?? null,
            ]);
    
            // Handle file uploads correctly
            if ($request->hasFile('passport_document')) {
                $passportPath = $request->file('passport_document')->store('public/members/documents');
                // Log::info('Passport document saved at: ' . $passportPath);
                $member->passport_document = str_replace('public/', '', $passportPath);
            }

            if ($request->hasFile('adhar_card_document')) {
                $passportPath = $request->file('adhar_card_document')->store('public/members/documents');
                // Log::info('Passport document saved at: ' . $passportPath);
                $member->passport_document = str_replace('public/', '', $passportPath);
            }
             
            if ($request->hasFile('driving_license_document')) {
                $passportPath = $request->file('driving_license_document')->store('public/members/documents');
                // Log::info('Passport document saved at: ' . $passportPath);
                $member->passport_document = str_replace('public/', '', $passportPath);
            }
            
            if ($request->hasFile('ration_card_document')) {
                $passportPath = $request->file('ration_card_document')->store('public/members/documents');
                // Log::info('Passport document saved at: ' . $passportPath);
                $member->passport_document = str_replace('public/', '', $passportPath);
            }
            
            if ($request->hasFile('electricity_bill_document')) {
                $passportPath = $request->file('electricity_bill_document')->store('public/members/documents');
                // Log::info('Passport document saved at: ' . $passportPath);
                $member->passport_document = str_replace('public/', '', $passportPath);
            }
           
            if ($request->hasFile('passport_photograph')) {
                $passportPath = $request->file('passport_photograph')->store('public/members/documents');
                // Log::info('Passport document saved at: ' . $passportPath);
                $member->passport_document = str_replace('public/', '', $passportPath);
            }
    
            if ($request->hasFile('signature')) {
                $passportPath = $request->file('signature')->store('public/members/documents');
                // Log::info('Passport document saved at: ' . $passportPath);
                $member->passport_document = str_replace('public/', '', $passportPath);
            }
            if ($request->hasFile('voter_id_document')) {
                $passportPath = $request->file('voter_id_document')->store('public/members/documents');
                // Log::info('Passport document saved at: ' . $passportPath);
                $member->passport_document = str_replace('public/', '', $passportPath);
            }
            if ($request->hasFile('bank_statement')) {
                $passportPath = $request->file('bank_statement')->store('public/members/documents');
                // Log::info('Passport document saved at: ' . $passportPath);
                $member->passport_document = str_replace('public/', '', $passportPath);
            }
    
    
            $member->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Member added successfully',
                'status_code' => 201,
                'data' => [
                    'member' => $member,
                    'passport_document_url' => $member->passport_document ? asset('storage/' . $member->passport_document) : null,
                ],
            ], 201);
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
    
    
}
