<?php

namespace Magium\Magento2\AzureAD\Model;


class Auth
{
    protected $activeDirectory;

    public function __construct(
        ActiveDirectory $activeDirectory
    )
    {
        $this->activeDirectory = $activeDirectory;
    }

    public function beforeIsLoggedIn()
    {
        $this->activeDirectory->authenticate();
    }

}
