@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="guru" align="center">
        <h2>DETAIL GURU</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        @if(!empty($guru->image_guru))
            <div id="image_guru" class="img-box" style="background-color: #3d62e0; width: 49.9%;">
                <img src="{{ $guru->getImageGuru() }}" style="background-color: white; margin: 10px; border-radius: 50%; width: 300px; height: 300px; border: 7px double black;" title="Gambar.{{ $guru->nama_guru }}">
            </div>
            <div class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; width: 49.9%; margin: 15px; text-transform: uppercase;">HALO {{$guru->nama_guru}}</div>
        @else
            <div id="image_guru" class="img-box" style="background-color: #e83737; width: 49.9%;">
                <img src="{{ $guru->getImageGuru() }}" style="background-color: white; margin: 10px; border-radius: 50%; width: 300px; height: 300px; border: 7px double black;" title="Gambar.{{ $guru->nama_guru }}">
            </div>
            <div class="bg bg-danger text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; width: 49.9%; margin: 15px;">GAMBAR ANDA KOSONG</div>
        @endif

        <table class="table table-bordered table-hover border-black" style="width: 50%;">
            <tr>
                <th>ID</th>
                <td>{{ $guru->id }}</td>
            </tr>
            <tr>
                <th>NIP</th>
                <td>{{ $guru->nip }}</td>
            </tr>
            <tr>
                <th>NAMA GURU</th>
                <td>{{ $guru->nama_guru }}</td>
            </tr>
            <tr>
                <th>TANGGAL LAHIR</th>
                <td>{{ $guru->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>JENIS KELAMIN</th>
                <td>{{ $guru->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>CREATED AT</th>
                <td>{{ $guru->created_at }}</td>
            </tr>
            <tr>
                <th>UPDATED AT</th>
                <td>{{ $guru->updated_at }}</td>
            </tr>
        </table>
        <p style="border-top: 5px solid #333; width: 50%;"></p>
                <a href="{{ url('editguru'.$guru->id) }}" class="btn btn-warning text-white" style="width: 90px;">EDIT</a>
                <a href="{{ url('gurumodel') }}" class="btn btn-danger">CANCEL</a>
        <p style="margin-top: 17px; border-top: 5px solid #333; width: 50%;"></p>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop