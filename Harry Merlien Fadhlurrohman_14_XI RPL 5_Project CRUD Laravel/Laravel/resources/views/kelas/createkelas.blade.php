@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="kelas" align="center">
        <h2>TAMBAH KELAS</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        <form action="{{ url('simpankelas') }}" method="post" align="left" style="width: 35%;" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="number" name="id" class="form-control" maxlength="10" required>
            </div>

            <div class="form-group">
                <label for="nama_kelas" class="control-label">NAMA KELAS</label>
                <input type="text" name="nama_kelas" class="form-control" maxlength="30" required>
            </div>

            <div class="form-group" align="left">
                <label for="image_kelas" class="control-label">IMAGE KELAS</label>
                <input name="image_kelas" type="file" class="form-control" style="padding: 3px; padding-left: 5px;">
            </div>


            <div align="center">
            <p style="border-top: 5px solid #333; width: 100%; width: 100%;"></p>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                <button type="reset" class="btn btn-warning text-white">RESET</button>
                <a href="{{ url('kelasmodel') }}" class="btn btn-danger">CANCEL</a>
            <p style="margin-top: 17px; border-top: 5px solid #333; width: 100%;"></p>
            </div>
        </form>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop