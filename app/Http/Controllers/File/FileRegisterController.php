<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('file.index');
    }

    public function all()
    {
        return view('file.all');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'file_name' => 'required|string',
            'received_from' => 'required|string',
            'receive_date' => 'required|date',
        ]);

        File::create([
            'file_name' => strtoupper($request->file_name),
            'received_from' => strtoupper($request->received_from),
            'receive_date' => date($request->receive_date),
            'remarks' => $request->remarks
        ]);

        return redirect()->route('file.index')->with('status', 'Record added successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);
        return view('file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $validated = $request->validate([
            'returned_to' => 'required|string',
            'return_date' => 'required|date',
            'remarks' => 'required|string',
        ]);

        $file->update($validated);
        return redirect()->route('file.index')->with('status', 'Record updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return false;
    }
}
