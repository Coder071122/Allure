<?php
    include('../../config/config.php');
    $data = $_GET['data'];
    $brand_ids = json_decode($data);
    $brand_id = $_GET['brand_id'];
    $brand_name = $_POST['brand_name'];

    if (isset($_POST['brand_add'])) {
        $sql_add = "INSERT INTO brand(brand_name) VALUE('".$brand_name."')";
        mysqli_query($mysqli, $sql_add);
        move_uploaded_file($brand_image_tmp, 'uploads/'.$brand_image);
        header('Location: ../../index.php?action=brand&query=brand_list');
    }
    elseif (isset($_POST['brand_edit'])) {
        $sql_update = "UPDATE brand SET brand_name='".$brand_name."' WHERE brand_id = '$_GET[brand_id]'";
        
        mysqli_query($mysqli, $sql_update);
        header('Location: ../../index.php?action=brand&query=brand_list');
    }
    else {
        foreach ($brand_ids as $id) {
        $sql_delete = "DELETE FROM brand WHERE brand_id = '".$id."'";
        mysqli_query($mysqli, $sql_delete);
        header('Location: ../../index.php?action=brand&query=brand_list');
        }
    }
?>

