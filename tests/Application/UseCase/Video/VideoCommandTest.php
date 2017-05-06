<?php

namespace Tests\Application\UseCase\Video;

use Application\UseCase\Video\Request\CreateVideoRequest;
use Application\UseCase\Video\VideoCommand;
use Domain\Video\Model\Video;
use Infrastructure\VideoBundle\Factory\VideoFactory;
use Infrastructure\VideoBundle\Repository\DummyVideoRepository;

class VideoCommandTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Video */
    private $videoMock;

    /** @var  VideoCommand */
    private $videoCommand;

    protected function setUp()
    {
        $this->videoMock = \Mockery::mock(Video::class)
            ->shouldReceive('getName')
            ->andReturn('testName')
            ->shouldReceive('getUrl')
            ->andReturn('testUrl')
            ->shouldReceive('getLabels')
            ->andReturn(['testLabel1'])
            ->getMock();

        $videoFactoryMock = \Mockery::mock(VideoFactory::class)
            ->shouldReceive('create')
            ->andReturn($this->videoMock)
            ->once()
            ->getMock();

        $videoRepositoryMock = \Mockery::mock(DummyVideoRepository::class)
            ->shouldReceive('store')
            ->withArgs([$this->videoMock])
            ->andReturn($this->videoMock)
            ->once()
            ->getMock();

        $this->videoCommand = new VideoCommand($videoFactoryMock, $videoRepositoryMock);

    }

    public function testCommandCreate()
    {
        $storedVideo = $this->videoCommand->create(
            new CreateVideoRequest('testName', 'testUrl', ['testLabel1'])
        );

        self::assertInstanceOf(Video::class, $storedVideo);
        self::assertEquals($storedVideo->getName(), $this->videoMock->getName());
        self::assertEquals($storedVideo->getUrl(), $this->videoMock->getUrl());
        self::assertEquals($storedVideo->getLabels(), $this->videoMock->getLabels());

    }
}
