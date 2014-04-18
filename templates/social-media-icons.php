<?php 
    $options      = get_option('plugin_options');
    $social_media = array('facebook', 'twitter', 'google', 'mail', 'linkedin', 'xing', 'skype', 'youtube', 'vimeo', 'flickr', 'rss');
?>

<div class="social-media-wrapper">
    <ul class="social-media-links">
        <?php foreach ($social_media as $i => $name) {
                  if (!empty( $options['tf_' . $name . '_link'] )) {
                      echo '<li><a href=' . $options['tf_'.$name.'_link'] . ' target="_blank" class="fa fa-' . $name . '"></a></li>';
                  }
              }
        ?>
    </ul>
</div>