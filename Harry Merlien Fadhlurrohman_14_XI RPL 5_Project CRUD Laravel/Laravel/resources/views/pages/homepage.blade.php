@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="homepage" align="center">
        <h2>Homepage</h2>
        
        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>
        
        <div align="center" style="margin-bottom: 20px;">
            @if(Session::has('psn'))
                <b class="bg bg-success text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; text-decoration: none;">{{ Session::get('psn') }}</b>
            @endif
        </div>

        <p>
            Selamat Belajar Laravel. <br><br> 
            Selamat Belajar Laravel. <br><br> 
            Selamat Belajar Laravel. <br><br> 
            Selamat Belajar Laravel. <br><br> 
            Selamat Belajar Laravel. <br><br> 
            Selamat Belajar Laravel. <br><br> 
            Selamat Belajar Laravel. <br><br> 
            Selamat Belajar Laravel. <br><br> 
            Selamat Belajar Laravel. <br><br>
        </p>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop