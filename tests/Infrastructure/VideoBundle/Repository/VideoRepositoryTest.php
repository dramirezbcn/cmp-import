<?php

namespace Tests\Infrastructure\VideoBundle\Repository;

use Domain\Video\Model\Video;
use Infrastructure\VideoBundle\Repository\VideoRepository;

class VideoRepositoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var  VideoRepository */
    private $videoRepository;

    protected function setUp()
    {
        $this->videoRepository = new VideoRepository();
    }

    public function testRepositoryStore()
    {
        $storedVideo = $this->videoRepository->store(new Video('testName', 'testUrl', ['testLabel1']));

        self::assertInstanceOf(Video::class, $storedVideo);
        self::assertEquals($storedVideo->getName(), 'testName');
        self::assertEquals($storedVideo->getUrl(), 'testUrl');
        self::assertEquals($storedVideo->getLabels(), ['testLabel1']);
    }
}
