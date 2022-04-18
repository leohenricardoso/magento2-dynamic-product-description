<?php
/**
 * @author Leonardo Henrique Cardoso <leohenricardoso@gmail.com>
 * @copyright Copyright (c) 2020 Leonardo Henrique Cardoso
 * @package LeonardoHenrique_DynamicProductDescription
 */
namespace LeonardoHenrique\DynamicProductDescription\Helper;

use Magento\Framework\App\Helper\Context;
use Laminas\Log\Logger as LaminasLogger;
use Laminas\Log\Writer\Stream;

class Logger
{

    /**
     * Log
     * @param string $data
     * @return void
     */
    public static function info($data, $logName = false): void
    {
        $logName = !$logName ? 'info' : $logName;
        $writer = new Stream(BP . '/var/log/' . $logName . '.log');
        $logger = new LaminasLogger();
        $logger->addWriter($writer);
        $logger->info(json_encode($data, JSON_PRETTY_PRINT));
    }
}
