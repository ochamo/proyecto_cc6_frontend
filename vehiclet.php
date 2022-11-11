<?php
	session_start();
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <div class ="container mt-5">
            <div class="row">
            <form action ="<?php $_SERVER['PHP_SELF']; ?>"method ="POST">
        
                <div class = "col-md-8">
                    <table class ="table">
                        <thead class ="table-success table-striped">
                            <tr>
                                
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Passwod</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                                
                            </tr>                        
                        </thead>

                        <tbody>
                            <?php
                                while ($row = mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <th><?php echo $row['id']?></th>
                                    <th><?php echo $row['nombre']?></th>
                                    <th><?php echo $row['usuario']?></th>
                                    <th><?php echo $row['password']?></th>
                                    <th><?php echo $row['correo']?></th>
                                    <th><a href="actualizaru.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                                    <th><a href="deleteu.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>    
                                </tr>
                            <?php
                                }
                            ?>    
                            
                        </tbody>
                    </table>


                </div>

            </div>
            
        </div>

                                         
								<div class="col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><a href='welcome.php'> Regresar al menu </a></button>
								</div>
							

        
    </body>
</html>