<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Perangkatdaerah;
use App\Level;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    
    public function index()
    {
        $users = User::with('pd','level')->latest()->paginate(2000);
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
    
 
     public function store(Request $request)
    {
				
		if($request->file('foto_user') == ''){
            $foto = NULL;
        } else
        {
            $file = $request->file('foto');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('foto')->move("images/layanan",$fileName);
            $foto = $fileName;
        }

		User::create(array_merge($request->all(),['foto' => $foto]));
        return redirect()->route('layanans.index')->with('message', 'Data berhasil disimpan');
        
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
            $user_data->foto = $fileName;
        }

		User::find($id)->update(array_merge($request->all(),['foto_user' => $user_data->foto_user]));
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
