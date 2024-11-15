<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Course;
use App\Models\CourseDetail as CourseDetail;
// use App\Modles\CourseDetail;

class CourseController extends Controller
{
    
    // This method will return all Course Name
    public function index(){
		$courseData = Course::orderBy('name','ASC')->get();
		// return response()->json([
		// 	'status' => true,
		// 	'data' => $courseList
		// ]);
        return view('admin.courses.courseList',compact('courseData'));
    }

    //Course index page
    public function addCourse(){
        return view('admin.courses.index');
    }

    // Save Course
    public function saveCourse(Request $request){
        $validator = Validator::make($request->all(), [
    		'courseName' => 'required',
    	]);

    	if($validator->fails()){
    		return response()->json([
    			'status' => false,
    			'message' => 'Please fix the errors',
    			'errors' => $validator->errors()
    		]);
    	}

        $courseData = new Course();
    	$courseData->name = $request->courseName;
    	$courseData->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Course added successfully',
        //     'data' => $courseData
        // ]);
        return view('admin.courses.index',compact('courseData'));
    }

    // Edit Course Admin 
    public function editCourse(Request $request){
        $courseData = Course::where('id', $request->id)->first();
        // dd($courseData);
        return view('admin.courses.courseEdit',compact('courseData'));
    }

    public function updateCourse(Request $request) {
        $request->validate([
            'courseName' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
    
        $course = Course::find($request->id);
        $course->name = $request->courseName;
        $course->isActive = $request->status; // Assuming 1 for active, 0 for inactive
        $course->save();
    
        return redirect()->route('admin.courseList')->with('success', 'Course updated successfully!');
    }

    public function deleteCourse(Request $request){
        $courseData = Course::where('id', $request->id)->first();
        $courseData->delete();
           
        return redirect()->route('admin.courseList')
                        ->with('success','Course deleted successfully');
    }

    public function addCourseModule(){
        $courseList = Course::where('isActive', 1)
        ->orderBy('name', 'ASC')
        ->pluck('name', 'id');
        // dd($courseList);
        return view('admin.courses.addCourseModule',compact('courseList'));
    }

    public function saveCourseModule(Request $request){
        $validator = Validator::make($request->all(), [
    		'courseId' => 'required',
            'courseTitle' => 'required',
            'courseDesc' => 'required'
    	]);

    	if($validator->fails()){
    		return response()->json([
    			'status' => false,
    			'message' => 'Please fix the errors',
    			'errors' => $validator->errors()
    		]);
    	}

        $courseData = new CourseDetail();
    	$courseData->course_id = $request->courseId;
    	$courseData->courseTitle = $request->courseTitle;
    	$courseData->courseDesc = $request->courseDesc;
    	$courseData->save();
     
        return view('admin.courses.index',compact('courseData'));
    }

    //Course Module Listing
    public function courseModuleList(){
        $courseList = Course::where('isActive', 1)
        ->orderBy('name', 'ASC')
        ->pluck('name', 'id');
        $courseModuleLists = CourseDetail::orderBy('created_at', 'DESC')->get();
        // dd($courseModuleLists);
        $courseLists = Course::where('isActive', 1)->pluck('name', 'id')->toArray();
        return view('admin.courses.courseModuleList',compact('courseModuleLists','courseLists'));
    }

    public function editCourseModule(Request $request){
        $courseLists = Course::where('isActive', 1)->pluck('name', 'id')->toArray();
        $courseModule = CourseDetail::where('id', $request->id)->first();
        return view('admin.courses.courseModuleEdit',compact('courseModule','courseLists'));
    }


    public function updateCourseModule(Request $request){
        $validator = Validator::make($request->all(), [
    		'courseId' => 'required',
            'courseTitle' => 'required',
            'courseDesc' => 'required'
    	]);
    
        $courseData = CourseDetail::find($request->id);
        $courseData->course_id = $request->courseId;
    	$courseData->courseTitle = $request->courseTitle;
    	$courseData->courseDesc = $request->courseDesc;
        $courseData->save();
    
        return redirect()->route('admin.courseModuleList')->with('success', 'Course Module updated successfully!');
    }

    // Course Listing
    public function courseList(){
        $courseData = Course::orderBy('created_at', 'DESC')->get();

        // if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'data' => $courseData
            ]);
        // }

        // return view('admin.courses.courseList', compact('courses'));
    }
}
