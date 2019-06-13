<?php

namespace App;

class Example
{
    protected $foo;

    // constructor being instantiated with $foo
    public function __construct(Foo $foo)
    {
        $this -> foo = $foo;
    }
}