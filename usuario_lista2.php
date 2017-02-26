
<?php $mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_SANITIZE_STRING);?>
<span><?=(isset($mensagem)) ? $mensagem :'';?></span>
<br/>

<a href="index2.php?pagina=usuarios_formulario2" class="btn btn-success">Adicionar</a>
<?php 
//Abrir de conexão
	$link = mysqli_connect('localhost', 'root','', 'maestro');
//Fazer o uso
	$query = 'SELECT * FROM usuarios';
	$handle = mysqli_query($link, $query);
	?>
	<table>
		<tr>
			<td>ID</td>
			<td>Nome</td>
			<td>Usuário</td>
			<td>Situação</td>
		</tr>
		<?php while($row = mysqli_fetch_assoc($handle)){ ?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['nome'];?></td>
			<td><?php echo $row['usuario'];?></td>
			<td>
				<a href="index2.php?pagina=usuarios_formulario2&id=<?php echo $row['id'];?>" class="btn btn-primary">Editar</a>
				<a href="index2.php?pagina=usuarios_deleta2&id=<?php echo $row['id'];?>"  class="btn btn-danger">Deletar</a>
			</td>
		</tr>
		<?php } ?>
		
	</table>

<?php
//Fechar conexão
	mysqli_close($link);
?>