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
	 */
	private function underworld() { //since this is a private function it cannot be called directly by the API and can only be called from within this file.
		$this->respond('This is the `underworld` function!');//you should never see this....
	}

}