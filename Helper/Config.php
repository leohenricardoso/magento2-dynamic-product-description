<?php

/**
 * @author Leonardo Henrique Cardoso
 * @copyright Copyright (c) 2021 Leonardo Henrique Cardoso
 * @package LeonardoHenrique_DynamicProductDescription
 */

namespace LeonardoHenrique\DynamicProductDescription\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

/**
 *
 */
class Config
{
    /**
     * string
     */
    const BASE_CONFIG = 'dynamic_product_description_config';

    /**
     * string
     */
    const ENABLED = self::BASE_CONFIG . '/general/active';

    /**
     * string
     */
    const ELEMENT_NAME_ENABLE = self::BASE_CONFIG . '/frontend_settings/active_element_name';

    /**
     * string
     */
    const ELEMENT_NAME = self::BASE_CONFIG . '/frontend_settings/element_id_name';

    /**
     * string
     */
    const ELEMENT_DESCRIPTION = self::BASE_CONFIG . '/frontend_settings/element_id_description';

    /**
     * string
     */
    const ELEMENT_DESCRIPTION_ENABLE = self::BASE_CONFIG . '/frontend_settings/active_element_description';

    /**
     * string
     */
    const ELEMENT_SHORT_DESCRIPTION = self::BASE_CONFIG . '/frontend_settings/element_id_short_description';

    /**
     * string
     */
    const ELEMENT_SHORT_DESCRIPTION_ENABLE = self::BASE_CONFIG . '/frontend_settings/active_element_short_description';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param $configPath
     * @param $storeId
     * @return mixed
     */
    public function getConfigValue($configPath, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $configPath,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
