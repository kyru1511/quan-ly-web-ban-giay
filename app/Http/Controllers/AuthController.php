<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // 1. Hiển thị form đăng nhập
    public function login()
    {
        // Nếu đã đăng nhập rồi thì chuyển hướng dựa trên vai trò
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role >= 1) { // 1=nhân viên, 2=admin
                return redirect()->route('admin.dashboard');
            } else {
                return redirect('/');
            }
        }
        return view('login');
    }

    // 2. Xử lý khi bấm nút Đăng nhập
    public function postLogin(Request $request)
    {
        // Kiểm tra dữ liệu nhập
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Thử đăng nhập (Auth::attempt sẽ tự động so sánh email và mật khẩu đã mã hóa)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role >= 1) { // 1=nhân viên, 2=admin
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
            } else {
                return redirect('/')->with('success', 'Đăng nhập thành công!');
            }
        }

        // Đăng nhập thất bại
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ]);
    }

    // 3. Hiển thị form đăng ký
    public function register()
    {
        return view('register');
    }

    // 4. Xử lý đăng ký
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 0, // Mặc định là khách hàng
        ]);

        // Không tự động đăng nhập sau đăng ký
        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    // 5. Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Bạn đã đăng xuất khỏi hệ thống.');
    }
}