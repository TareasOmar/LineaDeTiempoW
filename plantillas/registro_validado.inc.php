<div class="form-group">
    <label>Nombre de usuario</label>
    <input type="text" class="form-control" name="nombre" placeholder="Ejemplo: DonOmar" <?php $validador -> mostrarNombre() ?>>
    <?php
    $validador -> mostrarErrorNombre();
    ?>
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" placeholder="Ejemplo: usuario@gmail.com" <?php $validador -> mostrarEmail() ?>>
    <?php
    $validador -> mostrarErrorEmail();
    ?>
</div>
<div class="form-group">
    <label>Contraseña</label>
    <input type="password" class="form-control" name="clave1">
    <?php
    $validador -> mostrarErrorClave1();
    ?>
</div>
<div class="form-group">
    <label>Confirmar contraseña</label>
    <input type="password" class="form-control" name="clave2">
    <?php
    $validador -> mostrarErrorClave2();
    ?>
</div>
<br>
<button type="submit" class="btn btn-default" name="enviar">Registrarse</button>
<br>
<br>    
<button type="submit" class="btn btn-default">Limpiar campos</button>
<br>

