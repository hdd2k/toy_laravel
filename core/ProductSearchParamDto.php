<?php


namespace Core;


class ProductSearchParamDto
{
    private $name;
    private $size;
    private $page;

    public function __construct(
        string $name = null,
        int $size = null,
        int $page = null
    ) {
        $this->name = $name;
        $this->size = $size;
        $this->page = $page;
    }

    public function getName()
    {
        return $this->name;
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