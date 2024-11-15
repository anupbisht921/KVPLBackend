<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Enquiry;
use App\Models\Contact;

class HomeController extends Controller
{

    // This method will return all Enquiry Name
    public function index(Request $request){
        $enquiryData = Enquiry::orderBy('created_at', 'DESC')->get();

        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'data' => $enquiryData
            ]);
        }

        return view('admin.enquiry.enquiryList', compact('courses'));
    }

    // Save Enquiry
    public function saveEnquiry(Request $request){
        $validator = Validator::make($request->all(), [
    		'name' => 'required',
    		'email' => 'required',
    		'course_mode' => 'required',
            'course_id' => 'required'
    	]);

    	if($validator->fails()){
    		return response()->json([
    			'status' => false,
    			'message' => 'Please fix the errors',
    			'errors' => $validator->errors()
    		]);
    	}

        $enquiryData = new Enquiry();
    	$enquiryData->name = $request->name;
    	$enquiryData->email = $request->email;
    	$enquiryData->course_mode = $request->course_mode;
        $enquiryData->course_id = $request->course_id;
    	$enquiryData->save();
        return response()->json([
            'status' => true,
            'message' => 'Enquiry sent successfully',
            'data' => $enquiryData
        ]);
    }

    // Save Contacts
    public function saveContactDetails(Request $request){
        $validator = Validator::make($request->all(), [
    		'name' => 'required',
    		'email' => 'required',
            'message' => 'required'
    	]);

    	if($validator->fails()){
    		return response()->json([
    			'status' => false,
    			'message' => 'Please fix the errors',
    			'errors' => $validator->errors()
    		]);
    	}

        $contactData = new Contact();
    	$contactData->name = $request->name;
    	$contactData->email = $request->email;
    	$contactData->subject = $request->subject;
        $contactData->message = $request->message;
    	$contactData->save();
        return response()->json([
            'status' => true,
            'message' => 'Enquiry sent successfully',
            'data' => $contactData
        ]);
    }
}
