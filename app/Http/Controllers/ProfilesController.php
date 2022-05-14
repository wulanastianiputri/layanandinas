<?php

namespace App\Http\Controllers;

use App\Level;
use App\Perangkatdaerah;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    

    /**
     * Show the update profile page.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Request $request)
    {
        return view('backend.profiles.edit', [
            'user' => $request->user()
        ]);
    }
    public function update(Request $request)
    {
        // $this -> validate($request,[
        //     'email' => 'required|max:40|email',
        //     'alamat' => 'required|max:120',
        //     'telp' => 'required|max:15|numeric',
        //     'website' => 'required|max:50',
        //     'kontak' => 'required|max:30',
        //     'hp' => 'required|max:15|numeric',
        //     'foto_user' => 'image|mimes:jpg,png,svg,gif,jpeg|max:2048'
        // ]);
        $request->user()->pd->update(
            $request->all()
        );
        $request->user()->update(
            $request->all()
        );
      

        return redirect()->route('profil.index')->with('message', 'Data berhasil diedit');
        // return redirect()->back();
    }
}