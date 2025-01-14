<?php
ini_set('display_errors', 1);
ini_set('log_errors', 0);
ini_set('error_log', __DIR__.'/log.txt');
//error_reporting(E_ALL);
//error_reporting(E_ALL & ~E_NOTICE);


/************ - Set date PTBR - */
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese"); 
date_default_timezone_set('America/Sao_Paulo');

!defined('LOCALHOST') ? define('LOCALHOST','compromisso.mysql.dbaas.com.br') : false;
!defined('USERNAME') ? define('USERNAME','compromisso') : false;
!defined('PASSWORD') ? define('PASSWORD','ElexivEl@2022@') : false;
!defined('DBNAME') ? define('DBNAME','compromisso') : false;
!defined('URL') ? define('URL','//'.$_SERVER['HTTP_HOST'].'/sustentabilidade/') : false;


function slugify($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = strtolower($text);
    $text = preg_replace('~-+~', '-', $text);
   $text = trim($text, '-');
    return $text;
}