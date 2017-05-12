<?php

namespace Application\UseCase\Video;

use Domain\Video\Exception\VideoNotFoundException;
use Domain\Video\Model\Video;
use Domain\Video\Repository\VideoRepositoryInterface;

/**
 * Class VideoQuery
 * @package Application\UseCase\Video
 */
class VideoQuery
{
    /** @var VideoRepositoryInterface */
    private $videoRepository;

    /**
     * VideoQuery constructor.
     * @param VideoRepositoryInterface $videoRepository
     */
    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     * @param int $videoId
     * @return Video
     * @throws VideoNotFoundException
     */
    public function getVideo(int $videoId): Video
    {
        return $this->videoRepository->getVideo($videoId);
    }
}