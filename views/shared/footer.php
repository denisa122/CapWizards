<?php
require_once "./models/FooterModel.php";

use models\FooterModel;

$FooterInfoModel = new FooterModel();
?>

<footer>
    <div class="row footer-grid">
        <section class="col section-padding ">
            <?php $FooterInfoModel->getFooterInfo() ?>
        </section>
        <!-- Contact us form -->
        <section class="col">
            <h2 class="h2-yellow margin-15">Contact us</h2>
            <div class="col">
                <form method="post" action="./contactForm.php">
                    <div class="row margin-15">
                        <input class="input-color input-size-s gap-15" type="text" name="firstName" placeholder="First name" required>
                        <input class="input-color input-size-s" type="text" name="lastName" placeholder="Last name" required>
                    </div>
                    <div class="row margin-15">
                        <input class="input-color input-size-s gap-15" type="email" name="email" placeholder="Email" required>
                        <input class="input-color input-size-s" type="text" name="subject" placeholder="Subject" required>
                    </div>

                    <textarea class="input-color row margin-15 input-size-b" name="Message" placeholder="Message..." required></textarea>
                    <div class="row text-center form-button-wrapper"><input class="big-button form-button" type="submit" name="submit" placeholder="Get in touch"></div>
                </form>
            </div>
        </section>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<!-- idk why but these scripts are needed for the dropdown in the nav to work-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</body>

</html>