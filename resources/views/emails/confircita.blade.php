<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" >
  <title>Document</title>
  <style>
   
    h4{
      color:555555;
    }
    .subhead {font-size: 20px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
.h1 {font-size: 60px; line-height: 38px; font-weight: bold;color:#eeeeee;}
.h1, .h2,h3, .bodycopy {color: #eeeeee; font-family: sans-serif; }
body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
    
.boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #393e46;
    border-radius: 8px;
    border: 2px solid #fafeff;
  }
  .boton_personalizado:hover{
    color: #393e46;
    background-color: #f5f5f5;
    border:2px solid  #393e46;
  }


  </style>
</head>
<body>


<table  border="0" cellpadding="0" cellspacing="0" width="100%"  >
 
  <tr>
      <td class="subhead" align="center" bgcolor="#393e46" style="padding: 0px 0 0px 0;">
 
    <img src="{{ asset('images/speed.png') }}" alt="Speed" border="0" width="300" height="200" style="display: block;" />
    <h1 align="center">¡Ya está lista tu cita!</h1>
    
     </td>
  </tr>
  <tr>
    <td  align="center" bgcolor="#393e46" >
        <img src="{{ asset('images/time.png') }}" alt="Speed" style="display: block;" />
     

      
    </td> 

  </tr>
  <tr>
    <td align="center" bgcolor="#f4f4f4">
        <h4>Su cita fue registrada exitosamente
        verifique sus datos!
        </h4>
        <h4>Asunto:{{$asunto}}<br/>
        Cliente:{{$cliente}} <br/>
        Vehículo:{{$vehiculo}}<br/>
        Fecha:{{$fecha}}<br/>
        Hora:{{$hora}}<br/>
        Dirección: Calle {{$calle}} Número {{$num}} C.P {{$cp}} Colonia {{$colonia}}<br/>
        Chofer:{{$nom_chofer}}<br/>
        </h4>

        <h4>Dar click para confirmar su cita </h4>
        <button class="boton_personalizado" type="submit">Confirmar</button>
      </td>
  </tr>

  <!--<tr >
  <td bgcolor="#d3e0ea" height="80">

 </td>-->
 <tr>
  <td class="footer" bgcolor="#d3e0ea">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
         
          <tr>
              <td align="center" style="padding: 20px 0 0 0;">
                  <table border="0" cellspacing="0" cellpadding="0">
                      <tr>
                          <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                              <a href="http://www.facebook.com/">
                                  <img src="{{ asset('images/facebook.png') }}" width="60" height="60" alt="Facebook" border="0" />
                              </a>
                          </td>
                          <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                              <a href="http://www.twitter.com/">
                                  <img src="{{ asset('images/twitter.png') }}" width="60" height="60" alt="Twitter" border="0" />
                              </a>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
      </table>
  </td>
</tr>

  
  </tr>

  
 </table>
  
</body>
</html>
