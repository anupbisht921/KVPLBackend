<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }

    public function enquiryList(Request $request){
        $enquiryData = Enquiry::orderBy('created_at', 'DESC')->get();
        $courseLists = Course::where('isActive', 1)->pluck('name', 'id')->toArray();
        // dd($courseLists);
        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'data' => $enquiryData
            ]);
        }

        return view('admin.enquiry.enquiryList', compact('enquiryData','courseLists'));
    }
}
