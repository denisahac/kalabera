<form id="searchform" class="searchform" method="get" action="<?php echo home_url('/'); ?>" role="search">
  <fieldset>
    <label>
      <?php _e('Search for:', 'kalabera'); ?>
      <input id="s" name="s" type="search" value=""/>
    </label>

    <button id="searchsubmit" type="submit"><?php _e('Search', 'kalabera'); ?></button>
  </fieldset>
</form>