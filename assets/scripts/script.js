new Vue({
  el: "#app",
  data: {
    showMenu: false,
    expanded: false, // Começa como false para mostrar apenas 4 itens
    darkMode: false,
    submenu: {
      owners: false,
      settings: false,
    },
  },
  computed: {
    itemVisible() {
      // item-visible aparece quando:
      // 1. Menu está colapsado (showMenu = true)
      // 2. E os submenus estão fechados (owners = false E settings = false)
      return this.showMenu && !this.submenu.owners && !this.submenu.settings;
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
  },
});
