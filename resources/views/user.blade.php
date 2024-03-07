
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
        </tr>
        <tr>
            <td>{{$data->user_id}}</td>
            <td>{{$data->username}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->level_id}}</td>
        </tr>
       </table>
    </body>
</html>