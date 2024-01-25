@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Aggiungi un nuovo progetto:</h2>

        @include('admin.projects.partials.btn_indietro')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3" style="max-height: 250px">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" style="max-height: 250px" id="title" name="title" value="{{ old('title') }}">
            </div>
            
            <div class="mb-3">
                <label for="img" class="form-label">Immagine: </label>
                <input type="file" name="img" id="img" class="form-control">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" id="content" rows="3" name="content">{{ old('content') }}</textarea>
            </div>      
            
            <button class="btn btn-success" type="submit">Salva</button>

        </form>
    </div>
@endsection