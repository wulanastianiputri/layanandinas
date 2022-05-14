<div class="main-sidebar">
  <aside id="sidebar-wrapper">
 @if (Auth::user()->level_id == 1)
 <div class="sidebar-brand">
  <div>
    {{-- <img alt="image" src="../assets/img/avatar/avatar-3.png" width="100px" height="100px" class="mt-5 ml-3 mr-3"> --}}
    <div class="py-1">
      @if (Auth::user()->foto_user )
        <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" alt="foto pengguna" class="mt-5 ml-3 mr-3"/>
      @else
        <img src="{{url('images/user/default.png')}}" width="100" alt="image" class="mt-5 ml-3 mr-3"/>
      @endif
    </div>
  
  </div>
  {{-- <a href="/profil" class="user">{{ Auth::user()->level->namalevel}}</a> --}}
  <a href="/profil" class="user">{{ Auth::user()->name }}</a><br>
 
</div>
<div class="sidebar-brand sidebar-brand-sm">
  <a href="/profil"></a>
</div>
<ul class="sidebar-menu">
  <li><a class="nav-link" href="/home"><i class="fas fa-poll" style="font-size:19px;"></i><span>Beranda</span></a></li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check" style="font-size:15px;"></i><span>Tiket Layanan</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('layanans.index') }}">Tiket Layanan</a></li>
      <li><a class="nav-link" href="{{ route('layanans.create') }}">Tambah Tiket</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt" style="font-size:16px;"></i> <span>Rekap Laporan </span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('laporanbelumditindaklanjutis.index') }}">Berdasarkan Tanggal</a></li>
    
      <li><a class="nav-link" href="{{ route('laporanberdasarkanstatuss.index') }}">Berdasarkan Status</a></li>
      <li><a class="nav-link" href="{{ route('laporanberdasarkankategoris.index') }}">Berdasarkan Kategori</a></li>
    </ul>
  </li>


  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="/faq" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
      <i class="/faq"></i> FAQ


      <a href="/manualbook" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
        <i class="/manualbook"></i> Manual Book
      </a>
  </div>

 @elseif(Auth::user()->level_id ==2)
 <div class="sidebar-brand">
  <div>
    {{-- <img alt="image" src="../assets/img/avatar/avatar-3.png" width="100px" height="100px" class="mt-5 ml-3 mr-3"> --}}
    <div class="py-1">
      @if (Auth::user()->foto_user )
        <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" alt="foto pengguna" class="mt-5 ml-3 mr-3"/>
      @else
        <img src="{{url('images/user/default.png')}}" width="100" alt="image" class="mt-5 ml-3 mr-3"/>
      @endif
    </div>
  
  </div>
  <a href="/profil" class="user">{{ Auth::user()->name }}</a><br>
  {{-- <a href="/profil" class="user">{{ Auth::user()->level }}</a> --}}
</div>
<div class="sidebar-brand sidebar-brand-sm">
  <a href="/profil"></a>
</div>
<ul class="sidebar-menu">
  <li><a class="nav-link" href="/home"><i class="fas fa-poll" style="font-size:19px;"></i> <span>Beranda</span></a></li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check" style="font-size:15px;"></i> <span>Tiket Layanan</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('layanans.index') }}">Tiket Layanan</a></li>
      <li><a class="nav-link" href="/layananbelumdiverifikasi">Belum diverifikasi</a></li>
    </ul>
  </li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt" style="font-size:16px;"></i> <span>Rekap Laporan </span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('laporanbelumditindaklanjutis.index') }}">Berdasarkan Tanggal</a></li>
    
      <li><a class="nav-link" href="{{ route('laporanberdasarkanstatuss.index') }}">Berdasarkan Status</a></li>
      <li><a class="nav-link" href="{{ route('laporanberdasarkankategoris.index') }}">Berdasarkan Kategori</a></li>
    </ul>
  </li>


  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="/faq" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
      <i class="/faq"></i> FAQ


      <a href="/manualbook" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
        <i class="/manualbook"></i> Manual Book
      </a>
  </div>

 @elseif(Auth::user()->level_id == 3)
 
 <div class="sidebar-brand">
  <div>
    {{-- <img alt="image" src="../assets/img/avatar/avatar-3.png" width="100px" height="100px" class="mt-5 ml-3 mr-3"> --}}
    <div class="py-1">
      @if (Auth::user()->foto_user )
        <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" alt="foto pengguna" class="mt-5 ml-3 mr-3"/>
      @else
        <img src="{{url('images/user/default.png')}}" width="100" alt="image" class="mt-5 ml-3 mr-3"/>
      @endif
    </div>
  
  </div>
  <a href="/profil" class="user">{{ Auth::user()->name }}</a><br>
  {{-- <a href="/profil" class="user">{{ Auth::user()->level }}</a> --}}
