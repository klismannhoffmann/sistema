<?php $sair= filter_input(INPUT_POST,'sair',FILTER_VALIDATE_INT);?>
<?php IF($sair == 1){?>
<?php session_destroy();?>
<?php header('location:login2.php');?>
<?php }?>
<div class="row">
	<h1>Sair</h1>
	<ol class="breadcrumb">
		<li><a href=" index2.php?pagina=dashboard" ><b>Maestro</b></a></li>
		<li class="active"><b>Sair</b></li>
	</ol>
</div>
<form action="index2.php?pagina=sair" method="post">
	<h1><b>Você deseja realmente sair?</b></h1>
	<button type="submit" class="btn btn-defaut" name="sair" value="1">Sair</button>
	<a href=" index2.php?pagina=dashboard2" class="btn btn-defaut"> Não</a>
</form>