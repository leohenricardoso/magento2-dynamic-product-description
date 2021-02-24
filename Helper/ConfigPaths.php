<?php

/**
 * @author Leonardo Henrique Cardoso
 * @copyright Copyright (c) 2021 Leonardo Henrique Cardoso (https://leohenrique.me)
 * @package LeonardoHenrique_DynamicProductDescription
 */

namespace LeonardoHenrique\DynamicProductDescription\Helper;

class ConfigPaths
{
    const BASE_CONFIG = 'dynamic_product_description_config';
    const ENABLED = self::BASE_CONFIG . '/general/active';
    const ELEMENT_NAME_ENABLE = self::BASE_CONFIG . '/frontend_settings/active_element_name';
    const ELEMENT_NAME = self::BASE_CONFIG . '/frontend_settings/element_id_name';
    const ELEMENT_DESCRIPTION = self::BASE_CONFIG . '/frontend_settings/element_id_description';
    const ELEMENT_DESCRIPTION_ENABLE = self::BASE_CONFIG . '/frontend_settings/active_element_description';
    const ELEMENT_SHORT_DESCRIPTION = self::BASE_CONFIG . '/frontend_settings/element_id_short_description';
    const ELEMENT_SHORT_DESCRIPTION_ENABLE = self::BASE_CONFIG . '/frontend_settings/active_element_short_description';
}
