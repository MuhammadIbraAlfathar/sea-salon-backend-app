<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\BranchSalon;
use Exception;
use Illuminate\Http\Request;

class BranchSalonController extends Controller
{
    //create branch
    public function createBranch(Request $request)
    {
        try {
            $request->validate(
                [
                    'branch_name' => 'string|required',
                    'branch_address' => 'string|required',
                ]
            );


            $dataBranch = BranchSalon::create([
                'branch_name' => $request->branch_name,
                'branch_address' => $request->branch_address,
                'services' => $request->services,
                'opening_time' => $request->opening_time,
                'closing_time' => $request->closing_time
            ]);


            return ResponseFormatter::success(
                [
                    "branch_data" => $dataBranch
                ],
                'Success Create Branch'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    "message" => "Something went wrong",
                    "error" => $error
                ],
                "Create Branch Failed",
                500
            );
        }
    }

    //get all data branch
    public function getAll()
    {
        $data = BranchSalon::all();

        return ResponseFormatter::success(
            [
                "branch_salon" => $data
            ],
            'Success get data review'
        );
    }
}
