<?php

header('Content-type: application/json'); // header- to co wyswietla strona jest typu Json.

include 'src\connection.php';
include 'src\Book.php';

function handleGET($conn){


    $books = Book::getAllBooks($conn);

//var_dump($books);//* wyswietlenie w formacie tablicy assocjacyjnej

    $json = json_encode($books); //* wyswietlanie w fromacie Json
    echo $json;
}

function handlePOST(mysqli $conn){

    $book = new Book();
    $book->setTitle($_POST['title']);
    $book->setDesc($_POST['desc']);
    $book->setAuthor($_POST['author']);
    $newBook = $book->addBook($conn);
    header('Content-type: application/json');
    echo json_encode($newBook);

}

function handleDELETE(mysqli $conn){

        $book = new Book();
        $book->deleteFromDB($conn);
}

function handlePUT(mysqli $conn){

    parse_str(file_get_contents("php://input"),$data);

    $book = new Book();
    $book->update($conn,$data['id']);
    $book->setTitle($data['title']);
    $book->setAuthor($data['author']);
    $book->setDesc($data['desc']);



}

$methodType = $_SERVER['REQUEST_METHOD'];
$conn = Connection::startConnection();

    switch($methodType){
        case "GET":
            handleGET($conn);
            break;
        case "POST":
            handlePOST($conn);
            break;
        case "DELETE":
            handleDELETE($conn);
            break;
        case "PUT":
            handlePUT($conn);
            break;
        default:
            die("nie obslugujemy");
    }
CONNECTION::stopConnection($conn);

