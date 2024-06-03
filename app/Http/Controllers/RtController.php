<?php

namespace App\Http\Controllers;

use App\Models\RtModel;
use Illuminate\Http\Request;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Rt',
            'list' => ['Pages', 'Rt']
        ];

        $data = RtModel::all();

        return view('pengurus.rt.index', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RtModel $rtModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RtModel $rtModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RtModel $rtModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RtModel $rtModel)
    {
        //
    }
}
