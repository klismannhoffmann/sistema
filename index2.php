<?php session_start(); ?>
<?php if(!isset($_SESSION ['autenticado']) OR !$_SESSION ['autenticado']) { ?>
	<?php header('location:login2.php');?>
<?php } ?>
<?php  include('header2.php');  ?>
<?php 
$pagina=filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_STRING);
switch($pagina){
	case 'aluno': {include ('aluno_lista2.php'); break;}
	case 'aluno_formulario2':{include('aluno_formulario2.php'); break;}
	case 'aluno_deleta2':{include ('aluno_deleta2.php'); break;}
	
	case 'professor_deleta2':{ include ('professor_deleta2.php'); break;}
	case 'professor_formulario2': {include ('professor_formulario2.php'); break;}
	case 'professor': {include ('professor_lista2.php'); break;}
	case 'sair': {include ('sair2.php'); break;}
	
	case 'usuarios':{include ('usuario_lista2.php'); break;}
	case 'usuarios_formulario2':{include ('usuarios_formulario2.php'); break;}
	case 'usuarios_deleta2':{include ('usuario_deleta2.php'); break;}
	
	case 'requisitos':{include('requisito.php'); break;}
	
	case 'matricula':{include('matricula.php'); break;}
	case 'matricula_deleta':{include('matricula_deleta.php'); break;}
	
	case 'curso_deleta':{include('curso_deleta.php'); break;}
	case 'curso_formulario':{include('cursos_formulario.php'); break;}
	case 'cursos':{include ('cursos_lista.php'); break;}
	default:{include('dashboard2.php');break;}
	}
?>
<?php  include('footer.php');  ?>