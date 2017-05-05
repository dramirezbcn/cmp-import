<?php

namespace Domain\Video\Model;

/**
 * Class Video
 */
class Video
{
    const FLUB = 'flub', GLORF = 'glorf';

    /** @var  int */
    private $id;

    /** @var string */
    private $name;

    /** @var  array */
    private $labels;

    /** @var  string */
    private $url;

    /** @var  \DateTime */
    private $createdAt;

    /** @var  \DateTime */
    private $updatedAt;

    /**
     * Video constructor.
     * @param string $name
     * @param string $url
     * @param array|null $labels
     */
    public function __construct(string $name, string $url, array $labels = null)
    {
        $this->name = $name;
        $this->labels = $labels;
        $this->url = $url;
        $this->createdAt = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array|null
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return Video
     */
    public function setUpdatedAt(\DateTime $updatedAt): Video
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName() . '; Url: ' . $this->getUrl() . '; Labels: ' . (null !== $this->getLabels() ? implode(', ', $this->getLabels()) : '');
    }
}