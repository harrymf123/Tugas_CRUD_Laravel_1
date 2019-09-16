@extends('tempardex')

@section('main')
@if(!Session::has('user'))
    <div id="login" align="center">
        <h2>TAMPILAN LOGIN</h2>

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        <div class="bg bg-primary text-white" align="center" style="width: 35%; padding: 5px;">
            @if(!empty($halaman))
                <h3>{{ $halaman }}</h3>
            @endif
        </div>

        <form action="{{URL::action('loginregistercontroller@masuk')}}" method="post" align="left" style="width: 35%;">
            @csrf

            @if(Session::has('msg'))
            <div align="center">
                <b class="text-success">{{ Session::get('msg') }}</b>
            </div>
            @endif

            @if(Session::has('error'))
            <div align="center">
                <b class="text-danger">{{ Session::get('error') }}</b>
            </div>
            @endif

            <div class="form-group">
                <label for="email" class="control-label">EMAIL</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password" class="control-label">PASSWORD</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <div align="center">
                <p style="border-top: 5px solid #333; width: 100%; width: 100%;"></p>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                    <button type="reset" class="btn btn-warning text-white">RESET</button>
                <p style="margin-top: 17px; border-top: 5px solid #333; width: 100%;"></p>
            </div>

            <div align="center">
                <a href="{{ url('register') }}" class="bg bg-info text-white" style="padding-top: 10px; padding-bottom: 10px; padding-left: 202px; padding-right: 202px; text-decoration: none;">REGISTER</a>
            </div>
        </form>
    </div>
@else
    <div align="center">
        <a href="{{url('homepage')}}" align="center" class="btn btn-success" style="width: 50%; margin-top: 200px;">ANDA TELAH LOGIN</a>
    </div>
@endif
@stop