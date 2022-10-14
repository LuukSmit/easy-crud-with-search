<?php

require_once('db.php');
$db = new DB();

// Delete Data
if(isset($_POST['deleteData'])) {
  $id = $_POST['id'];
  $db->deleteData($id);
}

// Search data
if (isset($_GET['search'])) {
  $data = $db->searchData($_GET['search']);
} else {
  $data = $db->getData();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>User Details</title>
</head>

<body>
  <h1>Insert</h1>
  <form action="insert.php" method="POST">
    <input type="text" placeholder="Name" name="name">
    <input type="text" placeholder="Email" name="email">
    <input type="submit" value="Insert" name="insertData">
  </form>

  <h1>Delete</h1>
  <form method="POST">
    <input type="text" placeholder="Id" name="id">
    <input type="submit" value="Delete" name="deleteData">
  </form>

  <h1>Edit</h1>
  <form action="editData.php" method="POST">
    <input type="text" placeholder="Id" name="id"><br>
    <input type="text" placeholder="Name" name=name><br>
    <input type="text" placeholder="Email" name=email>
    <input type="submit" value="Edit" name="editData">
  </form>

  <h1>Search</h1>
  <form method="GET">
    <input type="text" placeholder="search" name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search'] ?>">
    <input type="submit" value="search">
  </form>


  <h1>Data</h1>

  <?php

  foreach ($data as $i) {
    echo $i['id'] . "- " . $i['name'] . " - " . $i["email"] . "<br>";
  }
  ?>
</body>
</html>