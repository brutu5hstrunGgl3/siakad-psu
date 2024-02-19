<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Http\Resources\ScheduleResource;
//use App\Http\Controller\UserController;
use App\Models\StudentSchedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{


    public function index(Request $request)
    {
        $user = $request->user();
        $schedules = StudentSchedule::where('student_id', '=', $user->id)->get();
        return ScheduleResource::collection($schedules->load('schedule', 'schedule.subject', 'schedule.subject.lecturer', 'student'));
    }
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $user = $request->user();
    //     $schedules = Schedule::where('student_id', '=', $user->id)->get();
    //  //return ScheduleResource::collection($schedules->load('schedule', 'schedule.subject', 'schedule.subject.lecturer', 'student'));
    //  return ScheduleResource::collection($schedules->load('subject', 'subject.lecturer','student')); 
    //  // return ScheduleResource::collection($schedules->load('subject'));
    // }

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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
