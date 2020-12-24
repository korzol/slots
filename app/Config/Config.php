<?php
declare(strict_types=1);

namespace App\Config;

use App\Config\Decoder\Decoder;
use App\Config\Reader\Reader;
use Exception;

class Config implements ConfigInterface
{
    /**
     * @var array{
     *     array{
     *         id: int,
     *         type: string
     *     }
     * }
     */
    private array $tiles;

    /**
     * @var array<int, array<int>>
     */
    private array $reels;

    /**
     * @var array<array<int>>
     */
    private array $lines;

    /**
     * @var array<int>
     */
    private array $pays;

    /**
     * @param string $file
     * @return self
     */
    public static function create(string $file): self
    {
        $reader = new Reader($file);
        $decoder = new Decoder();

        try {
            $configJson = $reader->read();

            $config = $decoder->decode($configJson);

            return new self(
                $config['tiles'],
                $config['reels'][0],
                $config['lines'],
                $config['pays']
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Config constructor.
     * @param array{
     *     array{
     *         id: int,
     *         type: string
     *     }
     * } $tiles
     * @param array<int> $reels
     * @param array<array<int>> $lines
     * @param array<int> $pays
     */
    public function __construct(array $tiles, array $reels, array $lines, array $pays)
    {
        $this->tiles = $tiles;

        $this->reels = $reels;

        $this->lines = $lines;

        $this->pays = $pays;
    }

    /**
     * @inheritDoc
     */
    public function getTiles(): array
    {
        return $this->tiles;
    }

    /**
     * @inheritDoc
     */
    public function getReels(): array
    {
        return $this->reels;
    }

    /**
     * @inheritDoc
     */
    public function getLines(): array
    {
        return $this->lines;
    }

    /**
     * @inheritDoc
     */
    public function getPays(): array
    {
        return $this->pays;
    }
}