</div>
<div class="sidebar-brand sidebar-brand-sm">
  <a href="/profil"></a>
</div>
<ul class="sidebar-menu">
  <li><a class="nav-link" href="/home"><i class="fas fa-poll" style="font-size:19px;"></i> <span>Beranda</span></a></li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check" style="font-size:15px;"></i> <span>Tiket Layanan</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('layanans.index') }}">Tiket Layanan</a></li>
      <li><a class="nav-link" href="/layananbelumditindaklanjuti">Belum ditindaklanjuti</a></li>
    </ul>
  </li>


  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt" style="font-size:16px;"></i> <span>Rekap Laporan </span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('laporanbelumditindaklanjutis.index') }}">Berdasarkan Tanggal</a></li>
    
      <li><a class="nav-link" href="{{ route('laporanberdasarkanstatuss.index') }}">Berdasarkan Status</a></li>
      <li><a class="nav-link" href="{{ route('laporanberdasarkankategoris.index') }}">Berdasarkan Kategori</a></li>
    </ul>
  </li>


  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="/faq" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
      <i class="/faq"></i> FAQ


      <a href="/manualbook" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
        <i class="/manualbook"></i> Manual Book
      </a>
  </div>
 @elseif(Auth::user()->level_id == 4)
 
 <div class="sidebar-brand">
  <div>
    {{-- <img alt="image" src="../assets/img/avatar/avatar-3.png" width="100px" height="100px" class="mt-5 ml-3 mr-3"> --}}
    <div class="py-1">
      @if (Auth::user()->foto_user )
        <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" alt="foto pengguna" class="mt-5 ml-3 mr-3"/>
      @else
        <img src="{{url('images/user/default.png')}}" width="100" alt="image" class="mt-5 ml-3 mr-3"/>
      @endif
    </div>
  
  </div>
  <a href="/profil" class="user">{{ Auth::user()->name }}</a><br>
  {{-- <a href="/profil" class="user">{{ Auth::user()->level }}</a> --}}
</div>
<div class="sidebar-brand sidebar-brand-sm">
  <a href="/profil"></a>
</div>
<ul class="sidebar-menu">
  <li><a class="nav-link" href="/home"><i class="fas fa-poll" style="font-size:19px;"></i> <span>Beranda</span></a></li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check" style="font-size:15px;"></i> <span>Tiket Layanan</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('layanans.index') }}">Tiket Layanan</a></li>
      <li><a class="nav-link" href="/layananbelumditindaklanjuti">Belum ditindaklanjuti</a></li>
    </ul>
  </li>


  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt" style="font-size:16px;"></i> <span>Rekap Laporan </span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('laporanbelumditindaklanjutis.index') }}">Berdasarkan Tanggal</a></li>
    
      <li><a class="nav-link" href="{{ route('laporanberdasarkanstatuss.index') }}">Berdasarkan Status</a></li>
      <li><a class="nav-link" href="{{ route('laporanberdasarkankategoris.index') }}">Berdasarkan Kategori</a></li>
    </ul>
  </li>


  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="/faq" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
      <i class="/faq"></i> FAQ


      <a href="/manualbook" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
        <i class="/manualbook"></i> Manual Book
      </a>
  </div>

 @elseif(Auth::user()->level_id == 5)
 
 <div class="sidebar-brand">
  <div>
    {{-- <img alt="image" src="../assets/img/avatar/avatar-3.png" width="100px" height="100px" class="mt-5 ml-3 mr-3"> --}}
    <div class="py-1">
      @if (Auth::user()->foto_user )
        <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" alt="foto pengguna" class="mt-5 ml-3 mr-3"/>
      @else
        <img src="{{url('images/user/default.png')}}" width="100" alt="image" class="mt-5 ml-3 mr-3"/>
      @endif
    </div>
  
  </div>
  <a href="/profil" class="user">{{ Auth::user()->name }}</a><br>
  {{-- <a href="/profil" class="user">{{ Auth::user()->level }}</a> --}}
