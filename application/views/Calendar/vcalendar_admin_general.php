

 <!-- Seccion de menu para las opciones de registro -->

      <nav class="navbar navbar-toggleable-md bg-faded  sticky-top nav-registros mx-2" id="nav-admin-general">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon" style="background: #303A52;"></span>
            </button>
            <a class="navbar-brand" href="#">
                  <img src="<?php echo base_url();?>/public/img/calendar.svg" width="40" height="40" class="d-inline-block align-top" alt="">            
            </a>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">  
                  <div class="navbar-nav mr-auto ml-auto enlaces-registros">
                        <a data-scroll class="nav-item nav-link d-md-flex flex-md-row  justify-content-center align-items-center mr-2 px-2 rounded" href="#seccion-calendario"><i class="fa fa-calendar mr-1" aria-hidden="true"></i>CALENDARIO </a>
                        <a data-scroll class="nav-item nav-link d-md-flex flex-md-row  justify-content-center align-items-center mr-2 px-2 rounded" href="#seccion-usuarios"><i class="fa fa-user-plus mr-1" aria-hidden="true"></i>REGISTRO DE USUARIOS</a>
                        <a data-scroll class="nav-item nav-link d-md-flex flex-md-row  justify-content-center align-items-center mr-2 px-2 rounded" href="#seccion-oficinas"><i class="fa fa-building mr-1" aria-hidden="true"></i>REGISTRO DE OFICINAS</a>               
                        <a data-scroll class="nav-item nav-link d-md-flex flex-md-row  justify-content-center align-items-center mr-2 px-2 rounded" href="#seccion-equipos"><i class="fa fa-tablet mr-1" aria-hidden="true"></i>REGISTRO DE EQUIPOS</a>
                      
                  </div>                              
            </div>
      </nav>

      <script>
            var scroll = new SmoothScroll('a[href*="#"]', {
            // Selectors
            ignore: '[data-scroll-ignore]', // Selector for links to ignore (must be a valid CSS selector)
            header: null, // Selector for fixed headers (must be a valid CSS selector)

            // Speed & Easing
            speed: 1000, // Integer. How fast to complete the scroll in milliseconds
            offset: 60, // Integer or Function returning an integer. How far to offset the scrolling anchor location in pixels
            easing: 'easeInOutCubic', // Easing pattern to use
            customEasing: function (time) {}, // Function. Custom easing pattern

            // Callback API
            before: function () {}, // Callback to run before scroll
            after: function () {} // Callback to run after scroll
            });
      </script>

 <!-- Fin de  menu de seccion de admin_general -->

  <div id="seccion-calendario" class="my-3">
      <div class="container my-5">
            <div class="row justify-content-center">
                   <div class="col-md-3 col-sm-3">
                        <div class="form-group">
                        <label for="select_status">Seleccionar Historial</label>
                              <select class="form-control form-control-sm " id="selc_historial" name="selc_historial" >
                                          <option value="HG">Seleccionar Historial</option>
                                          <option value="HE">HISTORIAL DE EVENTOS</option> 
                                          <option value="HU">HISTORIAL DE USUARIOS</option>                                                        
                              </select>                             
                        </div>
                  </div>
                  <div class="col-md-3 col-sm-3" id="mostrar_oficinas" style="display:none;">
                        <div class="form-group">
                        <label for="select_status">Oficina:</label>
                              <select class="form-control form-control-sm " id="suc_historial" name="suc_historial" >
                                          <option  value="SO">Seleccionar Oficina</option>     
                                          <?php foreach ($lista_oficinas as $oficinas): ?>
                                                 <option><?php echo $oficinas['nombre_oficina']; ?></option>                                                   
                                           <?php endforeach; ?> 
                              </select>                             
                        </div>
                  </div>
                   <div class="col-md-3 col-sm-3" id="mostrar_usuario" style="display:none;">
                         <div class="form-group">
                              <label for="nom_asesor">Nombre asesor:</label>
                              <input type="text" class="form-control form-control-sm" id="nombre_asesor">
                        </div>                           
                  </div> 
                   <!-- <div class="col-md-3 col-sm-3" id="mostrar_fecha" style="display:none;"> 
                        <div class="form-group">
                              <label for="nom_asesor">Fecha:</label>
                              <input type="text" class="form-control form-control-sm" id="fecha_inicio">
                        </div>                     
                  </div>         
                  -->
            </div>
            <div class="row justify-content-sm-center my-2">
                  <h4 id="titulo_historial"></h4>
            </div>

            <div class="row justify-content-center"  > 
              <div class="col-md-11 col-sm-12 col-12" id="historiales_eventos" style="display: none;">
              
              </div>      
            </div> 
            <div class="row justify-content-center"  > 
              <div class="col-md-10 col-sm-12 col-12" id="historiales_usuarios" style="display: none;">
              
              </div>  
            
            </div> 
         


            <script>
                  var  base_url="<?php echo base_url();?>";     
            </script>
            
      </div>
      

 </div>   

 

