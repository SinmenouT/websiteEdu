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
    $nom = $_POST['nom'];
    $dateNaissance = $_POST['dateNaissance'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $filiere = $_POST['filiere'];
    $sex = $_POST['sexe'];
    $prenom = $_POST['Prenom'];
    $region = $_POST['region'];

    // Préparez votre requête SQL pour insérer les données
    //$sql = "INSERT INTO candidats (nom, date_naissance, email, telephone, filiere) VALUES ( $nom, $dateNaissance, $email, $telephone, $filiere)";

    $stmt = $pdo->prepare(
        "INSERT INTO candidats (nom,Prenom, date_naissance,nom_region,email, telephone, filiere,sex) VALUES ( '$nom','$prenom','$dateNaissance','$region', '$email', '$telephone', '$filiere','$sex')"
    );
    // Exécutez la requête
    $stmt->execute();
    $message = "Inscription réussie !";

    //   $pdo = null;
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
       
        .form-group {
          margin-top: 10px; /* Espace entre les lignes du formulaire */
        }
        .right {
            margin-bottom: 5px; /* Espace entre les lignes du formulaire */
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="telephone"],
        select[id="filiere"],
        select[id="region"],
        input[type="date"] {
            width: 150%;
            padding: 8px;
            box-sizing: border-box;
        }
        .radio-group {
            display: flex;
            align-items: center;
            margin-top: 5px;
            gap: 5px;
        }
        .checkbox-group {
          display: flex;
          margin-top: 5px;
        }
        button[type="submit"] {
            margin-top: 5px;
            padding: 10px 25px0px;
            align-items: center;
        }
        .content{
  display: flex;
  align-items: left;
  justify-content: space-between;
  padding: 25px 20px;
  margin-top: 0px;
}
.content .image-box{
  max-width: 50%;
  margin-top: 0px;
}
.content .image-box img{
  width: 65%;
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
            <h2>Inscription au concours</h2>
            <div class="container">
     <div class="content">
      <div class="image-box">
       <img src="images/inscription.png" alt="">
      </div>
      <main>

          <div class="form-group">
            <?php if (!empty($message)) : ?>
            <p class="message"><?php echo $message; ?></p>
             <?php endif; ?>

             <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <input type="text" id="nom" name="nom" placeholder="Enter votre nom" required>
                </div>
                
                <div class="form-group">
                    <input type="text" id="Prenom" name="Prenom" placeholder="Enter votre Prenom" required>
                </div>

                <div class="form-group">
                  <div class="email-field">
                    <input type="email" id="email" name="email" placeholder="Enter votre email" required>
                  </div>
                    <span class="error email-error">
                       <i class="bx bx-error-circle error-icon"></i>
                    </span>
                  </div>
                </div>

                <div class="form-group">
                    <input type="telephone" id="telephone" name="telephone" placeholder="Enter votre telephone" required>
                </div>

                <div class="form-group">
                    <input type="date" id="dateNaissance" name="dateNaissance" required>
                </div>
                <div class="form-group"> 
                       <select id="region" name="region" required>
                          <option value="">Choisissez votre region</option>
                          <option value="Dakar">Dakar</option>
                          <option value="Thies">Thies</option>
                          <option value="Diourbel">Diourbel</option>
                          <option value="Fatick">Fatick</option>
                          <option value="Kaffrine">Kaffrine</option>
                          <option value="Kaolack">Kaolack</option>
                        </select> 
                </div>

                <div class="form-group"> 
                     
                       <select id="filiere" name="filiere" required>
                          <option value="">Choisissez une filière</option>
                          <option value="licence">Licence</option>
                          <option value="ingenieur">Ingénieur</option>
                          <option value="master">Master</option>
                        </select> 
                </div>
                
                
                <div class="form-group">
                    <div class="radio-group">
                        <input type="radio" id="homme" name="sexe" value="homme" required>
                        <label for="homme">Homme</label>
                        <input type="radio" id="femme" name="sexe" value="femme" required>
                        <label for="femme">Femme</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="checkbox-group">
                        <input type="checkbox" id="conditions" name="conditions" required>
                        <label for="conditions">J'accepte les conditions d'utilisation</label>
                    </div>
                </div>
                
                <button type="submit" class="btn dark">S'inscrire</button>
                
              </form>
            </main>
            </div>
           </div>
          </section>
    </header>

    <!-- End of courses section -->

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
