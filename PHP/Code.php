<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="../Images/Logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITAL - GAD</title>
    <link rel="stylesheet" href="../CSS/Code.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
</head>
<body style="background-color:#34114b">
<form class="box" method="POST" action="../Util/checkCode.php" id="loginForm">
    <div id="error-message" class="error-message"></div>
        <img class="Logo" src="../Images/Logo.png" alt="DIGITAL LOGO">
        <div class="codeBox">
        <p>Please input the code</p>
        <input type="text" name="Code" class="Code" placeholder="Code">
        <input type="hidden" name="Email" value="<?php echo $_GET['email']; ?>">
        <div class="box-buttons">
            <button class="Submit" type="submit">Submit</button>
        </div>
</form>

<script>
    var errorMessage = document.getElementById("error-message");
    var loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(loginForm);
        var email = formData.get("Email");
        var code = formData.get("Code");

        fetch("../Util/checkCode.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === "Code Successful") {

                errorMessage.innerText = data;
                errorMessage.style.display = "block";

   
                setTimeout(() => {
                    window.location.href = "change-password2.php?email=" + email;
                }, 2000);
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