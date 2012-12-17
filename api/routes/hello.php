<?php defined('C5_EXECUTE') or die('Access Denied');

class HelloApiRouteController extends ApiRouteController {

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

}