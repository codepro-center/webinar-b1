<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $filePath = $request->file('image')->store('skills', 'public');

        $skill = Skill::create([
            'name' => $request->name,
            'image' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Skill berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $skill = Skill::find($request->id);

        if (!$skill) {
            return response()->json([
                'status' => 'error',
                'message' => 'Skill not found',
            ], 404);
        }

        if ($request->hasFile('image')) {
            if ($skill->image) {
                Storage::disk('public')->delete($skill->image);
            }

            $filePath = $request->file('image')->store('skills', 'public');
            $skill->image = $filePath;
        }

        $skill->name = $request->name;
        $skill->save();

        return redirect()->back()->with('success', 'Skill berhasil diperbarui');
    }

    public function delete($id)
    {
        $skill = Skill::find($id);

        if (!$skill) {
            return response()->json([
                'status' => 'error',
                'message' => 'Skill not found',
            ], 404);
        }

        if ($skill->image) {
            Storage::disk('public')->delete($skill->image);
        }

        $skill->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Skill berhasil dihapus',
        ], 200);
    }
}
