 <aside :class="showMenu ? 'show-menu' : 'show-off'">
 <div class="menu-background" @click="toggleMenu"></div> 
 <header>
    <img :src="darkMode ? './assets/images/logo.png' : './assets/images/logo-normal.png'" alt="logo" class="logo" />
    <span>EENU</span>
    <div class="menu-btn" @click="toggleMenu">
      <img src="./assets/images/menu.svg" alt="menu" />
    </div>
    <span class="bt-mobl" @click="toggleMenu">
            <img :src="darkMode ? './assets/images/menu.svg' : './assets/images/menu-dark.svg'" alt="menu" />
        </span>
  </header>
  <div class="aside-container">
    <h3>visão geral</h3>
    <ul>
      <li  :class="{ active: isPage('index.php') }">
        <a href="./index.php" @mouseover="hoverItem = 'home'" 
       @mouseleave="hoverItem = null">
          <img :src="getIcon('home', 'index.php')" alt="home svg" />
          <span>Início</span>
        </a>
      </li>

      <!-- Proprietários -->
      <li class="menu">
        <a href="#" class="none none-mb" @click.prevent="toggleSubmenu('owners')" @mouseover="hoverItem = 'globe'" 
       @mouseleave="hoverItem = null">
          <img :src="getIcon('globe')" alt="globe svg" />
          <span>Proprietários</span>
          <img :src="darkMode ? './assets/images/chevron-down.svg' : './assets/images/chevron-dark.svg'" alt="chevron down" class="icon" />
        </a>
        <ul class="submenu" :class="{ 'submenu-none': submenu.owners }">
          <li :class="{ active: isPage('empresas.php') }">
            <a href="./empresas.php"
             @mouseover="hoverItem = 'book'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('book', 'empresas.php')" alt="book svg" />
              <span>Ver Empresas</span>
            </a>
          </li>
          <li class="mb" :class="{ active: isPage('cadastrar-empresa.php') }">
            <a href="./cadastrar-empresa.php"
            @mouseover="hoverItem = 'seed'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('seed', 'cadastrar-empresa.php')" alt="seed svg" />
              <span>Cadastrar Empresa</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Item visível para Proprietários (quando menu colapsado) -->
      <li class="item-visible none-mb" v-show="itemVisible">
        <a href="./empresas.php"
        @mouseover="hoverItem = 'globe'" 
       @mouseleave="hoverItem = null"
        >
          <img :src="getIcon('globe')" alt="globe svg" />
          <span>Proprietários</span>
        </a>
      </li>

      <!-- Configurações -->
      <li class="menu">
        <a href="#" class="none none-mb" @click.prevent="toggleSubmenu('settings')"
        @mouseover="hoverItem = 'cog'" 
       @mouseleave="hoverItem = null"
        >
          <img :src="getIcon('cog')" alt="cog svg" />
          <span>Configurações</span>
          <img :src="darkMode ? './assets/images/chevron-down.svg' : './assets/images/chevron-dark.svg'" alt="chevron down" class="icon" />
        </a>
        <ul class="submenu" :class="{ 'submenu-none': submenu.settings }">
          <li :class="{ active: isPage('usuarios.php') }">
            <a href="./usuarios.php"
            @mouseover="hoverItem = 'users'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('users', 'usuarios.php')" alt="users svg" />
              <span>Usuários</span>
            </a>
          </li>
          <li :class="{ active: isPage('cadastrar-usuario.php') }">
            <a href="./cadastrar-usuario.php"
            @mouseover="hoverItem = 'user'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('user', 'cadastrar-usuario.php')" alt="user svg" style="width: 23px" />
              <span>Cadastrar Usuário</span>
            </a>
          </li>
          <li class="last mb" :class="{ active: isPage('personalizar-painel.php') }">
            <a href="./personalizar-painel.php"
            @mouseover="hoverItem = 'edit'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('edit', 'personalizar-painel.php')" alt="edit svg" style="width: 18px;" />
              <span>Personalizar Painel</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Item visível para Configurações (quando menu colapsado) -->
      <li class="item-visible none-mb" v-show="itemVisible">
        <a href="./usuarios.php"
        @mouseover="hoverItem = 'cog'" 
       @mouseleave="hoverItem = null"
        >
          <img :src="getIcon('cog')" alt="settings svg" />
          <span>Configurações</span>
        </a>
      </li>

    </ul>
  </div>
</aside>