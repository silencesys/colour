<?php include 'layout/header.php'; ?>
<section class="myColorAndRandomColor">
    <form action="<?php echo $base_url; ?>" method="get">
        <input type="text" value="#<?php echo $color['hex_color']; ?>" name="color" class="myColor" placeholder="#random">
    </form>
    <form action="<?php echo $base_url; ?>" method="get" id="randomColor">
        <i class="fa fa-refresh" aria-hidden="true"></i>
        <input type="submit" value=" ">
    </form>
    <?php
    if(isset($color['message']))
    {
        echo '<p class="wrongFormat"><b>Error:</b> '.$color['message'].'</p>';
    }
    ?>
</section>
<?php include 'layout/footer.php'; ?>