<!-- INICIO DEL MODAL -->
      <div class="modal fade" id="modalEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header" >
            <h5 class="modal-title" id="exampleModalLabel">Informacíon del evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body"> 
                  <div class="container-fluid">
                  <div class="row">
                        <div class="col-sm-12">

                              <fieldset disabled>
                                    <div class="form-group">
                                          <label for="nom_asesor">Nombre asesor:</label>
                                          <input type="text" class="form-control form-control-sm" id="id_Evento" name="id_Evento" style="display: none;">
                                          <input type="text" class="form-control form-control-sm" id="nom_asesor">
                                    </div>
                                    <div class="form-group">
                                          <label for="des_event">Descripción:</label>
                                          <textarea class="form-control form-control-sm" id="des_event" rows="3" ></textarea>
                                    </div>      					

                                    <div class="form-group row justify-content-sm-center">
                                          <label for="fec_inic" class="col-sm-3 col-form-label">Fecha solicitud:</label>
                                          <div class="col-sm-4">	
                                                <input type="text" class="form-control form-control-sm" id="fec_inic" >
                                          </div>

                                          <label for="hora_inic" class="col-sm-2 col-form-label">Hora solicitud:</label>
                                          <div class="col-sm-3">	
                                                <input type="text" class="form-control form-control-sm" id="hora_inic">
                                          </div>

                                    </div>

                                    <div class="form-group row justify-content-sm-center">   				
                                          <label for="fec_fin" class="col-sm-3 col-form-label">Fecha Entrega:</label>
                                          <div class="col-sm-4">	
                                                <input type="text" class="form-control form-control-sm" id="fec_fin" >
                                          </div>

                                          <label for="hora_finc" class="col-sm-2 col-form-label">Hora de entrega:</label>
                                          <div class="col-sm-3">	
                                                <input type="text" class="form-control form-control-sm" id="hora_finic" >
                                          </div>

                                    </div>
                        
                                    <div class="form-group row justify-content-sm-center">   				
                                          <label for="fec_fin" class="col-sm-3 col-form-label">Status</label>
                                          <div class="col-sm-4">	
                                                <input type="text" class="form-control form-control-sm" id="status_evento" >
                                          </div>
                                    </div>
                              </fieldset>

                                    <div class="form-group row justify-content-sm-center">
                                          <label for="select_status" class="col-sm-4 col-form-label">Cambiar Status: </label>
                                          <select class="form-control form-control-sm col-sm-5" id="select_status" name="select_status">
                                                <option>PENDIENTE</option>
                                                <option>ACEPTADO</option>
                                                <option>RECHAZADO</option>       							
                                          </select>
                                    </div>

                                    <div class="form-group row justify-content-sm-center">
                                          <div class="input-group date col-sm-2">

                                          <input type="text" name="clave_asesor" id="clave_asesor" value="<?php echo $session; ?>" style="display: none;"> 

                                          <button type="button" class="btn btn-primary" id="modificar_evento" data-dismiss="modal">MODIFICAR</button>
                                    </div>
                              </div>

                                    <script>

                                          $(document).ready(function()
                                          {	
                                                
                                                function modificar()
                                                {
                                                      var id=$('#id_Evento').val();
                                                      var status=$('#select_status').val();
                                                      var color='';

                                                      switch(status)
                                                      {
                                                            case 'PENDIENTE':
                                                                  color='#E85B48';
                                                            break;
                                                            case 'RECHAZADO':
                                                                  color='#C50000';
                                                            break;
                                                            case 'ACEPTADO':
                                                                  color='#A5F2E7';
                                                            break;

                                                      }
                                                            var data = '&status='+status+'&id='+id+'&color='+color;
                                                                                                
                                                      $.ajax
                                                      ({  

                                                            url: '<?php echo base_url();?>Ccalendar/modificar_evento',
                                                            type: 'POST',
                                                            data: data,                                         
                                                            success: function(data)
                                                            {
                                                                  $.alert
                                                                  ({
                                                                        title: 'Registro Modificado',
                                                                        content: 'Registro modificado exitosamente!', 
                                                                        type: 'red',                                              
                                                                        theme: 'material',                                                        
                                                                  });
                                                            }

                                                      })

                                                }	

                                                $('#modificar_evento').on('click',function()
                                                {
                                                      $.confirm
                                                      ({
                                                            title: 'Confirmar',
                                                            content: '¿Desea Realmente modificar este evento?',
                                                            type: 'dark',                                              
                                                            theme: 'material',
                                                            animation: 'zoom',
                                                            animationSpeed: 600,
                                                            closeAnimation: 'scale',
                                                            alignMiddle: true,                          
                                                            buttons: 
                                                            {
                                                                  Aceptar: {
                                                                              text: 'Aceptar',
                                                                              btnClass: 'btn-blue',
                                                                              action: function()
                                                                              {
                                                                                    modificar();
                                                                              }
                                                                        },
                                                                  Cancelar: {
                                                                        text: 'Cancelar',
                                                                        btnClass: 'btn-red',
                                                                        action: function(){
                                                                        }
                                                                  }
                                                                  
                                                            }
                                                            
                                                      });  

                                                }) 

                                          });
                                    
                                    </script>

                        </div>
                  </div>
            </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                  </div> 
            </div>
            </div>
            </div>
      </div> 
