<?php

namespace Magium\Magento2\AzureAD\Model\Backend;

use Magento\Backend\Helper\Data;
use Magento\Framework\App\Cache\TypeListInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Value;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;

class DefaultUrl extends Value
{

    private $helper;

    public function __construct(
        Context $context,
        Registry $registry,
        ScopeConfigInterface $config,
        TypeListInterface $cacheTypeList,
        $resource = null,
        $resourceCollection = null,
        array $data = [],
        Data $helper = null
    )
    {
        $this->helper = $helper;
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }


    public function afterLoad()
    {
        if (!$this->getValue() && $this->helper instanceof Data) {
            $this->setValue($this->helper->getHomePageUrl());
        }
        return parent::afterLoad();
    }

}
