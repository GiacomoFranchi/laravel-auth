@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Modifica Dati Progetto</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-6 mb-5">


            <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" class="form-control" id="title" name="title" 
                    value="{{ old('title', $project->title) }}">
                </div>

                <div class="mb-3">
                    <label for="created_at" class="form-label">Creato il:</label>
                    <input type="date" class="form-control" id="created_at" name="created_at" value="{{old('created_at', $project->created_at)}}">
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Descrizione:</label>
                    <textarea class="form-control" id="content" rows="3" name="content">{{old('content', $project->content)}}</textarea>
                </div>

                <button class="btn btn-success" type="submit">Modifica</button>
               
            </form>
        </div>
    </div>
</div>


@endsection