<!-- FIND DEL MODAL -->




<!-- FORMULARIO DE REGISTRO DE USUARIOS -->
<div class="container my-4" id="seccion-usuarios">
      <div class="row flex-md-column  align-items-center justify-content-center">
      <div class="col-md-8  flex-md-column  align-items-center justify-content-center" id="registro"> 
         
       <div class="p-4 m-2  my-3 form-shadow">

              <form id="form_registro" name="form_registro">
           
                  <div class="row d-flex flex-row justify-content-center align-items-center mb-4">                

                        <img  class="img-fluid  mr-3" width="50px;" src="<?php echo base_url();?>/public/img/user.svg" alt="Usuarios">

                        <p class="h5 text-center">REGISTRO DE USUARIOS</p>
                                  

                  </div>
                     <hr class="hr_p2 my-5">       

                  <div class="form-group row">
                        <label for="nombre_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-user mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Nombre completo:</label>
                        <div class="col-12 col-sm-6 col-md-7">
                             <input type="text" class="form-control form-control-sm" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre Completo" required>
                             <input type="text" class="form-control form-control-sm" id="correo_usuario_admin" name="correo_usuario_admin" value="<?php echo $correo_usuario; ?>" style="display:none;">
                             <div id="check_username" class="" style="display: none;"></div> 
                        </div>
                              
                  </div>

                  <div class="form-group row ">
                        <label for="rol_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-user-plus mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Seleccionar tipo de Usuario:</label>
                        <div class="col-12 col-sm-6 col-md-7" >
                              <select class="form-control form-control-sm" id="rol_usuario" name="rol_usuario" required>
                              <option>SELECCIONAR USUARIO </option>
                              <option value="JEFEOFICINA">JEFEOFICINA</option>
                              <option value="ASESOR">ASESOR</option>                                           
                        </select>
                        </div>  
                                      
                  </div>


                   <div class="form-group row ">
                       
                        <label for="sucursal_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-building-o mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Seleccionar sucursal:</label>
                        <div class="col-12 col-sm-6 col-md-7">
                              <select class="form-control form-control-sm " id="sucursal_usuario" name="sucursal_usuario" required>
                               <?php foreach ($lista_oficinas as $oficinas): ?>
                                    <option><?php echo $oficinas['nombre_oficina']; ?></option>                                                   
                               <?php endforeach; ?> 
                                
                              </select> 
                        </div>
                       
                  </div>

                  <div class="form-group row">

                        <label for="tel_usuario" class="d-flex flex-row align-items-center  col-12 col-sm-6 col-md-4"><i class="fa fa-mobile mr-3 " aria-hidden="true" style="font-size: 30px;"></i>Telefono Celular:</label>
                        <div class="col-12 col-sm-6 col-md-7"> 
                            <input type="text" class="form-control form-control-sm" id="tel_usuario" name="tel_usuario" placeholder="Celular" maxlength="10" required > 
                            <div id="check_telefono" class=""></div> 
                        </div>
                        
                      
                  
                  </div>
                  <div class="form-group row">

                        <label for="correo_usuario" class="d-flex flex-row align-items-center  col-12 col-sm-6 col-md-4"><i class="fa fa-envelope-o mr-3 " aria-hidden="true" style="font-size: 30px;"></i>Correo Usuario:</label>
                        <div class="col-12 col-sm-6 col-md-7"> 
                            <input type="mail" class="form-control form-control-sm" id="correo_usuario" name="correo_usuario" placeholder="correo electronico" required>
                             <div id="check_correo" class="">                                  
                             </div>  
                        </div>
                       
                  
                  </div>

                  <div class="form-group row">

                        <label for="clave_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-key mr-3" aria-hidden="true" style="font-size: 30px;"></i>Clave usuario:</label>
                         <div class="col-12 col-sm-6 col-md-7"> 
                             <input type="text" class="form-control form-control-sm" id="clave_usuario" name="clave_usuario" placeholder="Clave" maxlength="5" required>
                              <div id="check_clave" class="">                                  
                              </div>
                         </div>
                          
                        
                  
                  </div>

                  <div class="form-group row">

                        <label for="pass_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-key mr-3" aria-hidden="true" style="font-size: 30px;"></i>PIN usuario:</label>
                      
                         <div class="col-12 col-sm-6 col-md-7"> 
                             <input type="password" class="form-control form-control-sm" id="pass_usuario" name="pass_usuario" placeholder="Pin usuario" required>
                        </div>
                   

                  </div>


                  <div class="d-flex flex-row justify-content-center align-items-center text-white mt-3" >

                        <div class="d-flex flex-column justify-content-center align-items-center text-white">

                              <button type="submit" class="btn  btn-success" id="registrar">Registrar</button>

                        </div>

                  </div>

      
             </form>
            
      
      </div>

      </div>
      

      </div>
