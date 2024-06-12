<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

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
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('project_images', 'public');
            $data['image'] = $path;

        }
    
        Project::create($data);
    
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

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

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $path = $request->file('image')->store('project_images', 'public');
            $data['image'] = $path;
            // Debugging path
            // dd($data['image']);
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}