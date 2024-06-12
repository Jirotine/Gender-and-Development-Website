<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
    $user_id = isset($_SESSION['$user_id']) ? $_SESSION['$user_id'] : '';
    $status = '';
    $loginLogoutText = 'Logout';
    $loginLogoutUrl = '../Util/logout.php';
    $survey1 = 'SexualHarassmentAct.php';
    $survey2 = 'SafeSpaceAct.php';
    $survey3 = 'antiVAWC.php';

} else {
    $status = 'disabled';
    $username = 'Guest';
    $loginLogoutText = 'Login';
    $loginLogoutUrl = 'login.php';
    $survey1='login.php';
    $survey2='login.php';
    $survey3='login.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="../Images/Logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITAL - GAD</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="../CSS/styles.css?v=<?php echo time(); ?>">
    
    <!-- Font imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bungee&family=Jersey+10&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
<!-- HEADER -->
<div class="header-container w-100 d-flex justify-content-center fixed-top">
    <nav class="navbar navbar-expand-xxl w-75 d-flex justify-content-center py-3 px-5 rounded-5 my-2">
    <div class="container-fluid">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarsExample11">
        <div class="navbar-brand col-xxl-1 d-flex justify-content-center">
            <a href="../index.php">
            <img src="../Images/Logo.png" alt="LOGO" width="45" height="45">
            </a>
        </div>

        <ul class="navbar-nav col-xxl-9 text-center mx-auto custom-navbar">
            <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link" href="./About.php">About us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="#">References</a>
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

        <div class="login-container col-xxl-2 col-lg-12 me-3">
            <a class="nav-link py-2" id="logoutButton" href="<?php echo $loginLogoutUrl ?>"><?php echo $loginLogoutText ?></a>
        </div>

        </div>
    </div>
    </nav>
</div>
<!-- REFERENCES -->
<div class="referenceContainer container-fluid h-100 w-100">
    <div class="row">
        <div class="col">
            <div class="col-12 w-100 d-flex justify-content-center" style="margin-top:130px">
                <a href="./PHP/check-profile.php" class="greetingsText">
                <button class="Greetings" disabled>
                    <h2 class="greetingsText">REFERENCES</h2>
                </button>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col h-100 w-100">
            <div class="d-flex p-5 py-md-2 align-items-center justify-content-center">
                <ul class="dropdown-menu w-100 position-static d-grid gap-1 p-5 rounded-3 mx-0 shadow" data-bs-theme="light">
                    <div class="row">
                    <div class="col-12 my-3">
                    <li><a class="dropdown-item rounded-2 text-center fs-5 fw-bold text-black disabled" href="#">Sexual Harassment Act</a></li>
                    <li><a class="dropdown-item rounded-2 text-center" target="_blank" href="https://www.officialgazette.gov.ph/1995/02/14/republic-act-no-7877/">Republic Act No. 7877</a></li>
                    <li><a class="dropdown-item rounded-2 text-center" target="_blank" href="https://www.youtube.com/embed/OypXbH2O0tU">Sexual Harassment Laws in the Philippines</a></li>
                    </div>
                    <div class="col-12 my-3">
                    <li><a class="dropdown-item rounded-2 text-center fs-5 fw-bold text-black disabled" href="#">Safe Space Act</a></li>
                    <li><a class="dropdown-item rounded-2 text-center" target="_blank" href="https://lawphil.net/statutes/repacts/ra2019/ra_11313_2019.html">Republic Act No. 11313</a></li>
                    <li><a class="dropdown-item rounded-2 text-center" target="_blank" href="https://www.youtube.com/embed/OypXbH2O0tU">Ano ang Safe Spaces Act?</a></li>
                    </div>
                    <div class="col-12 my-3">
                    <li><a class="dropdown-item rounded-2 text-center fs-5 fw-bold text-black disabled" href="#">Violence Against Women and Children</a></li>
                    <li><a class="dropdown-item rounded-2 text-center" target="_blank" href="https://lawphil.net/statutes/repacts/ra2004/ra_9262_2004.html">Republic Act No. 9262</a></li>
                    <li><a class="dropdown-item rounded-2 text-center" target="_blank" href="https://www.youtube.com/embed/OypXbH2O0tU">Anti-Violence against Women & their Children Law</a></li>
                    </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="footer-container">
  <footer class="py-3 mt-5">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    </ul>
    <p class="text-center  text-body-secondary">© 2021 Pamantasan ng Lungsod ng San Pablo</p>
  </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        
</body>

</html>
