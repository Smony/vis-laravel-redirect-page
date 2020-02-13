<?php

namespace Vis\LaravelRedirectPage\Middleware;

use Closure;

class VisRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $redirect = app('vis.redirect.model')
            ->findRedirectPage($this->getPath($request));

        if (!$redirect && $request->getQueryString()) {
            $path = $request->path() . '?' . $request->getQueryString();
            $redirect = app('vis.redirect.model')->findRedirectPage($path);
        }

        if ($redirect && $redirect->exists) {
            return redirect($redirect->new_url, $redirect->status);
        }

        return $next($request);
    }

    /**
     * @param $request
     * @return string
     */
    protected function getPath($request): string
    {
        return (empty($request->getQueryString())) ? $request->path() : $request->path() . '?' . $request->getQueryString();
    }
}
