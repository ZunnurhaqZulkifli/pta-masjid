@extends('app')

@section('content')
    <div>
        <h1>Senarai Pengguna</h1>

        <div class="form-group mb-3">
            <label class="form-label"> User Attributes </label>
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="user_search" id="user_search" class="form-control" placeholder="Ali Bin Sifulan">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-sm btn-outline-primary w-100">Submit</button>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr class="">
                    <td scope="">ID</td>
                    <td class="" colspan="2">Nama</td>
                    <td class="">Emel</td>
                    <td class="">Username</td>
                    <td class="">Nombor Telefon</td>
                    <td class="">Nric</td>
                    <td class="">Dijana Pada</td>
                    {{-- <td class="" colspan="2"></td> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="">
                        <th scope="row">{{ $user->id }}</th>
                        <td class="" colspan="2">{{ $user->name }}</td>
                        <td class="">{{ $user->email }}</td>
                        <td class="">{{ $user->username }}</td>
                        <td class="">{{ $user->phone_number }}</td>
                        <td class="">{{ $user->identification_number }}</td>
                        <td class="">{{ $user->created_at }}</td>
                        {{-- <td class="" colspan="2">
                            <a href="{{ route('users.show', ['user' => $user->id])}}" class="btn btn-sm btn-outline-warning">Show</a>
                            <a href="{{ route('users.edit', ['user' => $user->id])}}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="{{ route('users.destroy', ['user' => $user->id])}}" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="" class="">
            {{ $users->links() }}
        </a>
    </div>
@endsection
