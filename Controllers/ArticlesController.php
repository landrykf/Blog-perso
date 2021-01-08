<?php
namespace App\Controllers;

class ArticlesController extends Controller
{
    public function index(){
        include_once ROOT.'/Views/articles/index.php';
    }
}