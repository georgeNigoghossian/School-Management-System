<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class AdminAuthenticated
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
//      * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//      */
//     public function handle(Request $request, Closure $next)
//     {
//         if( Auth::check() )
//         {
//             // if user is not admin take him to his dashboard
//             if (Auth::user()->isTeacher() ) {
//                  return view('hompage');
//             }

//             if (Auth::user()->isStudent()){
//                 return view('hompage');
//             }
//             if (Auth::user()->isAdmin() ) {
//                  return $next($request);
//             }
//         }

//         //abort(404);  // for other user throw 404 error
//     }
// }
