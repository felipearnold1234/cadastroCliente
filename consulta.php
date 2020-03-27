<?php 
extract($_REQUEST);
include 'config.php';
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:login.php');
}
    $logado = $_SESSION['login'];

$cadastroEmpresa = " SELECT idEmpresa,nome,cpf, placaCarro, dataVencimento, clienteVip, dependentes
				FROM cadEmpresa 
				ORDER BY idEmpresa DESC";

if ($query = mysqli_query( $con, $cadastroEmpresa )) {
    if (mysqli_num_rows($query) > 0) {
        $empresa = array();
        while ($row = mysqli_fetch_object($query)) {
            $empresa[] = $row;
        }
    }
}
 ?>
<div class="page-wrapper pt-0">
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Consulta</h4>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						
						<div class="table-responsive">
							<table id="zero_config" class="table table-striped table-bordered no-wrap">
								<thead>
									<tr>
										<th>#</th>
										<th>Nome</th>
										<th>CPF</th>
										<th>Placa</th>
										<th>Venc.</th>
										<th>Situação</th>
										<th>Cliente</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$dados = date('Y-m-d');

									 foreach ($empresa as $item) { ?>
									<tr data-toggle="modal" data-target="#ModalLongoExemplo<?php echo $item->idEmpresa; ?>">
										<td><?php echo $item->idEmpresa; ?></td>
										<td><?php echo $item->nome; ?></td>
										<td><?php echo $item->cpf; ?></td>
										<td><?php echo $item->placaCarro; ?></td>
										<td><?php echo date('d/m/Y', strtotime($item->dataVencimento)) ; ?></td>
										<?php if( $item->dataVencimento <= $dados ){ ?>
											<td class="badge-danger">Inativo</td>
										<?php }else if( $item->dataVencimento > $dados ){ ?>
											<td class="badge-success">Ativo</td>
										<?php } ?>
										<td><?php echo $item->clienteVip; ?></td>
										<td>
											<a href="menu.php?pg=editar&id=<?php echo $item->idEmpresa; ?>">
											Editar
											</a>
										</td>
									</tr>
									<div class="modal fade" id="ModalLongoExemplo<?php echo $item->idEmpresa; ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalLongoExemplo"><?php echo $item->idEmpresa. ' - ' .$item->nome ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
					<div class="row">
						<div class="col-md-7">
							<label>Nome</label>
							<input type="text" name="nome" class="form-control" value="<?php echo $item->nome ?>">
						</div>
						<div class="col-md-5">
							<label>CPF</label>
							<input type="text" name="cpf" class="form-control" value="<?php echo $item->cpf ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>Placa do carro</label>
							<input type="text" name="placa" class="form-control" value="<?php echo $item->placaCarro ?>">
						</div>
						<div class="col-md-4">
							<label>Data de vencimento</label>
							<input type="date" name="dataVencimento" class="form-control" value="<?php echo $item->dataVencimento ?>">
						</div>
						<div class="col-md-4">
							<label>Cliente Vip</label>
							<select class="form-control" name="vip">
								<option value="<?php echo $item->clienteVip ?>"><?php echo $item->clienteVip ?></option>
							</select>
						</div>
						<div class="row mt-3">
							<div class="col-md-12">
								<textarea class="form-control col-md-12" style="width: 500px" name="dependentes" rows="5" placeholder="Adicionar Dependentes" value="<?php echo $item->dependentes ?>"><?php echo $item->dependentes ?></textarea>
							</div>
						</div>
					</div>
					
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
									<?php } ?>
								</tbody>
								
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer text-center text-muted">
		Desenvolvido por  <a
		href="https://fadesenvolvimentos.com.br/">Felipe Arnold</a>.
	</footer>
</div>