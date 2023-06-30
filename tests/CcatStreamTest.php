<?php

namespace Wolverine\ClickhouseClient;

use function GuzzleHttp\Psr7\stream_for;
use PHPUnit\Framework\TestCase;
use Wolverine\ClickhouseClient\Support\CcatStream;

/**
 * @covers \Wolverine\ClickhouseClient\Support\CcatStream
 */
class CcatStreamTest extends TestCase
{
    public function testStreamSize()
    {
        $ccatStream = new CcatStream(stream_for('a'), '');

        $this->assertNull($ccatStream->getSize());
    }
}
