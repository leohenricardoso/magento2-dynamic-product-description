<?php
/**
 * @author Leonardo Henrique Cardoso
 * @copyright Copyright (c) 2021 Leonardo Henrique Cardoso (https://leohenrique.me)
 * @package LeonardoHenrique_DynamicProductDescription
 */
namespace LeonardoHenrique\DynamicProductDescription\Block\ConfigurableProduct\Product\View\Type;

use Magento\Framework\Json\EncoderInterface;
use Magento\Framework\Json\DecoderInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\ConfigurableProduct\Block\Product\View\Type\Configurable as ConfigurableType;
use LeonardoHenrique\Core\Helper\Logger;

class Configurable
{
    protected $jsonEncoder;
    protected $jsonDecoder;
    protected $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        EncoderInterface $jsonEncoder,
        DecoderInterface $jsonDecoder
    ) {
        $this->jsonDecoder = $jsonDecoder;
        $this->jsonEncoder = $jsonEncoder;
        $this->productRepository = $productRepository;
    }

    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function aroundGetJsonConfig(
        ConfigurableType $subject,
        \Closure $proceed
    ) {

        try {
            $name = [];
            $description = [];
            $shortDescription = [];

            $config = $proceed();
            $config = $this->jsonDecoder->decode($config);

            foreach ($subject->getAllowProducts() as $prod) {
                $id = $prod->getId();
                $product = $this->getProductById($id);
                $name[$id] = $product->getName();
                $description[$id] = $product->getDescription();
                $shortDescription[$id] = $product->getShortDescription();
            }
            $config['name'] = $name;
            $config['description'] = $description;
            $config['short_description'] = $shortDescription;

            return $this->jsonEncoder->encode($config);
        } catch (\Exception $e) {
            Logger::execute(self::class, $e->getMessage(), 'err');
            throw $e;
        }
    }
}
