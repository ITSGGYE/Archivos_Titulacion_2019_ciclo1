// JavaScript Document
function check_cedula( cedula )
			{
			  array = cedula.split( "" );
			  num = array.length;
			  
			  if(num==10)
			  {
				total = 0;
				digito = (array[9]*1);
				for( i=0; i < (num-1); i++ )
				{
				  mult = 0;
				  if ( ( i%2 ) != 0 ) {
					total = total + ( array[i] * 1 );
				  }
				  else
				  {
					mult = array[i] * 2;
					if ( mult > 9 )
					  total = total + ( mult - 9 );
					else
					  total = total + mult;
				  }
				}
				decena = total / 10;
				decena = Math.floor( decena );
				decena = ( decena + 1 ) * 10;
				final = ( decena - total );
				if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
				 // alert( "La c\xe9dula es v\xe1lida!!!" );
				  return true;
				}
				else
				{
				  //alert( "La c\xe9dula no es v\xe1lida!!!" );
				  return false;
				}
			  }
			  else
			  {
				  
				  if(num==13)
			  	  {
					  cedula = cedula.substr(0, 10);
					  array = cedula.split( "" );
					  num = array.length;
					  
					  total = 0;
					  digito = (array[9]*1);
					  for( i=0; i < (num-1); i++ )
					  {
						mult = 0;
						if ( ( i%2 ) != 0 ) {
						  total = total + ( array[i] * 1 );
						}
						else
						{
						  mult = array[i] * 2;
						  if ( mult > 9 )
							total = total + ( mult - 9 );
						  else
							total = total + mult;
						}
					  }
					  decena = total / 10;
					  decena = Math.floor( decena );
					  decena = ( decena + 1 ) * 10;
					  final = ( decena - total );
					  if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
						//alert( "El RUC es v\xe1lida!!!" );
						return true;
					  }
					  else
					  {
						//alert( "El RUC no es v\xe1lida!!!" );
						return false;
					  }
					  
					  
				  }
			  }
			  
			}
			
