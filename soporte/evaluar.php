
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/en.css">
    <title>Evaluar sistema</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <form action="" method="post">
        <div class="container my-sm-5 my-1">
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>1. ¿El inicio de sesión fue facil?</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">Muy fácil
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">De dificultad media
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Muy complicada
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
    
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>2. ¿Tuvo algun problema para crear su cuenta?</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">No, ningun problema.
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Si, pero facil de resolver.
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Si, tardé en encontrar solución
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
    
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>3. ¿La interfaz fue facil de entender?</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">Si, muy facil.
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Medianamente facil, con detalles.
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Absolutamente no.
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
    
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>4. Nuestra atención al cliente es:</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">Muy útil
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Normal
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Más bien Inútil
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
    
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>5. En la parte de soporte, ¿Cuál prefiere usar?:</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">Chat
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Llamada
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Correo
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">WhatsApp
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="options">Agenda del cita
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>
    
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>6. ¿Qué SI le gustó del sistema?:</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">
                        <textarea class="p-3" name="" cols="68" rows="3" placeholder="Escribe tu respuesta"></textarea>
                    </label>
                </div>
            </div>
    
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>7. ¿Qué NO le gustó del sistema?:</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <label class="options">
                        <textarea class="p-3" name="" cols="68" rows="3" placeholder="Escribe tu respuesta"></textarea>
                    </label>
                </div>
            </div>
    
            <div class="question ml-sm-5 pl-sm-5 pt-2">
                <div class="py-2 h5"><b>8. Del 1 al 10, ¿Qué calificación le daria al sistema?:</b></div>
                <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                    <input type="number" class="mx-4 p-1" placeholder="Escribe la calificación" name="" id="">
                </div>
            </div>
    
    
            <input type="submit" class="d-block mt-3 btn btn-success mx-auto" value="Enviar">
        </div>

    </form>
</body>
</html>