<?php include_once "./helpers/encabezado.php"; ?>

<h1>DATOS PERSONALES</h1>
<hr>

<form class="form-create">
  <fieldset>
    <legend class="form-title">Nuevo Registro</legend>
    <input type="hidden" name="id">
    <label for="nombres">Digite sus nombres:</label><br>
    <input type="text" name="nombres" id="nombres" required>
    <br><br>
    <label for="apellidos">Digite sus apellidos:</label><br>
    <input type="text" name="apellidos" id="apellidos" required>
    <br><br>
    <label for="edad">Digite su edad:</label><br>
    <input type="number" name="edad" id="edad" required>
    <br><br>
    <label>Seleccione su genero:</label>
    <br><br>
    <input type="radio" name="genero" id="masculino" value="1" required>
    <label for="masculino">Masculino</label>
    <input type="radio" name="genero" id="femenino" value="0" required>
    <label for="femenino">Femenino</label>
    <br><br>
    <input type="submit" value="Enviar">
  </fieldset>
</form>

<hr>

<div class="table-container">
  <table class="datatable">
    <thead>
      <tr>
        <th>ID</th>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th>EDAD</th>
        <th>GENERO</th>
        <th></th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</div>


<?php include_once "./helpers/pie.php"; ?>