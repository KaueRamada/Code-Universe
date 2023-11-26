<header>
  <nav class="navbar" id="navbar">
    <img onClick="restart();" class="logo" src="<?php echo INCLUDE_PATH; ?>assets/img/logo_sem_fundo.png" />
    <ul class="nav-items">
      <div class="content-itens">
        <li><a href="<?php echo INCLUDE_PATH; ?>#home" class="close-menu">HOME</a></li>
        <li><a href="<?php echo INCLUDE_PATH; ?>#team" class="close-menu">EQUIPE</a></li>
        <li><a>CONTEÚDO</a>
          <ul class="dropdown">
            <?php
            $sql = $pdo->prepare("SELECT * FROM tb_categories");
            $sql->execute();
            if ($sql->rowCount() == 0) {
              echo "Nenhuma categoria cadastrada";
            } else {
              $categories = $sql->fetchAll(PDO::FETCH_ASSOC);
              foreach ($categories as $key => $value) {
                $category = strtolower($value['name']);
                echo '
                    <div>
                      <a href="posts?category=' . $category . '">' . $value['name'] . '</a>
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
            <div class="entrar"><a>ENTRAR</a></div>
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
    <i class="fas fa-bars" onClick="menuToggle()"></i>
  </nav>
  <div class="menu-mobile" id="menu-mobile">
    <i class="fas fa-times" onClick="closeMenu()"></i>
    <div class="mobile-nav-items">
      <!-- Aqui serão inseridos os itens da navbar -->
    </div>
  </div>
</header>