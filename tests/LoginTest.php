<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testExample()
  {
    $this->visit('/')
      ->click('Sign In')
      ->type('Alexander2475914@gmail.com', 'email')
      ->type('secret', 'password')
      ->click('Sign In')
      ->see('My Passport');
    $this->assertTrue(true);
  }
}
