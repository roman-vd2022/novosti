<?php

include_once ROOT.'/models/News.php';

class NewsController
{
    public function actionIndex()//список
    {
        $newsList = array();
        $newsList = News::getNewsList();
        
        require_once(ROOT.'/views/news/index.php');
        //список новостей
        
        return true;
    }
    public function actionView( $id)//одна новость
    {
        if ($id) {
            $newsItem = News::getNewsIemById($id);
            
            require_once(ROOT.'/views/news/view.php');
            
//            echo '<pre>';
//            print_r($newsItem);
        }
        return true;
    }
}

