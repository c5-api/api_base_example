<?php defined('C5_EXECUTE') or die("Access Denied.");

class ApiBaseExamplePackage extends Package {

	protected $pkgHandle = 'api_base_example';
	protected $appVersionRequired = '5.6.0';
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
		
		parent::install();

		$pkg = Package::getByHandle($this->pkgHandle);
		ApiRoute::add('hello', t('This route does nothing, its only a test!'), $pkg);

	}
	
	public function uninstall() {
		ApiRouteList::removeByPackage($this->pkgHandle);//remove all the apis
		parent::uninstall();
	}

}