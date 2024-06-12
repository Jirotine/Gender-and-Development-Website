<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="../Images/Logo.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIGITAL - GAD</title>
    <link rel="stylesheet" href="../CSS/forgotPassword.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
</head>
<body style="background-color:#34114b">
<form class="box" method="POST" action="../Util/forgotPasswordHandler.php" id="loginForm">
    <div id="error-message" class="error-message"></div>
    <div id="success-message" class="success-message"></div>
    <img class="Logo" src="../Images/Logo.png" alt="DIGITAL LOGO">
    <div class="emailBox">
        <p>Input your email address</p>
        <input type="text" name="Email" class="Email" placeholder="Email">
        <div class="box-buttons">
            <button class="Submit" type="submit">Submit</button>
        </div>
    </div>
</form>

<script>
document.getElementById('loginForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);
    const email = formData.get('Email');

    
    if (!validateEmail(email)) {
        showMessage('error', 'Invalid email address');
        return;
    }

    try {
        const response = await fetch(event.target.action, {
            method: 'POST',
            body: formData,
        });
        const data = await response.json();

        if (data.status === 'success') {
            showMessage('success', 'Code has been sent!');
            setTimeout(() => {
                window.location.href = `Code.php?email=${email}&code=`;
            }, 3000);
        } else {
            showMessage('error', data.message);
        }
    } catch (error) {
        showMessage('error', 'An error occurred. Please try again later.');
    }
});

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function showMessage(type, message) {
    const messageElement = type === 'error'? document.getElementById('error-message') : document.getElementById('success-message');
    messageElement.textContent = message;
    messageElement.style.display = 'block';
    messageElement.classList.add(type);

    setTimeout(() => {
        messageElement.style.display = 'none';
        messageElement.classList.remove(type);
    }, 3000);
}
</script>

</body>
</html>