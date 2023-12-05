<main>
  <?php include 'header.php'; ?>

  <div class="loader-container">
    <div class="loader">
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="circle"></div>
      <div class="circle"></div>
    </div>
  </div>

  <!-- Carrosel -->
  <section class="carrossel" id="home">
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

    <div class="rows">
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
      <div alt="Arpresentação" class="apresentation-group">
        <div class="text">
          <p>Apresentação</p>
          <span>Equipe responsável pela apresentação do trabalho</span>
        </div>
      </div>
    </div>
    </div>
  </section>

  <section class="content" id="content">
    <div class="content-video"></div>

    <div class="categories">
      <?php
      $sql1 = $pdo->prepare("SELECT * FROM tb_categories");
      $sql1->execute();

      $sql2 = $pdo->prepare("SELECT * FROM tb_categories");
      $sql2->execute();

      if ($sql->rowCount() == 0) {
        echo "Nenhuma categoria cadastrada";
      } else if($sql->rowCount() > 8){
      ?>
        <div class="content-menu-div">

          <input type="checkbox" class="input-plus" id="plus">
          <div class="menu-plus" id="menuPlus">
            <label onclick="mostrarMais()" class="label-plus" for="plus">Mais Categorias</label>
            <div class="menu-itens">
              <button class="input-voltar" onclick="voltar()">Voltar</button>

              <div class="menu-menu-item">
                <?php
                $contConteudo = 0;

                $categories1 = $sql1->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories1 as $key => $value) {
                  if ($contConteudo >= 8) {
                    $category = strtolower($value['name']);

                ?>
                    <div class="menu-item <?php echo $category; ?>">
                      <a href="posts?category=<?php echo $category; ?>">
                        <span class="span"><?php echo $value['name']; ?></span>
                        <img src="<?php echo INCLUDE_PATH . $value['image']; ?>" alt="Logo" />
                      </a>
                    </div>
                <?php
                  }
                  $contConteudo++;
                }
                ?>
              </div>
            </div>

          </div>
        </div>
        <?php
        $contConteudo = 0;

        $categories2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories2 as $key => $value) {
          $category = strtolower($value['name']);

          if ($contConteudo >= 8) break;

        ?>
          <div class="tec <?php echo $category; ?>">
            <a href="posts?category=<?php echo $category; ?>">
              <span class="span"><?php echo $value['name']; ?></span>
              <img src="<?php echo INCLUDE_PATH . $value['image']; ?>" alt="Logo" />
            </a>
          </div>
      <?php

          $contConteudo++;
        }
      }else{
        
        $contConteudo = 0;

        $categories2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories2 as $key => $value) {
          $category = strtolower($value['name']);

          if ($contConteudo >= 8) break;

        ?>
          <div class="tec <?php echo $category; ?>">
            <a href="posts?category=<?php echo $category; ?>">
              <span class="span"><?php echo $value['name']; ?></span>
              <img src="<?php echo INCLUDE_PATH . $value['image']; ?>" alt="Logo" />
            </a>
          </div>
      <?php

          $contConteudo++;
        }
      }
      ?>
    </div>
  </section>
</main>

<footer id="footer">
  <div class="footer-content">
    <img src="img/logo.png" alt="" class="logo">

    <div class="footer-menu01">
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
    </div>

    <div class="footer-menu02">
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
        <p>Apresentação</p>
        <li class="footer-menu-item">Arthur Souza</li>
        <li class="footer-menu-item">João Pedro</li>
        <li class="footer-menu-item">Julia Benedetti</li>
        <li class="footer-menu-item">Luiz Felipe</li>
      </ul>
    </div>
  </div>

  <div class="footer-info">
    <ul class="footer-info-items">
      <li class="footer-info-item"><a href="<?php echo INCLUDE_PATH; ?>#home">Home</a></li>
      <li class="footer-info-item"><a href="<?php echo INCLUDE_PATH; ?>#team">Equipe</a></li>
      <li class="footer-info-item"><a href="<?php echo INCLUDE_PATH; ?>#content">Conteúdo</a></li>
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