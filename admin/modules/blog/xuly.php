<?php
include('../../config/config.php');
$data = $_GET['data'];
$article_ids = json_decode($data);
$article_id = $_GET['article_id'];
$article_author = $_POST['article_author'];
$article_title = $_POST['article_title'];
$article_summary = $_POST['article_summary'];
$article_content = $_POST['article_content'];
$article_image = $_FILES['article_image']['name'];
$article_image_tmp = $_FILES['article_image']['tmp_name'];
$article_image = time() . '_' . $article_image;
$article_date = date('Y-m-d', time());
$article_status = $_POST['article_status'];

if (isset($_POST['article_add'])) {
    $sql_add = "INSERT INTO article(article_author, article_title, article_summary, article_content, article_image, article_date, article_status) VALUE('" . $article_author . "', '" . $article_title . "', '" . $article_summary . "', '" . $article_content . "', '" . $article_image . "', '" . $article_date . "', '" . $article_status . "')";
    mysqli_query($mysqli, $sql_add);
    move_uploaded_file($article_image_tmp, 'uploads/' . $article_image);
    header('Location: ../../index.php?action=article&query=article_list');
} elseif (isset($_POST['article_edit'])) {
    if ($_FILES['article_image']['name'] != '') {
        move_uploaded_file($article_image_tmp, 'uploads/' . $article_image);
        $sql = "SELECT * FROM article WHERE article_id = '$article_id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        echo $article_image;
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['article_image']);
        }
        $sql_update = "UPDATE article SET article_author='" . $article_author . "', article_title='" . $article_title . "', article_summary = '" . $article_summary . "', article_content = '" . $article_content . "', article_image = '" . $article_image . "', article_date = '" . $article_date . "', article_status = '" . $article_status . "'  WHERE article_id = '$_GET[article_id]'";
        echo $sql_update;
    } else {
        $sql_update = "UPDATE article SET article_author='" . $article_author . "', article_title='" . $article_title . "', article_summary = '" . $article_summary . "', article_content = '" . $article_content . "', article_date = '" . $article_date . "', article_status = '" . $article_status . "'  WHERE article_id = '$_GET[article_id]'";
    }

    mysqli_query($mysqli, $sql_update);
    header('Location: ../../index.php?action=article&query=article_list');
} elseif (isset($_GET['deletecomment']) && $_GET['deletecomment'] == 1) {
    $comment_ids = json_decode($data);
    foreach ($comment_ids as $id) {
        $sql_delete_comment = "DELETE FROM comment WHERE comment_id = '" . $id . "'";
        mysqli_query($mysqli, $sql_delete_comment);
    }
    header('Location: ../../index.php?action=article&query=article_edit&article_id='.$article_id.'#article_comment');
} elseif (isset($_GET['acceptcomment']) && $_GET['acceptcomment'] == 1) {
    $comment_ids = json_decode($data);
    foreach ($comment_ids as $id) {
        $sql_update_comment = "UPDATE comment SET comment_status = 1 WHERE comment_id = '" . $id . "'";
        mysqli_query($mysqli, $sql_update_comment);
    }
    header('Location: ../../index.php?action=article&query=article_edit&article_id='.$article_id.'#article_comment');
} else {
    foreach ($article_ids as $id) {
        $sql = "SELECT * FROM article WHERE article_id = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['article_image']);
        }
        $sql_delete = "DELETE FROM article WHERE article_id = '" . $id . "'";
        mysqli_query($mysqli, $sql_delete);
    }
    header('Location: ../../index.php?action=article&query=article_list');
}
