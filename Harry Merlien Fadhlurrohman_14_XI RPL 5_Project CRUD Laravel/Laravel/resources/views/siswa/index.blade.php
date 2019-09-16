@extends('tempardex')

@section('main')
@if(Session::has('user'))
    @if(Session::has('msg'))
        <b class="text-success" align="center">{{ Session::get('msg') }}</b>
    @endif
    <div id="siswa" align="center">
        <h2>SISWA</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        
        @if(!empty($siswa))
        <table class="table table-bordered table-hover text-center" style="width:95%;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA SISWA</th>
                    <th>USIA</th>
                    <th>KELAS</th>
                    <th>HOBI</th>
                </tr>
            </thead>
            <tbody>
                <?php $a=1; $i=0; foreach($siswa as $anak): ?>
                <tr>
                    <?php
                        echo "
                            <td>
                                $a
                            </td>
                            <td> $anak </td>
                            <td> $usia[$i] </td>
                            <td> $kelas[$i] </td>
                            <td> $hobi[$i] </td>
                            ";
                        $a++;
                        $i++;
                    ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        @else
            <p>Tidak ada data siswa</p>
        @endif
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop