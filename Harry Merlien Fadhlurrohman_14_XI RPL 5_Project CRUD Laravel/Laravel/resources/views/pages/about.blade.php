@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="about" align="center">
        <h2>About Ini</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        
        <p> 
            Sistem ini dibuat sebagai latihan <br>
            untuk mempelajari dasar Laravel. <br><br>
            Sistem ini dibuat sebagai latihan <br>
            untuk mempelajari dasar Laravel. <br><br>
            Sistem ini dibuat sebagai latihan <br>
            untuk mempelajari dasar Laravel. <br><br>
            Sistem ini dibuat sebagai latihan <br>
            untuk mempelajari dasar Laravel. <br><br>
            Sistem ini dibuat sebagai latihan <br>
            untuk mempelajari dasar Laravel. <br><br>
            Sistem ini dibuat sebagai latihan <br>
            untuk mempelajari dasar Laravel. <br><br>
        </p>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop