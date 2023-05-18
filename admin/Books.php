<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
    <link rel="stylesheet" href="UserStyle.css">
    <script>
function RegUser() {
  const form = document.querySelector('.forma');

  function toggleForm() {
    if (form.style.display === 'none') {
      form.style.display = 'block';
    } else {
      form.style.display = 'none';
    }
  }
  const toggleButton = document.querySelector('.button-3');

  const form2 = document.querySelector('#forma2');

  function toggleForm2() {
    if (form2.style.display === 'none') {
      form2.style.display = 'block';
    } else {
      form2.style.display = 'none';
    }
  }

  const toggleButton2 = document.querySelector('.button-33');

  toggleButton.addEventListener('click', toggleForm);
  toggleButton2.addEventListener('click', toggleForm2);
}



    </script>
</head>
<body>
	<h1>Books</h1>
    <div class="buttons2">
    <button class="button-3" onclick="RegUser()">New</button>
    <button class="button-33" onclick="RegUser()">Delete</button>

    </div>

    <form id="forma2" method="POST" action="" style="display: none;">
    <label for="id">ID to delete:</label>
    <input type="text" name="id" id="id" required>
    <button class="sub" type="submit" name="delete">Delete</button>
</form>
<form class="forma" style="display: none;" action="./Books.php" method="POST">
    <h3>Create new Book</h3>
    <label for="title">Title:</label>
    <input type="text" id="title" name="book_title"><br><br>
    
    <label for="aid">Author ID:</label>
    <input type="text" id="aid" name="author_id"><br><br>

    <label for="Price">Price:</label>
    <input type="text" id="Price" name="price"><br><br>

    <label for="Genre">Genre:</label>
    <input type="text" id="Genre" name="genre"><br><br>

    <label for="Quantity">Quantity:</label>
    <input type="text" id="Quantity" name="quantity"><br><br>

    <label for="Published">Published:</label>
    <input type="text" id="Published" name="year_released"><br><br>

    <label for="Arrival">Arrival date:</label>
    <input type="text" id="Arrival" name="arrival_date"><br><br>

    <input class="sub" type="hidden" name="submit" value="submit">
    <input class="sub" type="submit" value="Submit">
</form>

	<table class="tbl">
		<tr class="tr">
			<th>ID</th>
			<th>Title</th>
			<th>Author ID</th>
            <th>Price</th>
			<th>Genre</th>
			<th>Quantity</th>
            <th>Published</th>
            <th>Arrival Date</th>
		</tr>
		<?php
            $dbServerName = "127.0.0.1";
            $dbUsername = "root";
            $dbPassword = "admin";
            $dbName = "web2-database";
            
            // Create connection
            $conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

            $sql = "SELECT * FROM tblbooks;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['book_id'] . "</td>";
                    echo "<td>" . $row['book_title'] . "</td>";
                    echo "<td>" . $row['author_id'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['genre'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['year_released'] . "</td>";
                    echo "<td>" . $row['arrival_date'] . "</td>";
                    echo "</tr>";
                }
            } 

            if(isset($_POST['submit'])) {
              if(isset($_POST["book_title"]) && isset($_POST["author_id"]) && isset($_POST["price"]) && isset($_POST["genre"]) && isset($_POST["quantity"]) && isset($_POST["year_released"]) && isset($_POST["arrival_date"])) {
                  $book_title = $_POST["book_title"];
                  $author_id = $_POST["author_id"];
                  $price = $_POST["price"];
                  $genre = $_POST["genre"];
                  $quantity = $_POST["quantity"];
                  $year_released = $_POST["year_released"];
                  $arrival_date = $_POST["arrival_date"];
                
                  $sql = "INSERT INTO tblbooks (book_title, author_id, price, genre, quantity,year_released,arrival_date) VALUES ('$book_title', '$author_id', '$price', '$genre', '$quantity','$year_released','$arrival_date')";
                  mysqli_query($conn , $sql);
            
                  // Close the connection
                  mysqli_close($conn);
                  header("Location: " . $_SERVER['REQUEST_URI']);
          exit();
          
              } else {
                  // Handle the case when one or more of the required form fields are missing
                  // Display an error message or perform appropriate actions
              }
          }
          if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["delete"])) {
                $id = $_POST["id"];
        
                $sql = "DELETE FROM tblbooks WHERE book_id = $id";
                mysqli_query($conn , $sql);
        
            // Close the connection
            mysqli_close($conn);
            header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
            }
        }
          
		?>
	</table>
</body>
</html>