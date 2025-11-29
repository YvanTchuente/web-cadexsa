<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApplicationTest extends TestCase
{
    public function test_landing_page_can_rendered(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_about_us_page_can_rendered(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
    }
}
