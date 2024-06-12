<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="../Images/Logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITAL - GAD</title>
    <link rel="stylesheet" href="../CSS/change-username2.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
</head>
<body style="background-color:#34114b">
<form class="box" method="POST" action="check-password-change2.php" id="change-password-form">
    <div id="error-message" class="error-message"></div>
    <img class="Logo" src="../Images/Logo.png" alt="DIGITAL LOGO">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
    <input type="password" name="newPassword" class="Password" placeholder="NEW PASSWORD">
    <input type="password" name="confirmPassword" class="Password" placeholder="CONFIRM PASSWORD">
    <div class="box-buttons">
        <button class="Login" type="submit">Change Password</button>
        <a href="check-profile.php"><button type="button" class="Cancel">Cancel</button></a>
    </div>
</form>

<script>
    var errorMessage = document.getElementById("error-message");
    var changePasswordForm = document.getElementById("change-password-form");

    changePasswordForm.addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(changePasswordForm);
        var email = formData.get("email");
        var newPassword = formData.get("newPassword");
        var confirmPassword = formData.get("confirmPassword");

        fetch("../Util/check-password-change2.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "Change password successful!") {

                errorMessage.innerText = data;
                errorMessage.style.display = "block";


                setTimeout(() => {
                    window.location.href = "login.php";
              }, 3000);
            } else {
      
                errorMessage.innerText = data;
                errorMessage.style.display = "block";

                setTimeout(() => {
                    errorMessage.style.display = "none";
                }, 3000);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

</body>
</html>