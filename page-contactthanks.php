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
  
  <div class="contact__thanks">
    <h3>お問い合わせありがとうございました。</h3>
  <p class="contact__thanks__s">担当者より<br class="display__sp">5営業日以内に返信いたします。<br>
  お急ぎの場合は、<br class="display__sp">お電話にてお問い合わせください。</p>
  <p class="contact__thanks__bold">問い合わせ番号：<br class="display__sp"><span class="contact__thanks__big">123-567-8901</span></p>
  <p class="contact__thanks__bold">【受付時間】<br class="display__sp">10:00 ~ 18:00（土日祝を除く）</p>
</div>
  <div class="contact__gotop">
    <a href="<?php echo home_url(); ?>">TOPに戻る</a>
  </div>
  </div>
</div>

<?php get_footer(); ?>