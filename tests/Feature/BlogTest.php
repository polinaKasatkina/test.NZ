<?php

namespace Tests\Feature;

use App\Models\Blog;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{


    use RefreshDatabase;

    /**
     * Test if first blog url is available
     *
     * @return void
     */
    public function get_blog()
    {

        $db_blog = Blog::first();

        $response = $this->get('/blog/' . $db_blog->slug);

        $response->assertStatus(200);

    }

    /**
     * Test blog creation
     *
     * @return void
     */
    public function create_blog()
    {
        $blog = factory(Blog::class)->create();

        $response = $this->get('/blog/' . $blog->slug);

        $response->assertStatus(200);
    }
}
