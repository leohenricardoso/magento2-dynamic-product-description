<?php
/**
 * @author Leonardo Henrique Cardoso
 * @copyright Copyright (c) 2021 Leonardo Henrique Cardoso (https://leohenrique.me)
 * @package LeonardoHenrique_DynamicProductDescription
 */
namespace LeonardoHenrique\DynamicProductDescription\Model;

interface ConfigProviderInterface
{

    /**
     * Retrieve assoc array of checkout configuration
     *
     * @return array
     */
    public function getConfig();
}
