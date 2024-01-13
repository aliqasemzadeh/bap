<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Livewire\Admin\User\Create;
use Livewire\Livewire;

class LivewireBootstrapTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_livewire_bootstrap_modal(): void
    {
        Livewire::test(Create::class)
            ->assertSee('Create')
            ->dispatch('showModal',['alias' => 'admin.user.create'])
            ->assertSee('Posts created: 1');
    }
}
