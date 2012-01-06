<?php defined('C5_EXECUTE') or die("Access Denied.");

class ApiBaseExamplePackage extends Package {

	protected $pkgHandle = 'api_base_example';
	protected $appVersionRequired = '5.5.0';
	protected $pkgVersion = '1.0';

	public function getPackageName() {
		return t("Api:Base:Example");
	}

	public function getPackageDescription() {
		return t("API Package Example.");
	}

	public function install() {
		$installed = Package::getByHandle('api');
		if(!is_object($installed)) {
			throw new Exception(t('Please install the "API" package before installing %s', $this->getPackageName()));
		}
		$api = array();
		$api['pkgHandle'] = $this->pkgHandle;
		$api['route'] = 'test';
		$api['routeName'] = t('Testing!');
		$api['class'] = 'test';
		$api['method'] = 'show';
		$api['via'][] = 'get';
		
		$api2 = array();
		$api2['pkgHandle'] = $this->pkgHandle;
		$api2['route'] = 'test/:id';
		$api2['routeName'] = t('Testing with params!');
		$api2['class'] = 'test';
		$api2['method'] = 'params';
		$api2['filters']['id'] = '(\d+)';//:id can only be numerical
		$api2['via'][] = 'get';

		Loader::model('api_register', 'api');
		ApiRegister::add($api);
		ApiRegister::add($api2);

		parent::install();
	}
	
	public function uninstall() {
		Loader::model('api_register', 'api');
		ApiRegister::removeByPackage($this->pkgHandle);//remove all the apis
		parent::uninstall();
	}

}