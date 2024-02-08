<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('success', 'Реєстрація успішна');
        Auth::login($user);
        return redirect()->route('home');
    }

    public function loginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (
            Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            ])
        ) {
            session()->flash('success', 'Ви успішно авторизовані');
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }
        }
        return redirect()->back()->with('error', 'Неправильний логін чи пароль');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.create');
    }

    public static function account($item)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $user->pets;
            switch ($item) {
                case 'favorite':
                    return view('front.favorite', ['user' => $user, 'cust_title' => ' :: Улюбленці']);
                default:
                    return view('front.account', ['user' => $user, 'cust_title' => ' :: Аккаунт']);
            }
        }
        return redirect()->route('login');
    }

    public static function addFavorite($pet_id)
    {
        $user = Auth::user();
        $fav = $user->pets->pluck('id')->toArray();
        if (!in_array($pet_id, $fav)) {
            $fav[] = $pet_id;
            $user->pets()->sync($fav);
            return response()->json(['message' => 'success']);
        }
    }

    public static function remFavorite($pet_id)
    {
        $user = Auth::user();
        $fav = $user->pets->pluck('id')->toArray();
        $rem = array_search($pet_id, $fav);
        unset($fav[$rem]);
        $user->pets()->sync($fav);
        return response()->json(['message' => 'success']);
    }
}
