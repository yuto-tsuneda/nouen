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


<?php get_footer(); ?>