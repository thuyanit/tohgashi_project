<link rel="stylesheet" type="text/css" href="<?php echo plugins_url('exhibitors-application/css/style.css'); ?>">
<div id="view_post">
    <h1>お知らせ</h1>
<?php 
//print_r($view);
foreach ($view as $value){
    $title=$value->post_title;
    $datepost=date('Y/m/d',strtotime($value->post_date));
    $content=$value->post_content;
}
echo "<h2 class='title'>".$title."</h2>";
echo "<span class='datepost'>".$datepost."</span>";
echo "<p class='content_post'>".$content."</p>";
?>
</div>