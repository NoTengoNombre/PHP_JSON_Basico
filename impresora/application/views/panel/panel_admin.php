<!--Aquí estará el Crud de Usuario-->
<!-- APARECE LA TABLA CON TODOS LOS DATOS DEL USUARIO -->
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">

<div>
 <!-- Nav tabs -->
 <ul class="nav nav-tabs" role="tablist">

  <li role="presentation" class="active">
   <a href="#home" aria-controls="home" role="tab" data-toggle="tab">CONSULTA</a>
  </li>

  <li role="presentation">
   <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">REGISTRO</a>
  </li>    

  <li role="presentation">
   <a href="#documentos" aria-controls="documentos" role="tab" data-toggle="tab">DOCUMENTOS</a>
  </li>  

 </ul>

 <!-- Tab panes -->
 <div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="home">

   <table class="table table-hover">

    <h3>Tabla para listar usuarios</h3>

    <thead>

    <th>Tipo</th>
    <th>Usuario_id</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Fotografia</th>
    <th>Telefono</th>
    <th>Email</th>
    <th>
    <center>Acciones</center>
    </th>

    </thead>

    <tbody>

     <?php foreach ($resultados as $value) { ?>
         <tr>
          <td><?php echo $value->tipo; ?></td>
          <td><?php echo $value->usuario_id; ?></td>
          <td><?php echo $value->nombre; ?></td>
          <td><?php echo $value->apellidos; ?></td>
          <td><?php echo $value->fotografia; ?></td>
          <td><?php echo $value->telefono; ?></td>
          <td><?php echo $value->email; ?></td>
          <!---------------------------------------------------------------------------->
          <td> 
        <center>
         <a href="<?php echo base_url('usuarios/delete') . "/" . $value->usuario_id; ?>" title="Eliminar">
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
         </a>

         <a href="<?php echo base_url('usuarios/edit') . "/" . $value->usuario_id; ?>" title="Editar">
          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
         </a>
        </center>
        </td>

        </tr>
    <?php } ?>

    </tbody>
   </table>

  </div>

  <div role="tabpanel" class="tab-pane" id="profile">
   <div class="row">
    <div class="col-md-7">

     <hr>

     <h3>Formulario de registro</h3>

     <form method="get" action="<?php echo base_url('controlador_usuarios/add_user') ?>">

      <div class="form-group">
       <label for="exampleInputEmail1">Tipo de usuario</label>
       <select name="tipo" class="form-control">
        <!-- Objeto que viene del "Controlador:Usuario"  -->
        <option value="0">Administrador</option>    
        <option value="1">Usuario</option>    
       </select>
      </div>

      <div class="form-group">
       <label for="exampleInputEmail1">Nombre</label>
       <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" placeholder="Nombre">
      </div>

      <div class="form-group">
       <label for="exampleInputEmail1">Apellidos</label>
       <input type="text" name="apellidos" class="form-control" id="exampleInputEmail1" placeholder="Apellidos">
      </div>

      <div class="form-group">
       <label for="exampleInputEmail1">Correo Electrónico</label>
       <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
      </div>


      <div class="form-group">
       <label for="exampleInputEmail1">Correo Electrónico</label>
       <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
      </div>

      <div class="form-group">
       <label for="exampleInputPassword1">Telefono</label>
       <input type="text" name="telefono" class="form-control" id="exampleInputPassword1" placeholder="Telefono">
      </div>

      <div class="form-group">
       <label for="exampleInputEmail1">Fotografia</label>
       <input type="file" name="fotografia" class="form-control" id="exampleInputEmail1" placeholder="Fotografia">
      </div>  

      <br>
      <button type="submit" class="btn btn-default">Registrar Usuario</button>
     </form>

    </div>
    <div class="col-md-5">
     <span>Espacio en blanco</span>
    </div>
   </div>

  </div>


  <div role="tabpanel" class="tab-pane" id="documentos">
   <div class="row">
    <div class="col-md-7">
     <div role="tabpanel" class="tab-pane active" id="home">

      <table class="table table-hover">

       <h3>Tabla para listar usuarios</h3>

       <thead>

       <th>documento_id</th>
       <th>titulo</th>
       <th>fecha_impresion</th>
       <th>notas</th>
       <th>estado</th>
       <th>usuario_id</th>
       <th>fecha_creacion</th>
       <th>
       <center>Acciones</center>
       </th>

       </thead>

       <tbody>

        <?php
        
        var_dump($documentos);
        
        ?>
        
        <?php foreach ($documentos as $valor) { ?>
            <tr>
             <td><?php echo $valor->documento_id; ?></td>
             <td><?php echo $valor->titulo; ?></td>
             <td><?php echo $valor->fecha_impresion; ?></td>
             <td><?php echo $valor->notas; ?></td>
             <td><?php echo $valor->estado; ?></td>
             <td><?php echo $valor->usuario_id; ?></td>
             <td><?php echo $valor->fecha_creacion; ?></td>
             <!---------------------------------------------------------------------------->
             <td> 
           <center>
            <!--<a href="< ?php echo base_url('usuario/delete') . "/" . $valor->documento_id; ?>" title="Eliminar">-->
             <!--<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>-->
            </a>

            <!--<a href="< ?php echo base_url('usuario/edit') . "/" . $valor->documento_id; ?>" title="Editar">-->
             <!--<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>-->
            </a>
           </center>
           </td>
           </tr>
           
       <?php } ?>

       </tbody>
      </table>

     </div>

    </div>
    <div class="col-md-5">
     <span>Espacio en blanco</span>
    </div>
   </div>

  </div>



 </div>

</div>
