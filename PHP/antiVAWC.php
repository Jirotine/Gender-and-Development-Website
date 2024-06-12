<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="../Images/Logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITAL - GAD</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/survey.css?v=<?php echo time(); ?>">
    
    <!-- Font imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bungee&family=Jersey+10&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body style="background-color:#34114b">

<div id="error-message" class="error-message"></div>

<div id="myModal" class="modal" style="left:25%; top: 28%; height: auto;">
    <div class="modal-content" style="border: 1px solid black;">
        <span class="close" style="text-align: center; right: 5%; top: -1%;">&times;</span>
        <p style="text-align: center; font-weight: 1000;">ALERT!</p>
        <p id="modal-message" style="text-align: center;">Before proceeding with the survey, please be aware that providing accurate and reliable information is crucial for the security and functionality of our platform. Inaccurate or incomplete data may affect your ability to access our services and could lead to account suspension.</p>
    </div>
</div>

<div class="box" id="box">
    <div class="row">
        <div class="col-sm-12 col-lg-6 col-md-6">
            <div class="box">
                <form id="surveyForm" action="../Util/surveyHandler3.php" method="post">
                    <div class="Question">
                        <p>1. Do you believe that the VAWC Act is effective in preventing violence against women and children?</p>
                        <input type="radio" name="question1" value="Yes" required> Yes
                        <br>
                        <input type="radio" name="question1" value="No" required> No
                    </div>

                    <div class="Question">
                        <p>2. Do you believe that the VAWC Act has improved the handling of violence against women and children cases</p>
                        <input type="radio" name="question2" value="Yes" required> Yes
                        <br>
                        <input type="radio" name="question2" value="No" required> No
                    </div>

                    <div class="Question">
                        <p>3. Should there be more public campaigns to educate people about the VAWC Act</p>
                        <input type="radio" name="question3" value="Yes" required> Yes
                        <br>
                        <input type="radio" name="question3" value="No" required> No
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6">
                <div class="box1">
                    <div class="Question">
                        <p>4. Are you aware of the specific types of violence that are prohibited under the VAWC Act?</p>
                        <input type="radio" name="question4" value="Yes" required> Yes
                        <br>
                        <input type="radio" name="question4" value="No" required> No
                    </div>

                    <div class="Question">
                        <p>5. Are you aware of the legal protections provided for victims under the VAWC Act?</p>
                        <input type="radio" name="question5" value="Yes" required> Yes
                        <br>
                        <input type="radio" name="question5" value="No" required> No
                    </div>

                    <button class="button" type="submit">Submit</button>
                    <a href="../index.php">
                    <button class="button" type="button" >Cancel</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var modal = document.getElementById("myModal");
    var closeBtn = document.getElementsByClassName("close")[0];
    var box = document.getElementById("box");

    window.onload = function() {
        modal.style.display = "block";
        box.classList.add("blur-background");
    };

    closeBtn.onclick = function() {
        modal.style.display = "none";
        box.classList.remove("blur-background");
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            form.classList.remove("blur-background");
        }
    };
</script>

<script>
    var errorMessage = document.getElementById("error-message");
    var surveyForm = document.getElementById("surveyForm");

    surveyForm.addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(surveyForm);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", surveyForm.action, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response.includes("Survey submitted successfully")) {
                    errorMessage.innerText = "Survey submitted successfully";
                    errorMessage.style.display = "block";
                    setTimeout(function() {
                        location.href ="../index.php";
                        errorMessage.style.display = "none";
                    }, 3000);
                } else {
                    errorMessage.innerText = response;
                    errorMessage.style.display = "block";
                    setTimeout(function() {
                        location.href ="../index.php";
                        errorMessage.style.display = "none";
                    }, 3000);
                }
            } else {
                errorMessage.innerText = "Error: Unable to submit the survey.";
                errorMessage.style.display = "block";
                setTimeout(function() {
                    errorMessage.style.display = "none";
                }, 3000);
            }
        };

        xhr.send(formData);
    });
</script>


</body>