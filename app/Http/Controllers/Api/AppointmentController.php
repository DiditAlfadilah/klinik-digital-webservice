<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\AppointmentModel;
use Exception;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // GET ALL
    public function index()
    {
        $data = AppointmentModel::all();

        return ApiFormatter::createApi(200, 'Success', $data);
    }

    // GET BY PATIENT
    public function patient($patient_id)
    {
        $data = AppointmentModel::where('patient_id', $patient_id)->get();

        return ApiFormatter::createApi(200, 'Success', $data);
    }

    // CREATE
    public function store(Request $request)
    {
        try {

            $request->validate([
                'patient_id' => 'required',
                'doctor_id' => 'required',
                'schedule_id' => 'required',
                'appointment_date' => 'required'
            ]);

            $appointment = AppointmentModel::create([
                'patient_id' => $request->patient_id,
                'doctor_id' => $request->doctor_id,
                'schedule_id' => $request->schedule_id,
                'appointment_date' => $request->appointment_date,
                'status' => $request->status ?? 'pending'
            ]);

            return ApiFormatter::createApi(
                200,
                'Success',
                AppointmentModel::find($appointment->id)
            );

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DETAIL
    public function show($id)
    {
        $data = AppointmentModel::find($id);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        }

        return ApiFormatter::createApi(404, 'Data Not Found');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        try {

            $appointment = AppointmentModel::find($id);

            $appointment->update([
                'patient_id' => $request->patient_id,
                'doctor_id' => $request->doctor_id,
                'schedule_id' => $request->schedule_id,
                'appointment_date' => $request->appointment_date,
                'status' => $request->status
            ]);

            return ApiFormatter::createApi(
                200,
                'Success Update',
                AppointmentModel::find($id)
            );

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DELETE
    public function destroy($id)
    {
        try {

            $appointment = AppointmentModel::find($id);

            $appointment->delete();

            return ApiFormatter::createApi(
                200,
                'Success Delete'
            );

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }
}