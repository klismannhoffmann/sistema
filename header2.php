<html>
<head>
	<title>Maestro</title>
	<link rel="stylesheet" href='./css/bootstrap.css' />
	<link rel="stylesheet" href='./css/estilos2.css' />
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script src="./js/bootstrap.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-4" id="logo">
					<img src="./img/maestro.png" alt="Logo do sistema Maestro" />
				</div>
				<div class="col-lg-8" id="menu">
					<ul class="nav nav-pills  pull-right">
						<li role="presentation"
							class="<?=(isset($_GET['pagina']) && $_GET['pagina'] == 'dashboard2')? 'active':''; ?>"><a
							href="index2.php?pagina=dashboard2">Dashboard</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['pagina']) && $_GET['pagina'] == 'aluno')? 'active':''; ?>"><a
							href="index2.php?pagina=aluno&formulario=0"><b>Alunos</b></a></li>
						<li role="presentation"
							class="<?=(isset($_GET['pagina']) && $_GET['pagina'] == 'professor')? 'active':''; ?>"><a
							href="index2.php?pagina=professor&formulario=0">Professores</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['pagina']) && $_GET['pagina'] == 'cursos')? 'active':''; ?>"><a
							href="index2.php?pagina=cursos&formulario=0">Cursos</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['pagina']) && $_GET['pagina'] == 'usuarios')? 'active':''; ?>"><a
							href="index2.php?pagina=usuarios">Usuarios</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['pagina']) && $_GET['pagina'] == 'matricula')? 'active':''; ?>"><a
							href="index2.php?pagina=matricula">Matriculas</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['pagina']) && $_GET['pagina'] == 'sair')? 'active':''; ?>"><a
							href="index2.php?pagina=sair">Sair</a></li>
					</ul>
				</div>
			</div>
		</div>
</header>
	<div id="content">
		<div class="container">