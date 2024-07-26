<?php
// Informations de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'concours');
define('DB_USER', 'root');
define('DB_PASS', '');

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}


$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Utilisez des requêtes préparées pour éviter les injections SQL
        $stmt = $pdo->prepare("SELECT statut FROM candidats WHERE email = :email");
        
        // Liez le paramètre
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        
        // Exécutez la requête
        $stmt->execute();
        
        // Récupérez le résultat
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Utilisez la clé correcte du tableau associatif
            $message = $result['statut'];
        } else {
            $message = "Aucun candidat trouvé avec cet email.";
        }
    } else {
        $message = "Veuillez fournir une adresse email.";
    }
}

    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@300;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <style>
        .inscription-section {
            margin-top: 0px; /* Espace entre l'en-tête et le formulaire */
            padding: 80px;
            
        }
       
.wrapper .input-part{
  margin: 20px 25px 30px;
  margin-top: 150px;
  margin-left: 10px;

}
.wrapper.active .input-part{
  display: none;
}
.input-part .info-txt{
  display: none;
  font-size: 17px;
  text-align: center;
  padding: 12px 10px;
  border-radius: 7px;
  margin-bottom: 15px;
}
.input-part .info-txt.error{
  color: #721c24;
  display: block;
  background: #f8d7da;
  border: 1px solid #f5c6cb;
}
.input-part .info-txt.pending{
  color: #0c5460;
  display: block;
  background: #d1ecf1;
  border: 1px solid #bee5eb;
}
.input-part :where(input, button){
  width: 100%;
  height: 55px;
  border: none;
  outline: none;
  font-size: 18px;
  border-radius: 7px;
}
.input-part input{
  text-align: center;
  padding: 0 15px;
  border: 1px solid #ccc;
}
.input-part input:is(:focus, :valid){
  border: 2px solid #43AFFC;
}
.input-part input::placeholder{
  color: #bfbfbf;
}
.input-part .separator{
  height: 1px;
  width: 100%;
  margin: 25px 0;
  background: #ccc;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}
.separator::before{
  content: "or";
  color: #b3b3b3;
  font-size: 19px;
  padding: 0 15px;
  background: #fff;
}
.input-part button{
  color: #fff;
  cursor: pointer;
  background: #43AFFC;
  transition: 0.3s ease;
}
.input-part button:hover{
  background: #1d9ffc;
}
.wrapper .weather-part{
  display: none;
  margin: 30px 0 0;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

        .content{
  display: flex;
  align-items: left;
  justify-content: space-between;
  padding: 25px 20px;
  margin-top: 0px;
}
.content .image-box{
  max-width: 70%;
  margin-top: 0px;
}
.content .image-box img{
  width: 100%;
}



    </style>
  </head>
  <body>
    <header>
      <div class="wrapper">
        <nav>
          <div class="logo">SOS+.</div>

          <ul>
            <li>
              <a href="index1.php">Accueil</a>
            </li>

            <li>
              <a href="#">Formation&Certificat</a>
            </li>

            <li>
              <a href="#">Alumuni</a>
            </li>

            <li>
              <a href="admin.php" class="btn dark">Connexion</a>
            </li>
          </ul>
        </nav>


        <nav class="mobile-nav">
          <div class="logo">GD.</div>
          <div class="menu-icon">
            <img src="images/menu-icon.svg" alt="" />
          </div>
        </nav>

        <div class="mobile-menu-container">
          <div class="close-icon">
            <img src="images/close-icon.svg" alt="" />
          </div>

          <ul>
            <li>
              <a href="index1.php">Accueil</a>
            </li>

            <li>
              <a href="#">Formation&Certificat</a>
            </li>

            <li>
              <a href="#">Alumuni</a>
            </li>

            <li>
              <a href="admin.php" class="btn dark">Connexion</a>
            </li>
          </ul>
        </div>
        
    <!-- Début du formulaire d'inscription -->
    <section class="inscription-section">
        <div class="wrapper">
         <div class="right">
            <div class="container">
     <div class="content">
      <div class="image-box">
       <img src="images/inscription.png" alt="">
      </div>
      <main>
      <?php if (!empty($message)) : ?>
        <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
        <form class="input-part" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <section class="input-part">
        <p class="info-txt"></p>
        <div class="contentemail">
                <div class="email-field">
                    <input type="email" id="email" name="email"  placeholder="Enter votre email" required>
                  </div>
                    <span class="error email-error">
                       <i class="bx bx-error-circle error-icon"></i>
                    </span>
                </div>
          <div class="separator"></div>
          <button type="submit" class="verify">Vérifier</button>
          <div id="result"></div>
        </div>
         </section>
      </form>
     </main>
    </div>
            
            </div>
           </div>
          </section>
    </header>
    
    <div class="wrapper">
      <section class="app-section">
        <h2>Nos partenaires</h2>
        <p>Afrique de l'ouest et l'europe</p>

        <div class="app-buttons">
          <div class="app-btn">
            <img src="images/appstore-icon.svg" alt="" />
            <span>Orange</span>
          </div>

          <div class="app-btn">
            <img src="images/google-play-icon.svg" alt="" />
            <span>UIT</span>
          </div>
        </div>
      </section>
    </div>

    <!-- End of the app section -->

    <footer>
      <div class="wrapper">
        <div class="links-container">
          <div class="links">
            <h3>Quitter</h3>

            <ul>
              <li>
                <a href="#">A propos</a>
              </li>

              <li>
                <a href="#">Contactez-nous</a>
              </li>

              <li>
                <a href="#">politique de confidentialite</a>
              </li>

              <li>
                <a href="#">termes et conditions</a>
              </li>
            </ul>
          </div>

          <div class="links">
            <h3>Cours</h3>

            <ul>
              <li>
                <a href="#">S"inscrire</a>
              </li>

              <li>
                <a href="#">Telecharger</a>
              </li>

              <li>
                <a href="#">Tous les cours</a>
              </li>
            </ul>
          </div>

          <div class="links">
            <h3>A propos</h3>

            <ul>
              <li>contact@gmail.com</li>
            </ul>

            <div class="social">
              <a href="#">
                <img src="images/facebook-logo.svg" alt="" />
              </a>

              <a href="#">
                <img src="images/instagram-logo.svg" alt="" />
              </a>
            </div>

            <form action="#">
              <input type="text" placeholder="Email Address" />
              <button class="submit-btn">S'abonner</button>
            </form>
          </div>
        </div>

        <p class="copyright">&copy; 2023 Institut Universitaire de Formation Professionnelle</p>
      </div>
    </footer>

    <script src="js/main.js"></script>
  
</html>

