
<?php
session_start();

    if(empty($_SESSION['is_login'])) {
        header("location: index.php");
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Exam Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="teachers.php">Teachers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Classes</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tests</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Reports</a>
        </li>

        <li class="nav-item pull-right">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>