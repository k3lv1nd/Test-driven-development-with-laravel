<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReadThreadsTest extends TestCase
{
   use DatabaseMigrations;

   public function setUp ()
   {
       parent::setUp();
       $this->thread = factory('App\Thread')->create();
   }

    /** @test */
    public function a_user_can_browse_threads()
    {
        $thread = $this->thread;

        $response = $this->get('/threads')

            ->assertSee($thread->title);


    }


    /** @test */
    public function a_user_can_read_a_single_thread()
    {
        $thread = $this->thread;

         $this->get('/threads/'.$thread->id)
            ->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread ()
    {
        $reply = factory('App\Reply')->create(['thread_id'=> $this->thread->id]);

        $this->get('/threads/'.$this->thread->id)
            ->assertSee($reply->body);
    }
}
