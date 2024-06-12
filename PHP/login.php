<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="../Images/Logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITAL - GAD</title>
    <link rel="stylesheet" href="../CSS/login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">

    <!-- include jquery  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body class="d-flex align-items-center justify-content-center py-4 bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <!-- SVG symbols here -->
    </svg>

    <div class="row h-100 w-100">

        <div class="myCon col col-lg-6 col-md-6 pt-2 pb-2 slide-in-left">
            <div class="container pt-5 px-5 pb-0 h-100 w-100 justify-content-start align-items-start rounded-5">
                <div class="row d-block">
                    <h1 style="font-family: 'Roboto', sans-serif; font-weight: 900; color:white;">Hello!</h1>
                </div>

                <br>

                <div class="row d-block">
                    <p style="font-family: 'Roboto', sans-serif; color:white;">Welcome to our Gender and Development website! Log in to access resources like research articles, case studies, and interactive forums. New users can easily sign up by clicking 'Register'.</p>
                </div>

                <div class="row">
                    <p style="font-family: 'Roboto', sans-serif; color:white;">Once logged in, you can now participate in our surveys, and stay updated with the latest news. For any issues or questions, our support team is here to help. Thank you for joining us in promoting gender equality and sustainable development.</p>
                </div>

                <div class="row pt-3 align-items-center justify-content-center">
                    <img src="../Images/Login-logo.webp" class="img-fluid h-50 w-50" alt="LOGO">
                </div>
            </div>
        </div>

        <div class="myCon col-lg-1 col-md-1"></div>

        <div class="col col-lg-4 col-md-4 fade-in">
            <main class="form-signin h-100 w-100 d-flex justify-content-center align-items-center">
                <form id="loginForm" action="../Util/check-login.php" class="text-center w-100" method="POST">
                    <img class="mb-4" src="../Images/logo.png" alt="Logo" width="57" height="57">
                    <h1 class="h3 mb-3 fw-normal fw-bold">Sign in</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control" name="studentID" placeholder="Student ID">
                        <label for="floatingInput">Student ID</label>
                    </div>

                    <div class="form-floating my-3">
                        <input type="password" class="form-control" name="verification_code" placeholder="Verification Code">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="error-container h-100 w-100 d-flex justify-content-end align-items-end">
                        <div id="error-message" class="error-message error-message-fluid mt-5 w-50 p-2"></div>
                    </div>

                    <div class="form-check text-start my-2">
                        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember me
                        </label>
                    </div>

                    <button class="btn btn-primary w-100 my-1 py-2" type="submit">Sign in</button>
                    
                    <div class="row">
                        <div class="col">
                            <a href="./register.php" class="btn w-100 py-2 my-2">Register</a>
                        </div>
                        <div class="col">
                            <a href="./forgotPassword.php" class="btn w-100 py-2 my-2">Forgot Password</a>
                        </div>
                    </div>

                    <a href="../index.php" class="btn w-100 py-2 my-2" type="button">Back</a>

                </form>
            </main>
        </div>

        <div class="myCon col-lg-1 col-md-1"></div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        var errorMessage = document.getElementById("error-message");
        var loginForm = document.getElementById("loginForm");

        loginForm.addEventListener("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(loginForm);
            var xhr = new XMLHttpRequest();

            xhr.open("POST", loginForm.action, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    errorMessage.innerText = response.message;
                    errorMessage.style.display = "block";
                    setTimeout(function() {
                        if (response.redirect) {
                            location.href = response.redirect;
                        } else {
                            errorMessage.style.display = "none";
                        }
                    }, 2000);
                } else {
                    errorMessage.innerText = xhr.responseText;
                    errorMessage.style.display = "block";
                    setTimeout(function() {
                        errorMessage.style.display = "none";
                    }, 3000);
                }
            };

            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            xhr.send(formData);
        });
    </script>
</body>
</html>
