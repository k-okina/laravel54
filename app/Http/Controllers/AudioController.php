<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class AudioController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('audios.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {
        $files = $request->file('files');
        $paths = [];

        foreach ($files as $file) {
            $paths[] = $file->store('public/audio');
        }

        $tag = '';
        foreach ($paths as $path) {
            $tag .= $this->audio($path) . '<br>';
        }
        return $tag;
    }

    public function audio($src)
    {
        return '<figure><audio controls preload="auto" style="cursor:pointer;width:100%;background-color:#8b0;color:#fff;">
                    <source src=' . asset($src) . '>
                </audio ></figure>';
    }
}
