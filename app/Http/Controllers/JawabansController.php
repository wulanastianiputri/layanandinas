<?php

namespace App\Http\Controllers;

use App\Layanan;
use App\User;
use App\Jawaban;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;

class JawabansController extends Controller
{
        
    public function store(Request $request, Layanan $layanans)
    {
        Jawaban::create([
            
            'permintaanlayanan_id' => $layanans->id,
            'user_id'              =>auth()->id(),
            'jawaban'              => $request->jawaban,
            //'foto_jawaban'         => $request->foto_jawaban
        ]);
        
        return redirect()->back()->with('message', 'Jawaban berhasil disimpan');
    } 


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$jawabans = Jawaban::findOrFail($id);
		$layanans = Layanan::orderBy('judul')->get();
        return view('backend.jawabans.show', compact('jawabans','layanans'));		
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
		$jawaban_data = Jawaban::findOrFail($id);
		if($request->file('foto'))
        {
            $file = $request->file('foto');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('foto')->move("images/jawaban",$fileName);
            $jawaban_data->foto = $fileName;
        }

		Jawaban::find($id)->update(array_merge($request->all(),['foto' => $jawaban_data->foto]));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function destroy($id)
    {
        Jawaban::find($id)->delete();
		return redirect()->back()->with('message', 'Jawaban berhasil dihapus');
    }
}
