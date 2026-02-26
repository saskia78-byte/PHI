<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Managers\ArticleManager;
use App\Models\Managers\PodcastManager;

class PagesController extends Controller {
    
    public function home() {
        $this->render('pages/home');
    }

    public function actualites() {
        $articleManager = new ArticleManager();
        $podcastManager = new PodcastManager();
        $articles = $articleManager->getAll();
        $podcasts = $podcastManager->getAll();
        $this->render('pages/actualites', [
            'articles' => $articles,
            'podcasts' => $podcasts
        ]);
    }

    public function contact() {
        $this->render('pages/contact');
    }

    public function nousoutenir() {
        $this->render('pages/nousoutenir');
    }

    public function error() {
        $this->render('pages/error');
    }
}
?>