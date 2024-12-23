
<?php
// Informations de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_NAME', 'con');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}


$stmt_count_inscrit = $pdo->query("SELECT COUNT(id_candidat) as total FROM candidats ");
$total_candidats = $stmt_count_inscrit->fetch(PDO::FETCH_ASSOC)['total'];

$stmt_count_licence = $pdo->query("SELECT COUNT(id_candidat) as total FROM candidats WHERE filiere = 'licence'");
$total_licence = $stmt_count_licence->fetch(PDO::FETCH_ASSOC)['total'];

$stmt_count_master = $pdo->query("SELECT COUNT(id_candidat) as total FROM candidats WHERE filiere = 'master'");
$total_master = $stmt_count_master->fetch(PDO::FETCH_ASSOC)['total'];

$stmt_count_ingenieur = $pdo->query("SELECT COUNT(id_candidat) as total FROM candidats WHERE filiere = 'ingenieur'");
$total_ingenieur = $stmt_count_ingenieur->fetch(PDO::FETCH_ASSOC)['total'];

$stmt = $pdo->query("SELECT * FROM candidats ORDER BY id_candidat DESC");
    // Exécutez la requête



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="index1.php">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">SOS+</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Concours</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Centre Region</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Parametre</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title" href="index1.php">Deconnexion</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Recherchez ici">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="images/sos.png" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo "$total_candidats"; ?></div>
                        <div class="cardName">Inscrits</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo "$total_licence"; ?></div>
                        <div class="cardName">Licence</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo "$total_master"; ?></div>
                        <div class="cardName">Master</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo "$total_ingenieur"; ?></div>
                        <div class="cardName">Ingenieur</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Add Charts JS ================= -->
            <div class="chartsBx">
                <div class="chart"> <canvas id="chart-1"></canvas> </div>
                <div class="chart"> <canvas id="chart-2"></canvas> </div>
            </div>
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Resultats</h2>
                        <a href="#" class="btn">Voir tout</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>Filière</td>
                                <td>Centre</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sta = htmlspecialchars($row['statut']);
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['filiere']) . "</td>";
            echo "<td>" . htmlspecialchars($row['centres_examen']) . "</td>";
            echo "<td>" ."$sta". "</td>";
           
            echo "</tr>";
        }
        ?>
                            <tr>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Centre1 Dakar</td>
                                <td><span class="status delivered">Admin</span></td>
                            </tr>

                            <tr>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Centre2 Dakar</td>
                                <td><span class="status pending">En attente</span></td>
                            </tr>

                            <tr>
                                <<td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Centre2 Dakar</td>
                                <td><span class="status return">Refuser</span></td>
                            </tr>

                            <tr>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Centre Thies</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Centre Ziginshor</td>
                                <td><span class="status inProgress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Centre Ziginshor</td>
                                <td><span class="status inProgress">In Progress</span></td>
                                
                            </tr>
                            <tr>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Centre2 Dakar</td>
                                <td><span class="status pending">En attente</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Inscrits au concours</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>Filière</td>
                                <td>Region</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $stmt = $pdo->query("SELECT * FROM candidats ORDER BY id_candidat DESC");

                                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                       $sta = htmlspecialchars($row['statut']);
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['filiere']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nom_region']) . "</td>";
                                            echo "</tr>";
                                             }
                                 ?>
                               
                            
                            <tr>
                                <td width="60px">
                                  <div class="imgBx"><img src="images/sos.png" alt=""></div>
                                 </td>
                                <td>KOUCHADE</td>
                                <td>SOS</td>
                                <td>Master</td>
                                <td>Dakar</td>
                               
                            </tr>
                            <tr>
                                <td width="60px">
                                  <div class="imgBx"><img src="images/sos.png" alt=""></div>
                                 </td>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Ingenieur</td>
                                <td>Thies</td>
                               
                            </tr>
                            <tr>
                                <td width="60px">
                                  <div class="imgBx"><img src="images/sos.png" alt=""></div>
                                 </td>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Master</td>
                                <td>Wiginshor</td>
                               
                            </tr>
                            <tr>
                                <td width="60px">
                                  <div class="imgBx"><img src="images/sos.png" alt=""></div>
                                 </td>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Dakar</td>
                            </tr>
                            <tr>
                                <td width="60px">
                                  <div class="imgBx"><img src="images/sos.png" alt=""></div>
                                 </td>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Dakar</td>
                               
                            </tr>
                            <tr>
                                <td width="60px">
                                  <div class="imgBx"><img src="images/sos.png" alt=""></div>
                                 </td>
                                <td>KOUCHADE</td>
                                <td>sOS</td>
                                <td>Licence</td>
                                <td>Dakar</td>
                               
                            </tr>
                        </tbody>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="images/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="js/mainadmin.js"></script>

    <!-- ======= Charts JS ====== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
    <script src="js/chartsJS.php"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
