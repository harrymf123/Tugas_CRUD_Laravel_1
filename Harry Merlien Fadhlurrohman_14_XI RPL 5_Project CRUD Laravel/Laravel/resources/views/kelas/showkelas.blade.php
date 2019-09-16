@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="kelas" align="center">
        <h2>DETAIL KELAS</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        
        @if(!empty($kelas->image_kelas))
            <div id="image_kelas" class="img-box" style="background-color: #5d62e0; width: 49.9%;">
                <img src="{{ $kelas->getImageKelas() }}" style="background-color: white; border-radius: 5px; margin: 10px; width: 400px; border: 7px double black;" title="Gambar.{{ $kelas->nama_kelas }}">
            </div>
            <div class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; width: 49.9%; margin: 15px; text-transform: uppercase;">SELAMAT DATANG DI KELAS {{$kelas->nama_kelas}}</div>
        @else
            <div id="image_kelas" class="img-box" style="background-color: #e83737; width: 49.9%;">
                <img src="{{ $kelas->getImageKelas() }}" style="background-color: white; border-radius: 5px; margin: 10px; width: 400px; border: 7px double black;" title="Gambar Kosong">
            </div>
            <div class="bg bg-danger text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; width: 49.9%; margin: 15px;">GAMBAR KELAS KOSONG</div>
        @endif

        <table class="table table-bordered table-hover border-black" style="width: 50%;">
            <tr>
                <th>ID</th>
                <td>{{ $kelas->id }}</td>
            </tr>
            <tr>
                <th>NAMA KELAS</th>
                <td>{{ $kelas->nama_kelas }}</td>
            </tr>
            <tr>
                <th>NAMA SISWA</th>
                <td>
                    @if(!empty($siswakelas))
                        @foreach($siswakelas as $siswa)
                            {{$siswa->nama_siswa." -- "." -- "}}
                        @endforeach
                    @endif
                </td>
            </tr>
            <tr>
                <th>JUMLAH SISWA</th>
                <td>{{ $jumlah_siswakelas }}</td>
            </tr>
            <tr>
                <th>CREATED AT</th>
                <td>{{ $kelas->created_at }}</td>
            </tr>
            <tr>
                <th>UPDATED AT</th>
                <td>{{ $kelas->updated_at }}</td>
            </tr>
        </table>
        <p style="border-top: 5px solid #333; width: 50%;"></p>
            <a href="{{ url('editkelas'.$kelas->id) }}" class="btn btn-warning text-white" style="width: 90px;">EDIT</a>
            <a href="{{ url('kelasmodel') }}" class="btn btn-danger">CANCEL</a>
        <p style="margin-top: 17px; border-top: 5px solid #333; width: 50%;"></p>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop