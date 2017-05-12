<?php

namespace Infrastructure\VideoBundle\Factory;

use Domain\Video\Model\Video;
use Domain\Video\Factory\VideoFactoryInterface;

/**
 * Class VideoFactory
 * @package Infrastructure\VideoBundle\Factory
 */
class VideoFactory implements VideoFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(string $name, string $url, array $labels = null): Video
    {
        return new Video($name, $url, $labels);
    }
}