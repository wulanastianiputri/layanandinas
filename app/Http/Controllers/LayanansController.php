<?php

namespace App\Http\Controllers;

use App\Perangkatdaerah;
use App\Kategori;
use App\User;
use App\Status;
use App\Layanan;
use App\Jawaban;
use App\pd;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class LayanansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pd_id=Auth::user()->pd_id!=11&&Auth::user()->level_id==1;
        // if(Auth::user()->level_id == 2){
        //     $layanans = Layanan::with('pd','kategori')->where('pd_id',$pd_id)->orderBy('id', 'desc')->get();
        // }
        
        if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
            $layanans = Layanan::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
            $layanans = Layanan::with('pd','kategori','status')->whereIn('status_id',[1,2,3,5,6]) ->orderBy('id', 'desc')->get();    
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
            $layanans = Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [1,3])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get(); 
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
            $layanans = Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [4,7])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
            $layanans = Layanan::with('pd','kategori','status')->where('kategori_id', [8])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
            $layanans = Layanan::with('pd','kategori','status')->whereBetween('kategori_id', [9,12])
            ->where(function ($query) {
                $query->whereIn('status_id',[2,4,7,8]);
            })->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
            $layanans = Layanan::with('pd','kategori','status')->orderBy('id', 'desc')->get();
        } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
            $layanans = Layanan::with('pd','kategori','status')->orderBy('id', 'desc')->get();  
        }
        return view('backend.layanans.index', compact('layanans'));
    }
    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pds = 	Pd::orderBy('namapd')->get();
        $kategories = Kategori::orderBy('namakategori')->get();
        $statuss = Status::orderBy('namastatus')->get();
        //$users = Status::orderBy('name')->get();
        //return view('backend.layanans.create', compact('pds','kategories','statuss','users'));
        return view('backend.layanans.create', compact('pds','kategories','statuss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function search(Request $request)
    // {
    //     //$pds = Perangkatdaerah::orderBy('namapd')->get();		
    //     //$kategories = Kategori::orderBy('namakategori')->get();
    //     //$statuss = Status::orderBy('namastatus')->get();
    //     $search=$request->get('search');

    //     $layanans = Layanan::with('pd','kategori')->where('pd_id','like','%'.$search.'%')->paginate(10);
    //     //var_dump($layanans);
    //     //$layanans= jawaban::with('layanan')->where('layanan_id','=','$id');
    //     //var_dump($layanans);        //$layanans= Layanan::with('pd','kategori')->where('id','like','%'.$search.'%')->orwhere( 'pd_id','like','%'.$search.'%')->orwhere( 'kategori_id','like','%'.$search.'%')->orwhere('status_id','like','%'.$search.'%')->orwhere('judul','like','%'.$search.'%')->orwhere('isi','like','%'.$search.'%')->paginate(2);
    //     //$layanans= Layanan::with('pd','kategori')->where('id','like','%'.$search.'%')->orwhere( $pds,'like','%'.$search.'%')->orwhere( $kategories,'like','%'.$search.'%')->orwhere($statuss,'like','%'.$search.'%')->orwhere('judul','like','%'.$search.'%')->orwhere('isi','like','%'.$search.'%')->paginate(2);
       
    //     return view('backend.layanans.index', compact('layanans'));
    // }
 
     public function store(Request $request)
    {

        $this -> validate($request,[
            'judul' => 'required|max:50',
            'isi' => 'required',
            'foto' => 'image|mimes:jpg,png,svg,gif,jpeg|max:2048'
        ]);

        // $request->session()->flash('status', 'Judul terlalu panjang');
		if($request->file('foto') == ''){
            $foto = NULL;
        } else
        {
            $file = $request->file('foto');
            $config['max_size']=100;
            $config['allowed_types']='gif|jpg|png';
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('foto')->move("images/layanan",$fileName);
            $foto = $fileName;
            
        }
        //$proses_id = Auth::user()->level_id;
       // $proses_id = Auth::user()->id;
        $proses_id = 2;
        $user_id= Auth::user()->id;
		//$user_id = '108';
       
        // $validatedData = $request->validate([
        //     'judul' => 'required|unique:posts|max:255',
        //     'isi' => 'required',
        //     'foto' => 'Format tidak sesuai atau ukuran melebihi batas maksimum'
        // ]);
        Layanan::create(array_merge($request->all(),['foto' => $foto],['proses_id' => $proses_id],['user_id' => $user_id]));
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
        $kategories = Kategori::all();
        $layanans = Layanan::findOrFail($id);
        //dd($layanans);
        $jawabans= Jawaban::select("*")->where("permintaanlayanan_id", $id)->get();  //untuk menampilkan jawaban berdasarkan id relasi antara tabel jawaban dan layanan
        
        //dd($jawabans);
        //$jawabans= Jawaban::where('permintaanlayanan_id','=','1');
       // var_dump($jawabans);
       
        return view('backend.layanans.show', compact('kategories','layanans','jawabans'));
        //var_dump($layanans);
    }


    public function status_bidang(Request $request,$id)
    {
        if ($request->kategori_id==1 || $request->kategori_id==2 || $request->kategori_id==3){
            $proses_id = 3;
            // "proses_id" =>  3, 
            } elseif ($request->kategori_id==4 || $request->kategori_id==5|| $request->kategori_id==6 || $request->kategori_id==7){
                $proses_id = 4;
                // "proses_id" =>  4, 
            }elseif ($request->kategori_id==8){
                $proses_id = 5;
                // "proses_id" =>  5, 
            } elseif ($request->kategori_id==9 || $request->kategori_id==10 || $request->kategori_id==11 || $request->kategori_id== 12){
                $proses_id = 6;
                // "proses_id" =>  6, 
            }
        Layanan::where("id", $id)->update([
        "status_id" => '2',
        "kategori_id" => $request->kategori_id,
        "proses_id" => $proses_id
        ]);
     
        return redirect()->back();
        
    }

    public function status_tolak(Request $request,$id)
    {
        $id = $request->status;
        $status_tolak=Layanan::where("id", $id)->update
        ([
            "status_id" =>'6',
            "proses_id" =>  Auth::user()->id, 
        ]);

        return redirect()->back();
    }
    

    //sudah dijawab oleh verifikator
    public function status_jawab(Request $request,$id)
    {
        $id = $request->status;
        $status_jawab=Layanan::where("id", $id)->update
        ([
            "status_id" =>'3',
            "proses_id" =>  Auth::user()->id, 
            
        ]);

        return redirect()->back();
        
    }  
    
    

    //selesaiumum
    public function selesai(Request $request,$id)
    {
        $id = $request->status;
        $selesai=Layanan::where("id", $id)->update
        ([
            "status_id" =>'5',
            "proses_id" =>  Auth::user()->id, 
        ]);

        //dd('$id');
        return redirect()->back();
    }

  //-------------------------------------------------------------
     

    //sudahdijawab oleh bidang
    public function jawab(Request $request,$id)
    {
        $id = $request->status;
        $jawab=Layanan::where("id", $id)->update
        ([
            "status_id" => '7',
            "proses_id" =>  Auth::user()->id,
        ]);
        return redirect()->back();
    }

    public function status_peninjauan(Request $request)
    {
        $id = $request->status;
        $status_peninjauan=Layanan::where("id", $id)->update
        ([
            "status_id" =>'4',
            "proses_id" =>  Auth::user()->id, 
            
        ]);
      
          
      
        return redirect()->back();
        
    }


    public function status_selesai(Request $request,$id)
    {
        $id = $request->status;
        $status_selesai=Layanan::where("id", $id)->update
        ([
            "status_id" =>'8',
            "proses_id" =>  Auth::user()->id, 
        ]);

        //dd('$id');
        return redirect()->back();
    }

   

 //----------------------------------------------------------


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$layanans = Layanan::findOrFail($id);
		$pds = Perangkatdaerah::orderBy('namapd')->get();
		$kategories = Kategori::orderBy('namakategori')->get();
        $statuss = Status::orderBy('namastatus')->get();
        return view('backend.layanans.edit', compact('layanans','pds','kategories','statuss'));		
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
        $this -> validate($request,[
            'judul' => 'required|max:50',
            'isi' => 'required',
            'foto' => 'image|mimes:jpg,png,svg,gif,jpeg|max:2048'
        ]);

		$layanan_data = Layanan::findOrFail($id);
		if($request->file('foto'))
        {
            $file = $request->file('foto');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak;
            $request->file('foto')->move("images/layanan",$fileName);
            $layanan_data->foto = $fileName;
        }

		Layanan::find($id)->update(array_merge($request->all(),['foto' => $layanan_data->foto]));
        return redirect()->route('layanans.index')->with('message', 'Data berhasil diedit');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Layanan::find($id)->delete();
		return redirect()->route('layanans.index')->with('message', 'Data berhasil dihapus');
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifikator()
    {
        $layanans = Layanan::with('pd','kategori')->where('status_id','1')->orwhere('status_id','2')->orwhere('status_id','6')->get();
        return view('backend.layanans.index', compact('layanans'));
    }
    
    
}


