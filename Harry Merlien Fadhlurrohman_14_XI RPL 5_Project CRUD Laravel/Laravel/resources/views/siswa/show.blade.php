@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="siswa" align="center">
        <h2>DETAIL SISWA</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        @if(!empty($siswa->image_siswa))
            <div id="image_siswa" class="img-box" style="background-color: #4d62e0; width: 49.9%;">
                <img src="{{ $siswa->getImageSiswa() }}" style="background-color: white; margin: 10px; border-radius: 50%; width: 300px; height: 300px; border: 7px double black;" title="Gambar.{{ $siswa->nama_siswa }}">
            </div>
            <div class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; width: 49.9%; margin: 15px; text-transform: uppercase;">HALO {{$siswa->nama_siswa}}</div>
        @else
            <div id="image_siswa" class="img-box" style="background-color: #e83737; width: 49.9%;">
                <img src="{{ $siswa->getImageSiswa() }}" style="background-color: white; margin: 10px; border-radius: 50%; width: 300px; height: 300px; border: 7px double black;" title="Gambar Default">
            </div>
            <div class="bg bg-danger text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; width: 49.9%; margin: 15px;">GAMBAR ANDA KOSONG</div>
        @endif

        <table class="table table-bordered table-hover border-black" style="width: 50%;">
            <tr>
                <th>ID</th>
                <td>{{ $siswa->id }}</td>
            </tr>
            <tr>
                <th>NISN</th>
                <td>{{ $siswa->nisn }}</td>
            </tr>
            <tr>
                <th>NAMA SISWA</th>
                <td>{{ $siswa->nama_siswa }}</td>
            </tr>
            <tr>
                <th>KELAS</th>
                <td>
                    {{ 
                    !empty($siswa->kelasmigration->id) ?
                        $siswa->kelasmigration->nama_kelas : '-' 
                    }}
                </td>
            </tr>
            <tr>
                <th>TANGGAL LAHIR</th>
                <td>{{ $siswa->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>JENIS KELAMIN</th>
                <td>{{ $siswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>CREATED AT</th>
                <td>{{ $siswa->created_at }}</td>
            </tr>
            <tr>
                <th>UPDATED AT</th>
                <td>{{ $siswa->updated_at }}</td>
            </tr>
        </table>
        <p style="border-top: 5px solid #333; width: 50%;"></p>
                <a href="{{ url('editsiswa'.$siswa->id) }}" class="btn btn-warning text-white" style="width: 92px;">EDIT</a>
                <a href="{{ url('siswamodel') }}" class="btn btn-danger">KEMBALI</a>
        <p style="margin-top: 17px; border-top: 5px solid #333; width: 50%;"></p>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop