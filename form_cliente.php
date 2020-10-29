<?php 
include_once('bd/conexao.php');

$sql = "SELECT * FROM clientes";
$qr = mysqli_query($conexao, $sql);
$clientes = mysqli_fetch_all($qr, MYSQLI_ASSOC);

if(isset($_GET['id']) && $_GET['id'] != '') {
  $sql_cliente = "SELECT * FROM clientes WHERE id = " . $_GET['id'];
  $qr_cliente = mysqli_query($conexao, $sql_cliente);
  $client = mysqli_fetch_assoc($qr_cliente);

}else {
  $client = '';
}

include_once('layout/header.php');
include_once('layout/menu.php');
include_once('layout/sidebar.php');
?>
<div class="col">
  <h2>Novo cliente</h2>
  <?php include_once('layout/mensagens.php'); ?>
  <div class="card">
    <div class="card-body">
     <form method="post" action="gerencia_clientes.php?acao=salvar">
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="cpf">CPF:</label>
             <input type="text" name="cpf" id="cpf" class="form-control cpf" required value="<?php echo ($client != '' ? $client['cpf'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-8 col-sm-12">
           <div class="form-group">
             <label for="nome">Nome:</label>
             <input type="text" name="nome" id="nome" class="form-control" required value="<?php echo ($client != '' ? $client['nome'] : ''); ?>">

              <input type="hidden" name="usuario_id" id="usuario" class="form-control" readonly value="<?php echo ($client != '' ? $client['usuario_id'] : ''); ?>">

              <input type="hidden" name="id" value="<?php echo ($client != '' ? $client['id'] : ''); ?>" placeholder="">
           </div>
          </div>
         </div>

       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="telefone">Telefone:</label>
             <input type="text" name="telefone" id="telefone" class="form-control fone" value="<?php echo ($client != '' ? $client['telefone'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="email">E-mail:</label>
             <input type="email" name="email" id="email" class="form-control" required value="<?php echo ($client != '' ? $client['email'] : ''); ?>">
           ;</div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="convenio">Convênio:</label>
             <input type="text" name="convenio" id="convenio" class="form-control" value="<?php echo ($client != '' ? $client['convenio'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="num_convenio">Nº Convênio:</label>
             <input type="number" name="num_convenio" id="num_convenio" class="form-control" value="<?php echo ($client != '' ? $client['num_convenio'] : ''); ?>">
           </div>
         </div>
       </div>

       <div class="row">
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cep">CEP:</label>
             <input type="text" name="cep" id="cep" class="form-control cep" value="<?php echo ($client != '' ? $client['cep'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-6 col-sm-12">
           <div class="form-group">
             <label for="logradouro">Logradouro:</label>
             <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?php echo ($client != '' ? $client['logradouro'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="numero">Número:</label>
             <input type="text" name="numero" id="numero" class="form-control" value="<?php echo ($client != '' ? $client['numero'] : ''); ?>">
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-md-4 col-sm-12">
           <div class="form-group">
             <label for="complemento">Complemento:</label>
             <input type="text" name="complemento" id="complemento" class="form-control" value="<?php echo ($client != '' ? $client['complemento'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="bairro">Bairro:</label>
             <input type="text" name="bairro" id="bairro" class="form-control" value="<?php echo ($client != '' ? $client['bairro'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-3 col-sm-12">
           <div class="form-group">
             <label for="cidade">Cidade:</label>
             <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo ($client != '' ? $client['cidade'] : ''); ?>">
           </div>
         </div>
         <div class="col-md-2 col-sm-12">
           <div class="form-group">
             <label for="estado">Estado:</label>
             <select name="estado" class="form-control" id="estado">
               <option value=""></option>
               <option value="AC">AC</option>
               <option value="AL">AL</option>
               <option value="AP">AP</option>
               <option value="AM">AM</option>
               <option value="BA">BA</option>
               <option value="CE">CE</option>
               <option value="DF">DF</option>
               <option value="ES">ES</option>
               <option value="GO">GO</option>
               <option value="MA">MA</option>
               <option value="MT">MT</option>
               <option value="MS">MS</option>
               <option value="MG">MG</option>
               <option value="PA">PA</option>
               <option value="PB">PB</option>
               <option value="PR">PR</option>
               <option value="PE">PE</option>
               <option value="PI">PI</option>
               <option value="RJ">RJ</option>
               <option value="RN">RN</option>
               <option value="RS">RS</option>
               <option value="RO">RO</option>
               <option value="RR">RR</option>
               <option value="SC">SC</option>
               <option value="SP">SP</option>
               <option value="SE">SE</option>
               <option value="TO">TO</option>
             </select>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col">
           <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Salvar</button>
         </div>
       </div>

     </form>


    </div>
  </div>
</div>
<?php 
include_once('layout/footer.php');
?>