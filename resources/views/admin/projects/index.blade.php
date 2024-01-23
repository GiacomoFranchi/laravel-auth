@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Lista dei Progetti</h2>

        <div class="text-end">
            <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Aggiungi Progetto</a>
        </div>

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Data</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"
                                class="btn btn-primary">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>

                            <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                                <i class="fa-solid fa-pencil"></i>
                              </a>

                            <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" class="d-inline-block" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-delete" type="submit" data-title="{{ $project->title }}">
                                  <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('admin.partials.delete-modal')
    </div>
@endsection
