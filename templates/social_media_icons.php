<?php $options = get_option('plugin_options'); ?>

<ul class="social-media-links">
  <?php if (!empty( $options['tf_facebook_link'] )) { ?>
    <li class="facebook-icon"><a href='<?php echo $options['tf_facebook_link']; ?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_twitter_link'] )) { ?>
    <li class="twitter-icon"><a href='<?php echo $options['tf_twitter_link'];?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_google_link'] )) { ?>
    <li class="google-icon"><a href='<?php echo $options['tf_google_link'];?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_mail_link'] )) { ?>
    <li class="mail-icon"><a href='mailto:<?php echo $options['tf_mail_link'];?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_linkedin_link'] )) { ?>
    <li class="linkedin-icon"><a href='<?php echo $options['tf_linkedin_link'];?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_xing_link'] )) { ?>
    <li class="xing-icon"><a href='<?php echo $options['tf_xing_link'];?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_skype_link'] )) { ?>
    <li class="skype-icon"><a href='skype:<?php echo $options['tf_skype_link'];?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_youtube_link'] )) { ?>
    <li class="youtube-icon"><a href='<?php echo $options['tf_youtube_link'];?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_vimeo_link'] )) { ?>
    <li class="vimeo-icon"><a href='<?php echo $options['tf_vimeo_link'];?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_flickr_link'] )) { ?>
    <li class="flickr-icon"><a href='<?php echo $options['tf_flickr_link'];?>' target='_blank'></a></li>
  <?php } ?>

  <?php if (!empty( $options['tf_rss_link'] )) { ?>
    <li class="rss-icon"><a href='<?php echo $options['tf_rss_link'];?>' target='_blank'></a></li>
  <?php } ?>
</ul>