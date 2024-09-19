<?php
include("./config.php");
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch all unique branches
$branch_query = "SELECT DISTINCT branch FROM student_details ORDER BY branch";
$branch_result = $conn->query($branch_query);
$branches = [];
while ($row = $branch_result->fetch_assoc()) {
    $branches[] = $row['branch'];
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./files/css/index.css">
    <link rel="stylesheet" href="./files/css/style.css">
    <style>
        .navbar{
            background: #666c5b !important;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 5px;
            background-color: #666c5b;
            border-right: 1px solid #dee2e6;
            margin-top: 56px !important;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>


<nav class="navbar navBar navbar-expand-lg navbar-dark" style="background-color: #666c5b !important;">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Orientation</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Add
            </a>
            <div class="dropdown-menu">
              <ul>
                <li><a class="dropdown-item" href="./add_student.php">Add Student Details</a></li>
                <li><a class="dropdown-item" href="#">Mega Menu Link</a></li>

              </ul>
            </div>
          </li>
          <li>
            &nbsp;

            &nbsp;
            &nbsp;
          </li>
          <li class="nav-item">
            <a class="btn btn-danger" href="./logout.php">Logout</a>
          </li>

        </ul>
        <form class="d-flex" role="search" id="searchForm">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchBar">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar for branches -->
            <nav class="my-5 col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <?php foreach ($branches as $branch): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="batch_departments.php?branch=<?= urlencode($branch) ?>">
                                    branch: <?= htmlspecialchars($branch) ?>
                                </a>
                            </li>
                            <hr>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <h2 class="mt-4">Welcome to Student Management System</h2>
                <p>Select a branch from the sidebar to view departments.</p>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./files/js/main.js"></script>
</body>
</html>
