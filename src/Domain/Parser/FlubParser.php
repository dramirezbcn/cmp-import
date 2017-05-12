<?php

namespace Domain\Parser;

use Domain\Video\Factory\VideoFactoryInterface;
use Domain\Video\Model\Video;
use Symfony\Component\Yaml\Exception\ParseException;

/**
 * Class FlubParser
 */
class FlubParser implements ParserInterface
{
    /** @var  string  */
    private $filePath;

    /** @var  VideoFactoryInterface */
    private $videoFactory;

    /**
     * FlubParser constructor.
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
     * @throws ParseException
     */
    public function parse(): array
    {
        $ymlParser = new \Symfony\Component\Yaml\Parser();
        $content = file_get_contents($this->filePath);
        /** @var array $yml */
        $yml = $ymlParser->parse($content);

        /** @var Video[] $videos */
        $videos = array();

        foreach ($yml as $video) {
            $videos[] = $this->videoFactory->create(
                $video['name'],
                $video['url'],
                isset($video['labels']) ? explode(',', $video['labels']) : null
            );
        }

        return $videos;
    }
}