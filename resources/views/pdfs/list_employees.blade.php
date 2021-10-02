
<html>
	<head>
		<title>Listado de Empleados</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

		<style>
			table{
			  border: 0.2px solid black;
			  border-spacing: 0;
			  width: 100%;

			}
			th, td {
				border: 0.1px solid #DBDBDB;
			}
			th {
				text-align: center;
			}
			body {
                margin-top: 2.5cm;
                margin-left: 0.1cm;
                margin-right: 0.1cm;
                margin-bottom: 2cm;
            }
            header {
                position: fixed;
                top: 0cm;
                left: 0.1cm;
                right: 0.1cm;
                height: 1cm;
            }
            footer {
                position: fixed; 
                bottom: -1px; 
                left: 1cm;
                right: 1cm;
                height: 50px; 
                font-size: 9px;
                color: #BFBFBF;
            }
            span{
            	color: #0074BD;
            }
            hr{
            	color: #0074BD;
            }

		</style>
	</head>

<body style="font-family: Arial, Sans-serif;">
	<table style="border: none;">
		<tr>
			<th style="border: none;">Listado de Empleados Registrados</th>
		</tr>
	</table>	
	<br>

	<table style="font-size: 10pt;">	
		<tr>
			<th>#</th>
      <th>Nombre</th>
      <th>Empresa</th>
      <th>Departamento</th>
      <th>F. Ingreso</th>
      <th>Correo</th>
      <th>F. Nacimiento</th>
		</tr>
    @foreach($employees as $employee)
		<tr>
      <th>#</th>
      <th>{{ $employee->name }}</th>
      <th>{{ $employee->company->name }}</th>
      <th>{{ $employee->departament->name }}</th>
      <th>{{ $employee->date }}</th>
      <th>{{ $employee->email }}</th>
      <th>{{ $employee->birthday }}</th>
    </tr>
    @endforeach
		
	</table>
</body>
</html>