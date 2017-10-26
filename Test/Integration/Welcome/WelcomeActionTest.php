<?php declare(strict_types=1);

namespace Test\Integration\Welcome;

use Test\Integration\WebTestCase;

final class WelcomeActionTest extends WebTestCase
{
    public function test_HTTP_status_code_is_200()
    {
        $this->assertEquals(
            200,
           $this->getResponse('')->getStatusCode()
        );
    }

    public function test_body_is_correct()
    {
        $this->assertContains(
            '<h1>You shouldn\'t be seeing this!</h1>',
            $this->getResponse('')->getBody()->getContents()
        );
    }
}