</div>
<!-- FIN DE FORMULARIO DE REGISTRO DE USUARIOS -->



<!-- FORMULARIO DE REGISTRO DE OFICINAS -->
<div class="container-fluid my-4" id="seccion-oficinas">     
      <div class="row flex-md-column  align-items-center justify-content-center">
      <div class="col-md-6  flex-md-column  align-items-center justify-content-center" id="registro">    
       <div class="p-4 m-2  my-3 form-shadow">

              <form id="form_registro_oficina" name="form_registro_oficina">         
                  <div class="row d-flex flex-row justify-content-center align-items-center mb-4">                
                         <img  class="img-fluid  mr-3" width="50px;" src="<?php echo base_url();?>/public/img/building.svg" alt="Usuarios">
                        <p class="h5 text-center">REGISTRO DE OFICINAS</p>                        
                  </div>
                     <hr class="hr_p2 my-5">

                  <div class="form-group row">
                        <label for="tel_usuario" class="d-flex flex-row align-items-center  col-12 col-sm-6 col-md-4"><i class="fa fa-building mr-3 " aria-hidden="true" style="font-size: 30px;"></i>Nombre oficina:</label>
                        <div class="col-12 col-sm-6 col-md-7"> 
                            <input type="text" class="form-control form-control-sm" id="nombre_oficina" name="nombre_oficina" placeholder="Nombre Oficina" pattern="^[a-zA-Z ]*$" title="INGRESAR TEXTO SIN ACENTOS"  required >  
                        </div>                
                  </div>
                     
                  <div class="form-group row ">      
                        <label for="sucursal_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-globe mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Seleccionar ubicación:</label>
                        <div class="col-12 col-sm-6 col-md-7">
                              <select class="form-control form-control-sm " id="ubicacion_oficina" name="ubicacion_oficina" required>
                              <option value="Todo México">Todo México</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Distrito Federal">Distrito Federal</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="México">México</option>
                                        <option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>                                          
                                     </select> 
                        </div>
                       
                  </div>

                  <div class="form-group row">
                        <label for="nombre_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-map-marker mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Direccion de la oficina:</label>
                        <div class="col-12 col-sm-6 col-md-7">  
                              <textarea class="form-control form-control-sm" id="direccion_oficina" name="direccion_oficina" rows="5" placeholder="Direccion de la oficina"  style="text-transform:uppercase;" pattern="^[a-zA-Z ]*$" title="INGRESAR TEXTO SIN ACENTOS" ></textarea>                                
                        </div>
                         
                  </div>

                  <div class="form-group row">

                        <label for="tel_usuario" class="d-flex flex-row align-items-center  col-10 col-sm-6 col-md-4"><i class="fa fa-phone mr-3 " aria-hidden="true" style="font-size: 30px;"></i>Telefonos oficina:</label>
                        <div class="col-12 col-sm-6 col-md-6"> 
                            <input type="text" class="form-control form-control-sm" id="telefono_oficina_uno" name="telefono_oficina_uno" placeholder="Telefono 1"  required>  
                        </div>

                       
                        <div class="col-12 col-sm-6 col-md-6 offset-md-4 offset-sm-6 mt-3"> 
                            <input type="text" class="form-control form-control-sm" id="telefono_oficina_dos" name="telefono_oficina_dos" placeholder="Telefono 2" >  
                        </div>
                  
                  </div>
     
                 <div class="d-flex flex-row justify-content-center align-items-center text-white mt-3" >

                        <div class="d-flex flex-column justify-content-center align-items-center text-white">

                              <button type="submit" class="btn  btn-success" id="registrar_oficina">Registrar</button>

                        </div>

                  </div>

      
             </form>
             <script>
                var  base_url= "<?php echo base_url();?>"
             </script>
      
      </div>

      </div>
      

      </div>
