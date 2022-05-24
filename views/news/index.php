<<!-- список новостей -->>
<!DOCTYPE html>
<html >
<head>
<title>Vesti</title>
<link href="/template/css/style.css?>" rel="stylesheet"
      type="text/css">
</head>
<body>
    <div class="container">
        <h1>Новости</h1>
        <?php foreach ($newsList as $newsItem):?>
            <div class="item">    
                <div class="title"><?php echo $newsItem['title'];?>
                </div>
                <div class="date"><?php echo $newsItem['date'];?>
                </div>
                <div class="short_content"><?php echo $newsItem['short_content'];?>
                </div>
                <div class="id">
                    <a href="/news/<?php echo $newsItem['id'];?>">
                        подробное описание новости
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
