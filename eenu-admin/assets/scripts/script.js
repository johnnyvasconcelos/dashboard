new Vue({
  el: "#app",
  data: {
    showMenu: false,
    expanded: false,
    darkMode: false,
    userMenu: false,
    showPassword: false,
    is976: window.innerWidth <= 976,
    currentPath: window.location.pathname.split("/").pop(),
    hoverItem: null,
    menuMainOpen: true,
    submenu: {
      owners: false,
      settings: false,
    },
  },
  computed: {
    itemVisible() {
      return this.showMenu && !this.submenu.owners && !this.submenu.settings;
    },
  },
  created() {
    const saveMenuMainOpen = localStorage.getItem("menuMainOpen");
    const saveDark = localStorage.getItem("darkMode");
    if (saveMenuMainOpen !== null) {
      this.menuMainOpen = JSON.parse(saveMenuMainOpen);
    }
    if (saveDark !== null) {
      this.darkMode = JSON.parse(saveDark);
    }
  },
  watch: {
    menuMainOpen(newVal) {
      localStorage.setItem("menuMainOpen", JSON.stringify(newVal));
    },
    darkMode(newVal) {
      localStorage.setItem("darkMode", JSON.stringify(newVal));
    },
  },
  methods: {
    isPage(page) {
      return this.currentPath === page;
    },
    toggleMenu() {
      this.showMenu = !this.showMenu;
    },
    toggleSubmenu(key) {
      this.submenu[key] = !this.submenu[key];
    },
    toggleExpanded() {
      this.expanded = !this.expanded;
    },
    darkModeFunc() {
      this.darkMode = !this.darkMode;
    },
    menuMain() {
      this.menuMainOpen = !this.menuMainOpen;
    },
    getIcon(name, page) {
      // page = página que o li representa, ex: 'index.php'
      const isActive = this.isPage(page);

      // se ativo, sempre retorna branco
      if (isActive) {
        return `./assets/images/${name}.svg`;
      }

      // hover
      if (!this.darkMode && this.hoverItem === name) {
        return `./assets/images/${name}.svg`;
      }

      // modo normal/dark
      return this.darkMode
        ? `./assets/images/${name}.svg`
        : `./assets/images/${name}-dark.svg`;
    },
  },
});
