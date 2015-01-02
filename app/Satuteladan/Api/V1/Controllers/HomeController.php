<?php

namespace Satuteladan\Api\V1\Controllers;

class HomeController extends BaseController {

	public function index()
	{
		return $this->response->array(['description' => 'SatuTeladan API', 'version' => '1.0']);
	}

}
