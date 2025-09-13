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
        <div class="user">
        <img src="./assets/images/user.jpg" alt="user" />
        <div>
            <p>Christian</p>
            <span>Admnistrador&nbsp;
                <img
                      src="./assets/images/chevron-pink.svg"
                      alt="chevron"
                  />
            </span>
        </div>
        </div>
    </div>
</header>