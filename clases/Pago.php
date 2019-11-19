<?php 
	class Pago{
		public function agregarPago($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$fecha=date('Y-m-d');
			$sql="INSERT into pagos_matricula(cliente, direccion, telefono, ruc, fk_alumno, pago , detalle,fechareg)
						values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$fecha')";
								
								
			return mysqli_query($conexion,$sql);
		}

		public function agregarCobroMatricula($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$fecha=date('Y-m-d');
			$sql="INSERT into cobro_matricula(fk_alumno, fk_cobro, detalle, fk_anio, fechareg)
						values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$fecha')";
								
								
			return mysqli_query($conexion,$sql);
		}


		public function agregarCobro($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="INSERT into cobro_valores(cobro, detalle, valor)
						values ('$datos[0]','$datos[1]','$datos[2]')";
								
								
			return mysqli_query($conexion,$sql);
		}


		public function agregarPagoPensiones($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$fecha=date('Y-m-d');
			$sql="INSERT into pagos_pensiones(cliente, direccion, telefono, ruc, fk_alumno,tipo, mes, pago , detalle,fechareg)
						values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]', '$datos[7]','$datos[8]','$fecha')";
								
								
			return mysqli_query($conexion,$sql);
		}
		
		public function agregarCobroPensiones($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$fecha=date('Y-m-d');
			$sql="INSERT into cobro_pensiones( fk_alumno, tipo, mes, tipo_cobro, detalle, fk_anio, fechareg)
						values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$fecha')";
								
								
			return mysqli_query($conexion,$sql);
		}
		
		public function obtenPagoMatricula($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_cobromatricula, fk_alumno, fk_cobro, detalle
							FROM cobro_matricula where  id_cobromatricula='$id' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idcobro' => $ver[0],
				'alumno' => $ver[1],
				'cobro' => $ver[2],
				'detalle' => $ver[3]
			
				);
			return $datos;
		}

		public function obtenDatosAlumno2($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_alumno
							FROM alumno  where  id_alumno='$id' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idalumno' => $ver[0]
				
				);
			return $datos;
		}


			public function obtenDatosCobro($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT  id_cobro, cobro, detalle, valor
							FROM cobro_valores where  id_cobro='$id' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idcobro' => $ver[0],
				'cobro' => $ver[1],
				'detalle' => $ver[2],
				'valor' => $ver[3]
				
				);
			return $datos;
		}


		public function obtenPagoPension($id){
			$obj= new conectar();
			$conexion=$obj->conexion();
			$sql="SELECT   fk_alumno, tipo, mes, tipo_cobro, detalle, id_cobro
							FROM cobro_pensiones  where  id_cobro='$id' ";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
				'idpension' => $ver[5],
				'alumno' => $ver[0],
				'tipo' => $ver[1],
				'cobro' => $ver[3],
				'mes' => $ver[2],
				'detalle' => $ver[4]
				);
			return $datos;
		}
	

		public function actualizaPagoMatricula($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE cobro_matricula set fk_alumno='$datos[1]', fk_cobro='$datos[2]', detalle='$datos[3]'
											where id_cobromatricula='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function actualizaCobro($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE cobro_valores set cobro='$datos[1]', detalle='$datos[2]', valor='$datos[3]'
								where id_cobro='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}




			public function actualizaPagoPension($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE cobro_pensiones set  fk_alumno='$datos[1]', tipo='$datos[2]', mes='$datos[3]', 
			tipo_cobro='$datos[4]', detalle='$datos[5]'
								where id_cobro='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}
	
		


		public function eliminaPagoMatricula($id){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from pagos_matricula
					where id_pago='$id'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminaPagoPension($id){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from cobro_pensiones
					where id_cobro='$id'";
			return mysqli_query($conexion,$sql);
		}

		
	}

 ?>