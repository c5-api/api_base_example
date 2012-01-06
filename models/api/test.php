<?php defined('C5_EXECUTE') or die("Access Denied.");

class ApiTest extends ApiController {
	
	public function show() {
		return t('This was a Test! Hello World!');
	}
	
	public function params($id) {
		$resp = ApiResponse::getInstance();
		if($id < 1) {
			$resp->setError(true);
			$resp->setCode(400);
			$resp->setMessage('ERROR_BAD_REQUEST');
			$resp->send();
		} else {
			$resp->setData($id);
			$resp->send();
		}
	}

}