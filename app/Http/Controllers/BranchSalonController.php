<?php

namespace App\Http\Controllers;

use App\Models\BranchSalon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BranchSalonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $branchSalon = BranchSalon::paginate(10);
        // $branches = BranchSalon::all();

        // foreach ($branches as $branch) {
        //     // Mengubah waktu ke zona WIB
        //     $branch->opening_time = Carbon::createFromFormat('H:i:s', $branch->opening_time, 'UTC')->setTimezone('Asia/Jakarta');
        //     $branch->closing_time = Carbon::createFromFormat('H:i:s', $branch->closing_time, 'UTC')->setTimezone('Asia/Jakarta');
        // }

        return view('branch_salon.index', [
            'branch' => $branchSalon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('branch_salon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        BranchSalon::create($data);

        return redirect()->route('branchs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
