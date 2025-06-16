<?php
ini_set('display_errors', 1); // Muestra los errores
error_reporting(E_ALL); // Reporta todos los errores

// Obtener los datos enviados por POST desde el formulario
$username = $_POST['username'];  // Nombre de usuario ingresado en el formulario
$password = $_POST['password'];  // Contraseña ingresada en el formulario

// Configuración del servidor LDAP y credenciales
$ldap_server = "ldap://13.82.211.52"; // Dirección de tu servidor LDAP
$ldap_port = 389; // Puerto para conexión LDAP (389 para no cifrado, 636 para LDAPS)
$base_dn = "DC=adservice,DC=local"; // Base DN de tu dominio (cambia según tu configuración)

// Usuario con permisos de lectura en AD (este usuario solo se usa para hacer el bind inicial)
$ldap_user = "eltigre@adservice.local";  // DN del usuario con permisos adecuados para hacer búsquedas
$ldap_password = "ContrasenaSegura2024!"; // Contraseña del usuario para realizar el bind de búsqueda

// Conectar al servidor LDAP
echo "<script>console.log('Intentando conectar al servidor LDAP: $ldap_server...');</script>";
$ldap_conn = ldap_connect($ldap_server, $ldap_port);

if (!$ldap_conn) {
    die("Error: No se pudo conectar al servidor LDAP.<br>");
} else {
    echo "<script>console.log('Conexión exitosa al servidor LDAP.');</script>";
}

// Configurar opciones de conexión LDAP
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3); // Usar la versión 3 del protocolo LDAP
ldap_set_option($ldap_conn, LDAP_OPT_REFERRALS, 0); // Desactivar las referencias (esto puede evitar redirección automática a otros servidores)

// Realizar bind (autenticación) con el usuario de prueba que tiene permisos de lectura
$bind = ldap_bind($ldap_conn, $ldap_user, $ldap_password);

if (!$bind) {
    die("Error: No se pudo autenticar al usuario con el DN: $ldap_user.<br>");
} else {
    echo "<script>console.log('Autenticación exitosa con el usuario: $ldap_user.');</script>";
}

// Buscar al usuario en AD por su nombre (cn) usando el valor del formulario
echo "<script>console.log('Buscando usuario con nombre: $username...');</script>";
$ldap_search_filter = "(samaccountname=$username)"; // Buscar por nombre común (cn)

// Realizar la búsqueda
$ldap_search_result = ldap_search($ldap_conn, $base_dn, $ldap_search_filter);

if (!$ldap_search_result) {
    die("Error: No se pudo realizar la búsqueda LDAP. Detalles: " . ldap_error($ldap_conn) . "<br>");
} else {
    echo "<script>console.log('Búsqueda LDAP realizada correctamente.');</script>";
}

// Obtener los resultados de la búsqueda
$ldap_entries = ldap_get_entries($ldap_conn, $ldap_search_result);

echo "<script>console.log('Número de entradas encontradas: " . $ldap_entries['count'] . "');</script>";

if ($ldap_entries['count'] > 0) {
    // Si encontramos el usuario, intentar realizar el bind para autenticar con las credenciales proporcionadas
    $user_dn = $ldap_entries[0]["dn"];  // Obtener el Distinguished Name (DN) del usuario encontrado
    echo "<script>console.log('Usuario encontrado: $user_dn');</script>";

    // Intentar bind con el DN del usuario y la contraseña proporcionada desde el formulario
    $bind_user = ldap_bind($ldap_conn, $user_dn, $password);

    if ($bind_user) {
        echo "<script>console.log('Autenticación exitosa para el usuario: $username.');</script>";
        header("Location: success.php"); // Redirigir a página de éxito
        exit();
    } else {
        // Obtener el error del bind y mostrarlo en la consola o en la página
        $ldap_error = ldap_error($ldap_conn); // Obtener el mensaje de error detallado
        echo "<script>console.log('Error: La autenticación ha fallado. Detalles del error: $ldap_error');</script>"; // Mostrar el mensaje de error
        // Redirigir a página de error si lo deseas
        header("Location: error.php"); 
        exit();
    }
} else {
    echo "<script>console.log('No se encontró el usuario con el nombre: $username.');</script>";
    // Redirigir a página de error si el usuario no fue encontrado
    header("Location: error.php"); 
    exit();
}

// Cerrar la conexión LDAP
ldap_unbind($ldap_conn);
?>
