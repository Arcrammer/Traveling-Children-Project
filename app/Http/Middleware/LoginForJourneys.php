<?php

namespace TravelingChildrenProject\Http\Middleware;

use Closure;
use Auth;

class LoginForJourneys {
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if (Auth::check()) {
      return $next($request);
    } else {
      $request->session()->flash('signin_needs_display', true);
      return redirect('/');
    }
  }
}
