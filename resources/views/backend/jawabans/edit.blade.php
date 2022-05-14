@extends('backend.layouts.master', ['title' => 'Edit Jawaban'])
@section('title','Permintaan Layanan')

@section ('content')
<div class="section-header">
	<h1>Tiket Layanan</h1>
	  <div class="section-header-breadcrumb">
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/home">Beranda</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="/layanans">Tiket Layanan</a></div>
		<div class="breadcrumb-item"><a style="text-decoration:none" href="edit">Edit Jawaban</a></div>
	  </div>
  </div>

    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <h1>
        Permintaan Layanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/layanans">Permintaan Layanan</a></li>
        <li class="active">Update Permintaan Layanan</li>
      </ol>
    </section> --}}

    <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <form class="card" method="POST"  style="margin-left: auto; margin-right: auto; margin-booton: auto; margin-top: 20px; " action="{{ route('jawabans.update', $jawabans->jawaban) }}" enctype="multipart/form-data">
                  <div class="card-header center"><h4>{{ __('Edit Jawaban') }}</h4></div>
    
                  <div class="card-body">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                      <div class="form-group row">
                        <label for="jawaban" class="col-md-4 col-form-label text-md-right">{{ __('Jawaban') }}<span style="color:red"> *</span></label>
                        
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="jawaban"  placeholder="jawaban" name="jawaban" value="{{ $jawabans->id}}" required autofocus>
                          @if ($errors->has('jawaban'))
                          <span class="help-block">
                            <strong>{{ $errors->first('jawaban') }}</strong>
                          </span>
                          @endif  
                        </div>
                    </div>  
                        
                <div class="card-footer text-right">
                  <button type="submit" id="submit" class="btn btn-primary mr-1">Update Data </button>
             </div>
            

          </form>
      </div>
  </div>
</div>
</div>
</div>
            
            {{-- <form class="form-horizontal" method="POST" action="{{ route('jawabans.update', $jawabans->jawaban) }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('put') }}
              <div class="box-body">			
              
                <div class="form-group{{ $errors->has('jawaban') ? ' has-error' : '' }}">

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="jawaban" name="jawaban" value="{{ $jawabans->jawaban }}" required autofocus>
                    @if ($errors->has('jawaban'))
                      <span class="help-block">
                        <strong>{{ $errors->first('jawaban') }}</strong>
                      </span>
                    @endif					
                  </div>
                </div>

                <!-- /.box-body -->
			  
              <div class="box-footer">
                <div class="col-sm-2"></div>
                  <div class="col-sm-10">
                      <button type="submit" id="submit"class="btn btn-info">Update Data </button>
                  </div>				  
              </div>
              <!-- /.box-footer -->			  
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->	
		
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div> --}}

@endsection
@push('page-scripts')
    
@endpush