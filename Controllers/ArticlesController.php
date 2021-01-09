<?php
namespace App\Controllers;
use App\Models\Articles;
class ArticlesController extends Controller
{
    public function index()
    {
        //On instancie le modèle correspondant  à la table "articles"
        $articlesModel = new Articles;

        //On va chercher tout les articles
        $articles = $articlesModel->findAll();

        //On génère la vue
        $this->render('articles/index',['articles'=>$articles]);
    }


    /**
     * Affiche l'article 
     * @param int $id de l'article
     */

    public function read(int $id){
        //On instancie le modeèle

        $articlesModel = new Articles;

        // On va chercher un article
        $articles = $articlesModel->find($id); 
        // On envoie à la vue 

        $this->render('articles/read', ['articles'=>$articles]);

    }
}