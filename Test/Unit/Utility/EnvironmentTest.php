<?php declare(strict_types=1);

namespace Test\Unit\Utility;

use function App\Utility\setupEnv;
use PHPUnit\Framework\TestCase;

final class EnvironmentTest extends TestCase
{
    public function testEnvironmentIsCreated()
    {
        setupEnv(__DIR__.'/Fixtures/', '.env.foo');
        $this->assertSame(getenv('FOO'), 'bar');
    }
}
