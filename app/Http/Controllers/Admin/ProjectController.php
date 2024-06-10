<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Visualizza tutti i progetti
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    // Visualizza il form di creazione di un progetto
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    // Salva un nuovo progetto nel database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'nullable|string|max:255',
            'image' => 'nullable|image',
            'type_id' => 'nullable|exists:types,id',
        ]);

        $data = $request->all();
        $data['slug'] = Project::generateSlug($data['title']);

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    // Visualizza il dettaglio di un progetto
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    // Visualizza il form di modifica di un progetto
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    // Aggiorna un progetto esistente nel database
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'nullable|string|max:255',
            'image' => 'nullable|image',
            'type_id' => 'nullable|exists:types,id',
        ]);

        $data = $request->all();
        if ($data['title'] !== $project->title) {
            $data['slug'] = Project::generateSlug($data['title']);
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    // Elimina un progetto dal database
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}