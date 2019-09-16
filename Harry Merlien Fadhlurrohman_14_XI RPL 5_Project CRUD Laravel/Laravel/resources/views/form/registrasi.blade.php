@extends('temregistrasi')

@section('main')
    <div id="registrasi" align="center">
        <h2>FORM REGISTRASI</h2>
        <form action="">
        <table border="0" style="center;font-weight: bold;" cellpadding="10">

            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text"></td>
            </tr>

            <tr>
                <td>NISN</td>
                <td>:</td>
                <td><input type="text"></td>
            </tr>

            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input type="text"></td>
            </tr>

            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="" id="">
                        <option value="">***SELECT JURUSAN***</option>
                        <option value="">RPL</option>
                        <option value="">TKJ</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="radio" name="gender">Laki-Laki
                    <input type="radio" name="gender">Perempuan
                </td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <textarea cols="22" rows="3" ></textarea>
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email"></td>
            </tr>

            <tr>
                <td>No Hp</td>
                <td>:</td>
                <td><input type="number"></td>
            </tr>

            <tr>
                <td>Kota</td>
                <td>:</td>
                <td>
                    <select>
                        <option>*****SELECT KOTA******</option>
                        <option>Bogor</option>
                        <option>Jakarta</option>
                        <option>Bekasi</option>
                        <option>Tangerang</option>
                        <option>Depok</option>
                        <option>Gresik</option>
                        <option>Banten</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" name="submit" value="Simpan"/>
                    <button type="reset" name="button">Batal</button>
                </td>
            </tr>

            </table>
        </form>
        
    </div>
@stop

@section('footer')
    <div id="footer" align="center">
        <p>&copy; 2019 Belajar Laravel With Mr. Harry</p>
    </div>
@stop
