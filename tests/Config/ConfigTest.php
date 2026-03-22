<?php

namespace EdenProject\MyWay\Tests\Config;

use EdenProject\MyWay\Config\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    private string $testFile = 'test-config';
    private string $fullPath;

    protected function setUp(): void
    {
        $this->fullPath = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $this->testFile . '.json';
        if (file_exists($this->fullPath)) {
            unlink($this->fullPath);
        }
    }

    protected function tearDown(): void
    {
        if (file_exists($this->fullPath)) {
            unlink($this->fullPath);
        }
    }

    public function testReadWriteConfig(): void
    {
        $config = new Config($this->testFile);
        $config->set('key1', 'value1');
        $config->set('key2', ['a', 'b', 'c']);
        $config->save();

        $this->assertFileExists($this->fullPath);

        $newConfig = new Config($this->testFile);
        $this->assertEquals('value1', $newConfig->get('key1'));
        $this->assertEquals(['a', 'b', 'c'], $newConfig->get('key2'));
    }

    public function testDefaultValue(): void
    {
        $config = new Config($this->testFile);
        $this->assertEquals('default', $config->get('non-existent', 'default'));
    }

    public function testRemove(): void
    {
        $config = new Config($this->testFile);
        $config->set('to_remove', 'value');
        $config->remove('to_remove');
        $this->assertNull($config->get('to_remove'));
    }
}