</div>
<!-- FIN DE FORMULARIO DE OFICINAS -->

<!-- FORMULARIO DE REGISTRO DE EQUIPOS -->
<div class="container my-4" id="seccion-equipos">
      <div class="row flex-md-row  align-items-center justify-content-around ">
            <div class="col-md-6  flex-md-column  align-items-center justify-content-center" id="registro"> 
            
                  <div class="p-4 m-2  my-3 form-shadow">

                        <form id="form_registro_tableta" name="form_registro_tableta">
                  
                              <div class="row d-flex flex-row justify-content-center align-items-center mb-4">                

                                    <img  class="img-fluid  mr-3" width="50px;" src="<?php echo base_url();?>/public/img/tablet.svg" alt="Calendar">

                                    <p class="h5 text-center">REGISTRO DE TABLETA</p>
                                          

                              </div>
                              <hr class="hr_p2 my-5">       
                              <div class="form-group row ">                             
                                    <label for="sucursal_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-building-o mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Seleccionar sucursal:</label>
                                    <div class="col-12 col-sm-6 col-md-7">
                                          <select class="form-control form-control-sm " id="sucursal_usuario_tableta" name="sucursal_usuario_tableta" required>
                                          <option value="">Seleccionar oficina</option> 
                                          <?php foreach ($lista_oficinas as $oficinas): ?>
                                                <option><?php echo $oficinas['nombre_oficina']; ?></option>                                                   
                                          <?php endforeach; ?> 

                                          </select> 
                                    </div>                             
                              </div>

                           
                              <div class="form-group row">
                                    <label for="nombre_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-file-text-o mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Descripcion del equipo:</label>
                                    <div class="col-12 col-sm-6 col-md-7">  
                                          <textarea class="form-control form-control-sm" id="descripcion_tableta" name="descripcion_tableta" rows="5" placeholder="Descripcion del equipo" required style="text-transform:uppercase;" pattern="^[a-zA-Z ]*$" title="INGRESAR TEXTO SIN ACENTOS" ></textarea>                                
                                    </div>
                                    
                              </div>


                              <div class="d-flex flex-row justify-content-center align-items-center text-white mt-3" >

                                    <div class="d-flex flex-column justify-content-center align-items-center text-white">

                                          <button type="submit" class="btn  btn-primary" id="registrar_tableta">Registrar</button>

                                    </div>

                              </div>
                        </form>
           
                  </div>

            </div>

             <div class="col-md-6  flex-md-column  align-items-center justify-content-center" id="registro"> 
                  <div class="p-4 m-2  my-3 form-shadow">
                        <form id="form_registro_biometrico" name="form_registro_biometrico">
                  
                              <div class="row d-flex flex-row justify-content-center align-items-center mb-4">                

                                    <img  class="img-fluid  mr-3" width="50px;" src="<?php echo base_url();?>/public/img/add.svg" alt="Calendar">

                                    <p class="h5 text-center">REGISTRO DE BIOMETRICO</p>
                                          

                              </div>
                              <hr class="hr_p2 my-5">
                       
                                     <div class="form-group row ">                             
                                          <label for="sucursal_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-building-o mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Seleccionar sucursal:</label>
                                          <div class="col-12 col-sm-6 col-md-7">
                                                <select class="form-control form-control-sm " id="sucursal_usuario_biometrico" name="sucursal_usuario" required>
                                                <?php foreach ($lista_oficinas as $oficinas): ?>
                                                      <option><?php echo $oficinas['nombre_oficina']; ?></option>                                                   
                                                <?php endforeach; ?> 

                                                </select> 
                                          </div>                             
                                    </div>

                                    <div class="form-group row">
                                          <label for="nombre_usuario" class="d-flex flex-row align-items-center col-12 col-sm-6 col-md-4"><i class="fa fa-file-text-o mr-3" aria-hidden="true"  style="font-size: 30px;"></i>Descripcion del equipo:</label>
                                          <div class="col-12 col-sm-6 col-md-7">  
                                                <textarea class="form-control form-control-sm" id="descripcion_biometrico" name="descripcion_biometrico" rows="5" placeholder="Descripcion del equipo" required style="text-transform:uppercase;"></textarea>                                
                                          </div>
                                          
                                    </div>

                  
                  


                              <div class="d-flex flex-row justify-content-center align-items-center text-white mt-3" >

                                    <div class="d-flex flex-column justify-content-center align-items-center text-white">

                                          <button type="submit" class="btn  btn-primary" id="registrar_biometrico">Registrar</button>

                                    </div>

                              </div>

                  
                        </form>

                  </div>
            </div>

      </div>
</div>


<!-- FIN DE FORMULARIO DE EQUIPOS-->


