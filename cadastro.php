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

if ($acao == 'SALVAR') {

	$nome = utf8_encode($nome);

    $insert = "INSERT INTO cadEmpresa ( nome, cpf, placaCarro, dataVencimento, clienteVip, dependentes)
    VALUES ('$nome', '$cpf', '$placa', '$dataVencimento', '$vip', '$dependentes')";


                 //$result = mysqli_query($con,$insert);
    if ($result = mysqli_query($con, $insert)) {
        ?>
        <div class="alert alert-success Alertaperso">
            <a href="#" class="notLoad close" data-dismiss="alert"
            aria-label="close">&times;</a> <strong>Sucesso!</strong>
            Seu cadastro foi realizado com Sucesso
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-danger Alertaperso">
            <a href="#" class="notLoad close" data-dismiss="alert"
            aria-label="close">&times;</a> <strong>Erro!</strong>
            Tente novamente mais tarde
        </div>
        <?php 
    }
}
?>
<div class="page-wrapper pt-0">
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cadastro</h4>
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
				<form action="menu.php?pg=cadastro" method="post">
					<div class="row">
						<div class="col-md-7">
							<label>Nome</label>
							<input type="text" name="nome" class="form-control">
						</div>
						<div class="col-md-5">
							<label>CPF</label>
							<input type="text" name="cpf" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>Placa do carro</label>
							<input type="text" name="placa" class="form-control">
						</div>
						<div class="col-md-4">
							<label>Data de vencimento</label>
							<input type="date" name="dataVencimento" class="form-control">
						</div>
						<div class="col-md-4">
							<label>Cliente Vip</label>
							<select class="form-control" name="vip">
								<option value="Vip">Vip</option>
								<option value="Normal">Normal</option>
							</select>
						</div>

						<div class="row mt-3">
							<div class="col-md-12">
								<textarea class="form-control col-md-12" style="width: 500px" name="dependentes" rows="5" placeholder="Adicionar Dependentes"></textarea>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12 text-center">
						<button type="submit" name="acao" value="SALVAR" class="btn btn-info btn-long">Cadastrar</button>
					</div>
					</div>
				</form>
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