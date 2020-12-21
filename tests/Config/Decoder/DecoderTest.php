<?php
declare(strict_types=1);

namespace tests\Config\Decoder;

use App\Config\Decoder\Decoder;
use InvalidArgumentException;
use \PHPUnit\Framework\TestCase;

class DecoderTest extends TestCase
{
    public function testCanDecode(): void
    {
        $json = '{
            "tiles": [
                { "id": 1,  "type": "normal"},
                { "id": 2,  "type": "normal"},
                { "id": 3,  "type": "normal"},
                { "id": 4,  "type": "normal"},
                { "id": 5,  "type": "normal"},
                { "id": 6,  "type": "normal"},
                { "id": 7,  "type": "normal"},
                { "id": 8,  "type": "normal"},
                { "id": 9,  "type": "normal"},
                { "id": 10, "type": "mystery"}
            ]
        }';

        $this->assertIsArray(Decoder::decode($json));
    }

    public function testCanNotDecode(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $badJson = '{
            \'tiles\': [
                { "id": 1,  "type": "normal"},
                { "id": 2,  "type": "normal"},
                { "id": 3,  "type": "normal"},
                { "id": 4,  "type": "normal"},
                { "id": 5,  "type": "normal"},
                { "id": 6,  "type": "normal"},
                { "id": 7,  "type": "normal"},
                { "id": 8,  "type": "normal"},
                { "id": 9,  "type": "normal"},
                { "id": 10, "type": "mystery"}
            ]
        }';

        Decoder::decode($badJson);
    }
}
