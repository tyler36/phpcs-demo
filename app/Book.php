<?php

namespace App;

/**
 * Class Book.
 */
class Book
{
    /**
     * 本のタイトル。
     *
     * @var string
     */
    public string $title;

    /**
     * 本のタイトルを入手してください。
     *
     * @return string
     * 本のタイトル。
     */
    public function getTitle(): string
    {
        $foo = $foo ?? 1;

        return "updated ${this->title}";
    }
}
