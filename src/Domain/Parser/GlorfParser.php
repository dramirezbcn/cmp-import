<?php

namespace Domain\Parser;

use Domain\Video\Factory\VideoFactoryInterface;
use Domain\Video\Model\Video;

/**
 * Class GlorfParser
 */
class GlorfParser implements ParserInterface
{
    /** @var  string  */
    private $filePath;

    /** @var  VideoFactoryInterface */
    private $videoFactory;

    /**
     * GlorfParser constructor.
     * @param VideoFactoryInterface $videoFactory
     * @param string $filePath
     */
    public function __construct(VideoFactoryInterface $videoFactory, string $filePath)
    {
        $this->videoFactory = $videoFactory;
        $this->filePath = $filePath;
    }

    /**
     * @return Video[]
     */
    public function parse(): array
    {
        $content = file_get_contents($this->filePath);
        /** @var array $json */
        $json = json_decode($content, true);

        /** @var Video[] $videos */
        $videos = array();

        /** @var Video $video */
        foreach ($json['videos'] as $video) {
            $videos[] = $this->videoFactory->create(
                $video['title'],
                $video['url'],
                $video['tags'] ?? null
            );
        }

        return $videos;
    }

}