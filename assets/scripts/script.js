new Vue({
  el: "#app",
  data: {
    showMenu: false,
    expanded: false,
    darkMode: false,
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
  },
});
