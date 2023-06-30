<?php

namespace Wolverine\ClickhouseClient;

use PHPUnit\Framework\TestCase;
use Wolverine\ClickhouseClient\Common\Sanitizer;

/**
 * @covers \Wolverine\ClickhouseClient\Common\Sanitizer
 */
class SanitizerTest extends TestCase
{
    public function testEscapeNumericValue()
    {
        $value = 1;
        $escaped = Sanitizer::escape($value);

        $this->assertEquals($value, $escaped);
    }

    public function testEscapeStringValue()
    {
        $value = "some-test with 'quotes'";
        $escaped = Sanitizer::escape($value);

        $this->assertEquals("'some-test with \'quotes\''", $escaped);

        $value = 'some-test with \'quotes\'';
        $escaped = Sanitizer::escape($value);

        $this->assertEquals("'some-test with \'quotes\''", $escaped);

        $value = 'some-test with / \slashes';
        $escaped = Sanitizer::escape($value);

        $this->assertEquals("'some-test with / \\\\slashes'", $escaped);
    }
}
