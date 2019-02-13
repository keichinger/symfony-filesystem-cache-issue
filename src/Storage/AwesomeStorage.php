<?php declare(strict_types=1);

namespace App\Storage;

use App\Entity\SomeComplexData;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;

class AwesomeStorage
{
    private const CACHE_KEY = "something";

    /**
     * @var CacheItemPoolInterface
     */
    private $pool;

    /**
     * @var CacheItemInterface
     */
    private $item;

    /**
     * @param CacheItemPoolInterface $pool
     */
    public function __construct (CacheItemPoolInterface $pool)
    {
        $this->pool = $pool;
        $this->item = $pool->getItem(self::CACHE_KEY);
    }


    /**
     * Stores the cache.
     *
     * @param SomeComplexData $complexData
     *
     * @return bool
     */
    public function store (SomeComplexData $complexData) : bool
    {
        $this->item->set($complexData);

        return $this->pool->save($this->item);
    }


    /**
     * @return SomeComplexData|null
     * @throws \Exception
     */
    public function get () : ?SomeComplexData
    {
        if (!$this->item->isHit())
        {
            dump("Cache was not hit! No stored data found.");
        }

        return $this->item->get();
    }


    /**
     * @return bool
     */
    public function clear () : bool
    {
        return $this->pool->deleteItem(self::CACHE_KEY);
    }
}
