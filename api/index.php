

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Bookstore</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h1>Bookstore</h1>
<table id="books" class="table table-hover"">
    <tr>
        <td>
            <strong> Id </strong>
        </td>
        <td>
            <strong> Title </strong>
        </td>
        <td>
            <strong> Author </strong>
        <td>
            <strong> Description </strong>
        </td>
    </tr>
</table>

<form id="sendBook" method="post" class="form-inline">
    <div class="form-group">
        <label for="exampleInputName2">Author</label>
        <input id="author" value="" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail2">Title</label>
        <input id="title" value="" class="form-control"/><br>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail2">Description</label>
        <input id="description" value="" class="form-control"/><br>
    </div>
    <button id="addBook" name="newBook" style="margin-left: 5px;">addBook</button>

</form>
<script src="jquery-2.1.4.js"></script>
<script src="main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
