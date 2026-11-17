<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Asad">
  <title>Cars for Sale</title>
</head>
<body>
  <h1>Used Cars</h1>
<?php
  // Bring in $host, $user, $pwd, $sql_db from settings.php
  require_once "settings.php";

  // Step 1: Connect to the database
  $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);

  if ($dbconn) {
      // Step 2: Create the SQL query
      $query = "SELECT * FROM cars";
      // Step 3: Execute the query
      $result = mysqli_query($dbconn, $query);

      // Step 4: Did it work? Are there any rows?
      if ($result && mysqli_num_rows($result) > 0) {
          // Task 7: table headings first
          echo "<table>";
          echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Price</th><th>Year</th></tr>";

          // One table row per car
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['car_id'] . "</td>";
              echo "<td>" . $row['make'] . "</td>";
              echo "<td>" . $row['model'] . "</td>";
              echo "<td>" . $row['price'] . "</td>";
              echo "<td>" . $row['yom'] . "</td>";
              echo "</tr>";
          }
          echo "</table>";   // close the table
      } else {
          echo "<p>There are no cars to display.</p>";
      }

      // Step 5: Close the connection
      mysqli_close($dbconn);
  } else {
      echo "<p>Unable to connect to the db.</p>";
  }
?>
</body>
</html>