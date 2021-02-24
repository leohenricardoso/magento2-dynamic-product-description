<?php
/**
 * @author Leonardo Henrique Cardoso
 * @copyright Copyright (c) 2021 Leonardo Henrique Cardoso (https://leohenrique.me)
 * @package LeonardoHenrique_DynamicProductDescription
 */
namespace LeonardoHenrique\DynamicProductDescription\Model;

class GlobalValuesConfigProvider implements ConfigProviderInterface
{
    /**
     * @var ConfigProviderInterface[]
     */
    private $configProviders;

    /**
     * @param ConfigProviderInterface[] $configProviders
     * @codeCoverageIgnore
     */
    public function __construct(
        array $configProviders
    ) {
        $this->configProviders = $configProviders;
    }

    /**
     * {@inheritdoc}
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
