 <!-- Box within partners name and logo -->
 <div class="last-box row">
    <div class="col-xs-12 col-sm-4 col-sm-push-4 last-block">
      <div class="partner-box text-center">
        <p>
          <i class="fa fa-map-marker fa-2x sr-icons"></i>
          <span class="text-muted">35 North Drive, Adroukpape, PY 88105, Agoe Telessou</span>
        </p>
        <h4>Our Main Partners</h4>
        <hr>
        <div class="text-muted text-left">
        <?php
        /**
         * Si el array de asociados tiene menos de 3 elementos, se muestran todos los asociados.
         * Sin embargo, si el array tiene más de 3 asociados, mostraremos los tres primeros. 
         * Para mostrar los asociados llamaremos a la función obtenerTresPartners.
         */
            
                if (count($arrayPartners) <= 3) {
                    $mostrarPartner = $arrayPartners;
                } else {
                    if (count($arrayPartners) > 3) {
                        $mostrarPartner = obtenerTresPartners($arrayPartners);
                    }
                }
                /**
                 * Recorremos el array de asociados y mostraremos el logo, la descripcion y el nombre de los asociados. 
                 */
                foreach ($mostrarPartner as $partner) {
                    print "<ul class='list-inline'>
            <li><img src=" . $partner->getLogo() . " alt='" . $partner->getDescripcion() . "' title='" . $partner->getDescripcion() . "'></li>
            <li>" . $partner->getNombre() . "</li>
        </ul>";
                        }
                ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Box within partners name and logo -->

</div><!-- End of index box -->