</div>
<div class="sidebar-brand sidebar-brand-sm">
  <a href="/profil"></a>
</div>
<ul class="sidebar-menu">
  <li><a class="nav-link" href="/home"><i class="fas fa-poll" style="font-size:19px;"></i> <span>Beranda</span></a></li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check" style="font-size:15px;"></i> <span>Tiket Layanan</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('layanans.index') }}">Tiket Layanan</a></li>
      <li><a class="nav-link" href="/layananbelumditindaklanjuti">Belum ditindaklanjuti</a></li>
    </ul>
  </li>


  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt" style="font-size:16px;"></i> <span>Rekap Laporan </span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('laporanbelumditindaklanjutis.index') }}">Berdasarkan Tanggal</a></li>
    
      <li><a class="nav-link" href="{{ route('laporanberdasarkanstatuss.index') }}">Berdasarkan Status</a></li>
      <li><a class="nav-link" href="{{ route('laporanberdasarkankategoris.index') }}">Berdasarkan Kategori</a></li>
    </ul>
  </li>


  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="/faq" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
      <i class="/faq"></i> FAQ


      <a href="/manualbook" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
        <i class="/manualbook"></i> Manual Book
      </a>
  </div>

 @elseif(Auth::user()->level_id == 6)

 <div class="sidebar-brand">
  <div>
    {{-- <img alt="image" src="../assets/img/avatar/avatar-3.png" width="100px" height="100px" class="mt-5 ml-3 mr-3"> --}}
    <div class="py-1">
      @if (Auth::user()->foto_user )
        <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" alt="foto pengguna" class="mt-5 ml-3 mr-3"/>
      @else
        <img src="{{url('images/user/default.png')}}" width="100" alt="image" class="mt-5 ml-3 mr-3"/>
      @endif
    </div>
  
  </div>
  <a href="/profil" class="user">{{ Auth::user()->name }}</a><br>
  {{-- <a href="/profil" class="user">{{ Auth::user()->level }}</a> --}}
</div>
<div class="sidebar-brand sidebar-brand-sm">
  <a href="/profil"></a>
</div>
<ul class="sidebar-menu">
  <li><a class="nav-link" href="/home"><i class="fas fa-poll" style="font-size:19px;"></i> <span>Beranda</span></a></li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-check" style="font-size:15px;"></i> <span>Tiket Layanan</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('layanans.index') }}">Tiket Layanan</a></li>
      <li><a class="nav-link" href="/layananbelumditindaklanjuti">Belum ditindaklanjuti</a></li>
    </ul>
  </li>


  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt" style="font-size:16px;"></i> <span>Rekap Laporan </span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('laporanbelumditindaklanjutis.index') }}">Berdasarkan Tanggal</a></li>
    
      <li><a class="nav-link" href="{{ route('laporanberdasarkanstatuss.index') }}">Berdasarkan Status</a></li>
      <li><a class="nav-link" href="{{ route('laporanberdasarkankategoris.index') }}">Berdasarkan Kategori</a></li>
    </ul>
  </li>


  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="/faq" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
      <i class="/faq"></i> FAQ


      <a href="/manualbook" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
        <i class="/manualbook"></i> Manual Book
      </a>
  </div>

 @elseif(Auth::user()->level_id == 7)
 <div class="sidebar-brand">
  <div>
    {{-- <img alt="image" src="../assets/img/avatar/avatar-3.png" width="100px" height="100px" class="mt-5 ml-3 mr-3"> --}}
    <div class="py-1">
      @if (Auth::user()->foto_user )
        <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" alt="foto pengguna" class="mt-5 ml-3 mr-3"/>
      @else
        <img src="{{url('images/user/default.png')}}" width="100" alt="image" class="mt-5 ml-3 mr-3"/>
      @endif
    </div>
  </div>
  <a href="/profil" class="user">{{ Auth::user()->name }}</a><br>
  {{-- <a href="/profil" class="user">{{ Auth::user()->level }}</a> --}}
