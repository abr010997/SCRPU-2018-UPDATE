<?php $result = $this->class04oficina->listar(); ?>
<!--<a href="?c=class04oficina&m=agregar"  class="btn btn-primary" role="button">Guardar Información Oficina</a>
<br> <br>
   <h2>Listado de Trámites</h2>   
<a href="?c=class04oficina&m=index1" class="btn btn-primary" role="button">Ver Trámites Inspecionados</a>
<br><br>   -->
<div class="container-fluid">
  <center>
      <h2>Revisión General de Trámites</h2>   
  </center>
  <br>   
  <?php if ($result->num_rows): ?>
  <div class="col-md-12" style="overflow-x: scroll;">
    <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-oficina">
      <thead>
        <tr>
          <th style="width: 120px;">Más</th>
          <th>Id Trámite</th>
          <th>Cédula Propietario</th>
          <th>Nombre Propietario</th>
          <th>1° Apellido Propietario</th>
          <th>2° Apellido Propietario</th>
          <th>Finca</th>
          <th>Plano Propietario</th>
          <th>Distrito Terreno</th>
          <th>Barrio Terreno</th>
          <th>Dirección Terreno</th>
          <th>Cédula Solicitante</th>
          <th>Nombre Solicitante</th>
          <th>1° Apellido Solicitante</th>
          <th>2° Apellido Solicitante</th>
          
          
          
          
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($result)):?>
          <tr>
              <td><div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li>
                    <a href="?c=class04oficina&m=revisarTra&id=<?php echo $row[0]; ?>">
                    <span class="glyphicon glyphicon-pencil"></span> Revisar Trámite</a>
                  </li>
                  <li>
                      <a href="?c=class04oficina&m=editarActividades00&id=<?php echo $row[0]; ?>">
                      <span class="glyphicon glyphicon-pencil"></span> Aprobar o Denegar Trámite</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=reporte&id=<?php echo $row[0]; ?>" target="_blank"> Reporte</a>
                  </li>
                  <li class="divider">Nicoya</li>
                  <li>
                      <a href="?c=classreporte&m=rZonaVerde&id=<?php echo $row[0]; ?>" target="_blank"> ZonaVerde</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rInstitucional&id=<?php echo $row[0]; ?>" target="_blank"> Institucional</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rComercialCentral&id=<?php echo $row[0]; ?>" target="_blank"> ComercialCentral</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rIndustrial&id=<?php echo $row[0]; ?>" target="_blank"> Industrial</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rResidencialComercial&id=<?php echo $row[0]; ?>" target="_blank"> ResidencialComercial</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rResidencial&id=<?php echo $row[0]; ?>" target="_blank"> Residencial</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rTuristicoComercial&id=<?php echo $row[0]; ?>" target="_blank"> TuristicoComercial</a>
                  </li>
                  <li class="divider">Samara</li>
                  <li>
                      <a href="?c=classreporte&m=rZonaComercialTuristica&id=<?php echo $row[0]; ?>" target="_blank"> rZonaComercialTuristica</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rZonaResidencialPrivada&id=<?php echo $row[0]; ?>" target="_blank"> rZonaResidencialPrivada</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rZonaInstitucional&id=<?php echo $row[0]; ?>" target="_blank"> rZonaInstitucional</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rZonaPrivada&id=<?php echo $row[0]; ?>" target="_blank"> rZonaPrivada</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rZonaArriendo&id=<?php echo $row[0]; ?>" target="_blank"> rZonaArriendo</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rZonaHotelera&id=<?php echo $row[0]; ?>" target="_blank"> rZonaHotelera</a>
                  </li>
                  <li class="divider">Fuera Plan</li>
                  <li>
                      <a href="?c=classreporte&m=rFueraPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> rFueraPlanRegulador</a>
                  </li>
                  <li class="divider">DAR</li>
                   <li>
                      <a href="?c=classreporte&m=rDarNew&id=<?php echo $row[0]; ?>" target="_blank"> rDar</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rDarInta&id=<?php echo $row[0]; ?>" target="_blank"> rDarInta</a>
                  </li>
                   <li>
                      <a href="?c=classreporte&m=rMINAEClaseVIII&id=<?php echo $row[0]; ?>" target="_blank"> rMINAEClaseVIII</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rDarDireccionAgua&id=<?php echo $row[0]; ?>" target="_blank"> rDarDireccionAgua</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=rDarAntecedentesDominio&id=<?php echo $row[0]; ?>" target="_blank"> rDarAntecedentesDominio</a>
                  </li>
                  <li class="divider">Patente-Comercia-Fuera del Plan Regulador</li>
                  <li>
                      <a href="?c=classreporte&m=ConstrucciónViviendaBonoUnifamiliarQuebradaRiosUrbanoDentrodelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> Quebrada-Rios-Urbano-Dentro del Plan Regulador</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=ConstrucciónViviendaBonoUnifamiliarDentrodelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> Bono-Unifamiliar-Dentro del Plan Regulador</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=ConstrucciónViviendaBonoUnifamiliarFueradelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> Bono-Unifamiliar-Fuera del Plan Regulador</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=ConstrucciónViviendaBonoUnifamiliarQuebradasRiosRuralFuerdelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> Unifamiliar-Vunerabilidad Potrero-Alta-Fuera del Plan Regulador</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=ConstrucciónViviendaBonoUnifamiliarVulnerabilidadPotreroBajaFueradelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> Unifamiliar-Vunerabilidad Potrero-Baja-Fuera del Plan Regulador</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=ViviendaBonoUnifamiliarVulnerabilidaPotreroMediaFueradelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> Unifamiliar-Vunerabilidad Potrero-Media-Fuera del Plan Regulador</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=ConstrucciónViviendaBonoUnifamiliarServidumbreAgricolaFueradelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> ViviendaBono - Unifamiliar- Servidumbre Agricola-  Fuera del Plan Regulador</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=ConstrucciónViviendaBonoUnifamiliarServidumbredePasoAprobadaFueradelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> ViviendaBono - Unifamiliar- Servidumbre Paso-  Fuera del Plan Regulador</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=PatenteComercialFueradelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> Patente- Comercial-  Fuera del Plan Regulador</a>
                  </li>
                  <li>
                      <a href="?c=classreporte&m=PatenteComercialDentrodelPlanRegulador&id=<?php echo $row[0]; ?>" target="_blank"> Patente- Comercial-  Dentro del Plan Regulador</a>
                  </li>
                </ul>
              </div>
            </td>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            <td><?php echo $row[6]; ?></td>
            <td><?php echo $row[7]; ?></td>

            <td><?php echo $row[8]; ?></td>
            <td><?php echo $row[9]; ?></td>
            <td><?php echo $row[10]; ?></td>
            <td><?php echo $row[11]; ?></td>
            <td><?php echo $row[12]; ?></td>
            <td><?php echo $row[13]; ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <div style="background-color:#b2ff59" class="alert alert-info">
            <center>
              <strong>¡Información!</strong> No hay información sobre Trámites.
            </center>
          </div>
        <?php endif ?>
      </tbody>
    </table>
 </div>
</div>
  
   
