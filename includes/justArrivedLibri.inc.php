<?php 
    if(isset($_POST['favbtn'])){
        require_once "../db/db-inc.php";
        require_once "functions.inc.php";
        session_start();
        $userId = $_SESSION['userid'];
        $username = $_SESSION['username'];
        $bookId = $_POST['book_id'];

        justArrivedAddFavorites($conn, $userId, $username, $bookId);
        
    }
    else{
        header("location: ../index.php");
        exit();
    }

    if (isset($_POST['cartbtn'])){
        require "../db/db-inc.php";
        require "functions.inc.php";

        $userId = $_SESSION['user_id'];
        $bookId = $_POST['book_id'];

        justArrivedAddToCart($conn, $userId, $bookId);
        
    }
    else{
        header("location: ../index.php");
        exit();
    }
