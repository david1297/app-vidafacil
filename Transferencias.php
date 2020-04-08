<?php
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	require_once ("config/db.php");
	require_once ("config/conexion.php");
	
	$Transferencias="active";

	$Numero ="";
	$Usuario ="";
	$Usario_Nombre="";
	$Fecha_Creacion ="";
	$Fecha_Revision ="";
	$Valor_Aprovado =0;
	$Valor_Rechazado =0;
	$Banco="";
	$Tipo_Cuenta="";
	$Numero_Cuenta="";
	$Titular_Cuenta="";
    $Observaciones_Cargadas="";
    $Estado="";
    $TotalPago=0;
    $DescBancario=0;
    $FPrevencion=0;

	if (isset($_GET['Numero'])) {

        $query=mysqli_query($con, "select Numero,Usuario,USUARIOS.Razon_Social,
         Fecha_Creacion,Fecha_Revision,Valor_Aprovado,Valor_Rechazado,Banco,Tipo_Cuenta,Numero_Cuenta,TRANSACCIONESE.Estado,
         Titular_Cuenta,TRANSACCIONESE.TotalPago,TRANSACCIONESE.DescBancario,TRANSACCIONESE.FPrevencion from TRANSACCIONESE 
		inner join USUARIOS on TRANSACCIONESE.Usuario = USUARIOS.Nit
		where Numero='".$_GET['Numero']."' ");
		$rw_Admin=mysqli_fetch_array($query);

		$Numero =$rw_Admin['Numero'];
		$Usuario =$rw_Admin['Usuario'];
		$Usario_Nombre=$rw_Admin['Razon_Social'];
		$Fecha_Creacion =$rw_Admin['Fecha_Creacion'];
		$Fecha_Revision =$rw_Admin['Fecha_Revision'];
		$TotalPago =$rw_Admin['TotalPago'];
		$DescBancario =$rw_Admin['DescBancario'];
		$FPrevencion =$rw_Admin['FPrevencion'];
		if ($Fecha_Revision ==$Fecha_Creacion ){
			$Fecha_Revision = date("Y-m-d");
		}


		$Estado =$rw_Admin['Estado'];
		$Valor_Aprovado =$rw_Admin['Valor_Aprovado'];
		$Valor_Rechazado =$rw_Admin['Valor_Rechazado'];
		$Banco=$rw_Admin['Banco'];
		$Tipo_Cuenta=$rw_Admin['Tipo_Cuenta'];
		$Numero_Cuenta=$rw_Admin['Numero_Cuenta'];
		$Titular_Cuenta=$rw_Admin['Titular_Cuenta'];
       
        $Transferencia="Transferencia Numero: ".$Numero;
        $sql="SELECT * FROM OBSERVACIONES_TRANSFERENCIAS 
        inner join Usuarios on Usuarios.Nit=OBSERVACIONES_TRANSFERENCIAS.Usuario WHERE Transferencia=".$Numero."";

		$query = mysqli_query($con, $sql);
		while ($row=mysqli_fetch_array($query)){
			$Observaciones_Cargadas.=
				
			'<br>
			<div class="card border-secondary mb-3">
  				<div class="card-header">'.$row['Razon_Social'].'<em>&nbsp;&nbsp;&nbsp;&nbsp;('.$row['Fecha'].')</em></div>
  				<div class="card-body text-secondary">
    				<p class="card-text">'.$row['Observacion'].'</p>
  				</div>
			</div>
		';
		}
	}
?>
<!doctype html>
<html lang="es">

<head>
    <?php include("head.php"); 	?>

</head>

<body onload="Cargar()">
    <div id="wrapper">
        <?php
	include("Menu.php");
	?>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN CONTENT -->
        <div id="main-content">
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default" id="Consultar">
                                <span class="fa  fa-exchange-alt"></span> Consultar Transferencias
                            </button>
                        </div>
                        <h4><i class="fas  fa-exchange-alt"></i> <?php echo $Transferencia;?></h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" id="Guardar_Transferencia" name="Guardar_Transferencia" action="Componentes/Ajax/Guardar-Transferencia.php" >
                            <div class="form-group container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Afiliado" class="control-label">Usuario</label>
                                        <input class="form-control hidden" type="text" id="Numero" name="Numero"
                                            VALUE="<?php echo $Numero;?>" readonly>
                                        <input class="form-control hidden" type="text" id="Usuario" name="Usuario"
                                            VALUE="<?php echo $Usuario;?>" required readonly>
                                        <input class="form-control" type="text" id="Razon_Social"
                                            placeholder="Nombre del Usuario" VALUE="<?php echo $Usario_Nombre;?>"
                                            required readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tel2" class="control-label">Fecha de Creacion</label>
                                        <input type="Date" class="form-control" id="Fecha_Creacion"
                                            name="Fecha_Creacion" value="<?php echo $Fecha_Creacion?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tel2" class="control-label">Fecha de Revision</label>
                                        <input type="Date" class="form-control" id="Fecha_Revision"
                                            name="Fecha_Revision" value="<?php echo $Fecha_Revision?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Valor Aprobado</label>
                                        <input type="text" class="form-control hidden" id="Valor_Aprovado"
                                            Name="Valor_Aprovado" placeholder="Valor_Aprovado"
                                            value="<?php echo $Valor_Aprovado;?>" onchange="CambioAprovado()" readonly>
                                            <input type="text" class="form-control" id="Valor_Aprovado1"
                                            Name="Valor_Aprovado1" placeholder="Valor_Aprovado"
                                            value="<?php echo $Valor_Aprovado;?>"  readonly onkeyup="format(this)" >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Valor Rechazado</label>
                                        <input type="text" class="form-control hidden" id="Valor_Rechazado"
                                            Name="Valor_Rechazado" placeholder="Valor_Rechazado"
                                            value="<?php echo $Valor_Rechazado;?>" onchange="CambioRechazado()" readonly>
                                            <input type="text" class="form-control" id="Valor_Rechazado1"
                                            Name="Valor_Rechazado1" placeholder="Valor_Rechazado"
                                            value="<?php echo $Valor_Rechazado;?>"  readonly onkeyup="format(this)" >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Total a Pagar</label>
                                        <input type="text" class="form-control hidden" id="TotalPago"
                                            Name="TotalPago" placeholder="TotalPago"
                                            value="<?php echo $TotalPago;?>" readonly >
                                            <input type="text" class="form-control" id="TotalPago1"
                                            Name="TotalPago1" placeholder="TotalPago"
                                            value="<?php echo $TotalPago;?>"  readonly onkeyup="format(this)" >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Descuento Bancario</label>
                                        <input type="text" class="form-control hidden" id="DescBancario"
                                            Name="DescBancario" placeholder="DescBancario"
                                            value="<?php echo $DescBancario;?>" readonly>
                                            <input type="text" class="form-control" id="DescBancario1"
                                            Name="DescBancario1" placeholder="DescBancario"
                                            value="<?php echo $DescBancario;?>"  readonly onkeyup="format(this)" >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Fondo de Prevencion %</label>
                                        <input type="text" class="form-control " id="FPrevencion"
                                            Name="FPrevencion" placeholder="FPrevencion"
                                            value="<?php echo $FPrevencion;?>%" readonly>
                                           
                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Fondo de Prevencion $</label>
                                        
                                            <input type="text" class="form-control" id="FPrevencion1"
                                            Name="FPrevencion1" placeholder="FPrevencion"
                                            value="<?php echo (($Valor_Aprovado-$DescBancario)*$FPrevencion/100);?>"  readonly onkeyup="format(this)" >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email" class="control-label">Banco</label>
                                        <?PHP
												$query1=mysqli_query($con, "SELECT Banco_1,Tipo_Banco_1,Numero_Cuenta_1,Titular_1,Banco_2,Tipo_Banco_2,Numero_Cuenta_2,Titular_2 FROM USUARIOS where Nit ='".$Usuario."'");
												echo' <select class="form-control" id="Banco" name ="Banco" placeholder="Banco" onchange="CambioBanco()">';
												$rw_Admin1=mysqli_fetch_array($query1);
													if($Banco==$rw_Admin1['Banco_1']){
														echo '<option value="'.$rw_Admin1['Banco_1'].'" selected>'.$rw_Admin1['Banco_1'].'</option>';	

													}else{
														echo '<option value="'.$rw_Admin1['Banco_1'].'">'.utf8_encode($rw_Admin1['Banco_1']).'</option>';	

													}
													if($Banco==$rw_Admin1['Banco_2']){
														echo '<option value="'.$rw_Admin1['Banco_2'].'" selected>'.$rw_Admin1['Banco_2'].'</option>';	

													}else{
														echo '<option value="'.$rw_Admin1['Banco_2'].'">'.utf8_encode($rw_Admin1['Banco_2']).'</option>';	

													}
													
											
												echo '</select>';
											?>
											 <input class="form-control hidden" type="text" id="Banco_1"
                                            name="Banco_1" VALUE="<?php echo $rw_Admin1['Banco_1'];?>"
                                            required readonly>
                                        <input class="form-control hidden" type="text" id="Tipo_Banco_1"
                                            name="Tipo_Banco_1" VALUE="<?php echo $rw_Admin1['Tipo_Banco_1'];?>"
                                            required readonly>
                                        <input class="form-control hidden" type="text" id="Numero_Cuenta_1"
                                            name="Numero_Cuenta_1" VALUE="<?php echo $rw_Admin1['Numero_Cuenta_1'];?>"
                                            required readonly>
                                        <input class="form-control hidden" type="text" id="Titular_1" name="Titular_1"
                                            VALUE="<?php echo $rw_Admin1['Titular_1'];?>" required readonly>
											<input class="form-control hidden" type="text" id="Banco_2"
                                            name="Banco_2" VALUE="<?php echo $rw_Admin1['Banco_2'];?>"
                                            required readonly>
                                        <input class="form-control hidden" type="text" id="Tipo_Banco_2"
                                            name="Tipo_Banco_2" VALUE="<?php echo $rw_Admin1['Tipo_Banco_2'];?>"
                                            required readonly>
                                        <input class="form-control hidden" type="text" id="Numero_Cuenta_2"
                                            name="Numero_Cuenta_2" VALUE="<?php echo $rw_Admin1['Numero_Cuenta_2'];?>"
                                            required readonly>
                                        <input class="form-control hidden" type="text" id="Titular_2" name="Titular_2"
                                            VALUE="<?php echo $rw_Admin1['Titular_2'];?>" required readonly>


                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Tipo de Cuenta</label>
                                        
                                        <select name="Tipo_Cuenta" id="Tipo_Cuenta" class="form-control">
                                        <?php
                                        
                                            if ($Tipo_Cuenta == 'Ahorros'){
                                                ?>
                                                <option value="Ahorros" selected>Ahorros</option>
                                                    <option value="Corriente">Corriente</option>
                                               <?php 
                                            }else{
                                                ?>
                                                <option value="Ahorros" >Ahorros</option>
                                                    <option value="Corriente" selected>Corriente</option>
                                               <?php 
                                            }
                                        ?>
                                                    
                                        </select>

                                       
                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Numero de Cuenta</label>
                                        <input type="text" class="form-control" id="Numero_Cuenta" Name="Numero_Cuenta"
                                            placeholder="Numero de Cuenta" value="<?php echo $Numero_Cuenta;?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Titular de la Cuenta</label>
                                        <input type="text" class="form-control" id="Titular_Cuenta"
                                            Name="Titular_Cuenta" placeholder="Titular de la Cuenta"
                                            value="<?php echo $Titular_Cuenta;?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="empresa" class="control-label">Estado</label>
                                        
                                        <select name="Estado" id="Estado" class="form-control">
                                        <?php
                                        
                                            if ($Estado == 'Aprobada'){
                                                ?>
                                                <option value="Aprobada" selected>Aprobada</option>
                                                    <option value="por revisar">por revisar</option>
                                                    <option value="Negada">Negada</option>
                                               <?php 
                                            }else{
                                                if ($Estado == 'por revisar'){
                                                    ?>
                                                    <option value="Aprobada" >Aprobada</option>
                                                    <option value="por revisar" selected>por revisar</option>
                                                    <option value="Negada">Negada</option>
                                               <?php 
                                                }else{
                                                    ?>
                                                    <option value="Aprobada" >Aprobada</option>
                                                    <option value="por revisar" >por revisar</option>
                                                    <option value="Negada" selected>Negada</option>
                                               <?php 
                                                }
                                                
                                            }
                                        ?>
                                                    
                                        </select>

                                       
                                    </div>
                                    <div class="col-md-12">
  										<label for="Observaciones">Observaciones:</label>
  										<textarea class="form-control" rows="5" id="Observaciones" name="Observaciones"></textarea>
									</div>	

                                    <?php
							$sql="select NDocumento,Tipo,Valor,Estado from TRANSACCIONESD where Numero=".$Numero." ";
							$query = mysqli_query($con, $sql);
							?>

                                    <div class="col-md-12">
                                        <br>
                                        <table class="table table-hover">
                                            <tr class="warning">
                                                <th class="text-center">Tipo</th>
                                                <th class="text-center">Numero</th>
                                                <th class="text-right">Valor</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-left">Seleccion</th>
                                            </tr>
                                            <?php
											$Total=0;
											while ($row=mysqli_fetch_array($query)){
												$NDocumento=$row['NDocumento'];
												$Tipo=$row['Tipo'];
						
						$Valor=$row['Valor'];
					$CHE="";
						$Estado=$row['Estado'];
						if ($Estado=='Pagada'){
							$Estado='Pagada';
							$CHE="checked";
							$label_class='label-success';
						}else{
							if ($Estado=='Rechazada'){
								$Estado='Rechazada	';
								$label_class='label-danger';
							}else{
								$Estado='Pendiente';
								$label_class='label-warning';
							}
						}
						
						
					
					?>
                                            <tr>
                                                <td class="text-center"><?php echo $Tipo; ?></td>
                                                <td class="text-center"><?php echo $NDocumento; ?></td>
                                                <td class="text-right"><?php echo '$'.number_format($Valor); ?></td>


                                                <td class="text-center"><span
                                                        class="label <?php echo $label_class;?>"><?php echo $Estado; ?></span>
                                                </td>


                                                <td><input type="checkbox" class="form-control" name="NumeroVenta[]"
                                                        id="<?php echo $Tipo.'-'.$NDocumento;?>" value="<?php echo $Tipo.'-'.$NDocumento;?>"
                                                        <?php echo $CHE;?>
                                                        onclick="OnVenta(<?php echo $Valor;?>,'<?php echo $Tipo.'-'.$NDocumento;?>')">
                                                </td>
                                            </tr>
                                            <?php
											$Total = $Valor+ $Total;
					}
											?>
                                        </table>
                                    </div>

                                    <input type="text" class="form-control hidden" id="Total" Name="Total"
                                        placeholder="Total" value="<?php echo $Total;?>">

                                </div>
                                <br>
                            </div>
                            <div class="col-md-12"><br>
									<?php echo $Observaciones_Cargadas ?>
  										
									</div>
                            <div id="resultados_ajax2"></div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-default" id="Cancelar">Cancelar</button>
                                
                                <?php
											if ( $_SESSION['Estado']=='Activo'){
												?>
													<button type="submit" class="btn btn-primary">Guardar datos</button>
												<?php
											}
										?>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/metisMenu/metisMenu.js"></script>
    <script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/scripts/common.js"></script>

    <script>
  

    function OnVenta(Valor, id) {
        var ch = $('#' + id).prop('checked');
        var apro = parseFloat(document.getElementById('Valor_Aprovado').value);
        var recha = parseFloat(document.getElementById('Valor_Rechazado').value);
        ch = ('-' + ch + '-');
        if (ch == '-true-') {
            document.getElementById('Valor_Aprovado1').value = apro + Valor;
            document.getElementById('Valor_Aprovado').value = apro + Valor;
            CambioAprovado();
        } else {
            document.getElementById('Valor_Rechazado1').value = recha + Valor;
            document.getElementById('Valor_Rechazado').value = recha + Valor;
            CambioRechazado();
        }

    }

    function CambioAprovado() {
        var apro = parseFloat(document.getElementById('Valor_Aprovado').value);
        var Total = parseFloat(document.getElementById('Total').value);
        var Desc = parseFloat(document.getElementById('DescBancario').value);

        document.getElementById('Valor_Rechazado').value = Total - apro;
        document.getElementById('Valor_Rechazado1').value = Total - apro;  
        document.getElementById('TotalPago').value = apro-Desc;
        document.getElementById('TotalPago1').value =  apro-Desc;
     
        $("#TotalPago1").keyup();
        $("#Valor_Aprovado1").keyup();
        $("#Valor_Rechazado1").keyup();
        CambioTotal();



    }

    function CambioRechazado() {
        var recha = parseFloat(document.getElementById('Valor_Rechazado').value);
        var Total = parseFloat(document.getElementById('Total').value);
        var Desc = parseFloat(document.getElementById('DescBancario').value);
       
        document.getElementById('Valor_Aprovado1').value = Total - recha;
        document.getElementById('Valor_Aprovado').value = Total - recha;
        
        
        document.getElementById('TotalPago').value = Total - recha-Desc;
        document.getElementById('TotalPago1').value = Total - recha-Desc;
     
        $("#TotalPago1").keyup();
        $("#Valor_Aprovado1").keyup();
        $("#Valor_Rechazado1").keyup();
        CambioTotal();
    }
    function CambioTotal(){
        var Total = parseFloat(document.getElementById('TotalPago').value);
        var Fondo = parseFloat(document.getElementById('FPrevencion').value);
        var TotalP = Total-(Total*Fondo/100);
        var TFondo = (Total*Fondo/100);

        document.getElementById('TotalPago').value =TotalP;
        document.getElementById('TotalPago1').value =TotalP;
        document.getElementById('FPrevencion1').value =TFondo;

        
        $("#TotalPago1").keyup();
        $("#FPrevencion1").keyup();

    }

    $("#Cancelar").click(function(event) {
        if (document.getElementById('EstadoV').value == 'Editando') {
            location.reload(true);
        } else {
            location.href = 'Consultar-Transferencias.php';
        }
    })
    $("#Consultar").click(function(event) {

        location.href = 'Consultar-Transferencias.php';

	})
	$( "#Guardar_Transferencia" ).submit(function( event ) {
 var parametros = $(this).serialize();

	 $.ajax({
			type: "POST",
			url: "Componentes/Ajax/Guardar-Transferencia.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
		
		  }
	});
  event.preventDefault();
})
    function CambioBanco(){
		var Banco=$('#Banco').val();
		var Banco1=	document.getElementById('Banco_1').value;
	var Banco2=	document.getElementById('Banco_2').value;
if (Banco == Banco1 ){
	document.getElementById('Tipo_Cuenta').value=document.getElementById('Tipo_Banco_1').value;
	document.getElementById('Numero_Cuenta').value=document.getElementById('Numero_Cuenta_1').value;
	document.getElementById('Titular_Cuenta').value=document.getElementById('Titular_1').value;
}
if (Banco == Banco2 ){
	document.getElementById('Tipo_Cuenta').value=document.getElementById('Tipo_Banco_2').value;
	document.getElementById('Numero_Cuenta').value=document.getElementById('Numero_Cuenta_2').value;
	document.getElementById('Titular_Cuenta').value=document.getElementById('Titular_2').value;
}
		
	
	}

function Cargar(){
    $("#Valor_Aprovado1").keyup();
        $("#Valor_Rechazado1").keyup();
        $("#TotalPago1").keyup();
        $("#DescBancario1").keyup();
        $("#FPrevencion1").keyup();
}

function format(input){
var num = input.value.replace(/\,/g,'');
if(!isNaN(num)){
num = num.toString().split('').reverse().join('').replace(/(?=\d*\,?)(\d{3})/g,'$1,');
num = num.split('').reverse().join('').replace(/^[\,]/,'');
input.value = '$ '+num;
}
 
else{ alert('Solo se permiten numeros');
input.value = input.value.replace(/[^\d\,]*/g,'');
}
}

  

    </script>
</body>

</html>