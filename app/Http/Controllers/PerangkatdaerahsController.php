<?php

namespace App\Http\Controllers;

use App\Perangkatdaerah;
use Illuminate\Http\Request;

class PerangkatdaerahsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pds = Perangkatdaerah::orderBy('namapd')->get();
        return view('backend.pds.index', compact('pds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Perangkatdaerah::create($request->all());
        return redirect()->route('pds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pds = Perangkatdaerah::findOrFail($id);

        return view('backend.pds.show', compact('pds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pds = Perangkatdaerah::findOrFail($id);
        return view('backend.pds.edit', compact('pds'));
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
       Perangkatdaerah::find($id)->update($request->all());
        return redirect()->route('pds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Perangkatdaerah::find($id)->delete();
		return redirect()->route('pds.index');
    }
}
