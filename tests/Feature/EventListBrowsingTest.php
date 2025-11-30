<?php

namespace Tests\Feature;

use App\Models\Event;
use Database\Seeders\EventSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventListBrowsingTest extends TestCase
{
    use RefreshDatabase;

    public function test_upcomming_events_list_page_can_be_rendered(): void
    {
        $response = $this->get(route('events'));

        $response->assertStatus(status: 200);
    }

    public function test_user_can_read_about_a_specific_upcomming_event(): void
    {
        $this->seed(EventSeeder::class);

        $event = Event::all()->first();

        $this->get(route('event', ['event' => $event->id]))
            ->assertStatus(200)
            ->assertSee([$event->name, $event->venue, $event->description]);
    }
}
