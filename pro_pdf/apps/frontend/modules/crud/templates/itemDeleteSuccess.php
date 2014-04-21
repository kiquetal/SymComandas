<div class="container">
    <div class="row">
	<span class="medium oval btn default"> <a href="/">Menu Principal</a>
	</span>
	<span class="medium oval btn default"> <a href="<?php echo $dir; ?>">Lista</a>
	</span>

    </div><br>

    <div class="row">
	<h1>Item Eliminado</h1>

	<div class="row">
	    <div class="success label" style="height: auto">
		<h3><?php echo html_entity_decode($texto) ?></h3>
		<ul>
                    <li>
			<?php echo $sf_user->getFlash("item_deleted"); ?>
			<?php echo $sf_user->getFlash("item_inactivo"); ?>
			<?php
			if (strlen($img) > 4) {
			    ?>

                            <img src="<?php echo $img; ?>">
			    <?php
			}
			?>
                    </li>

		</ul>

	    </div>


	</div>







    </div>
</div>