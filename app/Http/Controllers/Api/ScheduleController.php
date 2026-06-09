<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\ScheduleModel;
use Exception;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // GET ALL
    public function index()
    {
        $data = ScheduleModel::all();

        return ApiFormatter::createApi(200, 'Success', $data);
    }

    // GET BY DOCTOR
    public function doctor($doctor_id)
    {
        $data = ScheduleModel::where('doctor_id', $doctor_id)->get();

        return ApiFormatter::createApi(200, 'Success', $data);
    }

    // CREATE
    public function store(Request $request)
    {
        try {

            $request->validate([
                'doctor_id' => 'required',
                'day' => 'required',
                'start_time' => 'required',
                'end_time' => 'required'
            ]);

            $schedule = ScheduleModel::create([
                'doctor_id' => $request->doctor_id,
                'day' => $request->day,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time
            ]);

            return ApiFormatter::createApi(
                200,
                'Success',
                ScheduleModel::find($schedule->id)
            );

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DETAIL
    public function show($id)
    {
        $data = ScheduleModel::find($id);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        }

        return ApiFormatter::createApi(404, 'Data Not Found');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        try {

            $schedule = ScheduleModel::find($id);

            $schedule->update([
                'doctor_id' => $request->doctor_id,
                'day' => $request->day,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time
            ]);

            return ApiFormatter::createApi(
                200,
                'Success Update',
                ScheduleModel::find($id)
            );

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DELETE
    public function destroy($id)
    {
        try {

            $schedule = ScheduleModel::find($id);

            $schedule->delete();

            return ApiFormatter::createApi(
                200,
                'Success Delete'
            );

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }
}