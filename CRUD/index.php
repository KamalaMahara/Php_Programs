<?php
// create and connect database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "NotesLekh";

// Creating connection
$conn = new mysqli($servername, $username, $password);

// Checking the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Creating the database
$sql_db = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!$conn->query($sql_db)) {
  echo "Error creating database: " . $conn->error;
}
$conn->select_db($dbname);

// Creating the table
$sql_table = "CREATE TABLE IF NOT EXISTS notes(
    ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    TITLE VARCHAR(100) NOT NULL UNIQUE,
    DESCRIPTION TEXT NOT NULL,
    CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($sql_table)) {
  echo "Error creating table: " . $conn->error;
}

// --- PHP LOGIC FOR DELETE ACTION ---
if (isset($_GET['delete_id'])) {
  $id_to_delete = (int)$_GET['delete_id'];
  $stmt = $conn->prepare("DELETE FROM notes WHERE ID = ?");
  $stmt->bind_param("i", $id_to_delete);
  if ($stmt->execute()) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  } else {
    echo '<div class="alert alert-danger mt-3">Error deleting note: ' . $stmt->error . '</div>';
  }
  $stmt->close();
}

// --- PHP LOGIC FOR UPDATE ACTION ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_note'])) {
  $id_to_update = (int)$_POST['edit_id'];
  $title_to_update = htmlspecialchars($_POST['edit_title']);
  $desc_to_update = htmlspecialchars($_POST['edit_description']);

  $stmt = $conn->prepare("UPDATE notes SET TITLE = ?, DESCRIPTION = ? WHERE ID = ?");
  $stmt->bind_param("ssi", $title_to_update, $desc_to_update, $id_to_update);

  if ($stmt->execute()) {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
  } else {
    echo '<div class="alert alert-danger mt-3">Error updating note: ' . $stmt->error . '</div>';
  }
  $stmt->close();
}

// --- PHP LOGIC FOR ADDING A NEW NOTE ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_note'])) {
  $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
  $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';

  if (!empty($title) && !empty($description)) {
    $stmt = $conn->prepare("INSERT INTO notes (TITLE, DESCRIPTION) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
      echo '<div class="alert alert-success mt-3" role="alert">Note added successfully!</div>';
    } else {
      if ($conn->errno == 1062) {
        echo '<div class="alert alert-warning mt-3">Error: A note with this title already exists.</div>';
      } else {
        echo '<div class="alert alert-danger mt-3">Error adding note: ' . $stmt->error . '</div>';
      }
    }
    $stmt->close();
  } else {
    echo '<div class="alert alert-warning mt-3">Please fill out both the title and description.</div>';
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NotesLekh - Where good ideas don't get lost</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="Favicons/favicon-32x32.png">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">
        <span id="notes">Notes</span><span id="lekh">Lekh</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="first">
    <div class="container">
      <section class="hero-section my-5">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="paragraph-box p-4">
              <span id="id0">Welcome to </span><span id="notes">Notes</span><span id="lekh">Lekh</span>
              <p>
                Where good ideas don't get lost. <b>NotesLekh </b> helps you capture,
                organize, and share your thoughts seamlessly. Start writing today
                and keep your creativity flowing.
              </p><br>
              <button class="button-33" role="button"
                onclick="location.href = '#add-notes-section'">Start Writing Notes</button>
            </div>
          </div>
          <div class="col-md-6">
            <img src="Favicons/NotesLekh-removebg-preview.png" alt="Hero Image" class="img-fluid rounded">
          </div>
        </div>
      </section>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Note</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="edit_id" id="edit-id">
            <div class="mb-3">
              <label for="edit-title" class="form-label">Title</label>
              <input type="text" class="form-control" id="edit-title" name="edit_title" required>
            </div>
            <div class="mb-3">
              <label for="edit-description" class="form-label">Description</label>
              <textarea class="form-control" id="edit-description" name="edit_description" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="update_note">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container my-4" id="add-notes-section">
    <h2>Add Notes</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label><br>
        <input type="text" class="form-control form-control-lg" id="title" name="title" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Add Description</label><br>
        <textarea class="form-control form-control-lg" id="description" name="description" rows="3" required></textarea>
      </div>
      <input type="submit" name="submit_note" value="Add Note" class="btn btn-primary btn-lg">
    </form>
  </div>

  <div class="container my-4">
    <h2>Your Notes</h2>
    <div class="row">
      <?php
      // --- PHP LOGIC TO DISPLAY NOTES ---
      $sql_select = "SELECT ID, TITLE, DESCRIPTION FROM notes ORDER BY CREATED_AT DESC";
      $result = $conn->query($sql_select);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="col-md-4 mb-4">';
          echo '<div class="card h-100">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">' . htmlspecialchars($row["TITLE"]) . '</h5>';
          echo '<p class="card-text">' . htmlspecialchars($row["DESCRIPTION"]) . '</p>';
          echo '<div class="d-flex justify-content-between">';
          // Data attributes for Javascript to grab
          echo '<button class="btn btn-sm btn-outline-primary update-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' . $row["ID"] . '" data-title="' . htmlspecialchars($row["TITLE"]) . '" data-description="' . htmlspecialchars($row["DESCRIPTION"]) . '">Update</button>';
          // Link for deletion
          echo '<a href="?delete_id=' . $row["ID"] . '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Are you sure you want to delete this note?\');">Delete</a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<div class="col-12"><p>No notes found. Start writing some!</p></div>';
      }
      $conn->close();
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>
  <script>
    // This script dynamically populates the modal form with note data
    document.addEventListener('DOMContentLoaded', function() {
      const updateButtons = document.querySelectorAll('.update-btn');
      updateButtons.forEach(button => {
        button.addEventListener('click', function() {
          const id = this.getAttribute('data-id');
          const title = this.getAttribute('data-title');
          const description = this.getAttribute('data-description');

          document.getElementById('edit-id').value = id;
          document.getElementById('edit-title').value = title;
          document.getElementById('edit-description').value = description;
        });
      });
    });
  </script>
</body>

</html>