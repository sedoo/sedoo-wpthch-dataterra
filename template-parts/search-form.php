<?php
/**
 * The template for displaying the searchform screen
 *
 */

?>
<div class="overlay search-form">
    <div class="wrapper">
        <h2><?php echo __('Rechercher', 'sedoo-wpth-labs'); ?></h2>
        <?php get_search_form(); ?>
        <div class="close">
            <label><?php echo __('Fermer', 'sedoo-wpth-labs'); ?></label>
            <button>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</div>