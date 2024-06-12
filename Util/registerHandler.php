<?php
require '../vendor/autoload.php'; // Make sure you have installed PHPMailer via Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gad";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        http_response_code(500);
        echo json_encode(["message" => "Connection failed: " . $conn->connect_error]);
        exit;
    }

    $studentID = $_POST['studentID'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $sex = $_POST['sex'];
    $scholarship = $_POST['scholarship'];
    $membership = $_POST['membership'];

    if (empty($studentID) || empty($email) || empty($sex) || empty($gender) || empty($scholarship) || empty($membership)) {
        http_response_code(400);
        echo json_encode(["message" => "All fields are required"]);
        exit;
    }

    if (!preg_match("/^\d{2}-\d{5}$/", $studentID)) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid ID format"]);
        exit;
    }

    $check_users_sql = "SELECT * FROM users WHERE studentID = '$studentID'";
    $result_users = $conn->query($check_users_sql);

    if ($result_users->num_rows == 1) {
        http_response_code(400);
        echo json_encode(["message" => "Account already exist"]);
        exit;
    }

    $check_email_sql = "SELECT * FROM users WHERE email = '$email'";
    $result_email = $conn->query($check_email_sql);

    if ($result_email->num_rows > 0) {
        http_response_code(400);
        echo json_encode(["message" => "Email already exists"]);
        exit;
    }

    $check_studentID_sql = "SELECT * FROM studentrecords WHERE student_id = '$studentID'";
    $result_studentID = $conn->query($check_studentID_sql);

    if ($result_studentID->num_rows == 0) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid studentID"]);
        exit;
    }

    function generateVerificationCode() {
        return substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
    }
    
    function sendVerificationEmail($to, $code) {
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'digitalwebsiteplsp1@gmail.com';               
            $mail->Password   = 'hvqm nmvj iccg gerg';                  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;                                    
    
            // Sender and reply-to address
            $mail->setFrom('digitalwebsiteplsp1@gmail.com', 'Gender and Development');
            $mail->addReplyTo('digitalwebsiteplsp1@gmail.com', 'Gender and Development');
    
            // Recipient
            $mail->addAddress($to);
    
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Verification Code';
            $mail->Body    = '<html><body style="font-family: Arial, sans-serif; margin: 0; padding: 0;">
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td style="padding: 20px 0 30px 0;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                <tr>
                                    <td align="center" bgcolor="#34114b" style="padding: 40px 0 30px 0; color: #ffffff; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                        Gender and Development
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center" style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                                    <b>Your password is:</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 28px; font-weight: bold;">
                                                    ' . $code . '
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" bgcolor="#34114b" style="padding: 20px; color: #ffffff; font-size: 18px; font-family: Arial, sans-serif;">
                                                    PAMANTASAN NG LUNGSOD NG SAN PABLO
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body></html>';
    
            $mail->send();
            return true;
        } catch (Exception $e) {
            // Log the exception message
            error_log('Mailer Error: ' . $mail->ErrorInfo);
            return false;
        }
    }

    $verificationCode = generateVerificationCode();
    $hashedVerificationCode = password_hash($verificationCode, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (studentID, email, gender, sex, scholarship, membership, verification_code, user_type_id) 
            VALUES ('$studentID', '$email', '$gender', '$sex', '$scholarship', '$membership', '$hashedVerificationCode', 1)";

    if ($conn->query($sql) === TRUE) {
        if (sendVerificationEmail($email, $verificationCode)) {
            echo json_encode(["message" => "Your Password is sent to your email", "redirect" => "login.php"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Registration successful, but failed to send verification email."]);
        }
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
    }

    $conn->close();
}
?>
