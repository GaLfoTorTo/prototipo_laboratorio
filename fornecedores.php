<?php 
  include_once('layout/header.php');
  include_once('layout/menu.php');
  include_once('layout/sidebar.php');
?>
         <div class="col">
          <h2>Gestão de fornecedores</h2>
          <div class="card">
            <div class="card-body">
               <a href="form_fornecedores.php" class="btn btn-primary" style="float: right">
                <i class="fas fa-user"></i> Novo Fornecedor
              </a>
              <a href="javascript:history.back(-1)" class="btn btn-secondary voltar">
                <i class="fas fa-arrow-left"></i> Voltar
              </a>
              <br>
              <br>
          <table class="table table-striped table-hover">
            <tr>
              <th>Nome Fantasia</th>
              <th>CNPJ</th>
              <th>Telefone</th>
              <th>E-mail</th>
              <th>Cidade</th>
              <th>Ações</th>
            </tr>
            <tr>
              <td>Nome Fantasia</td>
              <td>CNPJ</td>
              <td>Telefone</td>
              <td>E-mail</td>
              <td>Cidade</td>
              <td>
                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalVerCliente">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="#" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger">
                  <i class="fas fa-trash" onclick="confirm('Deseja realmente deletar?')"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Nome Fantasia</td>
              <td>CNPJ</td>
              <td>Telefone</td>
              <td>E-mail</td>
              <td>Cidade</td>
              <td>
                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalVerCliente">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="#" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger">
                  <i class="fas fa-trash" onclick="confirm('Deseja realmente deletar?')"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Nome Fantasia</td>
              <td>CNPJ</td>
              <td>Telefone</td>
              <td>E-mail</td>
              <td>Cidade</td>
              <td>
                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalVerCliente">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="#" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger">
                  <i class="fas fa-trash" onclick="confirm('Deseja realmente deletar?')"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Nome Fantasia</td>
              <td>CNPJ</td>
              <td>Telefone</td>
              <td>E-mail</td>
              <td>Cidade</td>
              <td>
                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalVerCliente">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="#" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger">
                  <i class="fas fa-trash" onclick="confirm('Deseja realmente deletar?')"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Nome Fantasia</td>
              <td>CNPJ</td>
              <td>Telefone</td>
              <td>E-mail</td>
              <td>Cidade</td>
              <td>
                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalVerCliente">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="#" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger">
                  <i class="fas fa-trash" onclick="confirm('Deseja realmente deletar?')"></i>
                </a>
              </td>
            </tr>
            <tr>
              <td>Nome Fantasia</td>
              <td>CNPJ</td>
              <td>Telefone</td>
              <td>E-mail</td>
              <td>Cidade</td>
              <td>
                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalVerCliente">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="#" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger">
                  <i class="fas fa-trash" onclick="confirm('Deseja realmente deletar?')"></i>
                </a>
              </td>
            </tr>
          </table>

          <nav aria-label="Navegação de página exemplo">
            <ul class="pagination">

              <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
            </ul>
          </nav>
            </div>
          </div>
        </div>
      </div>

<?php 
include_once('layout/footer.php');
?>


    <div class="modal fade" id="modalVerCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Dados do fornecedor
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>