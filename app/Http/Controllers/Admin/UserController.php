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
        $customTitle = ' :: Список користувачів';
        $users = User::query()->with('pets')->paginate(5);
        return view('admin.users.index', compact('users', 'customTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        $customTitle = ' :: Редагування користувача ' . $user->name;
        return view('admin.users.edit', compact('user', 'customTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|max:255',
            'phone_number' => 'string|size:13',
        ]);
        if ($request->favorites) {
            $request->favorites = str_replace(' ', '', $request->favorites);
            $request->favorites = explode(',', $request->favorites);
            $user->pets()->sync($request->favorites);
        }
        $user->update($request->all());
        $request->session()->flash('success', 'Інформація оновлена');
//        return redirect()->route('users.index'); // редирект на першу сторінку
        return redirect()->back(); // залишається на сторінці користувача
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->pets()->sync([]);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Користувача видалено');
    }

    /*public function lock(User $user)
    {
        dd(__METHOD__);
    }*/
}
