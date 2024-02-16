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
            $sucess = "Message envoyé !";
        }else{
            $error = "Erreur d'envoie !";
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

  <title>JP Service</title>

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

<body>
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
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> À Propos </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.php"> Nos Services </a>
                </li>
                <li class="nav-item">
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
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Bienvenu au <br>
                        <span>
                          Service de Rédaction de Contenu
                        </span>
                      </h1>
                      <p>
                        Découvrez notre plateforme d'écriture web et débloquez votre créativité en laissant couler
                        vos mots.
                      </p>
                      <div class="btn-box">
                        <a href="contact.php" class="btn-1">
                          Contactez-nous
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Bienvenu au <br>
                        <span>
                          Service de Rédaction de Contenu
                        </span>
                      </h1>
                      <p>
                        Explorez comment nos mots peuvent dynamiser votre contenu et engager votre audience 
                        comme jamais auparavant.
                      </p>
                      <div class="btn-box">
                        <a href="" class="btn-1">
                          Contactez-nous
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="custom_carousel-control">
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="sr-only">Precedent</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="sr-only">Suivant</span>
          </a>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                À Propos !
              </h2>
            </div>
            <p class="text-justify">
              Je m'appelle Jean-Pierre et je suis un rédacteur web passionné, basé au Bénin. J'ai plusieurs années 
              d'expérience dans le domaine de la rédaction et de l'optimisation pour les moteurs de recherche (SEO).
              Mon but est de partager des contenus originaux, informatifs et engageants sur différents sujets tels que la
              technologie, les voyages et la mode. Outre ma passion pour l'écriture, j'aime également la musique et la cuisine.
              Je suis ouvert à toute collaboration et suis disponible pour répondre à vos questions ou partager vos idées sur 
              n'importe quel sujet.
            </p>
            <a href="">
              Commencer
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->
  <div class="body_bg layout_padding">

    <!-- service section -->

    <section class="service_section ">
      <div class="container">
        <div class="heading_container">
          <h2>
            Nos Services
          </h2>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="images/s-1.png" alt="">
              </div>
              <h4>
                Chatter avec son Amour
              </h4>
              <p class="text-justify">
                Rejoignez-nous et découvrez comment nos conseils personnalisés peuvent transformer vos 
                conversations en moments magiques, et comment nos modèles de rédaction peuvent donner vie 
                à vos émotions les plus profondes. Parce que chaque mot compte dans une relation, nous sommes 
                là pour vous aider à trouver les mots justes pour exprimer votre amour.
              </p>
              <a href="service.php">
                 En savoir plus...
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box align-items-end align-items-md-start text-right text-md-left">
              <div class="img-box">
                <img src="images/s-2.png" alt="">
              </div>
              <h4>
                Relecture d'Article
              </h4>
              <p class="text-justify">
                Grâce à notre expertise en révision linguistique et en correction de style, nous vous 
                offrons des conseils précieux pour améliorer la structure de vos articles, clarifier 
                vos idées et éviter les erreurs courantes. Avec notre approche personnalisée, nous 
                vous aidons à atteindre vos objectifs de communication avec confiance et professionnalisme.
              </p>
              <a href="service.php">
                En savoir plus...
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="img-box">
                <img src="images/s-3.png" alt="">
              </div>
              <h4>
                Mis à Jour
              </h4>
              <p class="text-justify">
                Grâce à notre analyse approfondie et à notre recherche constante, nous identifions les 
                opportunités d'amélioration, mettons à jour les données obsolètes et optimisons la 
                structure de vos articles pour une meilleure lisibilité et une plus grande valeur ajoutée. 
                Avec notre approche proactive, nous vous aidons à maintenir votre contenu à jour et à rester 
                en tête dans votre domaine d'expertise
              </p>
              <a href="service.php">
                En savoir plus...
              </a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box align-items-end align-items-md-start text-right text-md-left">
              <div class="img-box">
                <img src="images/s-4.png" alt="">
              </div>
              <h4>
                Rédaction Premium
              </h4>
              <p class="text-justify">
                Vous aspirez à des contenus uniques et percutants qui captivent votre audience dès 
                les premiers mots ? Optez pour notre service de Rédaction Premium. Nos rédacteurs 
                chevronnés et créatifs travaillent en étroite collaboration avec vous pour donner 
                vie à vos idées et atteindre vos objectifs de communication.
              </p>
              <a href="service.php">
                En savoir plus...
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end service section -->

    <!-- quote section -->

    <section class="quote_section layout_padding">
      <div class="container">
        <div class="box">
          <div class="detail-box">
            <h3>
              Obtenez votre devis maintenant !
            </h3>
            <p>
              Prenez le premier pas vers une solution adaptée à vos besoins en demandant une 
              évaluation personnalisée dès maintenant.
            </p>
          </div>
          <div class="btn-box">
            <a href="#">
              Obtenir
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- end quote section -->


    <!-- contact section -->

    <section class="contact_section">
      <div class="container">
        <div class="heading_container">
          <h2>
            Restons en contact!
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

    <!-- client section -->

    <section class="client_section layout_padding-top">
      <div class="d-flex justify-content-center">
        <div class="heading_container">
          <h2>
            Des avis
          </h2>
        </div>
      </div>
      <div class="container layout_padding2">
        <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
            <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item ">
              <div class="client_container">
                <div class="client-id">
                  <div class="img-box">
                    <img src="images/solomon.png" alt="">
                  </div>
                  <div class="client_name">
                    <div>
                      <h3>
                        Salomon
                      </h3>
                      <p>
                        Farm & CO
                      </p>
                    </div>
                  </div>
                </div>
                <div class="client_detail">
                  <div class="client_text">
                    <blockquote>
                      <p class="text-justify">
                        Le contenu offre une perspective intéressante sur le sujet, mais une révision pour éliminer les répétitions 
                        et clarifier certains points rendrait la lecture plus fluide et accessible. En illustrant vos points 
                        avec des exemples réels ou des études de cas, vous pouvez rendre le contenu plus concret et faciliter 
                        la compréhension pour votre audience cible.
                      </p>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item active">
              <div class="client_container">
                <div class="client-id">
                  <div class="img-box">
                    <img src="images/aime.png" alt="">
                  </div>
                  <div class="client_name">
                    <div>
                      <h3>
                        David Aimé
                      </h3>
                      <p>
                        Farm & CO
                      </p>
                    </div>
                  </div>
                </div>
                <div class="client_detail">
                  <div class="client_text">
                    <blockquote>
                      <p class="text-justify">
                        J'apprécie la clarté et la concision de ces contenus, mais quelques exemples concrets ou études 
                        de cas pourraient rendre le sujet plus tangible et captivant. Une révision attentive du texte 
                        pour éviter les redites et clarifier les idées renforcera la crédibilité du contenu et renforcera 
                        l'impact de votre message.
                      </p>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="client_container">
                <div class="client-id">
                  <div class="img-box">
                    <img src="images/jb.jpg" alt="">
                  </div>
                  <div class="client_name">
                    <div>
                      <h3>
                        Jean-Baptiste
                      </h3>
                      <p>
                        Farm & CO
                      </p>
                    </div>
                  </div>
                </div>
                <div class="client_detail">
                  <div class="client_text">
                    <blockquote>
                      <p class="text-justify">
                        Les rédactions sont bien structurés et engageants, mais pourrait bénéficier d'une utilisation plus 
                        dynamique des mots-clés pour améliorer le référencement. En intégrant des mots-clés pertinents de 
                        manière naturelle, le contenu pourrait gagner en visibilité auprès des moteurs de recherche et 
                        attirer davantage de trafic organique.
                      </p>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>


    <!-- end client section -->

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
        <a href="mailto: dodohoundealo@gmail.com" class="img-box">
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