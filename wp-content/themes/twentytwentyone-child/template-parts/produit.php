<?php
    $champs = get_fields();
    // var_dump($champs);

    $produit_description = $champs['produit_description'];
    $produit_prix = $champs['produit_prix'];
    $produit_image = $champs['produit_image']['url'];
?>
<div class="wrapper">

    <h2><?=the_title();?></h2>

    <?php
        if ($produit_description) : ?>

    <p><?=$champs['produit_description'];?></p>
    <?php
        endif;
    ?>
    <div>
        <?php
            if ($produit_image) : ?>

        <img src="<?=$champs['produit_image']['url'];?>" alt="Crayon">
        <?php
            endif;
        ?>
    </div>
    <?php
        if ($produit_prix) : ?>

    <p><?=$champs['produit_prix'];?>$</p>
    <?php
        endif;
    ?>
</div>