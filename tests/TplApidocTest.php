<?php
use PHPUnit\Framework\TestCase;

class TplApidocTest extends TestCase
{
    public function testBuildDoc()
    {
        \TplApidoc\TplApidoc::factory('markdown')
            ->setSrc(__DIR__.'/Demo.php')
            ->setDst(__DIR__)
            ->doc();
        $this->assertTrue(true);
    }
}

