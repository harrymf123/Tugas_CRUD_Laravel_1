@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="siswa" align="center">
        <h2>TAMBAH SISWA</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        <form action="{{ url('simpansiswa') }}" method="post" align="left" style="width: 35%;" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="number" name="id" class="form-control" maxlength="10" required>
            </div>

            <div class="form-group">
                <label for="nisn" class="control-label">NISN</label>
                <input type="number" name="nisn" class="form-control" maxlength="4" required>
            </div>

            <div class="form-group">
                <label for="nama_siswa" class="control-label">NAMA SISWA</label>
                <input type="text" name="nama_siswa" class="form-control" maxlength="30" required>
            </div>

            <!-- <div class="form-group">
                <label for="id_kelas" class="control-label">ID KELAS</label>
                <input type="number" name="id_kelas" class="form-control" maxlength="10" required>
            </div> -->

            <div class="form-group" align="left">
                <label for="id_kelas" class="control-label">NAMA KELAS</label>
                @if(!empty($kelas_list))
                <select class="form-control" name="id_kelas" required>
                @foreach($kelas_list as $kelas)
                    <option value="{{$kelas->id}}">
                        {{$kelas->nama_kelas}}
                    </option>
                @endforeach
                </select>
                @endif

                <!-- <input name="id_kelas" type="text" class="form-control" value="{{!empty($siswa->kelasmigration->nama_kelas) ? $siswa->kelasmigration->id.' - '.$siswa->kelasmigration->nama_kelas : '-'}}" required> -->
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
                <label for="image_siswa" class="control-label">IMAGE SISWA</label>
                <input name="image_siswa" type="file" class="form-control" style="padding: 3px; padding-left: 5px;">
            </div>

            <div align="center">
            <p style="border-top: 5px solid #333; width: 100%; width: 100%;"></p>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                <button type="reset" class="btn btn-warning text-white">RESET</button>
                <a href="{{ url('siswamodel') }}" class="btn btn-danger">CANCEL</a>
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