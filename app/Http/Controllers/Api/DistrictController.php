<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\DistrictModel;
use Exception;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    // GET ALL DISTRICT
    public function index()
    {
        $data = DistrictModel::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // GET DISTRICT BY CITY ID
    public function city($city_id)
    {
        $data = DistrictModel::where('city_id', $city_id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(404, 'Data not found');
        }
    }

    // CREATE DISTRICT
    public function store(Request $request)
    {
        try {

            $request->validate([
                'city_id' => 'required',
                'code' => 'required',
                'name' => 'required'
            ]);

            $district = DistrictModel::create([
                'city_id' => $request->city_id,
                'code' => $request->code,
                'name' => $request->name
            ]);

            $data = DistrictModel::find($district->id);

            return ApiFormatter::createApi(200, 'Success', $data);

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DETAIL DISTRICT
    public function show($id)
    {
        $data = DistrictModel::find($id);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(404, 'Data not found');
        }
    }

    // UPDATE DISTRICT
    public function update(Request $request, $id)
    {
        try {

            $district = DistrictModel::find($id);

            $district->update([
                'city_id' => $request->city_id,
                'code' => $request->code,
                'name' => $request->name
            ]);

            $data = DistrictModel::find($id);

            return ApiFormatter::createApi(200, 'Success Update', $data);

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }

    // DELETE DISTRICT
    public function destroy($id)
    {
        try {

            $district = DistrictModel::find($id);

            $district->delete();

            return ApiFormatter::createApi(200, 'Success Delete');

        } catch (Exception $error) {

            return ApiFormatter::createApi(400, $error->getMessage());

        }
    }
}