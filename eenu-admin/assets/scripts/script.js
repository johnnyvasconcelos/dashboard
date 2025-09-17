new Vue({
  el: "#app",
  data: {
    showMenu: false,
    expanded: false,
    darkMode: false,
    userMenu: false,
    is976: window.innerWidth <= 976,
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
    getIcon(name) {
      const li = document
        .querySelector(`li a img[alt^="${name}"]`)
        ?.closest("li");
      const isActive = li && li.classList.contains("active");

      if (isActive) {
        return this.darkMode
          ? `./assets/images/${name}.svg`
          : `./assets/images/${name}-dark.svg`;
      }

      if (!this.darkMode && this.hoverItem === name) {
        return `./assets/images/${name}.svg`;
      }

      return this.darkMode
        ? `./assets/images/${name}.svg`
        : `./assets/images/${name}-dark.svg`;
    },
  },
});
