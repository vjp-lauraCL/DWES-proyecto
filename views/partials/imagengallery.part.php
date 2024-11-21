<?php
 include_once './entities/imagenGaleria.class.php';
 include_once './index.php';
?>

<!-- La clase $esActiva hacía que no se mostraran las imágenes del home. Para saber de donde viene tenemos que ir a index.view.php en 
 la sección de las categorías. Definimos la variable. En la primera linea de este código corresponde a esa variable. -->
<div id="<?php echo $idCategory; ?>" class="tab-pane <?php echo $estaActiva; ?>">
    <div class="row popup-gallery">
        <?php foreach ($imagen as $img): ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="sol">
                    <img class="img-responsive" src="<?php echo $img->getUrlPortfolio(); ?>" alt="<?php echo $img->getDescripcion(); ?>">
                    <div class="behind">
                        <div class="head text-center">
                            <ul class="list-inline">
                                <li>
                                    <a class="gallery" href="<?php echo $img->getUrlGallery(); ?>" data-toggle="tooltip" data-original-title="Quick View">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-original-title="Click if you like it">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-original-title="Download">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" data-original-title="More information">
                                        <i class="fa fa-info"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="row box-content">
                            <ul class="list-inline text-center">
                                <li><i class="fa fa-eye"></i> <?php echo $img->getNumVisualizaciones(); ?></li>
                                <li><i class="fa fa-heart"></i> <?php echo $img->getNumLikes(); ?></li>
                                <li><i class="fa fa-download"></i> <?php echo $img->getNumDownloads(); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <nav class="text-center">
        <ul class="pagination">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#" aria-label="next">
                <span aria-hidden="true">&raquo;</span>
            </a></li>
        </ul>
    </nav>
</div>