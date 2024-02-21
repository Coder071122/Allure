<?php
    include('../../config/config.php');
    $data = $_GET['data'];
    $collection_ids = json_decode($data);
    $collection_id = $_GET['collection_id'];
    $collection_name = $_POST['collection_name'];
    $collection_type = $_POST['collection_type'];
    $collection_order = $_POST['collection_order'];
    $collection_keyword = $_POST['collection_keyword'];
    $collection_description = $_POST['collection_description'];
    $collection_image = $_FILES['collection_image']['name'];
    $collection_image_tmp = $_FILES['collection_image']['tmp_name'];
    $collection_image = $_FILES['collection_image']['name'];
    $collection_image = time().'_'.$collection_image;

    if (isset($_POST['collection_add'])) {
        $sql_add = "INSERT INTO collection(collection_name, collection_keyword, collection_order, collection_type, collection_description, collection_image) VALUE('".$collection_name."', '".$collection_keyword."', '".$collection_order."', '".$collection_type."', '".$collection_description."', '".$collection_image."')";
        echo $sql_add;
        mysqli_query($mysqli, $sql_add);
        move_uploaded_file($collection_image_tmp, 'uploads/'.$collection_image);
        header('Location: ../../index.php?action=collection&query=collection_list');
    }
    elseif (isset($_POST['collection_edit'])) {
        if ($_FILES['collection_image']['name'] != '') {
            move_uploaded_file($collection_image_tmp, 'uploads/' . $collection_image);
            $sql = "SELECT * FROM collection WHERE collection_id = '$collection_id' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($query)) {
                unlink('uploads/' . $row['collection_image']);
            }
            $sql_update = "UPDATE collection SET collection_name='".$collection_name."', collection_keyword='".$collection_keyword."', collection_order='".$collection_order."', collection_type='".$collection_type."', collection_description = '".$collection_description."', collection_image = '".$collection_image."'  WHERE collection_id = '$_GET[collection_id]'";
        }
        else {
            $sql_update = "UPDATE collection SET collection_name='".$collection_name."', collection_keyword='".$collection_keyword."', collection_order='".$collection_order."', collection_type='".$collection_type."', collection_description = '".$collection_description."' WHERE collection_id = '$_GET[collection_id]'";
        }
        
        mysqli_query($mysqli, $sql_update);
        header('Location: ../../index.php?action=collection&query=collection_list');
    }
    else {
        foreach ($collection_ids as $id) {
        $sql = "SELECT * FROM collection WHERE collection_id = '$id' LIMIT 1";
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('uploads/' . $row['collection_image']);
        }
        $sql_delete = "DELETE FROM collection WHERE collection_id = '".$id."'";
        mysqli_query($mysqli, $sql_delete);
        header('Location: ../../index.php?action=collection&query=collection_list');
        }
    }
