<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseMaster;

class CourseMasterController extends Controller
{
    // This method will return all Course Name
    public function index(){
		$courseList = CourseMaster::orderBy('name','ASC')->get();
		return response()->json([
			'status' => true,
			'data' => $courseList
		]);
    }
}
