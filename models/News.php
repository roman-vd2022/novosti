<?php
//Модель для NewsCotroller
class News
{
    //возвращает одну новость по id
    public static function getNewsIemById($id)
    {
        $id = intval($id);
        if($id) {
            $db = DB::getConnection();
            
            $query = "SELECT * FROM news WHERE id=".$id;
            $result = $db->query($query);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();
            
            return $newsItem;
        }
    }
    //возвращает список новостей
    public static function getNewsList()
    {
        $db = DB::getConnection();
        
        $newsList = array();
        $query = "SELECT id, title, date, short_content FROM news";
        $result = $db->query($query);

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;
    }
}


