<?php namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\API\ResponseTrait;

class Category extends BaseController
{
	use ResponseTrait;

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		$this->category =  new CategoryModel();
	}

	public function index()
	{
		return view('category');
	}

	public function getAjaxCategories()
	{
		if($this->request->isAJAX()) {
			header('Content-Type: application/json');
			$root_category = $this->request->getVar('root_category');
			$categories = $this->category->getCategory($root_category);
			return $this->respond($categories,200);
		}
	}

}
