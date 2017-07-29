<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InsightTest extends TestCase
{
    /**
     * Test Insight chart display.
     *
     * @return void
     */
    public function testDisplayInsightData()
    {
        $response = $this->call('GET', '/');
        $this->assertTrue($response->isOK());
    }
}
