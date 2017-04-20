<?php

namespace Magium\Magento2\AzureAD\Model;

class Auth
{
    const CONFIG_ENABLED = 'magium/ad/enabled';

    protected $activeDirectory;

    public function __construct(
        ActiveDirectory $activeDirectory
    )
    {
        $this->activeDirectory = $activeDirectory;
    }

    public function beforeIsLoggedIn()
    {
        if ($this->activeDirectory->isEnabled()) {
            $this->activeDirectory->authenticate();
        }
    }

}
