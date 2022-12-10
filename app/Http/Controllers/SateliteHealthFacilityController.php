<?php

namespace App\Http\Controllers;

use App\Models\SateliteHealthFacility;
use App\Http\Requests\StoreSateliteHealthFacilityRequest;
use App\Http\Requests\UpdateSateliteHealthFacilityRequest;
use App\Models\Worker;
use Illuminate\Http\Request;

class SateliteHealthFacilityController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasyankes = collect(["RS PARU JEMBER", "RSD DR. SOEBANDI JEMBER"]);
        $satelites = SateliteHealthFacility::orderBy('name', 'asc')->get();
        $workers = Worker::orderBy('name', 'asc')->get();
        return view('admin.fasyankes.index', compact('fasyankes', 'satelites', 'workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreSateliteHealthFacilityRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreSateliteHealthFacilityRequest $request)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SateliteHealthFacility  $sateliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(SateliteHealthFacility $sateliteHealthFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSateliteHealthFacilityRequest  $request
     * @param  \App\Models\SateliteHealthFacility  $sateliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSateliteHealthFacilityRequest $request, SateliteHealthFacility $sateliteHealthFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SateliteHealthFacility  $sateliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy($table, $id)
    {
        match ($table) {
            'satelite'  => SateliteHealthFacility::find($id)->delete(),
            'workers'   => Worker::find($id)->delete()
        };
        return to_route('admin.fasyankes.index')->withSuccess("Data Terhapus!");
    }
}
