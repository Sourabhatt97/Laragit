<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\task;

class testcontroller extends Controller
{
	public function index()
	{
		$data = Task::all();
		return view('meetingdata',compact("data"));
	}

	public function employeedata(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'emp_name' => 'required',
			'date' => 'required',
			'time' => 'required',
			'meeting_hours' => 'required',
			'purpose_of_meeting' => 'required',
			'projector' => 'required',
			'audience_strength' => 'required',
		]);

		if($validator->fails())
		{
			return \Redirect::back()->with("message","Please fill all the details properly");
		}

		$obj = new task;

		$obj->name = $request->emp_name;
		$obj->date = $request->date;
		$obj->time = $request->time;
		$obj->meeting_hours = $request->meeting_hours;
		$obj->purpose_of_meeting = $request->purpose_of_meeting;
		$obj->projector = $request->projector;
		$obj->audience_strength = $request->audience_strength;
		
		if($obj->save())
		{
			return \Redirect::back()->with("message","Data Stored Successfully");	
		}
	}
}

