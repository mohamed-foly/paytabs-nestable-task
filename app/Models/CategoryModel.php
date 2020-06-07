<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'parent_id'];

    public function getCategory()
	{
		$root_categories = $this->where('parent_id', null)->findAll();
		$i = 0;

		foreach ($root_categories as $category) {
			$root_categories[$i]->child = $this->getChildMenu($category->id);
			$i++;
		}

		return $root_categories;
	}

	public function getChildCategory($parent_id)
	{
		$childrens = $this->where('parent_id', $parent_id)->findAll();
		$i = 0;

		foreach ($childrens as $mn) {
			$childrens[$i]->child = $this->getChildMenu($mn->menu_id);
			$i++;
		}

		return $childrens;
	}
}