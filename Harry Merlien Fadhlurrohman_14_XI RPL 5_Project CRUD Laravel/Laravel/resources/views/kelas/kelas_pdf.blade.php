@extends('tempadex')

@section('main')
@if(Session::has('user'))
    <div id="kelas" align="center">
        <h2>KELAS</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        <br>

        @if(!empty($kelas_list))
        <table class="table table-bordered table-hover text-center" style="width: 95%;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA KELAS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas_list as $kelas)
                <tr>
                    <td> {{ $kelas->id }} </td>
                    <td> {{ $kelas->nama_kelas }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p style="border-top: 5px solid #333; width: 95%;"></p>
        @else
            <p class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; text-decoration: none; width: 95%;">Tidak ada data kelas</p>
        @endif
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop