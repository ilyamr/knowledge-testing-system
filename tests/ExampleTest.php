<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testMainPage()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

    public function testRSAPage()
    {
        $response = $this->call('GET', '/3');
        $this->assertEquals(200, $response->status());
    }
}