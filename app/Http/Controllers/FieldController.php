<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFieldRequest;
class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = Field::latest()->get();
        return view('admin.fields.index', ['fields' => $fields]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $json = file_get_contents(resource_path('json/icons.json'));
        $data = json_decode($json, true);
        $icons = $data['icons'] ?? [];
        $colors = $data['colors'] ?? [];
        return view('admin.fields.create', ['icons' => $icons, 'colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFieldRequest $request)
    {
        //return $request->all();
        Field::create($request->validated());
        return redirect()->route('fields.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Field $field)
    {
        return view('admin.fields.edit', ['field' => $field]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Field $field)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Field $field)
    {
        //
    }
}
