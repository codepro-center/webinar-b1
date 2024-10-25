<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        $allContents = Content::all();
        $contents = [];
        foreach ($allContents as $content) {
            $contents[$content->key] = $content->data;
        }

        if (isset($contents['hero_text'])) {
            $contents['real_hero_text'] = $contents['hero_text'];
            $contents['hero_text'] = str_replace('{name}', $contents['name'], $contents['hero_text']);
            $profesion = "<span id='profesion' class='text-primary'>{$contents['profesion']}</span>";
            $contents['hero_text'] = str_replace('{profesion}', $profesion, $contents['hero_text']);
        }
        $data['contents'] = $contents;

        $data['skills'] = Skill::all();
        $data['projects'] = Project::all();
        $data['socmeds'] = SocialMedia::getAll();

        return view('app', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'password.required' => 'Password harus diisi',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember_me') && $request->remember_me === 'on';

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/')->with('success', 'Anda berhasil login');
        } else {
            return redirect()->back()
                ->withInput($request->except('password'))
                ->withErrors(['login_error' => 'Email atau kata sandi salah']);
        }
    }
}
