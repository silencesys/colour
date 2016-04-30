<?php include 'layout/header.php'; ?>
<section class="myColorAndRandomColor">
    <form action="<?php echo $base_url; ?>" method="get">
        <input type="text" value="#<?php echo $color['hex']; ?>" name="color" class="myColor" placeholder="#random">
    </form>
    <form action="<?php echo $base_url; ?>" method="get" id="randomColor">
        <i class="fa fa-refresh" aria-hidden="true"></i>
        <input type="submit" value=" ">
    </form>
    <?php
    if(isset($color['error_code']) && $color['error_code'] == 'C03' || isset($color['error_code']) && $color['error_code'] == 'C02')
    {
        echo '<p class="wrongFormat">'.errorTranslation($color['error_code']).'</p>';
    }
    ?>
</section>
<?php include 'layout/footer.php'; ?>