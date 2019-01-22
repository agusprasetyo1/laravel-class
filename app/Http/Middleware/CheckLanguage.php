<?php

namespace App\Http\Middleware;

use Closure;

class CheckLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Mendapatkan input language dari user bedasarkan querystring ?lang=id
        $language = $request->query('lang');

        //set default lokalisasi
			app()->setlocale($language);

			//Melanjutkan request
        return $next($request);
    }
}
