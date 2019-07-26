<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url('administrador/usuarios'); ?>" class="btn btn-danger">
                            <span class="fa fa-arrow-left"></span> Regresar
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata('error'); ?></p>
                </div>
            <?php } ?>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('administrador/usuarios/update_usuario'); ?>" method="POST">
                        <input type="hidden" id="txt_id_usuario" name="txt_id_usuario" value="<?php echo $usuario->id; ?>">
                        <div class="form-group">
                            <label for="txt_edit_nombre">Nombres:</label>
                            <input type="text" class="form-control" id="txt_edit_nombre" name="txt_edit_nombre" value="<?php echo $usuario->nombres; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_edit_ape_paterno">Apellido paterno:</label>
                            <input type="text" class="form-control" id="txt_edit_ape_paterno" name="txt_edit_ape_paterno" value="<?php echo $usuario->ape_paterno; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_edit_ape_materno">Apellido materno:</label>
                            <input type="text" class="form-control" id="txt_edit_ape_materno" name="txt_edit_ape_materno" value="<?php echo $usuario->ape_materno; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_edit_telefono">Telefono:</label>
                            <input type="text" class="form-control" id="txt_edit_telefono" name="txt_edit_telefono" value="<?php echo $usuario->telefono; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_edit_email">Email:</label>
                            <input type="text" class="form-control" id="txt_edit_email" name="txt_edit_email" value="<?php echo $usuario->email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_edit_rol">Rol de usuario:</label>
                            <select class="form-control" id="txt_edit_rol" name="txt_edit_rol">
                                <?php foreach($roles as $rol){ ?>
                                    <?php if ($usuario->tcat_roles_id == $rol->id) { ?>
                                        <option value="<?php echo $rol->id; ?>" selected><?php echo $rol->nombre_rol; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $rol->id; ?>"><?php echo $rol->nombre_rol; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
