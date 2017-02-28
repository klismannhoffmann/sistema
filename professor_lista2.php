<?php $mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_SANITIZE_STRING);?>
<span><?=(isset($mensagem)) ? $mensagem :'';?></span>
<br/>
<div class="row">
	<h1>Professor</h1>
	<ol class="breadcrumb">
		<li><a href="index2.php?pagina=eu"><b>Maestro</b></a></li>
		<li class="active"><b>Professor</b></li>
	</ol>
</div>
<a href="index2.php?pagina=professor_formulario2" class="btn btn-success">Adicionar</a>
<?php 
	//Abrir de conexão
	$link = mysqli_connect('localhost', 'root','', 'maestro');
	//Fazer o uso
	$query = 'SELECT * FROM professor';
	$handle = mysqli_query($link, $query);
?>
<table class="table table-striped table-bordered table-hover">
	<tr>
		<td>ID</td>
		<td>Nome</td>
		<td>Email</td>
        <td>Endereço</td>
       	<td>Telefone</td>
       	<td>Acões</td>
	</tr>
	<?php while($row = mysqli_fetch_assoc($handle)){ ?>
	<tr>
		<td><?php echo $row['id_professor'];?></td>
		<td><?php echo $row['nome'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['endereco'];?></td>
		<td><?php echo $row['telefone'];?></td>
		<td>
			<a href="index2.php?pagina=professor_formulario2&id=<?php echo $row['id_professor'];?>" class="btn btn-primary">Editar</a>
			<a href="index2.php?pagina=professor_deleta2&id=<?php echo $row['id_professor'];?>"  class="btn btn-danger">Deletar</a>
		</td>
	</tr>
<?php } ?>
</table>
<?php	mysqli_close($link);?>		
			
		
					
				
	