</div>
<div class="sidebar-brand sidebar-brand-sm">
  <a href="/profil"></a>
</div>
<ul class="sidebar-menu">
  <li><a class="nav-link" href="/home"><i class="fas fa-poll" style="font-size:19px;"></i> <span>Beranda</span></a></li>
  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt" style="font-size:16px;"></i> <span>Rekap Laporan </span></a>
    <ul class="dropdown-menu">
    
      <li><a class="nav-link" href="{{ route('laporanbelumditindaklanjutis.index') }}">Berdasarkan Tanggal</a></li>
    
      <li><a class="nav-link" href="{{ route('laporanberdasarkanstatuss.index') }}">Berdasarkan Status</a></li>
      <li><a class="nav-link" href="{{ route('laporanberdasarkankategoris.index') }}">Berdasarkan Kategori</a></li>
    </ul>
  </li>
  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="/faq" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
      <i class="/faq"></i> FAQ


      <a href="/manualbook" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
        <i class="/manualbook"></i> Manual Book
      </a>
  </div>
</ul>

 @elseif(Auth::user()->level_id == 0)
 <div class="sidebar-brand">
  <div>
    {{-- <img alt="image" src="../assets/img/avatar/avatar-3.png" width="100px" height="100px" class="mt-5 ml-3 mr-3"> --}}
    <div class="py-1">
      @if (Auth::user()->foto_user )
        <img src="{{url('images/user/'. Auth::user()->foto_user )}}" width="100" alt="foto pengguna" class="mt-5 ml-3 mr-3"/>
      @else
        <img src="{{url('images/user/default.png')}}" width="100" alt="image" class="mt-5 ml-3 mr-3"/>
      @endif
    </div>
  
  </div>
  <a href="/profil" class="user">{{ Auth::user()->name }}</a><br>
  {{-- <a href="/profil" class="user">{{ Auth::user()->level }}</a> --}}
</div>
<div class="sidebar-brand sidebar-brand-sm">
  <a href="/profil"></a>
</div>
<ul class="sidebar-menu">
  <li><a class="nav-link" href="/home"><i class="fas fa-poll" style="font-size:19px;"></i> <span>Beranda</span></a></li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-folder" style="font-size:16px;"></i> <span>Data Master</span></a>
    <ul class="dropdown-menu">
      <li><a class="nav-link" href="{{ route('pds.index') }}">Perangkat Daerah</a></li>
      <li><a class="nav-link" href="{{ route('bidangs.index') }}">Bidang</a></li>
      <li><a class="nav-link" href="{{route('kategories.index')}}">Kategori </a></li>
      <li><a class="nav-link" href="{{ route('statuss.index') }}">Status</a></li>
      <li><a class="nav-link" href="{{ route('levels.index') }}">Level</a></li>
    </ul>
  </li>

 
  <li><a href="{{ route('users.index') }}"><i class="fas fa-portrait" style="font-size:16px;"></i> <span>Pengguna</span></a></li>
  <li><a href="{{ route('faqs.index') }}"><i class="fas fa-question-circle" style="font-size:16px;"></i> <span>FAQ</span></a></li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt" style="font-size:16px;"></i> <span>Rekap Laporan </span></a>
    <ul class="dropdown-menu">
    
      <li><a class="nav-link" href="{{ route('laporanbelumditindaklanjutis.index') }}">Berdasarkan Tanggal</a></li>
    
      <li><a class="nav-link" href="{{ route('laporanberdasarkanstatuss.index') }}">Berdasarkan Status</a></li>
      <li><a class="nav-link" href="{{ route('laporanberdasarkankategoris.index') }}">Berdasarkan Kategori</a></li>
    </ul>
  </li>

  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
    <a href="/faq" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
      <i class="/faq"></i> FAQ


      <a href="/manualbook" class="btn btn-primary mr-1 btn-lg btn-block btn-icon-split">
        <i class="/manualbook"></i> Manual Book
      </a>
  </div>


 @endif
</aside>
</div>
