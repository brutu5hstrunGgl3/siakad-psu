<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //Index
    public function index()
    {
        $schedules = Schedule::paginate(10);
        return view('pages.schedules.index', compact('schedules'));
    }

    //function untuk generate Qrcode input
    public function generateQrcode(Schedule $schedule)
    {
        return view('pages.schedules.input-qrcode')->with('schedule', $schedule);
    }

    //function untuk generate qrcode dan update 

    public function generateQrCodeUpdate(Request $request, Schedule $schedule)
    {
        // dd($schedule);
        $request->validate([
            'code'=>'required',
        ]);

       $schedule->update([
          'kode_absensi' => $request->code,

       ]);

       $code = $request->code;

       return view('pages.schedules.show-qrcode', compact('code'))->with('success', 'Code updated successfuly');
        
    }
}
