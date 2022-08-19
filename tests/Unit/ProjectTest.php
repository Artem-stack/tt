<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_examp()
    {
        $response = $this->get('/read');
        $response->assertOk();
        //$this->assertEquals(200, $response->status());
    }

  public function testAuthorize()
    {
        $this->post('/login', [
            'email' => 'Dam@gmail.com',
            'password' => '12345678'
        ]);
        $response = $this->get('/');
       
        $response->assertOk();
    }
    public function testValidator()
    {
     $this->post('/login',[
      'email' => 'ele@gmail.com',
      'password' => '123456789'
     ]);
     $response = $this->post('/',
      [
        'email' => 'asd@gmail.com'
    ]);
     $this->assertEquals(302, $response->status());
    }
}
