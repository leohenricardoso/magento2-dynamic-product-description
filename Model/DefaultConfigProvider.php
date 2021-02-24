<?php

/**
 * @author Leonardo Henrique Cardoso
 * @copyright Copyright (c) 2021 Leonardo Henrique Cardoso (https://leohenrique.me)
 * @package LeonardoHenrique_DynamicProductDescription
 */

namespace LeonardoHenrique\DynamicProductDescription\Model;

use LeonardoHenrique\DynamicProductDescription\Helper\ConfigPaths;
use LeonardoHenrique\Core\Helper\Utils;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class DefaultConfigProvider implements ConfigProviderInterface
{

    protected $utils;

    public function __construct(
        Utils $utils
    ) {
        $this->utils = $utils;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return [
            'module_enable' => $this->utils
                ->getConfigValue(ConfigPaths::ENABLED) == '1',
            'element_name' => $this->utils
                ->getConfigValue(ConfigPaths::ELEMENT_NAME),
            'element_name_enable' => $this->utils
                ->getConfigValue(ConfigPaths::ELEMENT_NAME_ENABLE) == '1',
            'element_description' => $this->utils
                ->getConfigValue(ConfigPaths::ELEMENT_DESCRIPTION),
            'element_description_enable' => $this->utils
                ->getConfigValue(ConfigPaths::ELEMENT_DESCRIPTION_ENABLE) == '1',
            'element_short_description' => $this->utils
                ->getConfigValue(ConfigPaths::ELEMENT_SHORT_DESCRIPTION),
            'element_short_description_enable' => $this->utils
                ->getConfigValue(ConfigPaths::ELEMENT_SHORT_DESCRIPTION_ENABLE) == '1',
        ];
    }
}
