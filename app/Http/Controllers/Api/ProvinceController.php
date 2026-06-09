<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\ProvinceModel;
use Exception;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    // GET ALL DATA
    public function index()
    {
        $data = ProvinceModel::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    // CREATE DATA
    public function store(Request $request)
    {
        try {

            $request->validate([
                'code' => 'required',
                'name' => 'required'
            ]);

            $province = ProvinceModel::create([
                'code' => $request->code,
                'name' => $request->name
            ]);

            $data = ProvinceModel::find($province->id);

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, $error);
        }
    }

    // DETAIL DATA
    public function show($id)
    {
        $data = ProvinceModel::find($id);

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(404, 'Data not found');
        }
    }

    // UPDATE ALL DATA
    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'code' => 'required',
                'name' => 'required'
            ]);

            $province = ProvinceModel::find($id);

            $province->update([
                'code' => $request->code,
                'name' => $request->name
            ]);

            $data = ProvinceModel::find($id);

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Update', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, $error);
        }
    }

    // UPDATE SEBAGIAN DATA
    public function patch(Request $request, $id)
    {
        try {

            $province = ProvinceModel::find($id);

            $province->update($request->all());

            $data = ProvinceModel::find($id);

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Patch', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, $error);
        }
    }

    // DELETE DATA
    public function destroy($id)
    {
        try {

            $province = ProvinceModel::find($id);

            $province->delete();

            return ApiFormatter::createApi(200, 'Success Delete');

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, $error);
        }
    }
}