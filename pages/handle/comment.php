<?php
include('../../admin/config/config.php');
$article_id = $_GET['article_id'];
$sql_article = "SELECT * FROM article WHERE article_id = $article_id LIMIT 1";
$query_article = mysqli_query($mysqli, $sql_article);
$comment_date = date('Y-m-d');

if (isset($_POST['comment'])) {
    $comment_name = $_POST['comment_name'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];

    $sql_insert_comment = "INSERT INTO comment(article_id, comment_name, comment_email, comment_content, comment_date, comment_status) VALUE ('".$article_id."', '".$comment_name."', '".$comment_email."', '".$comment_content."', '".$comment_date."', 0)";
    $query_insert_comment = mysqli_query($mysqli, $sql_insert_comment);
    header('Location:../../index.php?page=article&article_id='.$article_id);
}
