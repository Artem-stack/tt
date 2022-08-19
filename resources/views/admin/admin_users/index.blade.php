@extends('layout.admin')

@section('title', 'Администраторы')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Администраторы</h3>

        <div class="mt-8">
            <a href="{{ route("admin.admin_users.create") }}" class="btn btn-primary">Create admin</a>
        </div>

        <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>
                    <div>{{ $user->name }}</div>
                </td>
                <td>
                    <div>{{ $user->email }}</div>
                </td>
                <td>
                    <form method="POST" action="{{ route("admin.admin_users.destroy", $user->id) }}">
                        <a type="button" class="btn btn-warning" href="{{ route("admin.admin_users.edit", $user->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection


