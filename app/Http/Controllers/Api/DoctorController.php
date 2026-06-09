<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\DoctorModel;
use Exception;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // GET ALL
    public function index()
    {
        $data = DoctorModel::all();

        return ApiFormatter::createApi(200, 'Success', $data);
    }

    // CREATE
    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required',
                'specialist' => 'required'
            ]);

            $doctor = DoctorModel::create([
                'name' => $request->name,
                'specialist' => $request->specialist,
                'phone' => $request->phone,
                'email' => $request->email
            ]);

            return ApiFormatter::createApi(
                200,
                'Success',
                DoctorModel::find($doctor->id)
            );

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DETAIL
    public function show($id)
    {
        $data = DoctorModel::find($id);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        }

        return ApiFormatter::createApi(404, 'Data Not Found');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        try {

            $doctor = DoctorModel::find($id);

            $doctor->update([
                'name' => $request->name,
                'specialist' => $request->specialist,
                'phone' => $request->phone,
                'email' => $request->email
            ]);

            return ApiFormatter::createApi(
                200,
                'Success Update',
                DoctorModel::find($id)
            );

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DELETE
    public function destroy($id)
    {
        try {

            $doctor = DoctorModel::find($id);

            $doctor->delete();

            return ApiFormatter::createApi(
                200,
                'Success Delete'
            );

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }
}