<?php

namespace tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class HomepageControllerTest extends TestCase
{

    public function setUp() :void {
        parent::setUp();
    }

    public function testHomepage(){
        $response = $this->get( '/' );
        $response->assertStatus(200);
    }
}