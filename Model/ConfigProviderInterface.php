<?php
/**
 * @author Leonardo Henrique Cardoso <leohenricardoso@gmail.com>
 * @copyright Copyright (c) 2020 Leonardo Henrique Cardoso
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
