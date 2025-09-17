<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Admin</title>
  </head>
  <body>
    <form action="">
      <input type="text" placeholder="Login" id="login" />
      <input type="password" id="password" placeholder="password" />
      <button type="button" onclick="wadmLoad()">Entrar</button>
    </form>
    <script>
      const login = document.querySelector("#login");
      const password = document.querySelector("#password");
      function wadmLoad() {
        if (login.value == "400" && password.value == "senha-exemplo@100") {
          window.location.href = "./adm/index.html";
        } else {
          alert("Login e Senha errados!");
        }
      }
    </script>
  </body>
</html>
