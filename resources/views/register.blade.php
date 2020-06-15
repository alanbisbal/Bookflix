@extends('plantilla')

  <div class="container">

      <div id="loginbox" class="mainbox col-md-4 col-md-offset-3 col-sm-6 col-sm-offset-3" >


          <div class="panel panel-default" >
              <div class="panel-heading">
                  <div class="panel-title text-center"><h6> Bienvenido</h6></div>
              </div>
              <div class="panel-body" >
                  <form id="form" class="form-horizontal">

                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input type="text" class="form-control" name="usuario" value="" placeholder="Nombre de usuario" autofocus="">
                      </div>


                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                          <input type="password" class="form-control" name="nombre" placeholder="Nombre">
                      </div>
                      <div class="form-group">


                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" class="form-control" name="apellido" placeholder="Apellido">
                        </div>
                        <div class="form-group">


                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                              <input type="password" class="form-control" name="contrasenia" placeholder="Contraseña">
                          </div>
                          <div class="form-group">


                          <!-- Button -->
                          <div class="col-sm-12 controls">
                              <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Iniciar sesión</button>
                              <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Cancelar</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>

</div>
