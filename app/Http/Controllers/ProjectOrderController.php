<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectOrder;
use Illuminate\Http\Request;

class ProjectOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project_orders = ProjectOrder::orderBy('id', 'desc')->get();
        return view('admin.project_orders.index', [
            'project_orders' => $project_orders
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
    public function show(ProjectOrder $projectOrder)
    {
        return view('admin.project_orders.show', [
            'project_order' => $projectOrder
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectOrder $projectOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectOrder $projectOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectOrder $projectOrder)
    {
        //
    }
}
