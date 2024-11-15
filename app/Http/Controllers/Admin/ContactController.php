<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // This method will return all blogs
    public function index(Request $request){
		

        $contactList = Contact::orderBy('created_at', 'DESC')->get();

        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'data' => $contactList
            ]);
        }

        return view('admin.contact.contactList', compact('contactList'));
    }

    // This method will store a blog
    public function store(Request $request){
    	$validator = Validator::make($request->all(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'subject' => 'required',
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
    			'message' => 'Blog added successfully',
    			'data' => $contactData
    		]);
    }
}
