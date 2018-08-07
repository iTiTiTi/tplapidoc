<?php
use PHPUnit\Framework\TestCase;

class MarkdownClassTest extends TestCase
{
    public function testBuildDoc()
    {
        \TplApidoc\TplApidoc::factory('MarkdownClass')
            ->setSrc(__DIR__.'/demo')
            ->setDst(__DIR__.'/demo/apidoc')
            ->doc();
        $this->assertTrue(true);
    }
}

