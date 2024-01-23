@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$project->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Creato il: {{$project->created_at}}</h6>
                <h6 class="card-subtitle mb-2 text-muted">Slug: {{$project->slug}}</h6>
                <p class="card-text">Descrizione: {{$project->content}}</p>
            </div>
        </div>
        <a class="btn btn-primary my-2" href="{{ route('admin.projects.index') }}">Indietro</a>
    </div>
@endsection
