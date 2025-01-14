<?php namespace Dmrch\Content\Components;

use Cms\Classes\ComponentBase;

class Lps extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Lps Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getBySlug($slug) 
    {
         return \Dmrch\Content\Models\Lps::where('slug',$slug)->first();
    }


    public function getProducts($id) {
        $lp = \Dmrch\Content\Models\Lps::find($id);
        return \Dmrch\Catalog\Models\Product::whereIn('id', $lp->products)->get();
    }

    public function getPostsByCAtagori($slug, $limit = 5) {
        $cat  = \RainLab\Blog\Models\Category::where('slug',$slug)->first();

        if($cat) {
            return $cat->posts()->limit($limit)->get();
        }

        return false;
    }
}
