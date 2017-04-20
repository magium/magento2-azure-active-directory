<?php

namespace Magium\Magento2\AzureAD\Model;

class Auth
{

    protected $activeDirectory;
    protected $helper;

    public function __construct(
        ActiveDirectory $activeDirectory,
        \Magento\Backend\Helper\Data $helper
    )
    {
        $this->activeDirectory = $activeDirectory;
        $this->helper = $helper;
    }

    public function beforeIsLoggedIn()
    {
        if ($this->activeDirectory->isEnabled()) {
            $this->activeDirectory->setReturnUrl(
                $this->helper->getHomePageUrl()
            );
            $this->activeDirectory->authenticate();
        }
    }

}
