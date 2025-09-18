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
    modalAberto: false,
    empresaSelecionada: {},
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
    abrirModal(empresa) {
      this.empresaSelecionada = empresa;
      this.modalAberto = true;
    },
    removerEmpresa(id) {
      this.modalAberto = false;
      if (!confirm("Tem certeza que deseja remover esta empresa?")) return;

      fetch("remover_empresa.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "id=" + encodeURIComponent(id),
      })
        .then((res) => res.text())
        .then((res) => {
          alert(res);
          this.modalAberto = false;
          location.reload(); // recarrega a tabela
        })
        .catch((err) => alert("Erro: " + err));
    },
    getIcon(name, page) {
      const isActive = this.isPage(page);
      if (isActive) {
        return `./assets/images/${name}.svg`;
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
