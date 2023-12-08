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
              $count = 0;
              foreach ($categories as $key => $value) {
                $category = strtolower($value['name']);
                if ($count < 8) {
                  echo '
                          <div>
                              <a href="posts?category=' . $category . '">' . $value['name'] . '</a>
                          </div>
                          ';
                } else {
                  if ($count == 8) {
                    echo '<div>
                      <a onclick="openMenuContent()"; class="learn-more" href="#content">MAIS CATEGORIAS</a>
                    </div>';
                  }
                  break;
                }
                $count++;
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
      <form method="GET" action="<?php echo INCLUDE_PATH; ?>posts"">
        <li class=" search-input">
        <div class="input-container">
          <input placeholder="Pesquise aqui..." class="input" name="text" type="text">
          <div></div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon">
            <defs>
              <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:var(--color1)" />
                <stop offset="100%" style="stop-color:var(--color2)" />
              </linearGradient>
            </defs>
            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
            <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
            <g id="SVGRepo_iconCarrier">
              <path d="M7.25007 2.38782C8.54878 2.0992 10.1243 2 12 2C13.8757 2 15.4512 2.0992 16.7499 2.38782C18.06 2.67897 19.1488 3.176 19.9864 4.01358C20.824 4.85116 21.321 5.94002 21.6122 7.25007C21.9008 8.54878 22 10.1243 22 12C22 13.8757 21.9008 15.4512 21.6122 16.7499C21.321 18.06 20.824 19.1488 19.9864 19.9864C19.1488 20.824 18.06 21.321 16.7499 21.6122C15.4512 21.9008 13.8757 22 12 22C10.1243 22 8.54878 21.9008 7.25007 21.6122C5.94002 21.321 4.85116 20.824 4.01358 19.9864C3.176 19.1488 2.67897 18.06 2.38782 16.7499C2.0992 15.4512 2 13.8757 2 12C2 10.1243 2.0992 8.54878 2.38782 7.25007C2.67897 5.94002 3.176 4.85116 4.01358 4.01358C4.85116 3.176 5.94002 2.67897 7.25007 2.38782ZM9 11.5C9 10.1193 10.1193 9 11.5 9C12.8807 9 14 10.1193 14 11.5C14 12.8807 12.8807 14 11.5 14C10.1193 14 9 12.8807 9 11.5ZM11.5 7C9.01472 7 7 9.01472 7 11.5C7 13.9853 9.01472 16 11.5 16C12.3805 16 13.202 15.7471 13.8957 15.31L15.2929 16.7071C15.6834 17.0976 16.3166 17.0976 16.7071 16.7071C17.0976 16.3166 17.0976 15.6834 16.7071 15.2929L15.31 13.8957C15.7471 13.202 16 12.3805 16 11.5C16 9.01472 13.9853 7 11.5 7Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </g>
          </svg>
        </div>
        </li>
      </form>
    </ul>

    <i class="fas fa-bars" onClick="menuToggle()"></i>
  </nav>
  <div class="menu-mobile" id="menu-mobile">
    <i class="fas fa-times" onClick="closeMenu()"></i>
    <div class="mobile-nav-items">
    </div>
  </div>
</header>