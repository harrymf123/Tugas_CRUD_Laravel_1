@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="guru" align="center">
        <h2>GURU</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        
        <form class="form-inline" method="GET" action="gurumodel" style="margin-bottom: 17px; width: 20%;">
            <input name="cari" class="form-control" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-danger btn-md my-0 ml-md-2" type="submit">Cari</button>
        </form>

        @if(!empty($guru_list))
        <table class="table table-bordered table-hover text-center" style="width: 95%;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA GURU</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JENIS KELAMIN</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guru_list as $guru)
                <tr>
                    <td> {{ $guru->id }} </td>
                    <td> {{ $guru->nip }} </td>
                    <td> {{ $guru->nama_guru }} </td>
                    <td> {{ $guru->tanggal_lahir }} </td>
                    <td> {{ $guru->jenis_kelamin }} </td>
                    <td>
                        <a href="{{ url('detailguru'.$guru->id) }}" class="btn btn-success text-white" style="padding: 6px; font-size: 13px;">DETAIL</a>
                        <a href="{{ url('editguru'.$guru->id)}}" class="btn btn-warning text-white" style="padding: 6px; font-size: 13px;">EDIT</a>
                        <a href="{{ url('deleteguru'.$guru->id) }}"class="btn btn-danger" style="padding: 6px; font-size: 13px;" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">HAPUS</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h5>Jumlah Guru : {{$jumlah_guru}} </h5>
        <p style="border-top: 5px solid #333; width: 100%; width: 95%;"></p>
        <a href="{{ url('createguru') }}" class="btn btn-primary">TAMBAH GURU</a>
        <a href="{{ url('gurumodel/cetak_pdf') }}" class="btn btn-info" style="width: 150px;">CETAK PDF</a>
        <a href="{{ url('gurumodel/cetak_excel') }}" class="btn btn-success" style="width: 150px;">CETAK EXCEL</a>
        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        @else
            <p class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; text-decoration: none; width: 95%;">Tidak ada data guru</p>
        @endif
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop