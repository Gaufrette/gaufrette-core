<?php

namespace Gaufrette\Core\File;

use Gaufrette\Core\File as FileInterface;

/**
 * A file abstraction
 *
 * @Package Gaufrette
 */
class File implements FileInterface
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $content
     */
    private $content;

    /**
     * @var string $size
     */
    private $size;

    /**
     * @var string $checksum
     */
    private $checksum;

    /**
     * @var string $mimetype
     */
    private $mimetype;

    /**
     * @var array $metadata
     */
    private $metadata;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name     = $name;
        $this->metadata = array();
    }

    /**
     * {@inheritdoc}
     */
    public function __clone()
    {
        return $this->duplicate($this->name);
    }

    /**
     * {@inheritdoc}
     */
    public function duplicate($name)
    {
        $clone = new self($name);
        $clone->setContent($this->content);
        $clone->setChecksum($this->checksum);
        $clone->setMetadata($this->metadata);
        $clone->setMimeType($this->mimetype);
        $clone->setSize($this->size);

        return $clone;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * {@inheritdoc}
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * {@inheritdoc}
     */
    public function setChecksum($checksum)
    {
        $this->checksum = $checksum;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMimeType()
    {
        return $this->mimetype;
    }

    /**
     * {@inheritdoc}
     */
    public function setMimeType($mimetype)
    {
        $this->mimetype = $mimetype;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMetadata($key = null)
    {
        if (null === $key) {

            return $this->metadata;
        }

        return array_key_exists($key, $this->metadata) ? $this->metadata[$key] : array();
    }
}