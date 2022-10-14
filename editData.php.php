<?php

require_once 'db.php';

if(isset($_POST['editData'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];

  $db = new DB();
  $db->editData($id, $name, $email);
  header('Location: index.php');
}
