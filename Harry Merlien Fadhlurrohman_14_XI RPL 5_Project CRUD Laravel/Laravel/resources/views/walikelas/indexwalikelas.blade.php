@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="walikelas" align="center">
        <h2>WALIKELAS</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        
        <form class="form-inline" method="GET" action="walikelasmodel" style="margin-bottom: 17px; width: 20%;">
            <input name="cari" class="form-control" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-danger btn-md my-0 ml-md-2" type="submit">Cari</button>
        </form>

        @if(!empty($walikelas_list))
        <table class="table table-bordered table-hover text-center" style="width: 95%;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA GURU</th>
                    <th>NAMA KELAS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($walikelas_list as $walikelas)
                <tr>
                    <td> {{ $walikelas->id }} </td>
                    <td> 
                        {{ 
                            !empty($walikelas->gurumigration->id) ?
                            $walikelas->gurumigration->nama_guru : '-'
                        }} 
                    </td>
                    <td> 
                        {{ 
                            !empty($walikelas->kelasmigration->id) ?
                            $walikelas->kelasmigration->nama_kelas : '-'
                        }} 
                    </td>
                    <td>
                        <a href="{{ url('detailwalikelas'.$walikelas->id) }}" class="btn btn-success text-white" style="padding: 6px; font-size: 13px;">DETAIL</a>
                        <a href="{{ url('editwalikelas'.$walikelas->id)}}" class="btn btn-warning text-white" style="padding: 6px; font-size: 13px;">EDIT</a>
                        <a href="{{ url('deletewalikelas'.$walikelas->id) }}" class="btn btn-danger" style="padding: 6px; font-size: 13px;" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">HAPUS</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h5>Jumlah Walikelas : {{$jumlah_walikelas}} </h5>
        <p style="border-top: 5px solid #333; width: 95%;"></p>
        <a href="{{ url('createwalikelas') }}" class="btn btn-primary">TAMBAH WALIKELAS</a>
        <a href="{{ url('walikelasmodel/cetak_pdf') }}" class="btn btn-info" style="width: 200px;">CETAK PDF</a>
        <a href="{{ url('walikelasmodel/cetak_excel') }}" class="btn btn-success" style="width: 200px;">CETAK EXCEL</a>
        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        @else
            <p class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; text-decoration: none; width: 95%;">Tidak ada data walikelas</p>
            <p style="border-top: 5px solid #333; width: 95%;"></p>
            <a href="{{ url('createwalikelas') }}" class="btn btn-primary">TAMBAH WALIKELAS</a>
            <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        @endif
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop