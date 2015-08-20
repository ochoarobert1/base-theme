<?php
$nombre = filter_input(INPUT_POST, 'nombre');
$telefono = filter_input(INPUT_POST, 'telefono');
$email = filter_input(INPUT_POST, 'email');
$comentarios = filter_input(INPUT_POST, 'comentarios');

if (!empty($nombre) &&
        !empty($email)) {
    ob_start();
    ?>
    <div style="color:#888">
        <h2>Contacto</h2>
        <p>Enviado <?php echo date("d/m/Y h:i") ?></p>
        <hr>
        <p><strong>Nombre:</strong><?php echo $nombre ?></p>
        <p><strong>Teléfono:</strong><?php echo $telefono ?></p>
        <p><strong>Email:</strong><a href="mailto:<?php echo $email ?>"><?php echo $email ?></a></p>
        <p><strong>Comentarios:</strong><?php echo $comentarios ?></p>
    </div>
    <?php
    $contenido = ob_get_clean();
    $contacto = get_page_by_path('contacto');
    //$mail_admin = get_post_meta($contacto->ID, 'email', true);
    $mail_admin = ('ochoa.robert1@gmail.com');

    require_once ABSPATH . WPINC . '/class-phpmailer.php';
    $mail = new PHPMailer();
    $mail->AddAddress($mail_admin);
    $mail->FromName = 'PROYECT - Contacto';
    $asunto = 'Nuevo mensaje de contacto - PROYECT';

    $mail->Subject = $asunto;
    $mail->Body = $contenido;
    $mail->IsHTML();
    $mail->CharSet = 'utf-8';
    if ($mail->Send()) {
        ?>
        <div class="row">
            <div class="col-lg-12 alert alert-success text-center animated fadeInLeft">
                <p>Su mensaje ha sido enviado con exito. Gracias por contactarnos</p>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="row">
            <div class="col-lg-12 alert alert-danger text-center animated fadeInLeft">
                <p>Hubo un error al enviar su mensaje. Intente nuevamente</p>
            </div>
        </div>
        <?php
    }
}


