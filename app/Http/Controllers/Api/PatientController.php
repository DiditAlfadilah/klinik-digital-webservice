<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\PatientModel;
use Exception;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // GET ALL PATIENT
    public function index()
    {
        $data = PatientModel::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // CREATE PATIENT
    public function store(Request $request)
    {
        try {

            $request->validate([
                'nik' => 'required|unique:patients,nik',
                'name' => 'required',
                'gender' => 'required',
                'birth_date' => 'required',
            ]);

            $patient = PatientModel::create([
                'nik' => $request->nik,
                'name' => $request->name,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            $data = PatientModel::find($patient->id);

            return ApiFormatter::createApi(200, 'Success', $data);

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DETAIL PATIENT
    public function show($id)
    {
        $data = PatientModel::find($id);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(404, 'Data not found');
        }
    }

    // UPDATE PATIENT
    public function update(Request $request, $id)
    {
        try {

            $patient = PatientModel::find($id);

            $patient->update([
                'nik' => $request->nik,
                'name' => $request->name,
                'gender' => $request->gender,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);

            $data = PatientModel::find($id);

            return ApiFormatter::createApi(200, 'Success Update', $data);

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DELETE PATIENT
    public function destroy($id)
    {
        try {

            $patient = PatientModel::find($id);

            $patient->delete();

            return ApiFormatter::createApi(200, 'Success Delete');

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }
}