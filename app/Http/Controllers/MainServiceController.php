<?php

namespace App\Http\Controllers;

use App\Models\MainServices;
use Illuminate\Http\Request;

class MainServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mainServices = MainServices::paginate(10);
        return view('services.index', [
            'services' => $mainServices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        MainServices::create($data);

        return redirect()->route('services.index');
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
    public function edit(MainServices $service)
    {
        //
        return view('services.edit', [
            'services' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainServices $service)
    {
        //
        $data = $request->all();
        $service->update($data);
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainServices $service)
    {
        //
        $service->delete();
        return redirect()->route('services.index');
    }
}
