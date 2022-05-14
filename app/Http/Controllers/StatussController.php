<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatussController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuss = Status::orderBy('namastatus')->get();
        return view('backend.statuss.index', compact('statuss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.statuss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Status::create($request->all());
        return redirect()->route('statuss.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statuss = Status::findOrFail($id);

        return view('backend.statuss.show', compact('statuss'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuss = Status::findOrFail($id);
        return view('backend.statuss.edit', compact('statuss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Status::find($id)->update($request->all());
        return redirect()->route('statuss.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Status::find($id)->delete();
        return redirect()->route('statuss.index');
    }
}
