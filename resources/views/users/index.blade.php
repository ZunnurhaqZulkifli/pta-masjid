@extends('app')

@section('content')
    <div>
        <h1>Users</h1>
        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection