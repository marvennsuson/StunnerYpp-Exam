<?php

namespace App\Laravel\Middleware\System;
use Illuminate\Support\Facades\Auth;
use App\Laravel\Models\Music;
use Closure;

class ExistingSong
{
    public function handle($request, Closure $next)
    {
        $songs = Music::find($request->route('id'));

        if ($songs) {
            $request->merge([
                'categ_id' => $songs->categ_id,
                'user_id' => $songs->user_id,
                'title' => $songs->title,
                'artist' => $songs->artist,
                'lyrics' => $songs->lyrics,
                'status' => $songs->status,
            ]);

            return $next($request);
        }


        session()->flash('notification-status', 'error');
        session()->flash('notification-message', 'No Record Found');

        return redirect()->route('system.song.index');
    }
}
