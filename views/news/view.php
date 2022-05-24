<!-- новость детально -->
<!DOCTYPE html>
<html >
<head>
<title>Vesti</title>
<link href="/template/css/style_detail.css?>" rel="stylesheet"
      type="text/css">
</head>
<body>
    <div class="container">
        
        <h1>Детальный просмотр новости</h1>
        <div class="title"><?= $newsItem['title'];?></div>
        <div class="date"><?= $newsItem['date'];?></div>
        <div class="content"><?= $newsItem['content'];?></div>
        <div class="author_name"><?= $newsItem['author_name'];?></div>
        <div class="preview"><?= $newsItem['preview'];?></div>
        <div class="type"><?= $newsItem['type'];?></div>
        <div><a href="/news/">Вернуться обратно к списку новостей</a></div>
    </div>
</body>
</html>