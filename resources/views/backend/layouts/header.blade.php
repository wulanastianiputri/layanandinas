<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
    @if (auth()->user()->level=="Admin Perangkat Daerah")
    <a href="{{ route('layanans.create') }}" class="nav-link"><i class="fas fa-plus-square fa-2x"></i> <span>Tambah Tiket</span></a>
    <a href="/faq" class="nav-link"><i class="fas fa-question-circle"></i> <span>FAQ</span></a>
    <a href="/manualbook" class="nav-link"><i class="fas fa-book"></i> <span>Manual Book</span></a>
    @elseif(auth()->user()->level=="Admin Bidang")
    <a href="/faq" class="nav-link"><i class="fas fa-question-circle"></i> <span>FAQ</span></a>
    <a href="/manualbook" class="nav-link"><i class="fas fa-book"></i> <span>Manual Book</span></a>
    @elseif(auth()->user()->level=="Super Admin")
    <a href="/faq" class="nav-link"><i class="fas fa-question-circle"></i> <span>FAQ</span></a>
    <a href="/manualbook" class="nav-link"><i class="fas fa-book"></i> <span>Manual Book</span></a>
    @endif
  </form>



  
  <ul class="navbar-nav navbar-right">
    
    {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"><span class="badge badge-light">9</span></i></a> --}}
      <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></span></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Notifikasi
          <div class="float-right">
            <a href="#"></a>
          </div>
        </div>
        
        <div class="dropdown-list-content dropdown-list-icons">
       
          <?php 
              if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
            $layanans = App\Layanan::with('pd','kategori','status','user')->where('pd_id',Auth::user()->pd_id)->orderBy('updated_at', 'desc')->get();

        } else
            $layanans = App\Layanan::with('pd','kategori','status','user')->where('proses_id', Auth::user()->level_id)->orderBy('updated_at', 'desc')->get() 
        //    if(Auth::user()->pd_id!= 11&&Auth::user()->level_id==1){ 
        //     $layanans = App\Layanan::with('pd','kategori','status')->where('pd_id',Auth::user()->pd_id)->orderBy('updated_at', 'desc')->get();
        // } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==2){ 
        //     $layanans = Layanan::with('pd','kategori')->where('status_id','1')->orwhere('status_id','2')->orwhere('status_id',6)->orderBy('created_at', 'desc')->get();    
        // } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==3){
        //     $layanans = App\Layanan::with('pd','kategori')->whereBetween('kategori_id', [1,3])
        //     ->where(function ($query) {
        //         $query->whereBetween('status_id', [2,5]);
        //     })->orderBy('updated_at', 'desc')->get(); 
        // } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==4){
        //     $layanans = App\Layanan::with('pd','kategori')->whereBetween('kategori_id', [4,7])
        //     ->where(function ($query) {
        //         $query->whereBetween('status_id', [2,5]);
        //     })->orderBy('updated_at', 'desc')->get();
        // } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==5){
        //     $layanans = App\Layanan::with('pd','kategori')->where('kategori_id', [8])
        //     ->where(function ($query) {
        //         $query->whereBetween('status_id', [2,5]);
        //     })->orderBy('updated_at', 'desc')->get();
        // } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==6){
        //     $layanans = App\Layanan::with('pd','kategori')->whereBetween('kategori_id', [9,12])
        //     ->where(function ($query) {
        //         $query->whereBetween('status_id', [2,5]);
        //     })->orderBy('updated_at', 'desc')->get();
        // } elseif(Auth::user()->pd_id== 11&&Auth::user()->level_id==7){
        //     $layanans = App\Layanan::with('pd','kategori')->orderBy('id', 'desc')->get();
        // } elseif(Auth::user()->pd_id == 11&&'level_id'==0){
        //     $layanans = App\Layanan::with('pd','kategori')->orderBy('id', 'desc')->get();  
      
        ?>
          @foreach ($layanans as $layanan)
          <a href="{{ route('layanans.show',$layanan->id) }}" class="dropdown-item">
            <div class="dropdown-item-icon bg-info text-white">
              @if(Auth::user()->level_id == 1)
              @if ($layanan->user->foto_user)
                <img src="{{url('images/user/'. $layanan->user->foto_user )}}" width="60" alt="foto pengguna" class="pr-3"/>
              @else
                <img src="{{url('images/user/default.png')}}" width="60" alt="image" class="pr-3"/>
              @endif
              @else
              <img src="{{url('images/user/default.png')}}" width="60" alt="image" class="pr-3"/>
              @endif
            </div>
            <div class="dropdown-item-desc">
              {{-- @if(Auth::user()->level_id == 1)
                {{ $layanan->judul}}-{{ $layanan->status->namastatus}}
              @else
              {{ $layanan->judul}}-{{ $layanan->pd->nomenklatur}}
              @endif
                <div class="time">{{ $layanan->updated_at}}</div> --}}
            </div>
          </a>
          
            
          @endforeach
     
         
            
          </a>
        </div>
        <div class="dropdown-footer text-center">
          <a href="#">View All <i class="fas fa-chevron-right"></i></a>
        </div>
      </div>
    </li>
   
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
{{--       
      <div >
        @if (Auth::user()->foto_user )
          <img src="{{url('images/user/'. Auth::user()->foto_user )}}" height="25px" width="25px" alt="foto pengguna" class="rounded-circle mr-1"/>
        @else
          <img src="{{url('images/user/default.png')}}" height="25px" width="25px" alt="foto pengguna" class="rounded-circle mr-1"/>
        @endif
      </div>
       --}}
      {{-- <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle mr-1"> --}}
      <div class="d-sm-none d-lg-inline-block">Halo, {{ Auth::user()->name }}</div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      {{-- <a href="{{ route('profiles.edit') }}" class="dropdown-title nav-link"><i class="far fa-user"></i> Profil --}}
        <a href="{{ route('profil.index') }}" class="dropdown-title nav-link"><i class="far fa-user"></i> Profil
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                                  </form> 
      </div>
    </li>
  </ul>
</nav>