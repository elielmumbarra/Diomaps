<form class="mostrarsenha1" method="post" action="etapa.php">
  <?php
    // Etapa 1
    $etapa = isset($_GET["etapa"]) ? $_GET["etapa"] : 1;

    if ($etapa == 1) {
      echo "
        <h2><img src='../imgs/user.png'>Cadastre seu posto</h2>
        <label for='nome'>Nome:</label>
        <input type='text' name='nome' required>

        <label for='email'>Email:</label>
        <input type='email' name='email' required>

        <label for='senha'>Senha:</label>
        <input type='password' name='senha' id='campoSenha' name='campoSenha' required>
        <i class='bi bi-eye-fill' id='mostrarsenha' onclick='mostrarsenha()'></i>

        <input type='hidden' name='etapa1' value='1'>

        
        <p>Já tem uma conta? <a href='login.php'>Entrar</a></p>

        <button type='submit'>Próxima Etapa</button>
        
      ";
    }
    // Etapa 2
    elseif ($etapa == 2) {
      echo "
        <h2><img src='../imgs/user.png'>Cadastre seu posto</h2>
        <label for='cep'>CEP:</label>
        <input type='text' name='cep' required>

        <label for='endereco'>Rua:</label>
        <input type='text' name='endereco' required>

        <label for='bairro'>Bairro:</label>
        <select name='bairro' required>
          <option value='' disabled selected>Selecione um bairro</option>";
          
          // Consulta para obter a lista de bairros
          $result = $conexao->query("SELECT * FROM bairros");
          while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['idbairro']}'>{$row['nome']}</option>";
          }
          
          echo "
        </select>

        <input type='hidden' name='etapa2' value='2'>       

        <p>Já tem uma conta? <a href='login.php'>Entrar</a></p>

        <button type='submit'>Próxima Etapa</button>


      ";
    }
    // Etapa 3
    elseif ($etapa == 3) {
      echo "
        <h2><img src='../imgs/user.png'>Cadastre seu posto</h2>
        <label for='telefone'>Telefone:</label>
        <input type='tel' name='telefone' required>

        <label for='tipo_lixo'>Tipo de Lixo:</label>
        <select name='tipo_lixo' required>
          <option value='' disabled selected>Selecione um tipo de lixo</option>";
          
          // Consulta para obter a lista de tipos de lixo
          $result = $conexao->query("SELECT * FROM tiposdelixo");
          while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
          }
          
          echo "
        </select>
    
        <input type='hidden' name='etapa3' value='3'>

        <p>Já tem uma conta? <a href='login.php'>Entrar</a></p>

        <button type='submit'>Enviar</button>


      ";
    }
  ?>
</form>

<script>
function mostrarsenha(){
  var inputPass = document.getElementById('campoSenha')
  var btnShowPass = document.getElementById('mostrarsenha')

  if(inputPass.type === 'password'){
    inputPass.setAttribute('type', 'text')
    btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill')
  }else{
    inputPass.setAttribute('type', 'password')
    btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill')
  }
}
    </script>
