<?php
    // Session start & Connect the MySql
    session_start();
    $db = mysqli_connect("localhost", "root", "", "simple_crud");

    // Initialize Variables
    $nama = "";
    $kota = "";
    $id = 0;
    $update = false;

    // POST Add new data
    if (isset($_POST['save'])) {
        $nama = $_POST['nama'];
        $kota = $_POST['kota'];

        mysqli_query($db, "INSERT INTO user (nama, kota) VALUES ('$nama', '$kota')");
        $_SESSION['alert'] = "Data saved!";
        header("location: index.php");
    }

    // POST Update data
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $kota = $_POST['kota'];

        mysqli_query($db, "UPDATE user SET nama='$nama', kota='$kota' WHERE id=$id");
        $_SESSION['alert'] = "Data updated!";
        header("location: index.php");
    }

    // GET Delete data
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        
        mysqli_query($db, "DELETE FROM user WHERE id=$id");
        $_SESSION['alert'] = "Data deleted!";
        header("location: index.php");
    }
?>