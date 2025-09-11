       <aside :class="{ 'show-menu': showMenu }">
  <header>
    <img :src="darkMode ? './assets/images/logo.png' : './assets/images/logo-normal.png'" alt="logo" class="logo" />
    <span>EENU</span>
    <div class="menu-btn" @click="toggleMenu">
      <img src="./assets/images/menu.svg" alt="menu" />
    </div>
  </header>
  <div class="aside-container">
    <h3>visão geral</h3>
    <ul>
      <li class="active">
        <a href="./index.html">
          <img :src="darkMode ? './assets/images/home.svg' : './assets/images/home-dark.svg'" alt="home svg" />
          <span>Início</span>
        </a>
      </li>

      <!-- Proprietários -->
      <li class="menu">
        <a href="#" class="none" @click.prevent="toggleSubmenu('owners')">
          <img :src="darkMode ? './assets/images/globe.svg' : './assets/images/globe-dark.svg'" alt="home svg" />
          <span>Proprietários</span>
          <img :src="darkMode ? './assets/images/chevron-down.svg' : './assets/images/chevron-dark.svg'" alt="chevron down" class="icon" />
        </a>
        <ul class="submenu" :class="{ 'submenu-none': submenu.owners }">
          <li>
            <a href="./empresas.html">
              <img :src="darkMode ? './assets/images/book.svg' : './assets/images/book-dark.svg'" alt="home svg" />
              <span>Ver Empresas</span>
            </a>
          </li>
          <li>
            <a href="./cadastrar-empresa.html">
              <img :src="darkMode ? './assets/images/seed.svg' : './assets/images/seed-dark.svg'" alt="home svg" />
              <span>Cadastrar Empresa</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Item visível para Proprietários (quando menu colapsado) -->
      <li class="item-visible" v-show="itemVisible">
        <a href="./empresas.html">
          <img :src="darkMode ? './assets/images/globe.svg' : './assets/images/globe-dark.svg'" alt="home svg" />
          <span>Proprietários</span>
        </a>
      </li>

      <!-- Configurações -->
      <li class="menu">
        <a href="#" class="none" @click.prevent="toggleSubmenu('settings')">
          <img :src="darkMode ? './assets/images/cog.svg' : './assets/images/cog-dark.svg'" alt="home svg" />
          <span>Configurações</span>
          <img :src="darkMode ? './assets/images/chevron-down.svg' : './assets/images/chevron-dark.svg'" alt="chevron down" class="icon" />
        </a>
        <ul class="submenu" :class="{ 'submenu-none': submenu.settings }">
          <li>
            <a href="./usuarios.html">
              <img :src="darkMode ? './assets/images/users.svg' : './assets/images/users-dark.svg'" alt="users svg" />
              <span>Usuários</span>
            </a>
          </li>
          <li>
            <a href="./cadastrar-usuario.html">
              <img :src="darkMode ? './assets/images/user-plus.svg' : './assets/images/user-dark.svg'" alt="user svg" style="width: 23px" />
              <span>Cadastrar Usuário</span>
            </a>
          </li>
          <li class="last">
            <a href="./personalizar-painel.html">
              <img :src="darkMode ? './assets/images/edit.svg' : './assets/images/edit-dark.svg'" alt="home svg" style="width: 18px;" />
              <span>Personalizar Painel</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Item visível para Configurações (quando menu colapsado) -->
      <li class="item-visible" v-show="itemVisible">
        <a href="./usuarios.html">
          <img :src="darkMode ? './assets/images/cog.svg' : './assets/images/cog-dark.svg'" alt="settings svg" />
          <span>Configurações</span>
        </a>
      </li>

    </ul>
  </div>
</aside>