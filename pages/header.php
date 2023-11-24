<header>
<nav class="navbar">
      <img onClick="restart();" class="logo" src="<?php echo INCLUDE_PATH; ?>assets/img/logo_sem_fundo.png" />
      <ul class="nav-itens">
        <div class="content-itens">
          <li><a href="index.php">HOME</a></li>
          <li><a href="index.php#team">EQUIPE</a></li>
          <li><a href="#content">CONTEÚDO</a>
            <ul class="dropdown">
              <!-- <div>
                <a href="posts?category=html">HTML</a>
              </div>
              <div>
                <a href="posts?category=css">CSS</a>
              </div>
              <div>
                <a href="posts?category=javascript">JAVASCRIPT</a>
              </div>
              <div>
                <a href="posts?category=PHP">PHP</a>
              </div>
              <div>
                <a href="posts?category=JAVA">JAVA</a>
              </div>
              <div>
                <a href="posts?category=PYTHON">PYTHON</a>
              </div>
              <div>
                <a href="posts?category=SQL">SQL</a>
              </div>
              <div>
                <a href="posts?category=MODELAGEM DE DADOS">MODELAGEM DE DADOS</a>
              </div> -->
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
                    <div>
                      <a href="posts?category='.$category.'">'.$value['name'].'</a>
                    </div>
                    ';
                  }
                }
            ?>
            <ul>
          </li>
        </div>

        <nav id="navigation" class="register">
          <?php if (Panel::isLogged()) { ?>
            <ul class="profile">
              <a href="<?php echo INCLUDE_PATH_ADMIN; ?>">
                <div class="profile-photo">
                  <img src="<?php echo INCLUDE_PATH_ADMIN . $_SESSION['myblog-profile-photo']; ?>" alt="Foto de perfil" />
                </div>
                <div class="profile-name">
                  <?php echo $_SESSION['myblog-name']; ?>
                </div>
              </a>
            </ul>
          <?php } else { ?>
            <li class="menu-register not-logged-in">
              <div class="entrar"><a href="">ENTRAR</a></div>
              <ul class="dropdown">
                <li>
                  <div><a href="<?php echo INCLUDE_PATH_ADMIN; ?>login">ENTRAR</a>
                </li>
                </div>
                <li>
                  <div><a href="<?php echo INCLUDE_PATH_ADMIN; ?>signup">CADASTRAR</a>
                </li>
                </div>
              </ul>

            </li>
          <?php } ?>
        </nav>
      </ul>
    </nav>
</header>
