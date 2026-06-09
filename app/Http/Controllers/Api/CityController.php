<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\CityModel;
use Exception;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // GET ALL CITY
    public function index()
    {
        $data = CityModel::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // GET CITY BY PROVINCE ID
    public function province($province_id)
    {
        $data = CityModel::where('province_id', $province_id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(404, 'Data not found');
        }
    }

    // CREATE CITY
    public function store(Request $request)
    {
        try {

            $request->validate([
                'province_id' => 'required',
                'code' => 'required',
                'name' => 'required'
            ]);

            $city = CityModel::create([
                'province_id' => $request->province_id,
                'code' => $request->code,
                'name' => $request->name
            ]);

            $data = CityModel::find($city->id);

            return ApiFormatter::createApi(200, 'Success', $data);

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DETAIL CITY
    public function show($id)
    {
        $data = CityModel::find($id);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(404, 'Data not found');
        }
    }

    // UPDATE CITY
    public function update(Request $request, $id)
    {
        try {

            $city = CityModel::find($id);

            $city->update([
                'province_id' => $request->province_id,
                'code' => $request->code,
                'name' => $request->name
            ]);

            $data = CityModel::find($id);

            return ApiFormatter::createApi(200, 'Success Update', $data);

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DELETE CITY
    public function destroy($id)
    {
        try {

            $city = CityModel::find($id);

            $city->delete();

            return ApiFormatter::createApi(200, 'Success Delete');

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }
}