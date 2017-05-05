<?php

namespace Domain\Video\Factory;

use Domain\Video\Model\Video;

/**
 * Interface VideoFactoryInterface
 * @package Domain\Video\Factory
 */
interface VideoFactoryInterface
{
    /**
     * @param string $name
     * @param string $url
     * @param array|null $labels
     * @return Video
     */
    public function create(string $name, string $url, array $labels = null): Video;
}
