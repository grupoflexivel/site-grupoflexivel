<?php namespace Dmrch\Content\Components;

use Cms\Classes\ComponentBase;

class Page extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Page Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getAll() 
    {
         return \Dmrch\Content\Models\Page::where('status',1)->get();
    }


    public function getBySlug($slug) 
    {
         return \Dmrch\Content\Models\Page::where('slug',$slug)->first();
    }

    public function getBusca($query) 
    {
        $query = urldecode($query);
        return \Dmrch\Content\Models\Page::where('title', 'LIKE', '%'.$query.'%')->orWhere('text_1', 'LIKE', '%'.$query.'%')->get();
    }
}
