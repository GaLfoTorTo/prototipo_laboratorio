<?php 
include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
include_once('bd/estados.php');
 ?>
<div class="col">
   <h2>Novo Usuário</h2>
   <?php include_once('layout/mensagens.php'); ?>
  <div class="card">
    <div class="card-body">
     <form method="post" onsubmit="return false">
     <h5 id="">Dados de Login</h5>
     <br />
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <div class="form-group">
             <label for="email">E-mail:</label>
             <input type="email" name="email" id="email" class="form-control" >

             <input type="hidden" name="id" id="id" >
           </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Informe uma senha" class="form-control" >
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <div class="form-group">
            <label for="senha">Confirmação de Senha</label>
            <input type="password" name="confirma_senha" id="confirma_senha" placeholder="Confirme sua senha" class="form-control" >
          </div>
        </div>
      </div>
      <hr>
        
      <h5 id="">Dados pessoais</h5>
      <br />
       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cpf">CPF:</label>
             <input type="text" name="cpf" id="cpf" class="form-control cpf"  >
           </div>
         </div>
         <div class="col-md-9 col-sm-12">
           <div class="form-group">
             <label for="nome">Nome:</label>
             <input type="text" name="nome" id="nome" class="form-control"  >
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="telefone">Telefone:</label>
             <input type="text" name="telefone" id="telefone" class="form-control fone" >
           </div>
         </div>

          <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="cep">CEP:</label>
             <input type="text" name="cep" id="cep" class="form-control cep" >
           </div>
         </div>
       </div>
       

       <div class="row">
         
         <div class="col-md-8 col-sm-12">
           <div class="form-group">
             <label for="logradouro">Logradouro:</label>
             <input type="text" name="logradouro" id="logradouro" class="form-control" >
           </div>
         </div>
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="numero">Número:</label>
             <input type="text" name="numero" id="numero" class="form-control" >
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="complemento">Complemento:</label>
             <input type="text" name="complemento" id="complemento" class="form-control" >
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="bairro">Bairro:</label>
             <input type="text" name="bairro" id="bairro" class="form-control" >
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cidade">Cidade:</label>
             <input type="text" name="cidade" id="cidade" class="form-control" >
           </div>
         </div>
         <div class="col-md-2 col-sm-12">
           <div class="form-group">
             <label for="estado">Estado:</label>
             <select name="estado" class="form-control" id="estado">
               <option value="">Escolha</option>
             </select>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col">
           <button class="btn btn-primary w-100" onclick="salvarDados()"><i class="fas fa-save"></i> Salvar</button>
         </div>

       </div>

     </form>
<!-- <input type="text" name="usuario_id" value="1" placeholder="" >
<input type="text" name="categoria_id" value="1" placeholder=""> -->

    </div>
  </div>
</div>
<?php 
include_once('layout/footer.php');
 ?>
 <script src="js/estados.js" type="text/javascript"></script>
 <script>
   $(document).ready(function(){
    let procuraParametro = new URLSearchParams(window.location.search);
    if(procuraParametro.has('id') && procuraParametro.get('id') != '') {
      carregaDados(procuraParametro.get('id'));
    }

    var laco_estados = '';
    $.each(estados,function(index, el) {
        laco_estados += `<option value="${el.sigla}">${el.sigla}</option>`; 
    });
    $('#estado').append(laco_estados);
   })
   function carregaDados(id) {
    $.ajax({
      url: 'api/colaboradores.php?acao=exibir&id=' + id,
      type: 'GET',
      dataType: 'json',
      beforeSend: function() {
        $('#carregando').fadeIn();
      }
    })
    .done(function(data){
      $('#id').val(data.dados.id);
      $('#nome').val(data.dados.nome);
      $('#cpf').val(data.dados.cpf);
      $('#email').val(data.dados.email);
      $('#telefone').val(data.dados.telefone);
      $('#cep').val(data.dados.cep);
      $('#logradouro').val(data.dados.logradouro);
      $('#numero').val(data.dados.numero);
      $('#complemento').val(data.dados.complemento);
      $('#bairro').val(data.dados.bairro);
      $('#cidade').val(data.dados.cidade);
      $('#estado').val(data.dados.estado);
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
    })
    .fail(function(data){
      $('#mensagem').html(retornaMensagemAlert(data.responseJSON.mensagem, data.responseJSON.alert));
    })
    .always(function(){
      $('#carregando').fadeOut();
    })
   }

   function salvarDados() {
    var id = $('#id').val();
    var senha = $('#senha').val();
    var confirma_senha = $('#confirma_senha').val();
    var nome = $('#nome').val();
    var cpf = $('#cpf').val();
    var email = $('#email').val();
    var telefone = $('#telefone').val();
    var cep = $('#cep').val();
    var logradouro = $('#logradouro').val();
    var numero = $('#numero').val();
    var complemento = $('#complemento').val();
    var bairro = $('#bairro').val();
    var cidade = $('#cidade').val();
    var estado = $('#estado').val();

    if(nome == '' || cpf == '' || email == '' || (senha == '' && id == '') ) {
      alert('Nomen CPF, E-mail e Senha são obrigatórios!');
      $('#email').focus();
      return false;
    }

    $.ajax({
      url: 'api/colaboradores.php?acao=salvar',
      type: 'POST',
      dataType: 'json',
      data: {id: id, senha: senha, confirma_senha: confirma_senha, nome: nome, cpf: cpf, email: email, telefone: telefone, cep: cep, logradouro: logradouro, numero: numero, complemento: complemento, bairro: bairro, cidade: cidade, estado: estado},
      beforeSend: function(){
        $('#carregando').fadeIn();
      }
    })
    .done(function(data){
      $('#id').val(data.dados.id);
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
    })
    .fail(function(data){
      $('#mensagem').html(retornaMensagemAlert(data.mensagem, data.alert));
    })
    .always(function(){
      $('#carregando').fadeOut();
    });
   }
 </script>