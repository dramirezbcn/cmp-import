<?php

namespace Infrastructure\VideoBundle\Repository;

use Domain\Video\Model\Video;
use Domain\Video\Repository\VideoRepositoryInterface;

/**
 * Class DummyVideoRepository
 * @package Infrastructure\VideoBundle\Repository
 */
class DummyVideoRepository implements VideoRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function store(Video $video): Video
    {
        echo 'Importing: ' . $video . "\n";

        return $video;
    }

    /**
     * @inheritDoc
     */
    public function getVideo(int $videoId)
    {
        //TODO
    }
}