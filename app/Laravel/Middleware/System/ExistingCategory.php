<?php

namespace App\Laravel\Middleware\System;
use App\Laravel\Models\Category;
use Closure;

class ExistingCategory
{
    public function handle($request,Closure $next)
    {
        $category = Category::find($request->route('id'));
        if($category)
        {
            $request->merge([
                'title' => $category->title,
                'status' => $category->status,
            ]);

            return $next($request);
        }


        session()->flash('notification-status','error');
        session()->flash('notification-message','No Record Found');

        return redirect()->route('system.category.index');
        
    }
}