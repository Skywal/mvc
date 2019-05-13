<p>This is main page of this web-page</p>
<!--<p>Name: <b>--><?php //echo $name; ?><!--</b></p>-->
<!--<p>Age: <b>--><?php //echo $age; ?><!--</b></p>-->
<?php foreach ($news as $val): ?>
<h3><?=$val->title; ?></h3>
<p><?=$val->text; ?></p>
<?php endforeach; ?>