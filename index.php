<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    $username = isset($_SESSION['studentID']) ? $_SESSION['studentID'] : '';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $status = '';
    $loginLogoutText = 'Logout';
    $loginLogoutUrl = './Util/logout.php';
    $survey1 = './PHP/SexualHarassmentAct.php';
    $survey2 = './PHP/SafeSpaceAct.php';
    $survey3 = './PHP/antiVAWC.php';

} else {
    $status = 'disabled';
    $username = 'BE AWARE';
    $loginLogoutText = 'Login';
    $loginLogoutUrl = './PHP/login.php';
    $survey1 = './PHP/login.php';
    $survey2 = './PHP/login.php';
    $survey3 = './PHP/login.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="./Images/Logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITAL - GAD</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="./CSS/styles.css?v=<?php echo time(); ?>">
    
    <!-- Font imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bungee&family=Jersey+10&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

<!-- HEADER -->
<div class="header-container w-100 d-flex justify-content-center">
    <nav class="navbar navbar-expand-xxl w-75 d-flex justify-content-center py-3 px-5 rounded-5 my-2">
    <div class="container-fluid">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarsExample11">

        <div class="navbar-brand col-xxl-1 d-flex justify-content-center">
            <a href="#">
            <img src="./Images/Logo.svg" alt="LOGO" width="45" height="45">
            </a>
        </div>

        <ul class="navbar-nav col-xxl-9 text-center mx-auto custom-navbar">
            <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="./PHP/About.php">About us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./PHP/references.php">References</a>
            </li>
            <li class="nav-item dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Survey
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo $survey1 ?>">Safe Space Act</a></li>
                <li><a class="dropdown-item" href="<?php echo $survey2 ?>">Sexual Harassment Act</a></li>
                <li><a class="dropdown-item" href="<?php echo $survey3 ?>">Anti Violence Against Women and Children</a></li>
            </ul>
            </li>
        </ul>

        <div class="login-container col-xxl-2 col-lg-12 col-md-12 col-sm-12 col-12  me-3">
            <a class="nav-link py-2" id="logoutButton" href="<?php echo $loginLogoutUrl ?>"><?php echo $loginLogoutText ?></a>
        </div>

        </div>
    </div>
    </nav>
</div>


<!-- CAROUSEL -->
<div id="carouselExampleCaptions" class="carousel slide carousel-fade">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner rounded-5">
    <div class="carousel-item active c-item">
      <img src="./Images/Announcement1.webp" class="d-block w-100 c-image" alt="Announcements">
      <div class="carousel-caption d-none d-md-block">
        <div class="carousel-description w-100 d-flex justify-content-center">
                <div class="carousel-description w-75" style="background-color: #34114d; border-radius:5px;">
                <h4 class="fw-bold pt-3 px-3">| HAPPENING NOW |</h4>
                <p class="pb-3 px-3">Center for Gender Equality and Development (CGEAD), in collaboration with the University Student Parliament and the Association LGBTQA+ towards Inclusivity and Diversity for a Better World, is conducting a gender sensitivity training at the Pablo Ticzon Building on March 22.</p>
                </div>
        </div>
      </div>
    </div>
    <div class="carousel-item c-item">
      <img src="./Images/Announcement2.webp" class="d-block w-100 c-image" alt="Announcements">
      <div class="carousel-caption d-none d-md-block">
        <div class="carousel-description w-100 d-flex justify-content-center">
            <div class="carousel-info d-flex justify-content-center">
                <a href="https://www.facebook.com/plspGAD/posts/898569792276455?ref=embed_post" target="_blank" class="panelButton d-flex align-items-center justify-content-center my-3">View</a>
            </div>
        </div>
      </div>
    </div>
    <div class="carousel-item c-item">
      <img src="./Images/Announcement3.webp" class="d-block w-100 c-image" alt="Announcements">
      <div class="carousel-caption d-none d-md-block">
        <div class="carousel-description w-100 d-flex justify-content-center">
            <div class="carousel-info d-flex justify-content-center">
                <a href="https://www.facebook.com/plspGAD/posts/pfbid031GSQp7Fh66AGYZD8UDdafbvcJqH9hz8VXm7WMd3nDH5bUo7F85N1F4rQmZNFtgHpl" target="_blank" class="panelButton d-flex align-items-center justify-content-center my-3">View</a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="background-color: #34114d;  height:15%; width:7%; top:50%; left:5%; border-radius:5px;">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="background-color: #34114d;  height:15%; width:7%; top:50%; right:5%; border-radius:5px;">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="col-12 d-flex justify-content-center">
    <a href="./PHP/check-profile.php" class="greetingsText">
        <button class="Greetings" <?php echo $status ?>>
            <h3 class="greetingsText"><?php echo $username?></h3>
        </button>
    </a>
</div>

<!-- INTRODUCTION -->

<div class="container w-75 my-5">
    <div class="row p-3 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-8 p-4 p-lg-5 pt-lg-3">
        <h1 class="infoTitle display-5 mb-5 fw-bold lh-1 text-body-emphasis">Gender And Development</h1>
        <p class="lead">The development perspective and process that is participatory and empowering, equitable, sustainable, free from violence, respectful of human rights, supportive of self-determination and actualization of human potentials. It seeks to achieve gender equality as a fundamental value that should be reflected in development choices and contends that women are active agents of development, not just passive recipients of development.</p>
      </div>
      <div class="col-lg-4 p-5 overflow-hidden d-flex justify-content-center">
          <img class="img-fluid" src="./Images/Picture1.png" alt="PICTURE" width="300">
      </div>
    </div>
</div>

<!-- SURVEY -->

<div class="col-12 w-100 d-flex justify-content-center" style="margin-top:200px">
    <a href="./PHP/check-profile.php" class="greetingsText">
        <button class="Greetings" disabled>
            <h2 class="greetingsText">SURVEY</h2>
        </button>
    </a>
</div>

<div class="container-fluid">
<div class="row" style="margin-top:30px">
    <div class="col col-lg-4 d-flex justify-content-center my-3">
        <div class="card shadow-lg" style="width: 25rem; height:32rem;">
            <img src="./Images/SexualHarassment.png" class="card-img-top" alt="SexualHarassment">
            <div class="card-body pb-2">
                <h5 class="card-title text-center fw-bold">Sexual Harassment Act</h5>
                <p class="card-text text-center">This law states that work or education-related sexual harassment arises when someone in authority demands sexual favors from another in that setting, regardless of acceptance.</p>
                <div class=" mt-3 d-flex justify-content-center">
                <a href="<?php echo $survey1?>" class="panelButton2 d-flex align-items-center justify-content-center my-2">Survey</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-lg-4 d-flex justify-content-center my-3">
        <div class="card shadow-lg" style="width: 25rem; height:32rem;">
            <img src="./Images/SafeSpaceAct.png" class="card-img-top" alt="SafeSpaceAct">
            <div class="card-body">
                <h5 class="card-title text-center fw-bold">Safe Space Act</h5>
                <p class="card-text text-center">The State upholds human dignity and rights, ensuring equality for women and men in all spheres, including public spaces, workplaces, and education, to foster a safe and equal society.</p>
                <div class="d-flex justify-content-center">
                <a href="<?php echo $survey2?>" class="panelButton2 d-flex align-items-center justify-content-center my-2">Survey</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-lg-4 d-flex justify-content-center my-3">
        <div class="card shadow-lg" style="width: 25rem; height:32rem;">
            <img src="./Images/VAWC.png" class="card-img-top" alt="VAWC">
            <div class="card-body p-3 justify-content-center">
                <h5 class="card-Title text-center fw-bold mb-3">Anti-Violence Against Women and their Children</h5>
                <p class="card-text text-center">This law aims to combat intimate partner violence against women and their children, perpetrated by spouses, ex-partners, live-in partners, or dating partners.</p>
                <div class="d-flex justify-content-center">
                <a href="<?php echo $survey3?>" class="panelButton2 d-flex align-items-center justify-content-center my-2">Survey</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-12 d-flex justify-content-center" style="margin-top:200px">
        <a href="./PHP/check-profile.php" class="greetingsText">
            <button class="Greetings w-100" disabled>
                <h3 class="greetingsText">MAGNA CARTA OF WOMEN</h3>
            </button>
        </a>
    </div>
</div>

<div class="container-fluid" style="margin-top:50px">
    <div class="row  p-3 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
        <div class="col-lg-4 p-5 overflow-hidden d-flex justify-content-center">
          <img class="img-fluid" src="./Images/Picture2.png" alt="PICTURE" width="200">
        </div>
        <div class="col-lg-8 p-4 p-lg-5 pt-lg-3">
            <h1 class="infoTitle display-4 mb-5 fw-bold lh-1 text-body-emphasis">Magna Carta of Women (Republic Act No. 9710)</h1>
            <p class="lead">As the development perspective and process that is participatory and empowering, equitable, sustainable, free from violence, respectful of human rights, supportive of self-determination and actualization of human potentials. It seeks to achieve gender equality as a fundamental value that should be reflected in development choices and contends that women are active agents of development, not just passive recipients of development.</p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-12 d-flex justify-content-center" style="margin-top:200px">
        <a href="./PHP/check-profile.php" class="greetingsText">
            <button class="Greetings w-100" disabled>
                <h2 class="greetingsText">VIDEO PRESENTATIONS</h2>
            </button>
        </a>
    </div>
</div>

<!-- VIDEO PRESENTATIONS -->

<div class="row" style="margin-top:30px">
    <div class="col col-lg-4 d-flex justify-content-center mt-3 mb-5">
        <div class="card shadow-lg" style="width: 25rem; height:27rem;">
        <iframe width="400" height="200" src="https://www.youtube.com/embed/OypXbH2O0tU" title="Sexual Harassment Laws in the Philippines" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <div class="card-body pb-2">
                <h5 class="card-title text-center fw-bold">Sexual Harassment Laws in the Philippines</h5>
                <p class="card-text text-center">by: Justic Yap</p>
                <div class=" mt-3 d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>

    <div class="col col-lg-4 d-flex justify-content-center my-3">
        <div class="card shadow-lg" style="width: 25rem; height:27rem;">
        <iframe width="400" height="200" src="https://www.youtube.com/embed/leuEjL4c6KE" title="#QuestionHour: Ano ang Safe Spaces Act?" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <div class="card-body pb-2">
                <h5 class="card-title text-center fw-bold mt-4">Ano ang Safe Spaces Act?</h5>
                <p class="card-text text-center">by: Batas For Every Juan</p>
                <div class=" mt-3 d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>

    <div class="col col-lg-4 d-flex justify-content-center my-3">
        <div class="card shadow-lg" style="width: 25rem; height:27rem;">
        <iframe width="400" height="200" src="https://www.youtube.com/embed/fF8THlu3Nbw" title="VAWC: Anti-Violence against Women &amp; their Children Law-Part 1| Abuso sa Kababaihan" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <div class="card-body pb-2">
                <h5 class="card-title text-center fw-bold">VAWC: Anti-Violence against Women & their Children Law</h5>
                <p class="card-text text-center">by: Batas Pilipinas-Know Your Rights PH</p>
                <div class=" mt-3 d-flex justify-content-center">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<div class="footer-container">
  <footer class="py-3 mt-5">
    <p class="text-center  text-body-secondary">© 2021 Pamantasan ng Lungsod ng San Pablo</p>
  </footer>
</div>

<!-- SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7TlRbs/ic4AwGcFZOxg5DpPt8EgeUIgIwzjWfXQKWA3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-7bQv7KW9f7/8W7w3QfZostBCRVjhE7YR21zJr4X/D5FJG3h82U7I0/Vu6xRKI1T" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/intersection-observer@0.11.0/intersection-observer.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../Utils/design.js"></script>
<script type="text/javascript" src="../Utils/dropdown.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- CHART SCRIPT -->
<script>
    function calculateCategoryCounts(data) {
        var categoryCounts = {
            'Low': 0,
            'Mid': 0,
            'High': 0
        };
        

        data.forEach(function(item) {
            categoryCounts[item.label]++;
        });
        
        return categoryCounts;
    }


    function initializeChart(data, canvasId) {
        var labels = [];
        var counts = [];
        var backgroundColors = [];
        var borderColors = [];
        

        var categoryCounts = calculateCategoryCounts(data);
        

        Object.keys(categoryCounts).forEach(function(category) {
            labels.push(category);
            counts.push(categoryCounts[category]);

            if (category === 'High') {
                backgroundColors.push('rgba(255, 99, 132, 0.5)');
                borderColors.push('rgba(255, 99, 132, 1)');
            } else if (category === 'Mid') {
                backgroundColors.push('rgba(54, 162, 235, 0.5)');
                borderColors.push('rgba(54, 162, 235, 1)');
            } else if (category === 'Low') {
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


    fetch('./Util/fetch_survey_data1.php')
    .then(response => response.json())
    .then(data => {

        initializeChart(data, 'surveyChartOne');
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });

  
    fetch('./Util/fetch_survey_data2.php')
    .then(response => response.json())
    .then(data => {

        initializeChart(data, 'surveyChartTwo');
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });

    fetch('./Util/fetch_survey_data3.php')
    .then(response => response.json())
    .then(data => {

        initializeChart(data, 'surveyChartThree');
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const element = document.querySelector('.container');

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('pop-up');
        } else {
          entry.target.classList.remove('pop-up');
        }
      });
    }, {
      threshold: 0.1 
    });

    observer.observe(element);
  });
</script>


</body>

</html>


