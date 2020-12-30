<?php

declare(strict_types=1);

namespace Endroid\QrCode\Label\Font;

use Endroid\QrCode\Exception\QrCodeException;

final class Font implements FontInterface
{
    /** @var string */
    private $path;

    /** @var int */
    private $size;

    public function __construct(string $path, int $size)
    {
        $this->validatePath($path);

        $this->path = $path;
        $this->size = $size;
    }

    private function validatePath(string $path): void
    {
        if (!file_exists($path)) {
            throw new QrCodeException(sprintf('Invalid font path "%s"', $path));
        }
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
