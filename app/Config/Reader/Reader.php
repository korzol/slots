<?php
declare(strict_types=1);

namespace App\Config\Reader;

use Exception;

class Reader implements ReaderInterface
{
    /**
     * @var string
     */
    private string $file;

    /**
     * Reader constructor.
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function read(): array
    {
        $json = file_get_contents($this->file);

        if($json)
        {
            return json_decode($json, true);
        }

        throw new Exception("Couldn't read configuration file");
    }
}
