<?php get_template_part('contacto-submit') ?>
<form action="./" method="post" class="form margint30" role="form" id="contact-form">
    <div class="form-group">
        <input type="text" class="form-control validate[required]" id="nombre" name="nombre" placeholder="Nombre *">
    </div>
    <div class="form-group">
        <input type="text" class="form-control validate[required,custom[number]]" id="telefono" name="telefono" placeholder="Tel&eacute;fono de Contacto">
    </div>
    <div class="form-group">
        <input type="text" class="form-control validate[required,custom[email]]" id="email" name="email" placeholder="Correo electrónico *">
    </div>
    <div class="form-group">
        <textarea class="form-control validate[required]" id="comentarios" name="comentarios" placeholder="Comentarios *"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-danger" id="btn_submit" value="ENVIAR COMENTARIOS" />
    </div>
    <div id="form-submit-wrapper"></div>
</form>

