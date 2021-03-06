@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="siswa" align="center"> 
        <h2>Edit Siswa</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        <form action="{{ url('updatesiswa'.$siswa->id) }}" method="post" style="width: 35%;" enctype="multipart/form-data">
            @csrf
            <div class="form-group" align="left">
                <label for="id" class="control-label">ID</label>
                <input name="id" type="text" class="form-control" value="{{$siswa->id}}" readonly required>
            </div>

            <div class="form-group" align="left">
                <label for="nisn" class="control-label">NISN</label>
                <input name="nisn" type="text" class="form-control" value="{{$siswa->nisn}}" readonly required>
            </div>

            <div class="form-group" align="left">
                <label for="nama_siswa" class="control-label">NAMA SISWA</label>
                <input name="nama_siswa" type="text" class="form-control" value="{{$siswa->nama_siswa}}" required>
            </div>

            <!-- <div class="form-group" align="left">
                <label for="id_kelas" class="control-label">ID KELAS</label>
                <input type="number" name="id_kelas" class="form-control" value="{{$siswa->id_kelas}}" maxlength="10" required>
            </div> -->

            <div class="form-group" align="left">
                <label for="id_kelas" class="control-label">KELAS</label>
                @if(!empty($kelas_list))
                <select class="form-control" name="id_kelas" required>
                    @foreach($kelas_awal as $kelas)
                        <option value="{{$kelas->id}}">
                            {{$kelas->nama_kelas}}
                        </option>
                    @endforeach
                    @foreach($kelas_lain as $kelas)
                        <option value="{{$kelas->id}}">
                            {{$kelas->nama_kelas}}
                        </option>
                    @endforeach
                </select>
                @endif

                <!-- <input name="id_kelas" type="text" class="form-control" value="{{!empty($siswa->kelasmigration->nama_kelas) ? $siswa->kelasmigration->id.' - '.$siswa->kelasmigration->nama_kelas : '-'}}" required> -->
            </div>

            <div class="form-group" align="left">
                <label for="tanggal_lahir" class="control-label">TANGGAL LAHIR</label>
                <input name="tanggal_lahir" type="date" class="form-control" value="{{$siswa->tanggal_lahir}}" required>
            </div>
            
            <div class="form-group" align="left">
                <label for="jenis_kelamin" class="control-label">JENIS KELAMIN</label>
                @if ($siswa->jenis_kelamin=="P")
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" checked required>
                    <label class="form-check-label" for="jenis_kelamin">PEREMPUAN</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" required>
                    <label class="form-check-label" for="jenis_kelamin">LAKI-LAKI</label>
                </div>
                @elseif ($siswa->jenis_kelamin=="L")
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
                <label for="image_siswa" class="control-label">IMAGE SISWA</label>
                <input name="image_siswa" type="file" class="form-control" style="padding: 3px; padding-left: 5px;" value="{{$siswa->image_siswa}}">
            </div>

            <p style="border-top: 5px solid #333; width: 100%; width: 100%;"></p>
                <button type="submit" class="btn btn-primary" align="center">SUBMIT</button>
                <button type="reset" class="btn btn-warning text-white">RESET</button>
                <a href="{{ url('siswamodel') }}" class="btn btn-danger">CANCEL</a>
            <p style="margin-top: 17px; border-top: 5px solid #333; width: 100%;"></p>
        </form>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop 

