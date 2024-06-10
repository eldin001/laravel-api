@extends('layouts.admin')

@section('content')
<div class="box">
<section id="content">
    <h1 class="projects ps-5">Projects</h1>
    <div class="mb-3 ps-5">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea Nuovo Progetto</a>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">TITLE</th>
                <th scope="col">SLUG</th>
                <th scope="col">IMAGE</th>
                <th scope="col">TYPE</th> <!-- Nuova colonna per la tipologia -->
                <th scope="col">CREATED AT</th>
                <th scope="col">UPDATED AT</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->slug }}</td>
                <td>
                    @if ($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" style="width: 100px; height: auto;">
                    @endif
                </td>
                <td>{{ $project->type ? $project->type->name : 'N/A' }}</td> <!-- Mostra la tipologia correttamente -->
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->updated_at }}</td>
                <td class="final">
                    <div class="view">
                        <a href="{{ route('admin.projects.show', $project->id) }}"><i class="fa-solid fa-eye" style="color: #63E6BE;"></i></a>
                    </div>
                    <div class="edit">
                        <a href="{{ route('admin.projects.edit', $project->id) }}"><i class="fa-solid fa-pen-to-square" style="color: #74C0FC;"></i></a>
                    </div>
                    <div class="delete">
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Sei sicuro di voler cancellare questo progetto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border:none; background:none;"><i class="fa-solid fa-trash" style="color: #ff0000;"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
</div>
@endsection