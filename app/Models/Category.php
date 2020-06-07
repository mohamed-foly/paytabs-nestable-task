<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'parent_id'];

    public function getCategory()
	{
		$root_categories = $this->where('parent_id', null)->findAll();;
		$menu = $root_categories->result();
		return $menu;
	}
}