<?php namespace Dmrch\Content\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Lps Back-end Controller
 */
class Lps extends Controller
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

        BackendMenu::setContext('Dmrch.Content', 'content', 'lps');
    }
}
