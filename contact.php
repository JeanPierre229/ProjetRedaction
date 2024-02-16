<!-- Vérification du mail, connexion à la base de donnée et envoie du mail -->
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    $nom = null;
    $message = null;
    $email = null;
    $error = null;
    $sucess = null;
    if(!empty($_POST['email']) && !empty($_POST) && isset($_POST)) {
        $nom = $_POST['nom'];
        $message = $_POST['message'];
        $email = $_POST['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $connect = new PDO("mysql: host=localhost; dbname=redaction_users", 'root', '');
            $requete = $connect->query("
                                INSERT INTO users(nom, mail, message)
                                VALUES ('$nom', '$email','$message');
                            ");
            $sucess = "Message envoyé !";
        }else{
            $error = "E-mail incorrect !";
        }
        if(envoi_mail($nom, $email, $message)){
            echo "Message envoyé !";
        }else{
            echo "Erreur d'envoie !";
        }
    } 

    function envoi_mail($from_name, $from_mail, $from_message){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'dodohoundealo@gmail.com';
        $mail->Password = 'ryvryvnagpyykuut';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom($from_name, $from_mail);
        $mail->addAddress('dodohoundealo@gmail.com','Jean Pierre');
        $mail->isHTML(true);
        //$mail->Subject = $subject;
        $mail->Body = $from_message;
        $mail->setLanguage('fr');
        
        if(!$mail->send()){
            return false;
        }else{
            return true;
        }

    }
?>
<!DOCTYPE html>
<html>
  
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  
  <title>JP SERVICE</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />


  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <!-- site icon -->
  <link rel="icon" href="images/logo.png">
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand mr-5" href="index.html">
            <img src="images/logo.png" alt="">
            <span>
              JP SERVICE
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item ">
                  <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> À Propos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.php"> Nos Services </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="contact.php">Contactez-nous</a>
                </li>
              </ul>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

  </div>


  <div class="body_bg layout_padding">


    <!-- contact section -->

    <section class="contact_section">
      <div class="container">
        <div class="heading_container">
          <h2>
            Restons en Contact !
          </h2>
        </div>
      </div>
      <div class="container contact_bg layout_padding2-top">
        <div class="row">
          <div class="col-md-6">
            <div class="contact_form ">
            <?php if($error){ ?>
                <p class="alert alert-danger" style="color: red;">
                    <?= $error ?>
                </p>
            <?php }elseif($sucess){ ?>
                <p class="alert alert-success" style="color: green;">
                    <?= $sucess ?>
                </p>
            <?php } ?>
              <form action="index.php" method="post">
                <input type="text" name="nom" placeholder="Nom ">
                <input type="email" name="email" placeholder="Email">
                <input type="text" name="message" placeholder="Message" class="message_input">
                <button>
                  Envoyer
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="img-box">
              <img src="images/contact-img.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end contact section -->

  </div>
  <!-- info section -->

  <section class="info_section layout_padding">
    <div class="footer_contact">
      <div class="heading_container">
        <h2>
          Contactez-nous
        </h2>
      </div>
      <div class="box">
        <a href="geo:9.336426,2.644136" class="img-box">
          <img src="images/location.png" alt="" class="img-1">
          <img src="images/location-o.png" alt="" class="img-2">
        </a>
        <a href="tel:+22953992605" class="img-box">
          <img src="images/call.png" alt="" class="img-1">
          <img src="images/call-o.png" alt="" class="img-2">
        </a>
        <a href="mailto: dodohoundealo@gmail.com"  class="img-box">
          <img src="images/envelope.png" alt="" class="img-1">
          <img src="images/envelope-o.png" alt="" class="img-2">
        </a>
      </div>
    </div>


  </section>


  <!-- end info section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2024 Tout droit réservé à
      <a href="#">Jean-Pierre HOUNDEALO</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>

</html>