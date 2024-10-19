<?php
    /**
     * Verifica si una opción de menú está activa comparando con la URL actual.
    
     */
    function esOpcionMenuActiva(string $opcionMenu): bool {
        if ($_SERVER['REQUEST_URI'] === $opcionMenu) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Verifica si alguna de las opciones de menú en un array está activa.
     
     */
    function existeOpcionMenuActivaEnArray(array $opciones): bool {
        foreach ($opciones as $opcion) {
            if (esOpcionMenuActiva($opcion)) {
                return true;
            }
        }
        return false;
    }
?>
