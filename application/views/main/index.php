<p>This is main page of this web-page</p>

<?php foreach ($news as $val): ?>
    <h3><?=$val->title; ?></h3>
    <p><?=$val->text; ?></p>
<?php endforeach; ?>