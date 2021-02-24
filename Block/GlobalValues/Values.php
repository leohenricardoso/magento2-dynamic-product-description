<?php
/**
 * @author Leonardo Henrique Cardoso
 * @copyright Copyright (c) 2021 Leonardo Henrique Cardoso (https://leohenrique.me)
 * @package LeonardoHenrique_DynamicProductDescription
 */
namespace LeonardoHenrique\DynamicProductDescription\Block\GlobalValues;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use LeonardoHenrique\DynamicProductDescription\Model\GlobalValuesConfigProvider;

class Values extends Template
{

    protected $globalValuesConfigProvider;

    public function __construct(
        Context $context,
        GlobalValuesConfigProvider $globalValuesConfigProvider
    ) {
        $this->globalValuesConfigProvider = $globalValuesConfigProvider;
        parent::__construct($context);
    }

    public function getGlobalConfig()
    {
        return $this->globalValuesConfigProvider->getConfig();
    }
}
