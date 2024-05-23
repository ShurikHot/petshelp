<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendNewsJob;
use App\Models\User;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    public function send()
    {
        $news = $_POST['news'];
        $users = User::query()->where('subscribe', 1)->get();
        foreach ($users as $user) {
            SendNewsJob::dispatch($user, $news);
        }
        return redirect()->route('news.index');
    }
}
