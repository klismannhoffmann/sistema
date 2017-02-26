<?php $sair= filter_input(INPUT_POST,'sair',FILTER_VALIDATE_INT);?>
	<?php IF($sair == 1){?>
	<?php session_destroy();?>
<?php header('location:login2.php');?>
<?php }?>


<div class="row">
	<h1>Sair</h1>
	<ol class="breadcrumb">
		<li><a href="#">Maestro</a></li>
		<li class="active">Sair</li>
	</ol>
</div>
<form action="index2.php?pagina=sair" method="post">
	<h1>Você deseja realmente sair?</h1>
	<button type="submit" class="btn btn-defaut" name="sair" value="1">Sair</button>
	<a href=" index2.php?paginadashboard" class="btn btn-defaut"> Nao</a>
</form>