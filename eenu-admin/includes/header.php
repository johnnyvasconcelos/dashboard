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
                      <?php
require 'config.php';
$usuario_id = $_SESSION['usuario_id'] ?? $_COOKIE['usuario_id'] ?? null;
if ($usuario_id) {
    $result = $conn->query("SELECT nome, foto, funcao FROM usuarios WHERE id = $usuario_id LIMIT 1");
    $row = $result->fetch_assoc();
} else {
    $row = ['nome' => 'Visitante', 'foto' => 'user-default.webp'];
}
?>
        <img src="assets/images/<?php echo htmlspecialchars($row['foto'] ?? 'user-default.webp'); ?>" alt="<?php echo htmlspecialchars($row['nome']); ?>" />
        <div>
<p><?php echo htmlspecialchars($row['nome']); ?></p>
            <span><?php echo htmlspecialchars($row['funcao']); ?>&nbsp;
                <img
                      :src="darkMode ? './assets/images/chevron-pink.svg' : './assets/images/chevron-down-dark.svg'"
                      alt="chevron"
                  />
            </span>
        </div>
        <ul v-show="userMenu" class="user-menu">
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </div>
</header>