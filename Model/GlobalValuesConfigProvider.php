<?php
/**
 * @author Leonardo Henrique Cardoso <leohenricardoso@gmail.com>
 * @copyright Copyright (c) 2020 Leonardo Henrique Cardoso
 * @package LeonardoHenrique_DynamicProductDescription
 */
namespace LeonardoHenrique\DynamicProductDescription\Model;

/**
 *
 */
class GlobalValuesConfigProvider implements ConfigProviderInterface
{
    /**
     * @var array
     */
    private $configProviders;

    /**
     * @param array $configProviders
     */
    public function __construct(
        array $configProviders
    )
    {
        $this->configProviders = $configProviders;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        $config = [];
        foreach ($this->configProviders as $configProvider) {
            $config = array_merge_recursive($config, $configProvider->getConfig());
        }
        return $config;
    }
}
