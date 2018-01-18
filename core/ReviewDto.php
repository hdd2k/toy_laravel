<?php


namespace Core;


class ReviewDto
{
    private $content;

    public function __construct(string $content = null)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}