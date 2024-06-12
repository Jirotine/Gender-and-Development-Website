<?php
include ('../Util/dbcon.php');

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>GAD</title>
  <link rel="stylesheet" href="../CSS/admin.css?v=<?php echo time(); ?>">
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

  <!-- include jquery  -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

  <!-- js.datatables -->
  <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">


</head>

<body>
  <div class="container">
    <nav>
      <ul>
        <li>
          <a href="#" class="logo">
            <img src="../Images/Logo.png">
            <span class="nav-item">Admin</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-menorah" active></i>
            <span class="nav-item">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="adminReport.php">
            <i class="fas fa-database"></i>
            <span class="nav-item">Harassment</span>
          </a>
        </li>
        <li>
          <a href="adminReport2.php">
            <i class="fas fa-database"></i>
            <span class="nav-item">Safe Space</span>
          </a>
        </li>
        <li>
          <a href="adminReport3.php">
            <i class="fas fa-database"></i>
            <span class="nav-item">VAWC</span>
          </a>
        </li>
        <li><a href="../Util/logout.php" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a></li>
      </ul>
    </nav>
    <section class="main">
      <div class="main-top">
        <section class="user">
          <div class="user-list">
            <h1>Users List</h1>
            <table id="gadTable" class="table">
              <thead>
                <tr>
                  <th>studentID</th>
                  <th>Email</th>
                  <th>Sex</th>
                  <th>Gender</th>
                  <th>Scholarship</th>
                  <th>Membership</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["studentID"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["sex"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["scholarship"] . "</td>";
                    echo "<td>" . $row["membership"] . "</td>";
                    echo "<td><button onclick=\"confirmDelete('" . $row["studentID"] . "')\">Delete</button></td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='7'>0 results</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </section>
  </div>

  <script>
    function confirmDelete(studentID) {
      if (confirm("Are you sure you want to delete this account?")) {
        window.location.href = "delete_user.php?studentID=" + studentID;
      }
    };

    // call js.datatable
    $(document).ready(function () {
      let table = new DataTable('#gadTable');
    });

  </script>



  <!-- js.datatables -->
  <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

</body>

</html>