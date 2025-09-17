<header>
    <form action="" class="search" id="search">
        <img :src="darkMode ? './assets/images/search.svg' : './assets/images/search-dark.svg'" alt="search" />
        <input type="search" placeholder="Pesquise..." />
    </form>
    <div>
        <p class="moon-div">
        <img :src="darkMode ? './assets/images/moon.svg' : './assets/images/moon-dark.svg'" alt="moon" class="moon" @click="darkModeFunc()">
</p>
        <p class="nimbus">
        <img :src="darkMode ? './assets/images/cloud.svg' : './assets/images/cloud-dark.svg'" alt="nimbus" />
        <span>16°</span>
        </p>
        <span class="bt-mobl" @click="toggleMenu">
            <img :src="darkMode ? './assets/images/menu.svg' : './assets/images/menu-dark.svg'" alt="menu" />
        </span>
        <div class="user" @click="userMenu = !userMenu">
        <img src="./assets/images/user.jpg" alt="user" />
        <div>
            <p>Christian</p>
            <span>Admnistrador&nbsp;
                <img
                      :src="darkMode ? './assets/images/chevron-pink.svg' : './assets/images/chevron-down-dark.svg'"
                      alt="chevron"
                  />
            </span>
        </div>
        <ul v-show="userMenu" class="user-menu">
            <li><a href="#">Logout</a></li>
        </ul>
        </div>
    </div>
</header>