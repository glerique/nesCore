<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;

final class IndexTest extends TestCase
{
    public function testIndexFileExists(): void
    {
        $indexPath = __DIR__ . '/../public/index.php';
        $this->assertFileExists($indexPath);
    }

    public function testIndexFileIsReadable(): void
    {
        $indexPath = __DIR__ . '/../public/index.php';
        $this->assertTrue(is_readable($indexPath));
    }

    public function testApplicationNamespace(): void
    {
        $this->assertStringStartsWith('App\\', __NAMESPACE__ . '\\');
    }
}
