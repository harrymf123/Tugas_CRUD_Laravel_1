@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="walikelas" align="center">
        <h2>DETAIL WALIKELAS</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        @if(!empty($walikelas->gurumigration->image_guru))
            <div id="image_guru" class="img-box" style="background-color: #3d62e0; width: 49.9%;">
                <img src="{{ asset('images_guru/'.$walikelas->gurumigration->image_guru) }}" style="background-color: white; margin: 10px; border-radius: 50%; width: 300px; height: 300px; border: 7px double black;" title="Gambar.{{ $walikelas->gurumigration->nama_guru }}">
            </div>
            <div class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; width: 49.9%; margin: 15px; text-transform: uppercase;">HALO {{$walikelas->gurumigration->nama_guru}}</div>
        @else
            <div id="image_guru" class="img-box" style="background-color: #e83737; width: 49.9%;">
                @if($walikelas->gurumigration->jenis_kelamin == "L")
                    <img src="{{ asset('images_guru/default1.png') }}" style="background-color: white; margin: 10px; border-radius: 50%; width: 300px; height: 300px; border: 7px double black;" title="Gambar Kosong">
                @elseif($walikelas->gurumigration->jenis_kelamin == "P")
                    <img src="{{ asset('images_guru/default2.png') }}" style="background-color: white; margin: 10px; border-radius: 50%; width: 300px; height: 300px; border: 7px double black;" title="Gambar Kosong">
                @endif
            </div>
            <div class="bg bg-danger text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; width: 49.9%; margin: 15px;">GAMBAR ANDA KOSONG</div>
        @endif

        <table class="table table-bordered table-hover border-black" style="width: 50%;">
            <tr>
                <th>ID</th>
                <td>{{ $walikelas->id }}</td>
            </tr>
            <tr>
                <th>NAMA GURU</th>
                <td>{{ $walikelas->gurumigration->nama_guru }}</td>
            </tr>
            <tr>
                <th>NAMA KELAS</th>
                <td>{{ $walikelas->kelasmigration->nama_kelas }}</td>
            </tr>
            <tr>
                <th>CREATED AT</th>
                <td>{{ $walikelas->created_at }}</td>
            </tr>
            <tr>
                <th>UPDATED AT</th>
                <td>{{ $walikelas->updated_at }}</td>
            </tr>
        </table>
        <p style="border-top: 5px solid #333; width: 50%;"></p>
                <a href="{{ url('editwalikelas'.$walikelas->id) }}" class="btn btn-warning text-white" style="width: 90px;">EDIT</a>
                <a href="{{ url('walikelasmodel') }}" class="btn btn-danger">CANCEL</a>
        <p style="margin-top: 17px; border-top: 5px solid #333; width: 50%;"></p>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop