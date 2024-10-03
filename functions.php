<?php

function theme_enqueue_scripts() {
  
  wp_enqueue_script('jquery');

  $theme_directory = get_template_directory_uri();

  wp_enqueue_style('reset-style', $theme_directory . '/assets/css/reset.css');
  wp_enqueue_style( 'common-style', $theme_directory . '/assets/css/common.css', array('reset-style'), null);
  wp_enqueue_script( 'common-script', $theme_directory . '/assets/js/common.js', array('jquery'), null, true);
  wp_enqueue_script( 'slick-script', $theme_directory . '/assets/js/slick.js', array('jquery'), null, true);
  wp_enqueue_style('slick-style', $theme_directory . '/assets/css/slick.css', array('reset-style'), null);

  if(is_front_page()){
    wp_enqueue_style('front-style', $theme_directory . '/assets/css/front-page.css', array('common-style'));
    wp_enqueue_script( 'front-script', $theme_directory . '/assets/js/front-page.js', array('common-script'), null, true);
  }

  if(is_singular('news') || is_post_type_archive('news')){
    wp_enqueue_style('news-style', $theme_directory . '/css/archive-news.css', array('common-style'));
    wp_enqueue_script('news-script', $theme_directory . '/js/news.js', array('jquery'), null, true);
  }

  if(is_post_type_archive('product')){
    wp_enqueue_style('product-style', $theme_directory . '/css/archive-product.css', array('common-style'));
    wp_enqueue_script('product-script', $theme_directory . '/js/product.js', array('jquery'), null, true);
  }

  if(is_singular('product')){
    wp_enqueue_style('product-single-style', $theme_directory . '/css/product.css', array('common-style'));
    wp_enqueue_script('product-single-script', $theme_directory . '/js/product.css', array('jquery'), null, true);
  }

  if(is_404()){
    wp_enqueue_style('404-style', $theme_directory . '/css/404.css', array('common-style'));
    wp_enqueue_script('404-script', $theme_directory . '/js/404.js', array('jquery'), null, true);
  }

  if(is_page('information')){
    wp_enqueue_style('thankspage-style', $theme_directory. '/assets/css/information.css', array('common-style'));
    wp_enqueue_script('thankspage-script', $theme_directory. '/assets/js/information.js', array('jquery'), null, true);
  }

  if(is_page('contactcf7')){
    wp_enqueue_style('contactcf7-style', $theme_directory. '/css/contactcf7.css', array('common-style'));
    wp_enqueue_script('contactcf7-script', $theme_directory. '/js/contactcf7.js', array('jquery'), null, true);
  }
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


function display_latest_posts() {
  $args = array(
      'posts_per_page' => 1, // 表示する記事数
      'orderby' => 'date',   // 日付順
      'order' => 'DESC'      // 新しい順に表示
  );

  $recent_posts = new WP_Query($args);

  if ($recent_posts->have_posts()) :
      while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
          <div class="post-item">
              <a href="<?php the_permalink(); ?>">
                <p class="top__inner__day">更新日: <?php echo get_the_modified_date('Y.m.d'); ?></p>
                <h2 class="top__inner__title"><?php the_title(); ?></h2> 
              </a>
          </div>
      <?php endwhile;
      wp_reset_postdata(); // クエリのリセット
  else :
      echo '<p>最新の記事がありません。</p>';
  endif;
}

function display_recent_posts_with_limit($num_posts = 3) {
  // 最新記事を取得するクエリ
  $recent_posts = new WP_Query(array(
      'posts_per_page' => $num_posts,  // 表示する投稿数を引数で変更可能に
      'post_status'    => 'publish',   // 公開された投稿のみ
  ));

  if ($recent_posts->have_posts()) {
      $output = '<ul class="recent-posts-list">';
      while ($recent_posts->have_posts()) {
          $recent_posts->the_post();
          $output .= '<li class="recent-post-item">';
          $output .= '<span class="post-date">' . get_the_date('Y,m,d') . '</span>';
          $output .= '<span class="post-category">' . get_the_category_list(', ') . '</span>';
          $output .= '<br>';
          $output .= '<a class="post-title" href="' . get_permalink() . '">' . get_the_title() . '</a>';
          $output .= '</li>';
      }
      $output .= '</ul>';
      
      // クエリをリセット
      wp_reset_postdata();
  } else {
      $output = '<p>新着記事はありません。</p>';
  }

  return $output;  // 関数の戻り値としてHTMLを返す
}


function display_news_list($category_slug = null) {
  // WP_Query to get all posts
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $args = array(
      'post_type' => 'post',
      'posts_per_page' => 10, // 表示する投稿数
      'orderby' => 'date',
      'order' => 'DESC',
      'paged' => $paged, // ページ番号を指定
  );

  if ($category_slug) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $category_slug,
        ),
    );
}

  $query = new WP_Query( $args );
  ob_start(); // バッファリング開始
  if ( $query->have_posts() ) :
      ?>
      <div id="news-list">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="news-item" data-id="<?php the_ID(); ?>">
                <div class="news-left">
                  <div class="news-thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></div>
                </div>
                <div class="news-right">
                  <div class="news-date"><?php echo get_the_date('Y.m.d'); ?></div>
                  <div class="news-category"><?php the_category(', '); ?></div>
                  <div class="news-title"><?php the_title(); ?></div>
                  <div class="news-excerpt"><?php the_excerpt(); ?></div>
                </div>
              </div>
          <?php endwhile; ?>
      </div>

      <div class="pagination">
            <?php
            // ページネーションリンクを表示
            echo paginate_links(array(
                'total' => $query->max_num_pages, // 総ページ数を指定
                'current' => max(1, get_query_var('paged')), // 現在のページ番号
                'format' => '?paged=%#%', // ページリンクのフォーマット
                'prev_text' => __('＜'), // 「前へ」リンクのテキスト
                'next_text' => __('＞'), // 「次へ」リンクのテキスト
            ));
            ?>
        </div>


      <?php
      wp_reset_postdata();
  endif;
  return ob_get_clean(); // バッファリングを終了し、出力を返す
}

function set_default_thumbnail_image ( $html ) {
  if ( "" === $html ) {
    $html = '<img src="' . get_template_directory_uri() . '/assets/images/no-image.webp" alt="デフォルトのアイキャッチ画像" />';
  }
  return $html;
}
add_filter( 'post_thumbnail_html', 'set_default_thumbnail_image' );

