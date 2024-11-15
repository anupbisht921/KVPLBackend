<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseDetail;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseList = Course::orderBy('name','ASC')->get();
		return response()->json([
			'status' => true,
			'data' => $courseList
		]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve course detail by ID
        $courseDetail = CourseDetail::find($id);
        // Check if courseDetail exists
        if ($courseDetail) {
            return response()->json([
                'status' => true,
                'data' => $courseDetail
            ]);
        } else {
            return response()->json([
                'status' => false, // it's better to indicate failure with false status
                'message' => 'No Data Found'
            ]);
        }
        
    }

    /**
     * Display the courses by Id
     */
    public function getCourseById(Request $request)
    {
        // echo "test";die;
        $courseDetail = Course::where($request->id);
        // dd($courseDetail);
        print_r($courseDetail);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
