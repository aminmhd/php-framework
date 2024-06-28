<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="<?= asset("izi/dist/css/iziToast.min.css") ?>">
<script src="<?= asset("izi/dist/js/iziToast.min.js") ?>" type="text/javascript"></script>


<?php $message = get_flash_message(); ?>
<?php if(count($message) > 0): ?>
    <?php foreach($message as $key => $value): ?>
        <?php if($message[$key]["cat"] == "success"): ?>
            <script>
                iziToast.success({
                    title: <?= json_encode($message[$key]["cat"]) ?>,
                    message: <?= json_encode($message[$key]["message"]) ?>,
                });
            </script>
        <?php elseif($message[$key]["cat"] == "error"): ?>
            <script>
                iziToast.error({
                    title: <?= json_encode($message[$key]["cat"]) ?>,
                    message: <?= json_encode($message[$key]["message"]) ?>,
                });
            </script>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>


    