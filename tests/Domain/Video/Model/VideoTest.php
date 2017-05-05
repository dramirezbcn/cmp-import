<?php

namespace Tests\Domain\Video\Model;

use Domain\Video\Model\Video;

/**
 * Class VideoFactoryTest
 * @package Tests\Infrastructure\VideoBundle\Repository
 */
class VideoTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $createdVideo = new Video('testName', 'testUrl', ['testLabel1']);

        self::assertInstanceOf(Video::class, $createdVideo);
        self::assertEquals($createdVideo->getName(), 'testName');
        self::assertEquals($createdVideo->getUrl(), 'testUrl');
        self::assertEquals($createdVideo->getLabels(), ['testLabel1']);
    }

    public function testToString()
    {
        $createdVideo = new Video('test', 'test', ['test']);

        self::assertEquals($createdVideo, 'test; Url: test; Labels: test');
    }
}
