<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Services\Twitter;
use App\Repositories\UserRepository;

// add (bind) a new resource to Laravel service container
// you can use singleton() if you only want to have one instance
/* app() -> bind('example', function () {
    return new \App\Example;
}); */

class PagesController extends Controller
{
    public function home(Twitter $twitter, UserRepository $users)
    {
        //dd(app(Filesystem::class));
        //dd(app('App\Example')); // a name of the class (auto-resolving)
        //dd(app('example')); // name of the resource in service container
        //dd(app('foo')); // name of the resource registered in the App Service Provider
        dd($twitter, $users);

        $tasks = [
            'Go to the store',
            'Go to the market',
            'Go to work',
        ];
        return view('welcome', [
            'tasks' => $tasks
        ]);
    }

    public function contact()
    {
        return view('contact');
    }
    
    public function about()
    {
        return view('about');
    }
    
}
