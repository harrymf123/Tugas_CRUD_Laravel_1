@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="guru" align="center"> 
        <h2>Edit Guru</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        <form action="{{ url('updateguru'.$guru->id) }}" method="post" style="width: 35%;" enctype="multipart/form-data">
            @csrf
            <div class="form-group" align="left">
                <label for="id" class="control-label">ID</label>
                <input name="id" type="text" class="form-control" value="{{$guru->id}}" readonly required>
            </div>

            <div class="form-group" align="left">
                <label for="nip" class="control-label">NIP</label>
                <input name="nip" type="text" class="form-control" value="{{$guru->nip}}" readonly required>
            </div>
            
            <div class="form-group" align="left">
                <label for="nama_guru" class="control-label">NAMA SISWA</label>
                <input name="nama_guru" type="text" class="form-control" value="{{$guru->nama_guru}}" required>
            </div>
            
            <div class="form-group" align="left">
                <label for="tanggal_lahir" class="control-label">TANGGAL LAHIR</label>
                <input name="tanggal_lahir" type="date" class="form-control" value="{{$guru->tanggal_lahir}}" required>
            </div>
            
            <div class="form-group" align="left">
                <label for="jenis_kelamin" class="control-label">JENIS KELAMIN</label>
                @if ($guru->jenis_kelamin=="P")
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" checked required>
                    <label class="form-check-label" for="jenis_kelamin">PEREMPUAN</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" required>
                    <label class="form-check-label" for="jenis_kelamin">LAKI-LAKI</label>
                </div>
                @elseif ($guru->jenis_kelamin=="L")
                <div class="form-check"  align="left">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" checked required>
                    <label class="form-check-label" for="jenis_kelamin">LAKI-LAKI</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" required>
                    <label class="form-check-label" for="jenis_kelamin">PEREMPUAN</label>
                </div>
                @endif
            </div>

            <div class="form-group" align="left">
                <label for="image_guru" class="control-label">IMAGE GURU</label>
                <input name="image_guru" type="file" class="form-control" style="padding: 3px; padding-left: 5px;" value="{{$guru->image_guru}}">
            </div>

            <p style="border-top: 5px solid #333; width: 100%; width: 100%;"></p>
                <button type="submit" class="btn btn-primary" align="center">SUBMIT</button>
                <button type="reset" class="btn btn-warning text-white">RESET</button>
                <a href="{{ url('gurumodel') }}" class="btn btn-danger">CANCEL</a>
            <p style="margin-top: 17px; border-top: 5px solid #333; width: 100%;"></p>
        </form>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop 

