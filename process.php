<?php
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

    $update = false;
    $name = '';
    $location = '';

    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $location = $_POST['location'];

    $mysqli->query("INSERT INTO data (name, location) VALUES ('$name', '$location')") or die($mysqli->error);

    $_SESSION['message'] = "Record has ben saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

        $_SESSION['message'] = "Record has ben deleted!";
        $_SESSION['msg_type'] = "danger";

        header("location: index.php");
    }

    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error);
        if (is_iterable($result) == 1){
            $row = $result->fetch_array();
            $name = $row['name'];
            $location = $row['location'];
        }
    }

    if (isset($_POST['update'])){
        $id = $_GET['update'];
        $name = $_POST['name'];
        $location = $_POST['location'];
        var_dump($id);
        var_dump($name);
        var_dump($location);

        $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error);

        $_SESSION['message'] = "Record has ben updated!";
        $_SESSION['msg_type'] = "warning";

        header("location: index.php");
    }