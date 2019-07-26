<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Nuevo</small>
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

            <?php if ($this->session->flashdata('error_contrasena')) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata('error_contrasena'); ?></p>
                </div>
            <?php } ?>

            <hr>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('administrador/usuarios/save_usuario'); ?>" method="POST">
                        <div class="form-group">
                            <label for="txt_nombres">Nombres:</label>
                            <input type="text" class="form-control" id="txt_nombres" name="txt_nombres" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_ape_paterno">Apellido paterno:</label>
                            <input type="text" class="form-control" id="txt_ape_paterno" name="txt_ape_paterno" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_ape_materno">Apellido materno:</label>
                            <input type="text" class="form-control" id="txt_ape_materno" name="txt_ape_materno" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_telefono">Telefono:</label>
                            <input type="text" class="form-control" id="txt_telefono" name="txt_telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email:</label>
                            <input type="email" class="form-control" id="txt_email" name="txt_email" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_username">Username:</label>
                            <input type="text" class="form-control" id="txt_username" name="txt_username" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_password">Password:</label>
                            <input type="password" class="form-control" id="txt_password" name="txt_password" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_password_2">Confirma el password:</label>
                            <input type="password" class="form-control" id="txt_password_2" name="txt_password_2" required>
                        </div>
                        <div class="form-group">
                            <label for="txt_rol_usuario">Rol de usuario:</label>
                            <select class="form-control" id="txt_rol_usuario" name="txt_rol_usuario">
                                <?php foreach($roles as $rol){ ?>
                                    <option value="<?php echo $rol->id; ?>"><?php echo $rol->nombre_rol; ?></option>
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
