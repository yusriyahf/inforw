<?php

namespace App\Http\Controllers;

use App\Models\RwModel;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Rw',
            'list' => ['Pages', 'Rw']
        ];

        $data = RwModel::all();

        return view('pengurus.rw.index', [
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
    public function show(RwModel $rwModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RwModel $rwModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RwModel $rwModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RwModel $rwModel)
    {
        //
    }
}
