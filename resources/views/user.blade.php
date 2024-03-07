
<!DOCTYPE html>
<html>
    <head>
        <title>Data User</title>
    </head>
    <body>
       <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Nama</td>
            <td>ID level pengguna</td>
            {{-- <td>Tindakan</td> --}}
            <td>Kode Level</td>
            <td>Nama Level</td>
        </tr>
       @foreach ($data as $d )
    <tr>
        <td>{{$d->user_id}}</td>
        <td>{{$d->username}}</td>
        <td>{{$d->nama}}</td>
        <td>{{$d->level_id}}</td>
        <td>{{$d->level->level_kode}}</td>
        <td>{{$d->level->level_nama}}</td>

        <td><a href="{{ url('/user/ubah/' . $d->user_id) }}">Ubah</a> | <a href="{{ url('/user/hapus/' . $d->user_id) }}">Hapus</a></td>    </tr>           
       @endforeach
       </table>
       <h2><a href="user/tambah/"> + Tambahkan User</a></h2>
    </body>
</html>