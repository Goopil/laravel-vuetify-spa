<?php

namespace Tests\Browser\Pages;

class Home extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/en/home';
    }

    /**
     * Click on the log out link.
     *
     * @param \Laravel\Dusk\Browser $browser
     *
     * @return void
     */
    public function clickLogout($browser)
    {
        $browser
            ->element('@user-menu')
            ->getLocationOnScreenOnceScrolledIntoView();

        $browser
            ->click('@user-menu')
            ->press('@logout')
            ->pause(300);
    }
}
