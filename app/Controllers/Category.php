<?php namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		$this->category =  new CategoryModel();
	}

	public function index()
	{
		return view('category');
	}

}
