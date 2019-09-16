@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="siswa" align="center">
        <h2>SISWA</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        
        <form class="form-inline" method="GET" action="siswamodel" style="margin-bottom: 17px; width: 20%;">
            <input name="cari" class="form-control" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-danger btn-md my-0 ml-md-2" type="submit">Cari</button>
        </form>

        @if(!empty($siswa_list))
        @foreach($siswa_list as $siswa)
        <div class="card bg-secondary text-white" style="width: 70%;">
            <div class="card-header">
                DATA SISWA
            </div>

            <div class="card-body" align="left">
                <div>
                @if(!empty($siswa->image_siswa))
                    <a href="{{ url('detailsiswa'.$siswa->id) }}" style="text-decoration: none;"><img src="{{ $siswa->getImageSiswa() }}" style="float:left; background-color: white; margin-right: 30px; border-radius: 5px; border: 10px double #86aaff; width: 200px; height: 200px;" title="Gambar {{ $siswa->nama_siswa }}"></a>
                    <a href="{{ url('detailsiswa'.$siswa->id) }}" style="text-decoration: none;"><div align="center" class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 100px; padding-right: 100px; width: 100%; text-transform: uppercase;"><b>HALO {{$siswa->nama_siswa}}</b></div></a>
                @else
                    <a href="{{ url('detailsiswa'.$siswa->id) }}" style="text-decoration: none;"><img src="{{ $siswa->getImageSiswa() }}"  style="float:left; background-color: white; margin-right: 30px; border-radius: 5px; border: 10px double #fc4741; width: 200px; height: 200px;" title="Gambar Default"></a>
                    <a href="{{ url('detailsiswa'.$siswa->id) }}" style="text-decoration: none;"><div align="center" class="bg bg-danger text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 100px; padding-right: 100px; width: 100%; text-transform: uppercase;"><b>GAMBAR ANDA KOSONG</b></div></a>
                @endif
                </div>
                <div style="background-color: #3d3f66; padding-top: 20px; padding-bottom: 7.5px; padding-left: 100px; padding-right: 100px; width: 100%; text-transform: uppercase;">
                <h5>NAMA SISWA : {{ $siswa->nama_siswa }}</h5>
                <h5>KELAS : 
                    {{ !empty($siswa->kelasmigration->id) ?
                        $siswa->kelasmigration->nama_kelas : '-'
                    }}
                </h5>
                <h5>TANGGAL LAHIR : {{ $siswa->tanggal_lahir }}</h5>
                <h5>JENIS KELAMIN : {{ $siswa->jenis_kelamin }}</h5>
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ url('detailsiswa'.$siswa->id) }}" class="btn btn-success text-white" style="padding: 6px; font-size: 13px; width: 70px;">DETAIL</a>
                <a href="{{ url('editsiswa'.$siswa->id)}}" class="btn btn-warning text-white" style="padding: 6px; font-size: 13px; width: 70px;">EDIT</a>
                <a href="{{ url('deletesiswa'.$siswa->id) }}"class="btn btn-danger" style="padding: 6px; font-size: 13px; width: 70px;" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">HAPUS</a>
            </div>
        </div>
        <br>
        @endforeach
        <h5>Jumlah Siswa : {{ $jumlah_siswa }} </h5>
        <p style="border-top: 5px solid #333; width: 100%; width: 95%;"></p>
        <a href="{{ url('createsiswa') }}" class="btn btn-primary">TAMBAH SISWA</a>
        <a href="{{ url('siswamodel/cetak_pdf') }}" class="btn btn-info" style="width: 150px;">CETAK PDF</a>
        <a href="{{ url('siswamodel/cetak_excel') }}" class="btn btn-success" style="width: 150px;">CETAK EXCEL</a>
        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        @else
            <p class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; text-decoration: none; width: 95%;">Tidak ada data siswa</p>
            
            <p style="border-top: 5px solid #333; width: 100%; width: 95%;"></p>
            <a href="{{ url('createsiswa') }}" class="btn btn-primary">TAMBAH SISWA</a>
            <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        @endif
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop