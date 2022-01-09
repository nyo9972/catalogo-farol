<?php

namespace App;


class Category extends \Kalnoy\Nestedset\Node
{
	protected $table = 'categories';

	public $timestamps = false;

	protected $fillable = [
		'title', 'description'
	];

	public function products()
	{
		return $this->belongsToMany('App\Product');
	}

	public static function boot()
	{
		parent::boot();

		self::deleting(function($category)
		{
			$categories_id = $category->descendants()->lists('id');
			$categories_id[] = $category->getKey();
			$products = Product::whereHas('categories', function($q) use ($categories_id) {
					$q->whereIn('categories.id', $categories_id);
				})->get();

			if ($category->getDescendantCount() > 0)
			{
				$html = "Esta categoria tem subcategorias, você não pode excluí-la até que tenha removido todos as subcategorias";

				\Session::flash('errorMsg', $html);

				return false;
			}
			else if($products->count() > 0)
			{
				$html = "Não é possível excluir esta categoria porque ainda possui produtos relacionados.<br>\n";
				$html .= "<ul>\n";
				foreach ($products as $product) {
					$html .= "    <li>$product->name</li>\n";
				}
				$html .= "</ul>\n";

				\Session::flash('errorMsg', $html);

				return false;
			}
		});
	}
}
