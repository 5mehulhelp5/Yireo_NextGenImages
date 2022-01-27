<?php declare(strict_types=1);

namespace Yireo\NextGenImages\Image;

use Magento\Framework\ObjectManagerInterface;
use Yireo\NextGenImages\Util\UrlConvertor;

class ImageFactory
{
    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * @var UrlConvertor
     */
    private $urlConvertor;

    /**
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        UrlConvertor $urlConvertor
    ) {
        $this->objectManager = $objectManager;
        $this->urlConvertor = $urlConvertor;
    }

    /**
     * @param string $path
     * @return Image
     */
    public function createFromPath(string $path): Image
    {
        return $this->objectManager->create(Image::class, ['path' => $path]);
    }

    /**
     * @param string $url
     * @return Image
     */
    public function createFromUrl(string $url): Image
    {
        $path = $this->urlConvertor->getFilenameFromUrl($url);
        return $this->objectManager->create(Image::class, ['path' => $path]);
    }
}