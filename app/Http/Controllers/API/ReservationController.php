<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    //create reservation
    public function createReservation(Request $request)
    {

        DB::beginTransaction();

        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'branch_id' => 'required|exists:branch_salons,id',
                'user_name' => 'required|string',
                'phone_number' => 'required|string',
                'services' => 'required|string',
                'date' => 'required',
                'time_start' => 'required',
                'time_end' => 'required'
            ]);



            //validate time for reservation
            $start_time = strtotime($request->time_start);
            $end_time = strtotime($request->time_end);

            $diff = ($end_time - $start_time) / 3600;

            if ($diff > 1) {
                return ResponseFormatter::error(
                    [
                        "message" => "Reservation time should not exceed one hour",
                    ],
                    "Create Reservation Failed",
                    400
                );
            }

            $reservation = Reservation::create([
                'user_id' => $request->user_id,
                'branch_id' => $request->branch_id,
                'branch_name' => $request->branch_name,
                'user_name' => $request->user_name,
                'phone_number' => $request->phone_number,
                'services' => $request->services,
                'date' => $request->date,
                'time_start' => $request->time_start,
                'time_end' => $request->time_end,
            ]);

            DB::commit();
            return ResponseFormatter::success(
                [
                    "data" => $reservation,
                ],
                'Success Create Reservation'
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
