<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}


	public function testJefatura()
	{
		$user = \App\User::where('email', '=', 'jef@jef.jef')->first();
		$this->be($user);
		$this->call('GET', 'jefatura');
		$this->assertResponseOk();
	}

}
