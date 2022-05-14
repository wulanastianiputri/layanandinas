<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Perangkatdaerah;
use App\Level;
use Carbon\Carbon;
use App\pd;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::with('pd','level')->get();
        return view('backend.users.index', compact('users'));  
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pds = Perangkatdaerah::orderBy('namapd')->get();	
        $levels = Level::orderBy('namalevel')->get();
        return view('backend.users.create', compact('pds','levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
   

    // }
 
     public function store(Request $request)
    {
				
		if($request->file('foto_user') == ''){
            $foto = NULL;
        } else
        {
            $file = $request->file('foto_user');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('foto_user')->move("images/user",$fileName);
            $foto_user = $fileName;

            $this->validate($request, [
                'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2000',
                'keterangan' => 'required',
            ]);

        }
        
		User::create(array_merge($request->all(),[
            'foto_user' => $foto_user,

            'password' => Hash::make($request->password_confirmation)
            ]));
        return redirect()->route('users.index')->with('message', 'Data berhasil disimpan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $users = User::findOrFail($id);

        return view('backend.users.show', compact('users'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$users = User::findOrFail($id);
		$pds = Perangkatdaerah::orderBy('namapd')->get();
		$levels = Level::orderBy('namalevel')->get();
        return view('backend.users.edit', compact('users','pds','levels'));		
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
		$user_data = User::findOrFail($id);
		if($request->file('foto_user'))
        {
            $file = $request->file('foto_user');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('foto_user')->move("images/user",$fileName);
            $user_data->foto_user = $fileName;
        }

		User::find($id)->update(array_merge($request->all(),['foto_user' => $user_data->foto_user,'password' => Hash::make($request->password_confirmation)]));
        return redirect()->route('users.index')->with('message', 'Data berhasil diedit');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
		return redirect()->route('users.index')->with('message', 'Data berhasil dihapus');
    } 

    
}