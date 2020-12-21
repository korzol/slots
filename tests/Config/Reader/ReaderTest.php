<?php
declare(strict_types=1);

namespace tests\Config\Reader;

use App\Config\Reader\Reader;
use InvalidArgumentException;
use \PHPUnit\Framework\TestCase;

class ReaderTest extends TestCase
{
    public function testRead(): void
    {
        $reader = new Reader('config.json');

        $this->assertIsString($reader->read());
    }

    public function testCanNotReadFile(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $reader = new Reader('wrong_file_name.json');

        $reader->read();
    }
}
