<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'parent_id'];

    public function getCategory($root_id = null)
	{
		$root_categories = $root_id ? $this->where('id',$root_id)->findAll() : $this->where('parent_id', null)->findAll();
		$i = 0;

		foreach ($root_categories as $category) {
			$root_categories[$i]['child'] = $this->getChildCategory($category['id']);
			$i++;
		}

		return $root_id && isset($root_categories[0]) ? $root_categories[0]['child'] : $root_categories;
	}

	public function getChildCategory($parent_id)
	{
		$childrens = $this->where('parent_id', $parent_id)->findAll();
		$i = 0;

		foreach ($childrens as $mn) {
			$childrens[$i]['child'] = $this->getChildCategory($mn['id']);
			$i++;
		}

		return $childrens;
	}
}