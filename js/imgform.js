window.onload = function() {
    // Exibir imagem padrão ao carregar a página
    exibirImagemPadrao();
  };

  function previewImage() {
    var input = document.getElementById('inputFile')
    var preview = document.getElementById('preview');

    var file = input.files[0];

    if (file) {
      var reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result;
      };

      reader.readAsDataURL(file);
    } else {
      // Caso o usuário cancele a seleção da imagem
      preview.src = '';
    }
  }

  function exibirImagemPadrao() {
    // Caminho da imagem padrão
    var imagemPadraoSrc = 'imgs/user.png';

    // Exibir imagem padrão
    document.getElementById('preview').src = imagemPadraoSrc;
  }