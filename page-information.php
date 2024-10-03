<?php get_header('information'); ?>
<div class="bled">
  <?php if(function_exists('bcn_display'))
      {
        bcn_display();
      }?>
</div>

<div class="information">
  <h2>お知らせ一覧</h2>
  
  <div class="tab-container">
    <ul class="tabs">
      <li class="tab-link active" data-tab="tab-1" data-category="all">すべて</li>
      <li class="tab-link" data-tab="tab-2" data-category="category1">カテゴリー１</li>
      <li class="tab-link" data-tab="tab-3" data-category="category2">カテゴリー２</li>
      <li class="tab-link" data-tab="tab-4" data-category="category3">カテゴリー３</li>
    </ul>

    <div id="tab-1" class="tab-content active">
      <?php echo display_news_list(); ?>
    </div>
    <div id="tab-2" class="tab-content">
      <?php echo display_news_list('category1'); ?>
    </div>
    <div id="tab-3" class="tab-content">
      <?php echo display_news_list('category2'); ?>
    </div>
    <div id="tab-4" class="tab-content">
      <?php echo display_news_list('category3'); ?>
    </div>
  </div>
</div>


<?php get_footer(); ?>