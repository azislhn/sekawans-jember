<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Education;
use App\Models\EmergencyContact;
use App\Models\PatientDetail;
use App\Models\PatientStatus;
use App\Models\Regency;
use App\Models\Religion;
use App\Models\SateliteHealthFacility;
use App\Models\Worker;

class PatientController extends Controller
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
        $patients = PatientDetail::all();
        return view('admin.patient.index', [
            'title' => 'Data Pasien',
            'patients' => $patients
        ]);
    }

    public function regency($regency)
    {
        $regency = Patient::withWhereHas('district.regency', fn ($query) => $query->where('id', $regency))->get();
        return json_encode($regency);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasyankes = collect(["RS PARU JEMBER", "RSD DR. SOEBANDI JEMBER"]);
        $satelites = SateliteHealthFacility::all();
        $workers = Worker::active()->get();
        $religions = Religion::all();
        $educations = Education::all();
        $regencies = Regency::withWhereHas('districts', fn ($query) => $query->without('regency'))->get();
        return view('admin.patient.create', compact('fasyankes', 'religions', 'regencies', 'educations', 'satelites', 'workers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {
        $request = $request->validated();
        $emergency = EmergencyContact::create($request['emergency']);
        isset($emergency) ? $patient = Patient::create($request) : '';
        isset($patient) ? $detail = PatientDetail::create($request) : '';
        $detail = PatientDetail::find($detail->id);

        return redirect()->route('admin.patients.show', $detail)->withSuccess("Data berhasil dibuat!");;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(PatientDetail $patient)
    {
        return view('admin.patient.show', ['patientDetail' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientDetail $patient)
    {
        $fasyankes = collect(["RS PARU JEMBER", "RSD DR. SOEBANDI JEMBER"]);
        $satelites = SateliteHealthFacility::all();
        $workers = Worker::active()->get();
        $statuses = PatientStatus::get();
        $religions = Religion::all();
        $educations = Education::all();
        $regencies = Regency::withWhereHas('districts', fn ($query) => $query->without('regency'))->get();
        $detail = $patient;
        return view('admin.patient.edit', compact('detail', 'fasyankes', 'satelites', 'workers', 'religions', 'regencies', 'educations', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRequest  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRequest $request, PatientDetail $patient)
    {
        $request = $request->validated();
        $patient->patient->emergency_contact->update($request['emergency']);
        $patient->patient->update($request);
        $patient->update($request);
        // $detail = PatientDetail::find($patient);

        return redirect()->route('admin.patients.show', $patient)->withSuccess("Data berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientDetail $patient)
    {
        $patient->delete();
        if (request()->ajax()) {
            return true;
        };
        return to_route('admin.patients.index');
    }
}
