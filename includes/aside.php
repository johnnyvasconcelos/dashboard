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
          <img src="./assets/images/home.svg" alt="home svg" />
          <span>Início</span>
        </a>
      </li>

      <!-- Proprietários -->
      <li class="menu">
        <a href="#" class="none" @click.prevent="toggleSubmenu('owners')">
          <img src="./assets/images/globe.svg" alt="home svg" />
          <span>Proprietários</span>
          <img src="./assets/images/chevron-down.svg" alt="chevron down" class="icon" />
        </a>
        <ul class="submenu" :class="{ 'submenu-none': submenu.owners }">
          <li>
            <a href="./empresas.html">
              <img src="./assets/images/book.svg" alt="home svg" />
              <span>Ver Empresas</span>
            </a>
          </li>
          <li>
            <a href="./cadastrar-empresa.html">
              <img src="./assets/images/seed.svg" alt="home svg" />
              <span>Cadastrar Empresa</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Item visível para Proprietários (quando menu colapsado) -->
      <li class="item-visible" v-show="itemVisible">
        <a href="./empresas.html">
          <img src="./assets/images/globe.svg" alt="home svg" />
          <span>Proprietários</span>
        </a>
      </li>

      <!-- Configurações -->
      <li class="menu">
        <a href="#" class="none" @click.prevent="toggleSubmenu('settings')">
          <img src="./assets/images/cog.svg" alt="home svg" />
          <span>Configurações</span>
          <img src="./assets/images/chevron-down.svg" alt="chevron down" class="icon" />
        </a>
        <ul class="submenu" :class="{ 'submenu-none': submenu.settings }">
          <li>
            <a href="./usuarios.html">
              <img src="./assets/images/users.svg" alt="home svg" />
              <span>Usuários</span>
            </a>
          </li>
          <li>
            <a href="./cadastrar-usuario.html">
              <img src="./assets/images/user-plus.svg" alt="home svg" />
              <span>Cadastrar Usuário</span>
            </a>
          </li>
          <li class="last">
            <a href="./personalizar-painel.html">
              <img src="./assets/images/edit.svg" alt="home svg" />
              <span>Personalizar Painel</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Item visível para Configurações (quando menu colapsado) -->
      <li class="item-visible" v-show="itemVisible">
        <a href="./usuarios.html">
          <img src="./assets/images/cog.svg" alt="home svg" />
          <span>Configurações</span>
        </a>
      </li>

    </ul>
  </div>
</aside>