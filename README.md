# Login Page - views/login.php

## Descripción
Esta página (`views/login.php`) es la interfaz de inicio de sesión de la aplicación web. Permite a los usuarios autenticarse proporcionando un nombre de usuario y contraseña.

## Funcionalidad
- **Formulario de Login**: Incluye campos para usuario y contraseña, ambos requeridos.
- **Envío del Formulario**: Al enviar, los datos se procesan en `includes/auth.php` para verificar las credenciales.
- **Manejo de Errores**: Muestra mensajes de error almacenados en la sesión PHP si la autenticación falla.
- **Diseño Responsivo**: Utiliza Bootstrap para un diseño adaptable a diferentes dispositivos.
- **Estilos Personalizados**: Incluye CSS personalizado para un aspecto moderno con gradientes y efectos visuales.

## Dependencias
- Bootstrap 5.1.3 (CDN)
- Archivo CSS personalizado: `css/styles.css`
- Icono de ejercicio desde Flaticon

## Uso
Accede a la página para iniciar sesión. Si las credenciales son correctas, redirige al dashboard; de lo contrario, muestra un mensaje de error.
