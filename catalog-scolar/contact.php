<?php  
    $title = "catalog-scolar - Informații de contact";
    $conn = mysqli_connect("localhost", "root", "", "catalog"); 

    require_once 'includes/head.php'; 
    require_once 'includes/contact_seg1.php'; 
    require 'PHPMailer/class.phpmailer.php';

if (isset($_POST['send'])){
		$nume = trim(stripslashes(htmlspecialchars($_POST['nume'])));
		$posta = trim(stripslashes(htmlspecialchars($_POST['posta'])));
		/*$tel = trim(stripslashes(htmlspecialchars($_POST['telefon'])));*/
		$mesaj = trim(stripslashes(htmlspecialchars($_POST['mesaj'])));

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'ssl://smtp.gmail.com';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'vnovatchi@gmail.com';           // SMTP username
$mail->Password = 'f72q1vT4txaTuHa'; 			   // SMTP password
$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                 // TCP port to connect: 587


$mail->setFrom("grakovboris@ya.ru", $nume); // de la cine este trimis
$mail->addReplyTo($posta, $nume); // cui ii raspunzi
$mail->addAddress('vnovatchi@gmail.com');   // Add a recipient, cui este adresat emailul

$mail->isHTML(true);  // Set email format to HTML

$mail->Subject = 'Email primit de la Localhost ' . $nume;
$mail->Body = $mesaj;

if(!$mail->send()) {
    echo 'Eroare la expedierea mesajului dvs.' . $mail->ErrorInfo;
} else {
    echo '<script>alert("Mesajul a fost expediat cu succes!");</script>';
}
}
?>
		<div class="col-md-7">
            <div class="panel panel-primary pnl_1">
                <div class="panel-heading">
                    <h3 class="text-center pnl_2">Formular de contact</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" class="form-horizontal" role="form" id="contact_form">
                        <div class="form-group">
                            <label for="nume">Nume</label>
                            <input type="text" name="nume" class="form-control" id="nume" placeholder="Nume Prenume" required="">
                        </div>
                        <div class="form-group">
                            <label for="posta">E-mail</label>
                            <input type="email" name="posta" class="form-control" id="posta" placeholder="exemplu@exemplu.domeniu" required="">
                        </div>
                        <div class="form-group">
                            <label for="message">Mesaj</label>
                            <textarea type="text" name="mesaj" class="form-control" id="message" placeholder="Scrieți mesajul dvs. aici" rows="5" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" name="send" class="btn btn-success" id="send">Expediați</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
