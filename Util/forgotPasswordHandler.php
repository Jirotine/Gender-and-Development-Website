<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('dbcon.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address']);
        exit;
    }

    // Check if email exists in the database
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email exists in the database, proceed to generate and send code
        $user = $result->fetch_assoc();

        // Generate random 4-digit code
        $code = sprintf('%04d', rand(0, 9999));

        // Insert code into user's row
        $update_sql = "UPDATE users SET code=? WHERE email=?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ss", $code, $email);
        $stmt->execute();

        // Send email using PHPMailer
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

            // Add recipient
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);                                   
            $mail->Subject = 'Password Reset Code';
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
                                                    <b>Your password reset code is:</b>
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
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success']);
            exit;

        } catch (Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Message could not be sent. Mailer Error:'. $mail->ErrorInfo]);
            exit;
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Email not found in our records.']);
        exit;
    }
}

$conn->close();
?>