<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cust_title = ' - Список користувачів';
        $users = User::query()->with('pets')->paginate(5);
        return view('admin.users.index', compact('users', 'cust_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::query()->find($id);
        $cust_title = ' - Редагування користувача ' . $user->name;
        return view('admin.users.edit', compact('user', 'cust_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|max:255',
            'phone_number' => 'string|size:13',
        ]);
        $user = User::query()->find($id);
        if($request->favorites) {
            $request->favorites = str_replace(' ', '', $request->favorites);
            $request->favorites = explode(',', $request->favorites);
        }
        $user->pets()->sync($request->favorites);
        $user->update($request->all());
        $request->session()->flash('success', 'Інформація оновлена');

//        return redirect()->route('users.index'); // редирект на першу сторінку
        return redirect()->back(); // залишається на сторінці користувача
    }

    public function lock($id)
    {
        dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::query()->find($id);
        $user->pets()->sync([]);
        User::destroy($id);

        return redirect()->route('users.index')->with('success', 'Користувача видалено');
    }
}
