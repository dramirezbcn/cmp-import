<?php

namespace Application\UseCase\Video;

use Application\UseCase\Video\Request\CreateVideoRequest;
use Domain\Video\Factory\VideoFactoryInterface;
use Domain\Video\Model\Video;
use Domain\Video\Repository\VideoRepositoryInterface;

/**
 * Class VideoCommand
 * @package Application\UseCase\Video
 */
class VideoCommand
{
    /** @var VideoFactoryInterface */
    private $videoFactory;

    /** @var VideoRepositoryInterface */
    private $videoRepository;

    /**
     * VideoCommand constructor.
     * @param VideoFactoryInterface $videoFactory
     * @param VideoRepositoryInterface $videoRepository
     */
    public function __construct(VideoFactoryInterface $videoFactory, VideoRepositoryInterface $videoRepository)
    {
        $this->videoFactory = $videoFactory;
        $this->videoRepository = $videoRepository;
    }

    /**
     * @param CreateVideoRequest $createVideoRequest
     * @return Video
     */
    public function create(CreateVideoRequest $createVideoRequest): Video
    {
        $video = $this->videoFactory->create(
            $createVideoRequest->getName(),
            $createVideoRequest->getUrl(),
            $createVideoRequest->getLabels()
        );

        return $this->videoRepository->store($video);
    }

    /**
     * @param Video $video
     * @return Video
     */
    public function update(Video $video): Video
    {
        return $this->videoRepository->store($video);
    }

    /**
     * @param Video[] $videos
     */
    public function save(array $videos){
        foreach ($videos as $video){
            $this->videoRepository->store($video);
        }
    }
}