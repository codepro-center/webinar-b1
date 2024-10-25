<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $filePath = $request->file('image')->store('projects', 'public');
        $data['image'] = $filePath;
        Project::create($data);
        return redirect()->back()->with('success', 'Projek berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $project = Project::find($request->id);

        if (!$project) {
            abort(404);
        }

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }

            $filePath = $request->file('image')->store('projects', 'public');
            $project->image = $filePath;
        }

        $project->name = $request->name;
        $project->link = $request->link;
        $project->description = $request->description;
        $project->save();

        return redirect()->back()->with('success', 'Projek berhasil diperbarui');
    }

    public function delete($id)
    {
        $project = Project::find($id);

        if (!$project) {
            abort(404);
        }

        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Projek berhasil dihapus',
        ], 200);
    }
}
