@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="guru" align="center">
        <h2>TAMBAH GURU</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        <form action="{{ url('simpanguru') }}" method="post" align="left" style="width: 35%;" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="number" name="id" class="form-control" maxlength="10" required>
            </div>

            <div class="form-group">
                <label for="nip" class="control-label">NIP</label>
                <input type="number" name="nip" class="form-control" maxlength="4" required>
            </div>

            <div class="form-group">
                <label for="nama_guru" class="control-label">NAMA GURU</label>
                <input type="text" name="nama_guru" class="form-control" maxlength="30" required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir" class="control-label">TANGGAL LAHIR</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin" class="control-label">JENIS KELAMIN</label>
                
                <div class="form-check">
                    <input type="radio" name="jenis_kelamin" class="form-check-input" value="L" required>
                    <label for="jenis_kelamin" class="form-check-label">LAKI - LAKI</label>
                </div>
                
                <div class="form-check">
                    <input type="radio" name="jenis_kelamin" class="form-check-input" value="P" required>
                    <label for="jenis_kelamin" class="form-check-label">PEREMPUAN</label>
                </div>
            </div>

            <div class="form-group" align="left">
                <label for="image_guru" class="control-label">IMAGE GURU</label>
                <input name="image_guru" type="file" class="form-control" style="padding: 3px; padding-left: 5px;">
            </div>

            <div align="center">
            <p style="border-top: 5px solid #333; width: 100%; width: 100%;"></p>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                <button type="reset" class="btn btn-warning text-white">RESET</button>
                <a href="{{ url('gurumodel') }}" class="btn btn-danger">CANCEL</a>
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