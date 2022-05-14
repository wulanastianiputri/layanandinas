@extends('backend.layouts.master')
@section('title','Helpdesk')
    

@section ('content')

  <div class="display">
    <div class="container">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header atas">
        <h1>
          Tiket Layanan
        </h1>
      </section>
  <div class="mt-2 mb-2">
    <a href="#" class="btn btn-icon icon-left btn-light"><i class="far fa-edit"></i>Download Excel</a>
    <a href="#" class="btn btn-icon icon-left btn-light"><i class="far fa-edit"></i>Download PDF</a>
  </div>        
      <!-- Main content -->
      <section class="content">
        <div class="col-xs-12">
            <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <hr>
                <table class="table table-stripped table-bordered table-sm">
                <tr>
                  {{--<th>No</th>--}}
                              <tr>
                                  <th>Perangkat Daerah</th>
                                  <th>Kategori</th>
                                  <th>judul</th>								
                              </tr>
              
                  @foreach ($layananblmselesais as $layananblmselesai)
                    <tr>
                      <td>{{ $layananblmselesai->pd ['namapd'] }}</td>
                      <td>{{ $layananblmselesai->kategori ['namakategori'] }}</td>
                      <td>{{ $layananblmselesai->judul }}</td>
                      
                      </form>
                        </td>
                      </tr>
                      @endforeach
                            
                  </table>
                  {{--$pds->links()--}}		
                  </div>
                </div>
              </div>
          </section>
        </div>
</div>
    @endsection
    