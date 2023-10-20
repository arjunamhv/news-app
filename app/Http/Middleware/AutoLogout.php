<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AutoLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    if (Auth::check()) {
        // Set waktu inaktif yang diinginkan (15 menit).
        $inactiveTimeout = 15; // dalam menit

        // Ambil waktu terakhir aktivitas pengguna.
        $lastActivity = session('last_activity');

        if (time() - $lastActivity > $inactiveTimeout * 60) {
            Auth::logout();
            return redirect('/login')->with('message', 'Anda telah otomatis keluar karena tidak ada aktivitas selama ' . $inactiveTimeout . ' menit.');
        }

        // Perbarui waktu aktivitas terakhir.
        session(['last_activity' => time()]);
    }

    return $next($request);
}
    
}
