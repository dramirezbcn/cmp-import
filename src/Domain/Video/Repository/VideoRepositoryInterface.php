<?php

namespace Domain\Video\Repository;

use Domain\Video\Exception\VideoNotFoundException;
use Domain\Video\Model\Video;

/**
 * Class VideoRepositoryInterface
 * @package Domain\Video\Repository
 */
interface VideoRepositoryInterface
{
    /**
     * @param Video $video
     * @return Video
     */
    public function store(Video $video): Video;

    /**
     * @param int $videoId
     * @return Video|null
     * @throws VideoNotFoundException
     */
    public function getVideo(int $videoId);
}