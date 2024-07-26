<?php include 'config.php'; ?>
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

        <!-- End of mobile navigation menu -->

        <div class="hero-section">
          <div class="left">
            <h1>
             Institut Universitaire <br /> 
            </h1>
            <div class="para">
            <p>
              Bienvenue sur le portail des concours d'entrée <br />
              Inscrivez-vous pour participer aux concours d'entrée dans nos filières :
            </div>
            <div class="para">
              <ul>
                <li>Licence</li>
                <li>Ingénieur</li>
                <li>Master</li>
              </ul>
            </div>
            <div class="para">
            </p>
            <a href="inscription1.php" margin-top="5px" class="btn light enrol-icon">S'inscrire au concours</a>
            </div>
            <div class="para">
            <a href="monresultat.php"  class="btn light enrol-icon">Mon resultat</a>
            </div>
          </div>

          <div class="right">
            <img src="images/medium-shot.png" alt="" />
          </div>

          <div class="achievement-cards">
            <div class="achievement-card students-enrolled">
              <div class="content">
                <div>
                  <h3>32K</h3>
                </div>
                <p>Etudiants inscrits</p>
              </div>

              <div class="bg"></div>
            </div>

            <div class="achievement-card overall-rating">
              <div class="content">
                <div>
                  <h3>4.7</h3>
                  <img src="images/start-icon.svg" alt="" />
                </div>
                <p>Note globale</p>
              </div>

              <div class="bg"></div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- End of the header section -->

    <div class="wrapper">
      <section class="testimonials-section">
        <div class="left">
          <div class="testimonial-card">
            <div class="content">
            C'est un excellent cours. Cela m'a beaucoup aidé. Merci :)
            </div>

            <div class="info">
              <h4>Sosthène KOUCHADE</h4>
              <p class="company">Développeur, Atos</p>
            </div>

            <img src="images/sos.png" alt="" />
          </div>

          <div class="testimonial-card">
            <div class="content">Excellent travail! Bien joué!</div>

            <div class="info">
              <h4>Sosthène KOUCHADE</h4>
              <p class="company">Designer, Sonatel</p>
            </div>

            <img src="images/sos.png" alt="" />
          </div>
        </div>

        <div class="right">
          <h2>Qu'en disent nos étudiants ?</h2>

          <div class="features">
            <p>
            Meilleur ecole de formation, l'ecole des elites.
            </p>

            <p>
            Les enseignants sont toujours disponigle pour nous accompagner en cas de besoin.
            </p>
          </div>

          <a href="#" class="btn light desktop-btn">Learn More</a>
        </div>

        <a href="#" class="btn light mobile-btn">Learn More</a>
      </section>
    </div>

    <!-- End of testimonials Section -->

    <section class="courses-section">
      <div class="wrapper">
        <h2 class="light">Certification</h2>

        <div class="course-cards">
          <div class="course-card">
            <img src="" alt="" />

            <div class="info">
              <h3>Cisco CCNA </h3>
              <div class="duration">8 Hrs</div>
            </div>
          </div>

          <div class="course-card">
            <img src="" alt="" />

            <div class="info">
              <h3>Programmqtion python</h3>
              <div class="duration">15 Hrs</div>
            </div>
          </div>
        </div>

        <a href="#" class="btn light">Tous les Certifications</a>
      </div>
    </section>

    <!-- End of courses section -->

    <div class="wrapper">
      <section class="app-section">
        <h2>Nos partenaires</h2>
        <p>Afrique de l'ouest et l'europe</p>

        <div class="app-buttons">
          <div class="app-btn">
            <img src="" alt="" />
            <span>Orange</span>
          </div>

          <div class="app-btn">
            <img src="" alt="" />
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
  </body>
</html>
