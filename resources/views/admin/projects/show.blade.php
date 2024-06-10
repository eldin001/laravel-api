@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-light">Dettagli del Progetto</h1>
    <div class="card">
        <div class="card-header">
            {{ $project->title }}
        </div>
        <div class="card-body">
            @if ($project->image)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width: 100%; height: auto;">
                </div>
            @endif
            <h5 class="card-title">Slug: {{ $project->slug }}</h5>
            <p class="card-text">Creato il: {{ $project->created_at }}</p>
            <p class="card-text">Aggiornato il: {{ $project->updated_at }}</p>
            <p class="card-text">Tipologia: {{ $project->type ? $project->type->name : 'N/A' }}</p>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Torna indietro</a>
        </div>
    </div>
</div>
@endsection