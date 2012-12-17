<?php defined('C5_EXECUTE') or die('Access Denied');

class HelloApiRouteController extends ApiRouteController {

	/**
	 * Main function
	 * @param string $name
	 * @return void
	 * @url /hello/:name
	 */
	public function run($name = false) {
		switch (API_REQUEST_METHOD) {
			case 'GET':
				if($name) {
					$this->respond('Hello '.$name.'!');
				} else {
					$this->respond('Hello World!');
				}
			
			default: //BAD REQUEST
				$this->setCode(405);
				$this->respond(array('error' => 'Method Not Allowed'));
		}
	}

	/**
	 * Test public function
	 * @return void
	 * @url /hello/world
	 */
	public function world() { //since this is a public function it can be access directly via the API
		$this->respond('This is the `world` function!');
	}

	/**
	 * Test private function
	 * @return void
	 * Try going to /hell/underworld
	 */
	private function underworld() { //since this is a private function it cannot be called directly by the API and can only be called from within this file.
		$this->respond('This is the `underworld` function!');//you should never see this....
	}

	/**
	 * Test public function v2
	 * @param int $num1
	 * @param int $num2
	 * @return void
	 * @url /hello/add/:num1/:num2
	 */
	public function add($num1 = 0, $num2 = 0) { //since this is a public function it can be access directly via the API
		$this->respond($num1 + $num2);
	}

	/**
	 * Test public function v3
	 * @return void
	 * @url /hello/params
	 */
	public function params($num1 = 0, $num2 = 0) { //since this is a public function it can be access directly via the API
		$this->respond($_GET['string']);//you can still pull from $_GET and $_POST
	}

}