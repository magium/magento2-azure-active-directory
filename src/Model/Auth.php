<?php

namespace Magium\Magento2\AzureAD\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Auth
{
    const CONFIG_ENABLED = 'magium/ad/enabled';

    protected $activeDirectory;
    protected $config;

    public function __construct(
        ActiveDirectory $activeDirectory,
        ScopeConfigInterface $config
    )
    {
        $this->activeDirectory = $activeDirectory;
        $this->config = $config;
    }

    public function beforeIsLoggedIn()
    {
        if ($this->activeDirectory->isEnabled()) {
            $this->activeDirectory->setReturnUrl(
                $this->config->getValue()
            );
            $this->activeDirectory->authenticate();
        }
    }

}
