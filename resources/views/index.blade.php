@extends('layouts.masterhome')
@section('title','Helpdesk')
    

@section ('content')


<!DOCTYPE html>
<html lang="en">
<head>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/custom.css" />
</head>
<body>
  <div style="margin-bottom: -60px; "> 
    
  </div>
    <section >

    <div class="row">
        <div class="col-md-6" >
            <div id="left-side">
                <img src="buku/homehelpdesk.png" alt="background register" width="400px"  height= "280px">
                </div>
        </div>
        <div class="col-md-4">
            <div id="right-side" >
                <a  href="{{ route('login') }}" class="btn btn-icon icon-left btn-primary" style=" width: 100%;
                border: 0px;
                height: 48px;
                line-height: 48px;
                text-align: center;
                background: #03408E radial-gradient(circle,transparent 1%,#42b549 1%) center/15e3%;
                color: white;
                font-size: 18px;
                margin-top: 30px;
                border-radius: 3px;" >Masuk</a>
                <a href="{{ route('login') }}" class="btn btn-icon icon-left btn-primary" style=" width: 100%;
                border: 0px;
                height: 48px;
                line-height: 48px;
                text-align: center;
                background: #ff0000 radial-gradient(circle,transparent 1%,#42b549 1%) center/15e3%;
                color: white;
                font-size: 18px;
                margin-top: 30px;
                border-radius: 3px;">Cek Status Tiket</a>
           </div>
        </div>
    </div>
        
        
    </section>
</body>
</html>
@endsection
@push('page-scripts')

@endpush
