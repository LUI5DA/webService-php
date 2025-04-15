<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de acceso</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7; /* Fondo claro para la página */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* 100% de altura de la ventana */
            color: #333; /* Color de texto principal */
        }

        .error-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1); /* Sombra suave para dar profundidad */
            width: 100%;
            max-width: 500px; /* Ancho máximo */
            padding: 40px;
            text-align: center;
            box-sizing: border-box;
        }

        h1 {
            font-size: 30px;
            color: #e74c3c; /* Rojo para resaltar el error */
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555; /* Color suave para el mensaje */
            margin-bottom: 30px;
        }

        .btn-return {
            display: inline-block;
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-return:hover {
            background-color: #2980b9; /* Cambio de color cuando el usuario pasa el mouse */
        }

        /* Estilos para pantallas pequeñas */
        @media (max-width: 480px) {
            .error-container {
                padding: 20px;
                width: 90%;
            }

            h1 {
                font-size: 24px;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1>Error de acceso</h1>
        <p>El nombre de usuario o la contraseña no son correctos. Por favor, inténtalo nuevamente.</p>
        <a href="../index.html" class="btn-return">Volver a intentar</a>
    </div>
</body>
</html>
