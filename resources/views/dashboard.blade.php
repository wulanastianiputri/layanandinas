@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')
<div class ="section-body">
  <div class="card">
      <div class="card-header">
          <div class="countlayanan" style="background-color: #0291D6; border-radius: 10px; height: 115px; margin: 10px 0px; padding: 5px; width: auto;">
              <div class="count-contentlayanan" style="text-align: center; margin-top:28px">
                <span class="count-contentlayanan-number" style="color: #FFFFFF; font-size: 30px; margin-right:700px;"></select></span>
                <span class="count-contentlayanan-text" style="color: #FFFFFF; font-size: 30px; margin-left:-270px; align:center;">Permintaan Layanan</span>
              </div>
          </div>
      </div>
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>

@endsection
@push('page-scripts')
    
@endpush