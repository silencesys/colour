<?php include 'layout/header.php'; ?>
<section class="myColorAndRandomColor">
    <form action="<?php echo $base_url; ?>" method="get">
        <input type="text" value="#<?php echo $color['main_hex']; ?>" data-main="#<?php echo $color['main_hex']; ?>" data-complementary="#<?php echo $color['comp_hex']; ?>" name="color" class="myColor"  id="myColour" placeholder="#random" autocomplete="off">
        <a href="#switch-colour" id="switch-colour">Show complementary colour</a>
    </form>
    <form action="<?php echo $base_url; ?>" method="get" id="randomColor">
        <i class="fa fa-refresh" aria-hidden="true"></i>
        <input type="submit" value=" ">
    </form>
    <?php
    if(isset($color['error_code']) && $color['error_code'] == 'C03E' || isset($color['error_code']) && $color['error_code'] == 'C02E')
    {
        echo '<p class="wrongFormat">'.errorTranslation($color['error_code']).'</p>';
    }
    ?>
</section>
<?php include 'layout/footer.php'; ?>