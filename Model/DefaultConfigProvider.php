<?php
/**
 * @author Leonardo Henrique Cardoso <leohenricardoso@gmail.com>
 * @copyright Copyright (c) 2020 Leonardo Henrique Cardoso
 * @package LeonardoHenrique_DynamicProductDescription
 */
namespace LeonardoHenrique\DynamicProductDescription\Model;

use LeonardoHenrique\DynamicProductDescription\Helper\Config as ConfigHelper;

/**
 *
 */
class DefaultConfigProvider implements ConfigProviderInterface
{

    /**
     * @var ConfigHelper
     */
    protected $configHelper;

    /**
     * @param ConfigHelper $configHelper
     */
    public function __construct(
        ConfigHelper $configHelper
    )
    {
        $this->configHelper = $configHelper;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return [
            'module_enable' => $this->configHelper
                    ->getConfigValue(ConfigHelper::ENABLED) == '1',
            'element_name' => $this->configHelper
                ->getConfigValue(ConfigHelper::ELEMENT_NAME),
            'element_name_enable' => $this->configHelper
                    ->getConfigValue(ConfigHelper::ELEMENT_NAME_ENABLE) == '1',
            'element_description' => $this->configHelper
                ->getConfigValue(ConfigHelper::ELEMENT_DESCRIPTION),
            'element_description_enable' => $this->configHelper
                    ->getConfigValue(ConfigHelper::ELEMENT_DESCRIPTION_ENABLE) == '1',
            'element_short_description' => $this->configHelper
                ->getConfigValue(ConfigHelper::ELEMENT_SHORT_DESCRIPTION),
            'element_short_description_enable' => $this->configHelper
                    ->getConfigValue(ConfigHelper::ELEMENT_SHORT_DESCRIPTION_ENABLE) == '1',
        ];
    }
}
