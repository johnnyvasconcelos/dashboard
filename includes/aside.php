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
      <li class="active">
        <a href="./index.html" @mouseover="hoverItem = 'home'" 
       @mouseleave="hoverItem = null">
          <img src="./assets/images/home.svg" alt="home svg" />
          <span>Início</span>
        </a>
      </li>

      <!-- Proprietários -->
      <li class="menu">
        <a href="#" class="none none-mb" @click.prevent="toggleSubmenu('owners')" @mouseover="hoverItem = 'globe'" 
       @mouseleave="hoverItem = null">
          <img :src="getIcon('globe')" alt="home svg" />
          <span>Proprietários</span>
          <img :src="darkMode ? './assets/images/chevron-down.svg' : './assets/images/chevron-dark.svg'" alt="chevron down" class="icon" />
        </a>
        <ul class="submenu" :class="{ 'submenu-none': submenu.owners }">
          <li>
            <a href="./empresas.html"
             @mouseover="hoverItem = 'book'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('book')" alt="book svg" />
              <span>Ver Empresas</span>
            </a>
          </li>
          <li class="mb">
            <a href="./cadastrar-empresa.html"
            @mouseover="hoverItem = 'seed'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('seed')" alt="seed svg" />
              <span>Cadastrar Empresa</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Item visível para Proprietários (quando menu colapsado) -->
      <li class="item-visible none-mb" v-show="itemVisible">
        <a href="./empresas.html"
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
          <li>
            <a href="./usuarios.html"
            @mouseover="hoverItem = 'users'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('users')" alt="users svg" />
              <span>Usuários</span>
            </a>
          </li>
          <li>
            <a href="./cadastrar-usuario.html"
            @mouseover="hoverItem = 'user'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('user')" alt="user svg" style="width: 23px" />
              <span>Cadastrar Usuário</span>
            </a>
          </li>
          <li class="last mb">
            <a href="./personalizar-painel.html"
            @mouseover="hoverItem = 'edit'" 
       @mouseleave="hoverItem = null"
            >
              <img :src="getIcon('edit')" alt="edit svg" style="width: 18px;" />
              <span>Personalizar Painel</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Item visível para Configurações (quando menu colapsado) -->
      <li class="item-visible none-mb" v-show="itemVisible">
        <a href="./usuarios.html"
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