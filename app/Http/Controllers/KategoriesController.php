<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\User;
use App\Kategori;
use App\Layanan;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;

class KategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategories = Kategori::with('bidang')->get();
        return view('backend.kategories.index',compact('kategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bidangs = Bidang::orderBy('namabidang')->get();
        return view('backend.kategories.create', compact('bidangs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Kategori::create($request->all());
        return redirect()->route('kategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategories = Kategori::findOrFail($id);

        return view('backend.kategories.show', compact('kategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategories = Kategori::findOrFail($id);
        $bidangs = Bidang::orderBy('namabidang')->get();
        return view('backend.kategories.edit', compact('kategories', 'bidangs'));
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
        $kategori_data = Kategori::findOrFail($id);

        Kategori::find($id)->update($request->all());
        return redirect()->route('kategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect()->route('kategories.index');
    }
}
