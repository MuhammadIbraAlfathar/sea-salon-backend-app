<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\MainServices;
use Exception;
use Illuminate\Http\Request;

class MainServiceController extends Controller
{
    //create new service
    public function createService(Request $request)
    {
        try {
            $request->validate([
                'services_name' => 'required|string',
                'duration' => 'required',
            ]);


            $dataService = MainServices::create([
                'services_name' => $request->services_name,
                'duration' => $request->duration,
                'description' => $request->description,
            ]);

            return ResponseFormatter::success(
                [
                    "data" => $dataService
                ],
                'Success Create Service'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    "message" => "Something went wrong",
                    "error" => $error
                ],
                "Create Review Failed",
                500
            );
        }
    }


    public function getAll()
    {

        try {
            $data = MainServices::all();
            return ResponseFormatter::success(
                [
                    "data" => $data
                ],
                'Success Create Service'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    "message" => "Something went wrong",
                    "error" => $error
                ],
                "Create Review Failed",
                500
            );
        }
    }
}
