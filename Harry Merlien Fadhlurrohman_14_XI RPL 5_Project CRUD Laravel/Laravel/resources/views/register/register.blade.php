@extends('tempardex')

@section('main')
    <div id="siswa" align="center">
        <h2>TAMPILAN REGISTRASI</h2>

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        <div class="bg bg-primary text-white" align="center" style="width: 35%; padding: 5px;">
            @if(!empty($halaman))
                <h3>{{ $halaman }}</h3>
            @endif
        </div>

        <form action="{{URL::action('loginregistercontroller@adduser')}}" method="post" align="left" style="width: 35%;">
            @csrf
            
            @if(Session::has('error'))
                <b class="text-danger" align="center">{{ Session::get('error') }}</b>
            @endif

            <div class="form-group">
                <label for="name" class="control-label">NAMA LENGKAP</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin" class="control-label">JENIS KELAMIN</label>
                
                <select class="form-control" name="gender" required>
                    <option value=""></option>
                    <option value="L">LAKI-LAKI</option>
                    <option value="P">PEREMPUAN</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email" class="control-label">EMAIL</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password" class="control-label">PASSWORD</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password" class="control-label">CONFIRM PASSWORD</label>
                <input type="password" name="cpassword" class="form-control" required>
            </div>

            <div align="center">
            <p style="border-top: 5px solid #333; width: 100%; width: 100%;"></p>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                <button type="reset" class="btn btn-warning text-white">RESET</button>
                <a href="{{ url('login') }}" class="btn btn-danger">CANCEL</a>
            <p style="margin-top: 17px; border-top: 5px solid #333; width: 100%;"></p>
            </div>
        </form>
    </div>
@stop