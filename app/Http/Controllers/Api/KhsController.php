<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\KhsResource;
use App\Http\Controllers\Controller;
use App\Models\Khs;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

       // $allKhs = Khs::paginate(30);
        //return $allKhs;
        //get user
        $user = $request->user();
        $khs = Khs::where('student_id', '=', $user->id)->get()->load('subject');
        // get khs dari userid paginate 10 data
    //    $khs = Khs::where('student_id', '=', $user->id)
    //    ->orderBy('id', 'desc')
    //    ->paginate(10);
       // $allKhs = Khs::paginate(10);
       return KhsResource::collection($khs);
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
