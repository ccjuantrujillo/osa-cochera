<?php
$nombre_persona = $this->session->userdata('nombre_persona');
$persona        = $this->session->userdata('persona');
$usuario        = $this->session->userdata('usuario');
$url            = base_url()."index.php";
if(empty($persona)) header("location:$url");
$CI = get_instance();
?>
<html>
	<head>	
        <script type="text/javascript" src="<?=$base_url;?>public/js/ventas/credito.js?=<?=JS;?>"></script>	
        <script type="text/javascript" src="<?=$base_url;?>public/js/fancybox/jquery.mousewheel-3.0.4.pack.js?=<?=JS;?>"></script>
        <script type="text/javascript" src="<?=$base_url;?>public/js/fancybox/jquery.fancybox-1.3.4.pack.js?=<?=JS;?>"></script>
        <link rel="stylesheet" type="text/css" href="<?=$base_url;?>public/js/fancybox/jquery.fancybox-1.3.4.css?=<?=CSS;?>" media="screen" />
        <script language="javascript">
            $(document).ready(function(){
                $("a#linkVerCliente, a#linkVerProveedor").fancybox({
                        'width'          : 700,
                        'height'         : 450,
                        'autoScale'	 : false,
                        'transitionIn'   : 'none',
                        'transitionOut'  : 'none',
                        'showCloseButton': false,
                        'modal'          : true,
                        'type'	     : 'iframe'
                });  
				
				$("a#linkVerProducto").fancybox({
                        'width'          : 800,
                        'height'         : 650,
                        'autoScale'	 : false,
                        'transitionIn'   : 'none',
                        'transitionOut'  : 'none',
                        'showCloseButton': false,
                        'modal'          : true,
                        'type'	     : 'iframe'
                });
				
            });
            function seleccionar_cliente(codigo,ruc,razon_social, empresa, persona){
                $("#cliente").val(codigo);
                $("#ruc_cliente").val(ruc);
                $("#nombre_cliente").val(razon_social);
            }
            function seleccionar_proveedor(codigo,ruc,razon_social){
                $("#proveedor").val(codigo);
                $("#ruc_proveedor").val(ruc);
                $("#nombre_proveedor").val(razon_social);
             }
            function seleccionar_producto(codigo,interno,familia,stock,costo){
                $("#producto").val(codigo);
                $("#codproducto").val(interno);

                base_url   = $("#base_url").val();
                url          = base_url+"index.php/almacen/producto/listar_unidad_medida_producto/"+codigo;
                $.getJSON(url,function(data){
                      $.each(data, function(i,item){
                            nombre_producto = item.PROD_Nombre;
                      });
                      $("#nombre_producto").val(nombre_producto);
                });
            }

            var cursor;
            if (document.all) {
            // Está utilizando EXPLORER
            cursor='hand';
            } else {
            // Está utilizando MOZILLA/NETSCAPE
            cursor='pointer';
            }
        </script>		
	</head>
	<body>
	<br>
		<div id="pagina">
			<div id="zonaContenido">
			<div align="center">
				<div id="tituloForm" class="header"><?php echo $titulo_busqueda;?></div>
				<form id="form_busqueda" name="form_busqueda" method="post" action="<?=$base_url;?>index.php/ventas/credito/listar">
                                 <div id="frmBusqueda" >
					<table class="fuente8" width="98%" cellspacing="0" cellpadding="3" border="0">
						<tr>
							<td align='left' width="10%">Fecha inicialAAA</td>
							<td align='left' width="90%">
                                                            <input name="fechai" id="fechai" value="<?php echo $fechai; ?>" type="text" class="cajaGeneral" size="10" maxlength="10"/>
                                                            <img src="<?=$base_url;?>public/images/icons/calendario.png?=<?=IMG;?>" name="Calendario1" id="Calendario1" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'" title="Calendario"/>
                                                            <script type="text/javascript">
                                                                Calendar.setup({
                                                                    inputField     :    "fechai",      // id del campo de texto
                                                                    ifFormat       :    "%d/%m/%Y",       // formato de la fecha, cuando se escriba en el campo de texto
                                                                    button         :    "Calendario1"   // el id del botón que lanzará el calendario
                                                                });
                                                            </script>
                                                            <label style="margin-left: 90px;">Fecha final</label>
                                                            <input name="fechaf" id="fechaf" value="<?php echo $fechaf; ?>" type="text" class="cajaGeneral" size="10" maxlength="10" />
                                                            <img src="<?=$base_url;?>public/images/icons/calendario.png?=<?=IMG;?>" name="Calendario2" id="Calendario2" width="16" height="16" border="0" onMouseOver="this.style.cursor='pointer'" title="Calendario2"/>
                                                            <script type="text/javascript">
                                                                Calendar.setup({
                                                                    inputField     :    "fechaf",      // id del campo de texto
                                                                    ifFormat       :    "%d/%m/%Y",       // formato de la fecha, cuando se escriba en el campo de texto
                                                                    button         :    "Calendario2"   // el id del botón que lanzará el calendario
                                                                });
                                                            </script>
                                                        </td>
						</tr>
						<tr>
                                                    <td align='left'>Número</td>
                                                    <td align='left'><input type="text" name="serie" id="serie" value="<?php echo $serie; ?>" class="cajaGeneral" size="3" maxlength="10"  />
                                                                     <input type="text" name="numero" id="numero" value="<?php echo $numero; ?>"  class="cajaGeneral" size="10" maxlength="10"  />
                                                    </td>
						</tr>
						<tr>
                                                     <?php if($tipo_oper=='V'){ ?>
                                                    <td align='left'>Cliente</td>
                                                    <td align='left'>
                                                        <input type="hidden" name="cliente" value="<?php echo $cliente; ?>" id="cliente" size="5" />
                                                        <input type="text" name="ruc_cliente" value="<?php echo $ruc_cliente; ?>" class="cajaGeneral" id="ruc_cliente" size="10" maxlength="11" onblur="obtener_cliente();" onkeypress="return numbersonly(this,event,'.');" />
                                                        <input type="text" name="nombre_cliente" value="<?php echo $nombre_cliente; ?>"  class="cajaGrande cajaSoloLectura" id="nombre_cliente" size="40" readonly="readonly" />
                                                        <a href="<?=$base_url;?>index.php/empresa/cliente/ventana_busqueda_cliente/" id="linkVerCliente"><img height='16' width='16' src='<?php echo base_url(); ?>/images/ver.png?=<?=IMG;?>' title='Buscar' border='0' /></a>
                                                    </td>
                                                    <?php }else{ ?>
                                                    <td align='left'>Proveedor</td>
                                                    <td align='left'>
                                                        <input type="hidden" name="proveedor" value="<?php echo $proveedor; ?>" id="proveedor" size="5" />
                                                        <input type="text" name="ruc_proveedor" value="<?php echo $ruc_proveedor; ?>" class="cajaGeneral" id="ruc_proveedor" size="10" maxlength="11" onblur="obtener_proveedor();" onkeypress="return numbersonly(this,event,'.');" />
                                                        <input type="text" name="nombre_proveedor" value="<?php echo $nombre_proveedor; ?>"  class="cajaGrande cajaSoloLectura" id="nombre_proveedor" size="40" readonly="readonly" />
                                                        <a href="<?=$base_url;?>index.php/empresa/proveedor/ventana_busqueda_proveedor/" id="linkVerProveedor"><img height='16' width='16' src='<?php echo base_url(); ?>/images/ver.png?=<?=IMG;?>' title='Buscar' border='0' /></a>
                                                    </td>
                                                    <?php } ?>
						</tr>
						<tr>
                                                    <td align='left'>Artículo</td>
                                                    <td align='left'>
                                                        <input name="producto" type="hidden" class="cajaPequena" id="producto" size="10" maxlength="11" />
                                                        <input name="codproducto" type="text" value="<?php echo $codproducto; ?>" class="cajaPequena" id="codproducto" size="10" maxlength="11" onBlur="obtener_producto();" onKeyPress="return numbersonly(this,event,'.');" />
                                                        <input NAME="nombre_producto" type="text" value="<?php echo $nombre_producto; ?>" class="cajaGrande cajaSoloLectura" id="nombre_producto" size="40" readonly="readonly" />
                                                        <a href="<?=$base_url;?>index.php/almacen/producto/ventana_busqueda_producto/" id="linkVerProducto"><img height='16' width='16' src='<?php echo base_url(); ?>/images/ver.png?=<?=IMG;?>' title='Buscar' border='0' /></a>
                                                    </td>
						</tr>
					</table>
                                 </div>
			 	<div id="botonBusqueda">                                       
                                        <ul id="imprimirCredito" class="lista_botones"><li id="imprimir">Imprimir</li></ul>
                                        <ul id="nuevaCredito" class="lista_botones"><li id="nuevo">Nueva <?php echo ucwords($CI->obtener_tipo_documento($tipo_docu)); ?></li></ul>
                                        <ul id="limpiarCredito" class="lista_botones"><li id="limpiar">Limpiar</li></ul>
                                        <ul id="buscarCredito" class="lista_botones"><li id="buscar">Buscar</li></ul> 
				</div>
			  <div id="lineaResultado">
			  <table class="fuente8" width="100%" cellspacing="0" cellpadding="3" border="0">
			  	<tr>
				<td width="50%" align="left">N de <?php echo $CI->obtener_tipo_documento($tipo_docu); ?>s encontrados:&nbsp;<?php echo $registros;?> </td>
				<td width="50%" align="right">&nbsp;</td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header"><?php echo $titulo_tabla;;?></div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing="0" cellpadding="3" border="0" ID="Table1">
                                <tr class="cabeceraTabla">
                                <td width="4%">ITEM</td>
                                <td width="5%">FECHA</td>
                                <td width="5%">SERIE</td>
                                <td width="6%">NUMERO</td>
                                
                                <td>RAZON SOCIAL</td>
                                <td width="9%">TOTAL</td>
                                <td width="4%">ESTADO</td>
                                <td width="4%">&nbsp;</td>
                                <td width="4%">&nbsp;</td>
                                <td width="4%">&nbsp;</td>
                                </tr>					
                                <?php
                                if(count($lista)>0){
                                foreach($lista as $indice=>$valor){
                                  $class = $indice%2==0?'itemParTabla':'itemImparTabla';
                                ?>
                                <tr class="<?php echo $class;?>">
                                <td><div align="center"><?php echo $valor[0];?></div></td>
                                <td><div align="center"><?php echo $valor[1];?></div></td>
                                <td><div align="center"><?php echo $valor[2];?></div></td>
                                <td><div align="center"><?php echo $valor[3];?></div></td>
                               
                                <td><div align="center"><?php echo $valor[6];?></div></td>
                                <td><div align="center"><?php echo $valor[7];?></div></td>
                                <td><div align="center"><?php echo $valor[8];?></div></td>
                                <td><div align="center"><?php echo $valor[9];?></div></td>
                                <td><div align="center"><?php echo $valor[10];?></div></td>
                                <td><div align="center"><?php echo $valor[11];?></div></td>
                                </tr>
                                <?php
                                 }
                                }
                                else{
                                ?>
                                    <table width="100%" cellspacing="0" cellpadding="3" border="0" class="fuente8">
                                        <tbody>
                                            <tr>
                                              <td width="100%" class="mensaje">No hay ning&uacute;n registro que cumpla con los criterios de b&uacute;squeda</td>
                                            </tr>
                                        </tbody>
                                    </table>	
                                    <?php
                                    }
                                    ?>
				</table>
				</div>
				<div style="margin-top: 15px;"><?php echo $paginacion;?></div>
				<input type="hidden" id="iniciopagina" name="iniciopagina">
				<?php echo $oculto?>
			</form>
			</div>
		  </div>			
		</div>
	</body>
</html>