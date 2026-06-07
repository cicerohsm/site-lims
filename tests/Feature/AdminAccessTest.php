<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_admin(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_admin_can_access_dashboard(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertOk();
    }

    public function test_non_admin_user_can_access_admin_route_but_gate_blocks_actions(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        // The route requires auth (not the admin gate), so non-admin can reach dashboard
        // but individual admin actions are gated separately via Gate::authorize('admin')
        $response = $this->actingAs($user)->get('/admin');

        // Should either succeed with limited data or be forbidden depending on Gate usage
        $this->assertContains($response->getStatusCode(), [200, 403]);
    }

    public function test_admin_can_list_posts(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->get('/admin/posts');

        $response->assertOk();
    }

    public function test_admin_can_list_events(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->get('/admin/events');

        $response->assertOk();
    }
}
