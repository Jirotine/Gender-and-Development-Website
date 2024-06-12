<?php
session_start();

include('../Util/dbcon.php');

if (isset($_SESSION['studentID'])) {
    $studentID = $_SESSION['studentID'];

    $query = "SELECT gender FROM users WHERE studentID = '$studentID'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    $gender = $row['gender'];

    $_SESSION['gender'] = $gender;
} else {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="../Images/Logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITAL - GAD</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="../CSS/profile.css?v=<?php echo time(); ?>">
    
    <!-- Font imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bungee&family=Jersey+10&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Freeman&display=swap" rel="stylesheet">
</head>
</head>
<body>

<div id="myModal" class="modal" style="left:25%; top: 28%; height:auto;">
                <div class="modal-content" style="border: 1px solid black;">
                    <p style="text-align: center; font-weight: 1000;">ALERT!</p>
                    <p id="modal-message" style="text-align: center; margin-bottom: 20px;">Are you sure you want to delete your account?</p>
                    <div class="alert-button">
                    <button id="yesBtn" class="button2">Yes</button>
                    <button id="noBtn" class="button2">No</button>
                    </div>
                </div>
</div>

<div id="error-message" class="error-message"></div>

    <div class="container" id="container">

            <div class="square">

                <img src="../Images/profile.WEBP" alt="PROFILE LOGO" style="width: 20%;">
                <p>STUDENT-ID</p>
                <h2><?php echo $studentID ?></h2>
                <br>
                <p>GENDER</p>
                <h2><?php echo $gender ?></h2>
                <div class="button-profile">
                    <a href="change-password.php">
                    <button class="button1">Change Password</button>
                    </a>
                    <button id="deleteAccountBtn" class="button1">Delete Account</button>
            </div>
    </div>

    <a href="../index.php">
        <button class="button2" style="margin-top:10%;">Home</button>
    </a>

    <script>
    var container = document.getElementById("container");
    var modal = document.getElementById("myModal");
    var deleteAccountBtn = document.getElementById("deleteAccountBtn");
    var yesBtn = document.getElementById("yesBtn");
    var noBtn = document.getElementById("noBtn");


    deleteAccountBtn.onclick = function() {
        modal.style.display = "block";
        container.classList.add("blur-background");
    };

    noBtn.onclick = function() {
        container.classList.remove("blur-background");
        closeModal();
    };


yesBtn.onclick = function() {

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Util/delete-Account.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {

                closeModal();
                showMessage("Account has been deleted");

                setTimeout(function() {
                    window.location.href = "../index.php";
                }, 3000);
            } else {

                showMessage("Error deleting account");
            }
        }
    };
    xhr.send();
};


function showMessage(message) {
    var errorMessage = document.getElementById("error-message");
    errorMessage.innerText = message;
    errorMessage.style.display = "block";
}


function closeModal() {
    modal.style.display = "none";
    container.classList.remove("blur-background");
}


window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
};

</script>

</body>
</html>