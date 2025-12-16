<?php

namespace App\Enums;

interface StatusEnumInterface
{
    // musi obsahovat metody: getTitle(), getIcon(), getCssClass()
    public function getTitle(): string;
    public function getIcon(): string;
    public function getCssClass(): string;
}
