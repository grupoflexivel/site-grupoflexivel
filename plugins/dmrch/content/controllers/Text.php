<?php namespace Dmrch\Content\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Text Back-end Controller
 */
class Text extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Dmrch.Content', 'text', 'text');
    }
}
