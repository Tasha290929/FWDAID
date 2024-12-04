<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }


    public function review()
    {
        $reviews = new Contact();
        return view('review', ['reviews'=>$reviews->all()]);
      
      
    }

    public function review_check(Request $request)
    {
        $valid = $request->validate([
            'email' => 'bail|required|min:4|max:100',
            'subject' => 'required|min:4|max:255',
            'message' => 'required|min:15|max:1000'
        ]);


        $review = new Contact();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('review');
    }

public function singin(){
    $singin=new Contact();
    return view('singin', ['singin'=>$singin->all()]);
}

    public function singin_check(Request $request)
    {
        // Проверка входных данных
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Попытка аутентификации
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Аутентификация успешна
            return redirect()->intended('/')->with('success', 'Вы успешно вошли!');
        }
    
        // Аутентификация не удалась
        return back()->withErrors([
            'email' => 'Неверный email или пароль.',
        ])->withInput($request->only('email'));
    }
    

    public function register(){
        $register=new Contact();
        return view('register', ['register'=>$register->all()]);
    }
    public function register_check(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
    
        // Создание нового пользователя
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
    
        // Авторизация пользователя после регистрации (опционально)
        auth()->login($user);
    
        // Перенаправление на главную страницу
        return redirect('/')->with('success', 'Registration successful! You are now signed in.');
    }
    public function logout(Request $request)
{
    Auth::logout();

    // Очистка сессии
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('success', 'You have been logged out.');
}
}
