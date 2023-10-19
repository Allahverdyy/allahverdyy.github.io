<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // PHPMailer sınıf dosyalarının yolu

$mail = new PHPMailer(true); // Yeni bir PHPMailer nesnesi oluştur

    // SMTP ayarları
    //Server settings
    $mail->SMTPDebug = 0;   
    // Enable verbose debug output
    $mail->isSMTP(); // SMTP protokolünü kullanarak gönderim yapacağımızı belirtiyoruz
    $mail->Host       = 'mail.kurumsaleposta.com'; // SMTP sunucu adresi
    $mail->SMTPAuth   = true; // SMTP kimlik doğrulaması kullanacağız
    $mail->Username   = 'info@abdulsamedtanriverdi.com.tr'; // SMTP kullanıcı adı
    $mail->Password   = 'R=Z@1q1G.l24a_Nc'; // SMTP parola
    $mail->SMTPSecure = false; // SSL/TLS şifrelemesi kullanmayacağız
    $mail->Port       = 587; // SMTP bağlantı noktası

    //Recipients
    //$mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress('info@abdulsamedtanriverdi.com.tr', 'abdulsamedtanriverdi.com.tr');     // Add a recipient
    //$mail->addReplyTo('your_email@example.com', 'Your Name');
    
    //Content
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);                                  // Set email format to HTML
    $subject = $_POST['subject'];
    $mail->Subject = $subject;
    $message = $_POST['message'];
    $mail->Body = $message;


try {
    if ($mail->send()) {
        $message = '<div style="text-align:center;">
                        <h1 style="color:#27e278;">E-postanız başarıyla gönderildi!</h1>
                        <p style="font-size:15px;">Teşekkür ederiz. Mesajınızı aldık ve en kısa sürede size geri döneceğiz.</p>
<!DOCTYPE html>
<html>
    <head>
    	<title>Örnek Sayfa</title>
    	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    	<style>
		    .back-button {
		    	display: inline-block;
		    	background-color: #252740;
			    color: #27e278;
		    	padding: 10px 20px;
			    border-radius: 5px;
		        font-size: 16px;
		    	font-weight: bold;
			    cursor: pointer;
			    font-family: Montserrat, sans-serif;
			    text-decoration: none;
	    	}

		    .back-button:hover {
		    	background-color: #1e2233;
	    	}
        </style>
    </head>
    <body>
    	<a href="/" class="back-button">Anasayfaya Dön</a>
    </body>
</html>


                    </div>';
    } else {
        throw new Exception($mail->ErrorInfo);
    }
} catch (Exception $e) {
    $message = '<div style="text-align:center;">
                    <h1 style="color:#27e278;">E-posta gönderirken bir hata oluştu:</h1>
                    <p style="font-size:15px;">' . $e->getMessage() . '</p>
                    <!DOCTYPE html>
<html>
    <head>
    	<title>Örnek Sayfa</title>
    	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    	<style>
		    .back-button {
		    	display: inline-block;
		    	background-color: #252740;
			    color: #27e278;
		    	padding: 10px 20px;
			    border-radius: 5px;
		        font-size: 16px;
		    	font-weight: bold;
			    cursor: pointer;
			    font-family: Montserrat, sans-serif;
			    text-decoration: none;
	    	}

		    .back-button:hover {
		    	background-color: #1e2233;
	    	}
        </style>
    </head>
    <body>
    	<a href="/" class="back-button">Anasayfaya Dön</a>
    </body>
</html>
                </div>';
}

echo '<html>
        <head>
            <link rel="stylesheet" type="text/css" href="posta.css">
            <title>E-posta gönderme sonucu</title>
            <style>
                body {
                    background-color: #252740;
                    font-family: Montserrat, sans-serif;
                    font-size: 16px;
                    line-height: 1.5;
                    margin: 0;
                    padding: 0;
                    text-align: center;
                }
                .message {
                    background-color: #fff;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                    margin: 50px auto;
                    max-width: 600px;
                    padding: 30px;
                }
            </style>
        </head>
        <body>
            <div class="message">' . $message . '</div>
        </body>
    </html>';

?>
