@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Lista dei Progetti</h2>

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
                          
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection