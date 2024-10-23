@extends('app')

@section('content')
    <div>
        <h1>Senarai Project</h1>

        <div class="form-group mb-3">
            <label class="form-label"> Project Attributes </label>
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="project_search" id="project_search" class="form-control" placeholder="@projects">
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
                    <td class="" colspan="2">Pegawai</td>
                    <td class="" colspan="2">Nama Project</td>
                    <td class="">Target Bayaran</td>
                    <td class="">Gambar</td>
                    <td class="">Video</td>
                    <td class="">Status</td>
                    <td class="">Dijana Pada</td>
                    <td class="" colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr class="">
                        <th scope="row">{{ $project->id }}</th>
                        <td class="" colspan="2">{{ $project->user->name }}</td>
                        <td class="" colspan="2">{{ $project->name }}</td>
                        <td class="">{{'RM ' . $project->target_amount}}</td>
                        <td class="">{{ $project->image }}</td>
                        <td class="">{{ $project->video }}</td>
                        <td class="">{{ $project->status }}</td>
                        <td class="">{{ $project->created_at }}</td>
                        <td class="" colspan="2">
                            <a href="{{ route('projects.show', ['project' => $project->id])}}" class="btn btn-sm btn-outline-warning">Show</a>
                            <a href="{{ route('projects.edit', ['project' => $project->id])}}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="{{ route('projects.destroy', ['project' => $project->id])}}" class="btn btn-sm btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <a href="" class="">
            {{ $projects->links() }}
        </a> --}}
    </div>
@endsection
