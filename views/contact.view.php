<?php
  include __DIR__ .'/partials/inicio-doc.part.php';
  include __DIR__ .'/partials/nav.part.php';
?>


<!-- Principal Content Start -->
<div id="contact">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-sm-push-2">
            <h1>CONTACT US</h1>
            <hr>
            <p>Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>

            <?php if (!empty($errores)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errores as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php elseif (isset($exito)): ?>
                <div class="alert alert-info">
                    <p>Formulario enviado correctamente:</p>
                    <p>Nombre: <?php echo htmlspecialchars($nombre); ?>
                    Apellido: <?php echo htmlspecialchars($apellido); ?>
                    Email: <?php echo htmlspecialchars($email); ?>
                    Asunto: <?php echo htmlspecialchars($subject); ?>
                    Mensaje: <?php htmlspecialchars($message); ?></p>
                </div>
            <?php endif; ?>

            <form class="form-horizontal" action="contact.php" method="post">
                <div class="form-group">
                    <div class="col-xs-6">
                        <label class="label-control" for="nombre">First Name</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
                    </div>
                    <div class="col-xs-6">
                        <label class="label-control" for="apellido">Last Name</label>
                        <input class="form-control" type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($apellido); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control" for="email">Email</label>
                        <input class="form-control" type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control" for="subject">Subject</label>
                        <input class="form-control" type="text" id="subject" name="subject" value="<?php echo htmlspecialchars($subject); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="label-control" for="message">Message</label>
                        <textarea class="form-control" id="message" name="message"><?php echo htmlspecialchars($message); ?></textarea>
                        <button class="pull-right btn btn-lg sr-button">SEND</button>
                    </div>
                </div>
            </form>
            <hr class="divider">
            <div class="address">
                <h3>GET IN TOUCH</h3>
                <hr>
                <p>Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero.</p>
                <div class="ending text-center">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-facebook sr-icons"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter sr-icons"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus sr-icons"></i></a></li>
                    </ul>
                    <ul class="list-inline contact">
                        <li class="footer-number"><i class="fa fa-phone sr-icons"></i> (00228)92229954 </li>
                        <li><i class="fa fa-envelope sr-icons"></i> kouvenceslas93@gmail.com</li>
                    </ul>
                    <p>Photography Fanatic Template &copy; 2017</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Principal Content End -->

<?php
  include __DIR__ .'/partials/fin-doc.part.php';
?>