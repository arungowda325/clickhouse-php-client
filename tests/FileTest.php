<?php

namespace Wolverine\ClickhouseClient;

use PHPUnit\Framework\TestCase;
use Wolverine\ClickhouseClient\Common\File;

/**
 * @covers \Wolverine\ClickhouseClient\Common\AbstractFile
 * @covers \Wolverine\ClickhouseClient\Common\File
 */
class FileTest extends TestCase
{
    public function testFile()
    {
        $fileName = tempnam(sys_get_temp_dir(), 'tbchc_');
        $fileContent = [];
        $result = [];

        for ($i = 0; $i < 100; $i++) {
            $fileContent[] = $i.PHP_EOL;

            $result[] = $i.PHP_EOL;
        }

        $result = implode('', $result);

        file_put_contents($fileName, implode('', $fileContent));

        $file = new File($fileName);
        $stream = $file->open(false);

        $this->assertEquals($result, $stream->getContents(), 'Correctly reads content from file without encoding');

        unlink($fileName);
    }

    public function testFileWithGzip()
    {
        $fileName = tempnam(sys_get_temp_dir(), 'tbchc_');
        $fileContent = [];
        $result = [];

        for ($i = 0; $i < 100; $i++) {
            $fileContent[] = $i.PHP_EOL;

            $result[] = $i.PHP_EOL;
        }

        $result = implode('', $result);

        file_put_contents($fileName, implode('', $fileContent));

        $file = new File($fileName);
        $stream = $file->open();

        $this->assertEquals($result, gzdecode($stream->getContents()), 'Correctly reads content from file with encoding');

        unlink($fileName);
    }
}
