<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function update_hero(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'hero_text' => 'required|string|max:500',
            'hero_image' => 'nullable|max:5120', // Max 5MB image file
            'wa_link' => 'required|url',
        ];

        $validatedData = $request->validate($rules);

        // Ambil semua data yang bisa diedit dalam request ini
        $contents = Content::whereIn('key', array_keys($validatedData))->get();
        foreach ($contents as $content) {
            if ($content->key === 'hero_image' && $request->hasFile('hero_image')) {
                $filePath = $request->file('hero_image')->store('images', 'public');
                if ($content->value) {
                    Storage::disk('public')->delete($content->value);
                }
                $content->value = $filePath;
            } else {
                $content->value = $validatedData[$content->key];
            }
            $content->save();
        }

        return redirect()->back()->with('success', 'Section hero berhasil diperbarui');
    }

    public function update_about(Request $request)
    {
        $rules = [
            'about_title' => 'required|string|max:255',
            'self_description' => 'required|string|max:1000',
            'about_image' => 'nullable|image|max:5120', // Max 5MB
            'self_resume' => 'nullable|mimes:pdf|max:5120', // Max 5MB
        ];

        $messages = [
            'about_title.required' => 'Kolom profesi wajib diisi.',
            'about_title.string' => 'Profesi harus berupa teks.',
            'about_title.max' => 'Profesi maksimal terdiri dari 255 karakter.',

            'self_description.required' => 'Kolom teks deskripsi wajib diisi.',
            'self_description.string' => 'Deskripsi harus berupa teks.',
            'self_description.max' => 'Deskripsi maksimal terdiri dari 1000 karakter.',

            'about_image.image' => 'File yang diunggah harus berupa gambar.',
            'about_image.max' => 'Gambar maksimal berukuran 5MB.',

            'self_resume.mimes' => 'Resume harus berupa file berformat PDF',
            'self_resume.max' => 'Resume maksimal berukuran 5MB.',
        ];

        $validatedData = $request->validate($rules, $messages);


        // Ambil semua data yang bisa diedit dalam request ini
        $contents = Content::whereIn('key', array_keys($validatedData))->get();
        foreach ($contents as $content) {
            if ($content->type === 'file' && $request->hasFile($content->key)) {
                $storage = $content->key == 'self_resume' ? 'resumes' : 'images';
                $filePath = $request->file($content->key)->store($storage, 'public');

                // Hapus file lama kalau ada nilainya
                if ($content->value) {
                    Storage::disk('public')->delete($content->value);
                }
                $content->value = $filePath;
            } else {
                $content->value = $validatedData[$content->key];
            }
            $content->save();
        }

        return redirect()->back()->with('success', 'Section about berhasil diperbarui');
    }
}
