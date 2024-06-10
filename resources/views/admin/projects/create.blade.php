@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-light">Crea Nuovo Progetto</h1>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="text-light" for="title">Titolo del Progetto</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="text-light" for="slug">Slug del Progetto</label>
            <input type="text" name="slug" id="slug" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image" class="form-label text-light">Image</label>
            <input type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" id="uploadImage" name="image" value="{{ old('image') }}" maxlength="255">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="text-light" for="content">Contenuto del Progetto</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label class="text-light" for="type_id">Tipologia del Progetto</label>
            <select name="type_id" id="type_id" class="form-control">
                <option value="">Seleziona Tipologia</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Salva</button>
    </form>
</div>
@endsection