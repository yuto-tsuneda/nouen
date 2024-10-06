<?php get_header('contact'); ?>

<div class="content">
<div class="bled">
  <?php if(function_exists('bcn_display'))
      {
        bcn_display();
      }?>
</div>
<h2>お問い合わせ</h2>
<div class="content__bg">
  <?php echo do_shortcode('[contact-form-7 id="d11fc28" title="お問い合わせ"]')?>
</div>
</div>
<?php get_footer(); ?>