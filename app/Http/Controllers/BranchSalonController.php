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

        $branchSalon = BranchSalon::paginate(10);

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
        $data['picturePath'] = $request->file('picturePath')->store('assets/branch_salon', 'public');
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
    public function edit(BranchSalon $branch)
    {
        //
        return view('branch_salon.edit', [
            'branch' => $branch
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BranchSalon $branch)
    {
        //
        $data = $request->all();
        if ($request->file('picturePath')) {
            $data['picturePath'] = $request->file('picturePath')->store('assets/branch_salon', 'public');
        }
        $branch->update($data);
        return redirect()->route('branchs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchSalon $branch)
    {
        //
        $branch->delete();
        return redirect()->route('branchs.index');
    }
}
