<?php
use PHPUnit\Framework\TestCase;

class MarkdownMethodTest extends TestCase
{
    public function testBuildDoc()
    {
        \TplApidoc\TplApidoc::factory('MarkdownMethod')
            ->setSrc(__DIR__.'/demo/DemoMethod.php')
            ->setDst(__DIR__.'/demo/apidoc/')
            ->doc();
        $this->assertTrue(true);
    }
}

