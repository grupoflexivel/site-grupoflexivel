<?php namespace Dmrch\Content\Components;

use Cms\Classes\ComponentBase;

class Text extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Text Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getAll()
    {
        return \Dmrch\Content\Models\Text::first();
    }
}
