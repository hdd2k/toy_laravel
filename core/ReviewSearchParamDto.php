<?php


namespace Core;


class ReviewSearchParamDto
{
    private $content;
    private $size;
    private $page;

    public function __construct(
        string $content = null,
        int $size = null,
        int $page = null
    ) {
        $this->content = $content;
        $this->size = $size;
        $this->page = $page;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getPage(): int
    {
        return $this->page;
    }
}