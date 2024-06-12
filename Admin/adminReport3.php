<?php
include ('../Util/dbcon.php');

$sql = "SELECT * FROM survey_answers where survey_type_id=3";
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
          <a href="adminDashboard.php">
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
          <a href="#">
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
            <h1>Sexual Harassment Act Report</h1>
              <!-- SURVEYS REULTS -->
              <div class="Survey">
                  <div class="chart-container">
                    <canvas id="surveyChartThree" width="300" height="300"></canvas>
                  </div>
                  <div class="chart-container">
                  <canvas id="myChart" width="600" height="400"></canvas>
                  </div>
              </div>
              <section class="user">
                  <div class="user-list">
                    <h1>Users List</h1>
                    <table id="gadTable" class="table">
                      <thead>
                        <tr>
                          <th>SurveyID</th>
                          <th>StudentID</th>
                          <th>QuestionID</th>
                          <th>Date</th>
                          <th>Email</th>
                          <th>Answers</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["survey_id"] . "</td>";
                            echo "<td>" . $row["studentID"] . "</td>";
                            echo "<td>" . $row["question_id"] . "</td>";
                            echo "<td>" . $row["Date"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["answers"] . "</td>";
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
    </section>
  </div>

  <script>
    function confirmDelete(userId) {
      if (confirm("Are you sure you want to delete this response?")) {
        window.location.href = "delete_user.php?userId=" + userId;

      }
    }
  </script>

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



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// AJAX request to fetch data from PHP script
var xhr = new XMLHttpRequest();
xhr.open('GET', '../Util/fetch_survey_data1_bar.php', true);
xhr.onload = function() {
    if (xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);

        // Chart.js initialization
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Survey Responses',
                    data: data,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)', // Bar color
                    borderColor: 'rgba(153, 102, 255, 1)', // Border color
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
};
xhr.send();
</script>

<script>
    // Function to calculate counts for each category
    function calculateCategoryCounts(data) {
        var categoryCounts = {
            'Low': 0,
            'Mid': 0,
            'High': 0
        };
        
        // Iterate through data and count responses for each category
        data.forEach(function(item) {
            categoryCounts[item.label]++;
        });
        
        return categoryCounts;
    }

    // Function to initialize the pie chart
    function initializeChart(data, canvasId) {
        var labels = [];
        var counts = [];
        var backgroundColors = [];
        var borderColors = [];
        
        // Calculate category counts
        var categoryCounts = calculateCategoryCounts(data);
        
        // Extract data for chart initialization
        Object.keys(categoryCounts).forEach(function(category) {
            labels.push(category);
            counts.push(categoryCounts[category]);
            // Customize colors based on category
            if (category === 'High') {
                backgroundColors.push('rgba(255, 99, 132, 0.5)');
                borderColors.push('rgba(255, 99, 132, 1)');
            } else if (category === 'Mid') {
                backgroundColors.push('rgba(54, 162, 235, 0.5)');
                borderColors.push('rgba(54, 162, 235, 1)');
            } else {
                backgroundColors.push('rgba(255, 206, 86, 0.5)');
                borderColors.push('rgba(255, 206, 86, 1)');
            }
        });

        var ctx = document.getElementById(canvasId).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Survey Responses',
                    data: counts,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                legend: {
                    labels: {
                        fontColor: '#FFFFFF'
                    }
                }
            }
        });
    }

    // Fetch data from PHP script
    fetch('../Util/fetch_survey_data3.php')
    .then(response => response.json())
    .then(data => {
        // Call the function to initialize the chart with fetched data
        initializeChart(data, 'surveyChartThree');
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
</script>

</body>
</html>
