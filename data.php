<?php
session_start();

if (!isset($_SESSION['session_id'])) {
  header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>RapidSDK PHP Demo</title>
</head>

<body>
  <form method="POST" action="create.php">
    <h2>Create</h2>
      <input type="text" id="key" name="key" placeholder="Key" />
      <br />
      <input type="text" id="value" name="value" placeholder="Value" />
      <br />
      <button type="submit">Create Data</button>
      <hr>
  </form>

  <form method="POST" action="read.php">
    <h2>Read</h2>
      <input type="text" id="key" name="key" placeholder="Key" />
      <br />
      <button type="submit">Read Data</button>
      <hr>
  </form>

  <form method="POST" action="update.php">
    <h2>Update</h2>
      <input type="text" id="key" name="key" placeholder="Key" />
      <br />
      <input type="text" id="value" name="value" placeholder="Value" />
      <br />
      <button type="submit">Update Data</button>
      <hr>
  </form>

  <form method="POST" action="delete.php">
    <h2>Delete</h2>
      <input type="text" id="key" name="key" placeholder="Key" />
      <br />
      <button type="submit">Delete Data</button>
      <hr>
  </form>
</body>
</html>
