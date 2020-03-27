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

if($logado == 'admin'){

$idCli = $id;

$SelectEdit = " SELECT idEmpresa, nome, cpf, placaCarro, dataVencimento, clienteVip, dependentes
				FROM cadEmpresa 
				where idEmpresa = $idCli
				ORDER BY idEmpresa DESC";

if ($query = mysqli_query( $con, $SelectEdit )) {
    if (mysqli_num_rows($query) > 0) {
        $SelectEdit = array();
        while ($row = mysqli_fetch_object($query)) {
            $SelectEdit[] = $row;
        }
    }
}
if ($acao == 'atualiza') {

//nome, cpf, placaCarro, dataVencimento, clienteVip
    $UPDATE  = "UPDATE cadEmpresa
                SET nome = '$nome', cpf = '$cpf', placaCarro = '$placa', dataVencimento = '$dataVencimento', clienteVip = '$vip', dependentes = '$dependentes'
                WHERE idEmpresa = '$idCli'";

    $result = mysqli_query($con, $UPDATE);
    header('location:menu.php');
    ?>
    <div class="alert alert-success fade in">
        <a href="#" class="notLoad close" data-dismiss="alert"
        aria-label="close">&times;</a> <strong>Sucesso!</strong>
        Seu cadastro foi excluído com Sucesso
    </div>
    <?php
}
?>


<div class="page-wrapper pt-0">
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Editar</h4>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="container">
		<div class="col-md-12 border rounded">
			<div class="form-group">
				<?php foreach ($SelectEdit as $itemEdit ) { ?>
				<form action="menu.php?pg=editar&id=<?php echo $idCli ?>" method="post">
					<div class="row">
						<div class="col-md-7">
							<label>Nome</label>
							<input type="text" name="nome" class="form-control" value="<?php echo $itemEdit->nome ?>">
						</div>
						<div class="col-md-5">
							<label>CPF</label>
							<input type="text" name="cpf" class="form-control" value="<?php echo $itemEdit->cpf ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>Placa do carro</label>
							<input type="text" name="placa" class="form-control" value="<?php echo $itemEdit->placaCarro ?>">
						</div>
						<div class="col-md-4">
							<label>Data de vencimento</label>
							<input type="date" name="dataVencimento" class="form-control" value="<?php echo $itemEdit->dataVencimento ?>">
						</div>
						<div class="col-md-4">
							<label>Cliente Vip</label>
							<select class="form-control" name="vip">
								<option value="<?php echo $itemEdit->clienteVip ?>"><?php echo $itemEdit->clienteVip ?></option>
								<option value="Vip">Vip</option>
								<option value="Normal">Normal</option>
							</select>
						</div>
						<div class="row mt-3">
							<div class="col-md-12">
								<textarea class="form-control col-md-12" style="width: 500px" name="dependentes" rows="5" placeholder="Adicionar Dependentes" value="<?php echo $itemEdit->dependentes ?>"><?php echo $itemEdit->dependentes ?></textarea>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12 text-center">
						<button type="submit" name="acao" value="atualiza" class="btn btn-info btn-long">Atualizar</button>
					</div>
					</div>
				</form>
			<?php } ?>
			</div>
		</div>
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
<?php } ?>