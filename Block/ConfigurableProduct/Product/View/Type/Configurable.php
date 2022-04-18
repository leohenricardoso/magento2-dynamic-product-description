<?php
/**
 * @author Leonardo Henrique Cardoso <leohenricardoso@gmail.com>
 * @copyright Copyright (c) 2020 Leonardo Henrique Cardoso
 * @package LeonardoHenrique_DynamicProductDescription
 */

namespace LeonardoHenrique\DynamicProductDescription\Block\ConfigurableProduct\Product\View\Type;

use Magento\Framework\Json\EncoderInterface;
use Magento\Framework\Json\DecoderInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\ConfigurableProduct\Block\Product\View\Type\Configurable as ConfigurableType;
use LeonardoHenrique\DynamicProductDescription\Helper\Logger;

/**
 *
 */
class Configurable
{
    /**
     * @var EncoderInterface
     */
    protected $jsonEncoder;

    /**
     * @var DecoderInterface
     */
    protected $jsonDecoder;

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param EncoderInterface $jsonEncoder
     * @param DecoderInterface $jsonDecoder
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        EncoderInterface           $jsonEncoder,
        DecoderInterface           $jsonDecoder
    )
    {
        $this->jsonDecoder = $jsonDecoder;
        $this->jsonEncoder = $jsonEncoder;
        $this->productRepository = $productRepository;
    }

    /**
     * @param $id
     * @return \Magento\Catalog\Api\Data\ProductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }

    /**
     * @param ConfigurableType $subject
     * @param \Closure $proceed
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function aroundGetJsonConfig(
        ConfigurableType $subject,
        \Closure         $proceed
    )
    {
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
            Logger::info(self::class . ' => ' . $e->getMessage(), 'exception');
            throw $e;
        }
    }
}
