<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /*
     * How to run tests?
     * 1) Create file .env.testing (cp .env .env.testing)
     * 2) Specify in DB_DATABASE the name of its database for tests
     * 3) Switch to database for testing: php artisan optimize --env==testing
     * 4) If required, apply migrations and seeds (default commands)
     * 5) Running tests: ./vendor/bin/phpunit
     * 6) To switch to a working database, you need to use the command: php artisan optimize
     */

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
