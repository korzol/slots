<?php
declare(strict_types=1);

namespace App\Config\Reader;

use Exception;
use InvalidArgumentException;

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
        if ($this->isFileExists($file) && $this->isFileReadable($file)) {
            $this->file = $file;
        }
    }

    /**
     * @param string $file
     * @return bool
     * @throws InvalidArgumentException
     */
    private function isFileReadable(string $file): bool
    {
        if (is_readable($file))
        {
            return true;
        }

        throw new InvalidArgumentException("File is not readable");
    }

    /**
     * @param string $file
     * @return bool
     * @throws InvalidArgumentException
     */
    private function isFileExists(string $file): bool
    {
        if (file_exists($file)) {
            return true;
        }

        throw new InvalidArgumentException("File doesn't exist");
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function read(): string
    {
        $json = file_get_contents($this->file);

        if($json)
        {
            return $json;
        }

        throw new Exception("Couldn't read configuration file");
    }
}
