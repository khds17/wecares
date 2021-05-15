<?php

namespace Illuminate\Foundation\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath($url)
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo($url);
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }
}
