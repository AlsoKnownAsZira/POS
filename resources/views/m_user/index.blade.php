@extends('m_user/template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-between mb-4">
        <div class="col-md-6">
            <h2 class="mb-0">CRUD User</h2>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-primary" href="{{ route('m_user.create') }}">Tambahkan pengguna</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Level ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($useri as $m_user)
            <tr>
                <td>{{ $m_user->user_id }}</td>
                <td>{{ $m_user->level_id }}</td>
                <td>{{ $m_user->username }}</td>
                <td>{{ $m_user->nama }}</td>
                <td>{{ $m_user->password }}</td>
                <td>
                    <form action="{{ route('m_user.destroy',$m_user->user_id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('m_user.show',$m_user->user_id) }}">Tampilkan</a>
                        <br>
                        <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit',$m_user->user_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection