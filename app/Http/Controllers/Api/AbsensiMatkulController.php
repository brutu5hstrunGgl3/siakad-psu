<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AbsensiMatkul;
use Illuminate\Http\Request;

class AbsensiMatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $absensiMatkul = AbsensiMatkul::where('student_id', '=', $user->id)

            ->orderBy('id', 'desc')
            ->paginate(10);

        return $absensiMatkul;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        


        $request->validate([
            'schedule_id' => 'required',
            'kode_absensi' => 'required',
            'tahun_akademik' => 'required',
            'semester' => 'required',
            'latitude' => 'required',
             'longitude' => 'required',

        ]);


        //save user id 

        $user = $request->user();
        $request->merge([
            'student_id' => $user->id,
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ]);

        $absensiMatkul = AbsensiMatkul::create($request->all());
        return $absensiMatkul;
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
        $absensiMatkul = AbsensiMatkul ::findOrFail($id);
        $user = $request->user();
        $request->merge([
            'updated_by' => $user_id,
        ]);
        $absensiMatkul->update($request->all());
        return $absensiMatkul; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
