<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperación de Contraseña</title>
</head>
<body style="margin:0; padding:0; background-color:#f8f9fa; font-family: Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f8f9fa; padding: 20px 0;">
    <tr>
        <td>
            <table width="600" cellpadding="0" cellspacing="0" style="background-color:#ffffff; border-radius:8px; padding:20px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
                <tr>
                    <td style="text-align:center;">
                        <h2 style="color:#333;">Recuperación de Contraseña</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Estimado/a <strong>{{ $nombreCompleto }}</strong>,</p>
                        <p>Hemos recibido una solicitud para restablecer la contraseña de su cuenta. Para proceder con el cambio de contraseña, haga clic en el siguiente botón:</p>
                        <p style="text-align:center;">
                            <a href="{{ route('reset.form', ['token' => $token]) }}" 
                               style="display:inline-block; padding:12px 24px; background-color:#0d6efd; color:#ffffff; text-decoration:none; border-radius:5px; font-weight:bold;">
                               Restablecer Contraseña
                            </a>
                        </p>
                        <p>Si el botón no funciona, puede copiar y pegar el siguiente enlace en su navegador:</p>
                        <p style="word-break:break-all; color:#0d6efd;">{{ route('reset.form', ['token' => $token]) }}</p>
                        <p>Si no ha solicitado este cambio, ignore este correo. Su contraseña actual seguirá siendo válida.</p>
                        <p>Saludos cordiales,<br>El equipo de Sistema RMCE</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
