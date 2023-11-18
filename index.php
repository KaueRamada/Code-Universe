<?php
    require_once 'config/config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="img/???">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>assets/css/main-style.css"/>
    <title>Code Universe</title>
</head>
<body>
    <main>
      <!-- NavBar -->
      <!-- <header class="navbar-menu">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand " href="#">
            <img src="img/Logo/logo_sem_fundo.png" alt="Code Universe" width="360">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul id="borda" class="navbar-nav border" style="margin-left: 200px;">
              <li class="nav-item mx-5 active">
                <a class="nav-link" aria-current="page" href="#">HOME</a>
              </li>
              <li class="nav-item mx-5">
                <a class="nav-link" href="#">EQUIPE</a>
              </li>
              <li class="nav-item mx-5">
                <a id="entrar" class="nav-link" href="#">CONTEÚDO       </a>
              </li>
            
              <li class="nav-item mx-5 border-left">
                <a  class="nav-link" href="#"><button>ENTRAR</button></a>
              </li>
            </ul>

            <li class="nav-item mx-4 border-left" style="margin-top: -2.8%;">
              <a  class="nav-link" href="#"><button class="entrar">ENTRAR</button></a>
            </li> 
            
          </div>
        </div>
        </nav>
      </header> -->

      <div class="navbar">
        
        <nav class="register">
        <?php if(Panel::isLogged()) { ?>
            <ul class="profile">
                <a href="<?php echo INCLUDE_PATH_ADMIN; ?>">
                    <div class="profile-photo">
                        <img src="<?php echo INCLUDE_PATH_ADMIN.$_SESSION['myblog-profile-photo']; ?>" alt="Foto de perfil" />
                    </div>
                    <div class="profile-name"><?php echo $_SESSION['myblog-name']; ?></div>
                </a>
            </ul>
        <?php } else { ?>
            <ul class="register">
                <li><a href="<?php echo INCLUDE_PATH_ADMIN; ?>login">Entrar</a></li>
                <li><a href="<?php echo INCLUDE_PATH_ADMIN; ?>signup">Cadastrar</a></li>
            </ul>
        <?php } ?>
        </nav>
    </div>


      <!-- Carrosel -->
      <section class="carrossel">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo INCLUDE_PATH; ?>assets/img/Carrossel/carrossel01.png" class="d-block" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php echo INCLUDE_PATH; ?>assets/img/Carrossel/carrossel02.png" style="width: 98.75vw;" class="d-block" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php echo INCLUDE_PATH; ?>assets/img/Carrossel/carrossel03.png" style="width: 98.75vw;" class="d-block" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <section class="team" id="team">
        <div class="team-video"></div>

        <div class="row-img row-1">
          <div alt="Programação" class="programmers-group">
            <div class="text">
              <p>Programação</p>
              <span>Equipe responsável por toda a programação do site</span>
            </div>
          </div>
          <div alt="Design" class="design-group">
            <div class="text">
              <p>Design</p>
              <span>Equipe responsável pelo design do site</span>
            </div>
          </div>
          </div>
        </div>

        <div class="row-img row-2">
          <div alt="Pesquisa" class="search-group">
            <div class="text">
              <p>Pesquisa</p>
              <span>Equipe responsável pelo conteúdo do site</span>
            </div>
          </div>
          <div alt="Documentação" class="documentation-group">
            <div class="text">
              <p>Documentação</p>
              <span>Equipe responsável pela documentação do trabalho</span>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="content-video"></div>

        <div class="categories">
          <?php
            $sql = $pdo->prepare("SELECT * FROM tb_categories");
            $sql->execute();
            if($sql->rowCount() == 0) {
              echo "Nenhuma categoria cadastrada";
            } else {
              $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
              foreach($categories as $key => $value) {
                $category = strtolower($value['name']);
                echo '
                <div class="tec '.$category.'">
                  <a href="pages/posts.php?'.$category.'">
                    <span class="span">'.$value['name'].'</span>
                    <img src="'.INCLUDE_PATH_ADMIN.$value['image'].'" alt="Logo" />
                  </a>
                </div>
                ';
              }
            }
          ?>

          <!-- <div class="tec tec-html">
            <span class="span">HTML</span>
          </div>
          <div class="tec tec-css">
            <span class="span">CSS</span>
          </div>
          <div class="tec tec-js">
            <span class="span">JAVASCRIPT</span>
          </div>
          <div class="tec tec-php">
            <span class="span">PHP</span>
          </div>
          <div class="tec tec-java">
            <span class="span">JAVA</span>
          </div>
          <div class="tec tec-python">
            <span class="span">PYTHON</span>
          </div>
          <div class="tec tec-sql">
            <span class="span">SQL</span>
          </div>
          <div class="tec tec-mod_dados">
            <span class="span">MODELAGEM DE DADOS</span>
          </div> -->
        </div>
      </section>
    </main>

    <footer id="footer">
      <div class="footer-content">
        <img src="img/logo.png" alt="" class="logo">

        <ul class="footer-menu">
          <p>Programação</p>
          <li class="footer-menu-item">Anderson Rian</li>
          <li class="footer-menu-item">Erick Araújo</li>
          <li class="footer-menu-item">Gustavo Elia</li>
          <li class="footer-menu-item">Juan Vieira</li>
          <li class="footer-menu-item">Kauã Medeiro</li>
          <li class="footer-menu-item">Kauã Yuuki</li>
          <li class="footer-menu-item">Kauê Ramada</li>
        </ul>

        <ul class="footer-menu">
          <p>Design</p>
          <li class="footer-menu-item">Abner Procópio</li> 
          <li class="footer-menu-item">Isabelle Oliveira</li>
        </ul>

        <ul class="footer-menu">
          <p>Pesquisa</p>
          <li class="footer-menu-item">Andressa Ayumi</li>
          <li class="footer-menu-item">Caique Barbosa</li>
          <li class="footer-menu-item">Giovanna Christina</li>
          <li class="footer-menu-item">Gustavo Barone</li>
          <li class="footer-menu-item">Jhenifer Maday</li>
          <li class="footer-menu-item">Luiza Fadelli</li>
          <li class="footer-menu-item">Igor Alves</li>
        </ul>

        <ul class="footer-menu">
          <p>Documentação</p>
          <li class="footer-menu-item">Arthur Souza</li>
          <li class="footer-menu-item">João Pedro</li>
          <li class="footer-menu-item">Julia Benedetti</li>
          <li class="footer-menu-item">Luiz Felipe</li>
        </ul>
      </div>

      <div class="footer-info">
        <ul class="footer-info-items">
          <li class="footer-info-item">Home</li>
          <li class="footer-info-item">Equipe</li>
          <li class="footer-info-item">Conteúdo</li>
        </ul>

        <div class="rights">
          <div class="country">
            <p>Brasil</p>
            <img src="img/brazil.png" alt="" class="brazil-flag">
          </div>
          <p>&copy;ETEC São Mateus</p>
        </div>
      </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo INCLUDE_PATH;?>assets/js/script.js"></script> <!-- main javascript file -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
