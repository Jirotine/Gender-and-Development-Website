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

<!DOCTYPE php>
<php lang="en">
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
            <img src="../Images/Logo.svg" alt="LOGO" width="45" height="45">
            </a>
        </div>

        <ul class="navbar-nav col-xxl-9 text-center mx-auto custom-navbar">
            <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link active" href="#">About us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./references.php">References</a>
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

<div class="aboutUsContent">
    <div class="px-4 py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../Images/Logo.png" alt="" width="72" height="72">
        <h1 class="display-6 text-body-emphasis"><span class="digital-bold-letter">D</span>evelopmental <span class="digital-bold-letter">I</span>nnovations for <span class="digital-bold-letter">G</span>ender <span class="digital-bold-letter">I</span>nclusion, <span class="digital-bold-letter">T</span>raining, <span class="digital-bold-letter">A</span>nd <span class="digital-bold-letter">L</span>earning</h1>
        <div class="line-container m-3 d-flex justify-content-center"><div class="line"></div></div>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4"><span class="digital-bold-letter">DIGITAL</span> is a IT student organization at <span class="digital-bold-letter">Pamantasan ng Lungsod ng San Pablo</span> dedicated to promoting gender equality. Through workshops, campaigns, and community outreach, we raise awareness and empower others to support <span class="digital-bold-letter">Gender and Development</span> (GAD) principles.</p>
        </div>
    </div>

    <div class="row py-5">

    <div class="col col-lg-6 px-4 text-center">
        <h1 class="display-6 fw-bold text-body-emphasis">Goals</h1>
        <div class="line-container mt-3 d-flex justify-content-center"><div class="line2"></div></div>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Cultivate widespread understanding and appreciation of Gender and Development (GAD), advocating for equality and empowerment on a global scale. Through education, outreach, and partnerships, we aim to dismantle barriers and biases, fostering inclusivity and opportunity for all genders.</p>
        </div>
    </div>

    <div class="col col-lg-6 px-4 text-center">
        <h1 class="display-6 fw-bold text-body-emphasis">Vision</h1>
        <div class="line-container mt-3 d-flex justify-content-center"><div class="line2"></div></div>
        <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">We envision a future where individuals are empowered to reach their full potential, regardless of gender, and where gender-based discrimination and inequalities are eradicated. Through our collective efforts, we aspire to create inclusive communities, organizations, and systems that prioritize the well-being of every individual.</p>
        </div>
    </div>

    </div>

</div>
        

<div class="container">
  <footer class="py-3 mt-5">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    </ul>
    <p class="text-center text-body-secondary">© 2021 Pamantasan ng Lungsod ng San Pablo</p>
  </footer>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/intersection-observer@0.11.0/intersection-observer.js"></script>
    <script type="text/javascript" src="../Utils/design.js"></script>
    <script type="text/javascript" src="../Utils/dropdown.js"></script>
    

</body>

</php>