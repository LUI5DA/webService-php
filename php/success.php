<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8; /* Fondo suave para un diseño limpio */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* 100% de altura de la ventana */
            color: #333; /* Color de texto principal */
        }

        .welcome-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1); /* Sombra suave para dar profundidad */
            width: 100%;
            max-width: 500px; /* Ancho máximo del contenedor */
            padding: 40px;
            text-align: center;
            box-sizing: border-box;
        }

        h1 {
            font-size: 32px;
            color: #4caf50; /* Verde brillante para el título */
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555; /* Color suave para el texto */
            margin-bottom: 30px;
        }

        .btn-home {
            display: inline-block;
            padding: 12px 25px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-home:hover {
            background-color: #45a049; /* Cambio de color cuando el usuario pasa el mouse */
        }

        /* Estilos para pantallas pequeñas */
        @media (max-width: 480px) {
            .welcome-container {
                padding: 20px;
                width: 90%;
            }

            h1 {
                font-size: 28px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>¡Inicio de sesión exitoso!</h1>
        <p>Bienvenido, has ingresado correctamente.</p>
        <a href="../index.html" class="btn-home">Volver al inicio</a>
    </div>
</body>
</html>
