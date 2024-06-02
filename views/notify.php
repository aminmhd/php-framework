
<?php $message = get_flash_message(); ?>

<?php if(count($message) > 0): ?>
   <?php foreach($message as $key => $value): ?>
       <?php if($message[$key]["cat"] == "success"): ?>
            <script>
            iziToast.success({
                title: '<?= $message[$key]["cat"] ?>',
                message: '<?= $message[$key]["message"] ?>',
            });
            </script>
    <?php endif ?>
    <?php if($message[$key]["cat"] == "error"): ?>
        <script>
            iziToast.error({
                title: '<?= $message[$key]["cat"] ?>',
                message: '<?= $message[$key]["message"] ?>',
            });
            </script>
    <?php endif ?>
    <?php endforeach ?>
    <?php endif ?>