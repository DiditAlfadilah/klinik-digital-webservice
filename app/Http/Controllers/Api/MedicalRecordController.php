<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\MedicalRecordModel;
use Exception;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    // GET ALL
    public function index()
    {
        $data = MedicalRecordModel::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        }

        return ApiFormatter::createApi(400, 'Failed');
    }

    // GET BY PATIENT
    public function patient($id)
    {
        $data = MedicalRecordModel::where('patient_id', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        }

        return ApiFormatter::createApi(400, 'Failed');
    }

    // CREATE
    public function store(Request $request)
    {
        try {

            $request->validate([
                'patient_id' => 'required',
                'doctor_id' => 'required',
                'appointment_id' => 'required',
                'complaint' => 'required',
                'diagnosis' => 'required',
                'treatment' => 'required'
            ]);

            $medicalRecord = MedicalRecordModel::create([
                'patient_id' => $request->patient_id,
                'doctor_id' => $request->doctor_id,
                'appointment_id' => $request->appointment_id,
                'complaint' => $request->complaint,
                'diagnosis' => $request->diagnosis,
                'treatment' => $request->treatment
            ]);

            $data = MedicalRecordModel::find($medicalRecord->id);

            return ApiFormatter::createApi(200, 'Success', $data);

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DETAIL
    public function show($id)
    {
        $data = MedicalRecordModel::find($id);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        }

        return ApiFormatter::createApi(404, 'Data Not Found');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'patient_id' => 'required',
                'doctor_id' => 'required',
                'appointment_id' => 'required',
                'complaint' => 'required',
                'diagnosis' => 'required',
                'treatment' => 'required'
            ]);

            $medicalRecord = MedicalRecordModel::find($id);

            $medicalRecord->update([
                'patient_id' => $request->patient_id,
                'doctor_id' => $request->doctor_id,
                'appointment_id' => $request->appointment_id,
                'complaint' => $request->complaint,
                'diagnosis' => $request->diagnosis,
                'treatment' => $request->treatment
            ]);

            $data = MedicalRecordModel::find($id);

            return ApiFormatter::createApi(200, 'Success Update', $data);

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DELETE
    public function destroy($id)
    {
        try {

            $medicalRecord = MedicalRecordModel::find($id);

            $medicalRecord->delete();

            return ApiFormatter::createApi(200, 'Success Delete');

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }
}