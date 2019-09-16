@extends('tempadex')

@section('main')
@if(Session::has('user'))
    <div id="siswa" align="center">
        <h2>SISWA</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        <br>

        @if(!empty($siswa_list))
        <table class="table table-bordered table-hover text-center" style="width: 95%;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NISN</th>
                    <th>NAMA SISWA</th>
                    <th>KELAS</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JENIS KELAMIN</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach($siswa_list as $siswa)
                <tr>
                    <td> {{ $siswa->id }} </td>
                    <td> {{ $siswa->nisn }} </td>
                    <td> {{ $siswa->nama_siswa }} </td>
                    <td> 
                        {{ !empty($siswa->kelasmigration->id) ?
                            $siswa->kelasmigration->nama_kelas : '-'
                        }}
                    </td>
                    <td> {{ $siswa->tanggal_lahir }} </td>
                    <td> {{ $siswa->jenis_kelamin }} </td>
                    <?php $i++; ?>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p style="border-top: 5px solid #333; width: 95%;"></p>
        @else
            <p class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; text-decoration: none; width: 95%;">Tidak ada data siswa</p>
        @endif
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop