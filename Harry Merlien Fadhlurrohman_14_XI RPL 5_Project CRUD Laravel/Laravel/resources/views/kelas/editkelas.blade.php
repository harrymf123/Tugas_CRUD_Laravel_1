@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="kelas" align="center"> 
        <h2>Edit Kelas</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        <form action="{{ url('updatekelas'.$kelas->id) }}" method="post" style="width: 35%;" enctype="multipart/form-data">
            @csrf
            <div class="form-group" align="left">
                <label for="id" class="control-label">ID</label>
                <input name="id" type="text" class="form-control" value="{{$kelas->id}}" readonly required>
            </div>
            
            <div class="form-group" align="left">
                <label for="nama_kelas" class="control-label">NAMA KELAS</label>
                <input name="nama_kelas" type="text" class="form-control" value="{{$kelas->nama_kelas}}" required>
            </div>

            <div class="form-group" align="left">
                <label for="image_kelas" class="control-label">IMAGE KELAS</label>
                <input name="image_kelas" type="file" class="form-control" style="padding: 3px; padding-left: 5px;" value="{{$kelas->image_kelas}}">
            </div>
            
            <p style="border-top: 5px solid #333; width: 100%; width: 100%;"></p>
                <button type="submit" class="btn btn-primary" align="center">SUBMIT</button>
                <button type="reset" class="btn btn-warning text-white">RESET</button>
                <a href="{{ url('kelasmodel') }}" class="btn btn-danger">CANCEL</a>
            <p style="margin-top: 17px; border-top: 5px solid #333; width: 100%;"></p>
        </form>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop 

