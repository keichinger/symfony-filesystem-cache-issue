<?php declare(strict_types=1);

namespace App\Entity;

class SomeComplexData
{
    /**
     * @var string|null
     */
    private $foo;

    /**
     * @var string|null
     */
    private $bar;

    /**
     * @var string|null
     */
    private $hello;

    /**
     * @var string|null
     */
    private $world;

    /**
     * @return string|null
     */
    public function getFoo () : ?string
    {
        return $this->foo;
    }

    /**
     * @param string|null $foo
     */
    public function setFoo (?string $foo) : void
    {
        $this->foo = $foo;
    }

    /**
     * @return string|null
     */
    public function getBar () : ?string
    {
        return $this->bar;
    }

    /**
     * @param string|null $bar
     */
    public function setBar (?string $bar) : void
    {
        $this->bar = $bar;
    }

    /**
     * @return string|null
     */
    public function getHello () : ?string
    {
        return $this->hello;
    }

    /**
     * @param string|null $hello
     */
    public function setHello (?string $hello) : void
    {
        $this->hello = $hello;
    }

    /**
     * @return string|null
     */
    public function getWorld () : ?string
    {
        return $this->world;
    }

    /**
     * @param string|null $world
     */
    public function setWorld (?string $world) : void
    {
        $this->world = $world;
    }
}
