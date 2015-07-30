<?php

Class Book{
    /*
    CREATE TABLE Books(
        id INT AUTO_INCREMENT,
        author VARCHAR (255)  NOT NULL,
        title VARCHAR (255) NOT NULL,
        description  VARCHAR(255) NOT NULL,
        PRIMARY KEY (id);
    ;
    */

    protected $id = -1;
    protected $author ="";
    protected $title = "";
    protected $desc ="";


    public function __construct($author = null, $title = null, $desc = null)
    {
        $this->id = -1;
        if (empty($title)) {
            $this->setTitle($title);
        }

        if (empty($desc)) {
            $this->setDesc($desc);
        }
        if (empty($author)) {
            $this->setAuthor($author);

        }
    }

    /**
     * @param mysqli $conn
     * @return array
     */
    static  function getAllBooks(mysqli $conn){

        $sql = "SELECT * FROM Books";
        $result = $conn->query($sql);
        if($result){
            $pomTab = [];
            while( $row = $result->fetch_array(MYSQLI_ASSOC)){// sprawdzam czy nie ma dalszych wpisow w bazie danych
                $pomTab []= $row;
            }
           return $pomTab;
        }
        return [];
    }
//(real_escape_string) input security
    public function addBook(mysqli $conn){
        $sqlInsertBook = "INSERT INTO books
        ( author, title,description) VALUES (
         '".$conn->real_escape_string($this->getAuthor()).
        "' , '".$conn->real_escape_string($this->getTitle()).
        "' , '".$conn->real_escape_string($this->getDesc())."')";

        $conn->query($sqlInsertBook);
        $newBook = $conn->insert_id;
        return $newBook;
    }

    public function update(mysqli $conn,&$bookId){

        parse_str($_SERVER['QUERY_STRING'], $update_vars);
        $bookId = $update_vars['id'];
        $newTitle = $conn->real_escape_string($this->getTitle());
        $newAuthor = $conn->real_escape_string($this->getAuthor());
        $newDesc = $conn->real_escape_string($this->getDesc());

    $sqlUpdate = "UPDATE books SET title=
'.$newTitle.' , author = '.$newAuthor.' , desc = '.$newDesc.' WHERE id = $bookId ";
        $result = $conn->query($sqlUpdate);
        if($result == false) {
                    echo("Error during updating ");
         }
    }

    public function deleteFromDB(mysqli $conn){

        parse_str($_SERVER['QUERY_STRING'], $delete_vars);
        $bookId = $delete_vars['id'];
        $sqlDelete = "DELETE FROM books WHERE id =$bookId";

        if (mysqli_query($conn, $sqlDelete)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

    }


    public  function setAuthor($author){
        $this->author =$author;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setDesc($desc){
        $this->desc = $desc;
    }

    public function getId(){
        return $this->id;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDesc(){
        return $this->desc;
    }
}
