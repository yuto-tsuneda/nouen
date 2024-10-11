<?php get_header('information'); ?>
<div class="bled">
  <?php if(function_exists('bcn_display'))
      {
        bcn_display();
      }?>
</div>

<div class="information">
  <h2 class="information__title">お知らせ一覧</h2>
  
  <div class="tab-links">
    <a href="#" class="tab-link active" data-category="all">すべて</a>
    <a href="#" class="tab-link" data-category="category1">カテゴリー1</a>
    <a href="#" class="tab-link" data-category="category2">カテゴリー2</a>
    <a href="#" class="tab-link" data-category="category3">カテゴリー3</a>
</div>

<div class="posts">
<div id="post-container"></div>
<div id="pagination"></div>
</div>
</div>

<div class="contact">
  <h2>お問い合わせ</h2>
  <p>お仕事のご相談、農園体験、牧場の見学、その他ご質問<br>
  お気軽にお問い合わせください。</p>
  <a href="#">お問い合わせ</a>
  <p class="contact__bold">問い合わせ番号：<br class="display__sp"><span>123-567-8901</span></p>
  <p class="contact__bold">【受付時間】<br class="display__sp">10:00 ~ 18:00（土日祝を除く）</p>
</div>


<?php get_footer(); ?>