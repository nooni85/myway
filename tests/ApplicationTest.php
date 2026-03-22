<?php

namespace EdenProject\MyWay\Tests;

use EdenProject\MyWay\Application;
use EdenProject\MyWay\Model\User;
use EdenProject\MyWay\Storage\KeyValueStorage;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    private KeyValueStorage $sessionStorage;
    private Application $app;

    protected function setUp(): void
    {
        $this->sessionStorage = $this->createMock(KeyValueStorage::class);
        $this->app = new Application();
        $this->app->SessionStorage = $this->sessionStorage;
    }

    public function testLogin(): void
    {
        $user = new User();
        $user->setId(1);

        $this->sessionStorage->expects($this->once())
            ->method('set')
            ->with('user_id', 1);

        $this->app->login($user);
        $this->assertEquals($user, $this->app->getCurrentUser());
    }

    public function testLogout(): void
    {
        $user = new User();
        $user->setId(1);
        $this->app->login($user);

        $this->sessionStorage->expects($this->once())
            ->method('delete')
            ->with('user_id');

        $this->app->logout();
        $this->assertNull($this->app->getCurrentUser());
    }

    public function testIsLoggedIn(): void
    {
        $this->sessionStorage->expects($this->atLeastOnce())
            ->method('hasKey')
            ->with('user_id')
            ->willReturn(true);

        $this->assertTrue($this->app->isLoggedIn());
    }
}
