<?php

namespace Wolverine\ClickhouseClient\Interfaces;

use Psr\Http\Message\StreamInterface;

interface FileInterface
{
    public function open(bool $gzip = true): StreamInterface;
}
