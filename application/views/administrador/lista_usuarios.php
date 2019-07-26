<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url('administrador/usuarios/add_usuario'); ?>" class="btn btn-primary">
                            <span class="fa fa-plus"></span> Agregar Usuario
                        </a>
                    </div>
                </div>
            </div>

            <?php if ($this->session->flashdata('usuario_agr')) { ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p><i class="icon fa fa-exclamation"></i><?php echo $this->session->flashdata('usuario_agr'); ?></p>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('usuario_act')) { ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p><i class="icon fa fa-exclamation"></i><?php echo $this->session->flashdata('usuario_act'); ?></p>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('usuario_elim')) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p><i class="icon fa fa-exclamation"></i><?php echo $this->session->flashdata('usuario_elim'); ?></p>
                </div>
            <?php } ?>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table id="tabla_usuarios" name="tabla_usuarios" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Rol de usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($usuarios)) { ?>
                                <?php foreach ($usuarios as $usuario) { ?>
                            <tr>
                                <th><?php echo $usuario->id; ?></th>
                                <td><?php echo $usuario->nombres; ?></td>
                                <td><?php echo $usuario->ape_paterno; ?></td>
                                <td><?php echo $usuario->ape_materno; ?></td>
                                <td><?php echo $usuario->telefono; ?></td>
                                <td><?php echo $usuario->email; ?></td>
                                <td><?php echo $usuario->username; ?></td>
                                <td><?php echo $usuario->nombre_rol; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-view-usuario" data-toggle="modal" data-target="#modal-usuario" value="<?php echo $usuario->id; ?>"><span class="fa fa-search"></span></button>
                                        <a href="<?php echo base_url('administrador/usuarios/edit_usuario/').$usuario->id; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                        <button type="button" class="btn btn-danger btn-delete-usuario" value="<?php echo $usuario->id; ?>"><span class="fa fa-remove"></span></button>
                                    </div>
                                </td>
                            </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<div class="modal fade" tabindex="-1" role="dialog" id="modal-usuario">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion del usuario</h4>
      </div>
      <div class="modal-body">
        <!-- En esta clase se muestra por medio de JQuery los dato obtenidos por medio de AJAX -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->