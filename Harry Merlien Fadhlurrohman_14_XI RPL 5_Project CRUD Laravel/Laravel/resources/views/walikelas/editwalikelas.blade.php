@extends('tempardex')

@section('main')
@if(Session::has('user'))
    <div id="walikelas" align="center">
        <h2>EDIT WALIKELAS</h2>

        @if(!empty($halaman))
            <h3>{{ $halaman }}</h3>
        @endif

        <p style="margin-top: 17px; border-top: 5px solid #333; width: 95%;"></p>

        <form action="{{ url('updatewalikelas'.$walikelas->id) }}" method="post" align="left" style="width: 35%;" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id" class="control-label">ID</label>
                <input type="number" name="id" class="form-control" value="{{$walikelas->id}}" readonly required>
            </div>

            <div class="form-group" align="left">
                <label for="id_guru" class="control-label">NAMA GURU</label>
                @if(!empty($guru_list))
                <select class="form-control" name="id_guru" required>
                    @foreach($guru_awal as $guru)
                        <option value="{{$guru->id}}">
                            {{$guru->nama_guru}}
                        </option>
                    @endforeach
                    @foreach($guru_lain as $guru)
                        <option value="{{$guru->id}}">
                            {{$guru->nama_guru}}
                        </option>
                    @endforeach
                </select>
                @endif
            </div>

            <div class="form-group" align="left">
                <label for="id_kelas" class="control-label">NAMA KELAS</label>
                @if(!empty($kelas_list))
                <select class="form-control" name="id_kelas" required>
                    @foreach($kelas_awal as $kelas)
                        <option value="{{$kelas->id}}">
                            {{$kelas->nama_kelas}}
                        </option>
                    @endforeach
                    @foreach($kelas_lain as $kelas)
                        <option value="{{$kelas->id}}">
                            {{$kelas->nama_kelas}}
                        </option>
                    @endforeach
                </select>
                @endif
            </div>


            <div align="center">
            <p style="border-top: 5px solid #333; width: 100%; width: 100%;"></p>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                <button type="reset" class="btn btn-warning text-white">RESET</button>
                <a href="{{ url('walikelasmodel') }}" class="btn btn-danger">CANCEL</a>
            <p style="margin-top: 17px; border-top: 5px solid #333; width: 100%;"></p>
            </div>
        </form>
    </div>
@else
    <div align="center">
        <a href="{{url('login')}}" align="center" class="btn btn-danger" style="width: 50%; margin-top: 200px;">ANDA BELUM LOGIN</a>
    </div>
@endif
@stop