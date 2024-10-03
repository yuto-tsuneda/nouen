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


function load_posts_ajax_handler() {
  $category = sanitize_text_field($_POST['category']);
  $paged = (isset($_POST['page'])) ? intval($_POST['page']) : 1;

  $args = array(
      'posts_per_page' => 10,
      'paged' => $paged,
      'orderby' => 'date',
      'order' => 'DESC',
  );

  if ($category !== 'all') {
      $args['category_name'] = $category;
  }

  $posts = new WP_Query($args);

  $response = array(
      'posts' => '',
      'pagination' => '',
  );

  if ($posts->have_posts()) {
      while ($posts->have_posts()) : $posts->the_post();
          $response['posts'] .= '<div class="post__item">';

          // アイキャッチ画像を追加
          if (has_post_thumbnail()) {
              $response['posts'] .= '<div class="post__item__left">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail'); // サムネイルサイズでアイキャッチを表示
          } else {
              // アイキャッチ画像がない場合のデフォルト画像
              $response['posts'] .= '<div class="post__item__left">' . '<img src="' . get_template_directory_uri() . '/assets/images/no-image.webp" alt="デフォルト画像" />'; // 適切なデフォルト画像のパスを指定
          }
          $response['posts'] .= '</div>'; 
          $response['posts'] .= '<div class="post__item__right">'; 
          // 投稿日
          $response['posts'] .= '<span class="post__item__date">' . get_the_date('Y.m.d') . '</span>'; 
          // カテゴリー
          $response['posts'] .= '<span class="post__item__category">' . get_the_category_list(', ') . '</span>'; 
          // タイトル
          $response['posts'] .= '<h2 class="post__item__title">' . get_the_title() . '</h2>'; 
          // 本文（抜粋）
          $response['posts'] .= '<p class="post__item__excerpt">' . get_the_excerpt() . '</p>'; 
          $response['posts'] .= '</div>'; 
          $response['posts'] .= '</div>';
      endwhile;

      // ページネーションを生成
      $pagination = paginate_links(array(
          'total' => $posts->max_num_pages,
          'current' => $paged,
          'format' => '?paged=%#%',
          'type' => 'array',
      ));

      if ($pagination) {
          $response['pagination'] = '<div class="pagination">';
          foreach ($pagination as $link) {
              if (preg_match('/paged=(\d+)/', $link, $matches)) {
                  $page_number = $matches[1];
                  $response['pagination'] .= '<a href="#" class="pagination-link" data-page="' . $page_number . '">' . $page_number . '</a>';
              } else {
                  $response['pagination'] .= '<span class="pagination-current">' . strip_tags($link) . '</span>';
              }
          }
          $response['pagination'] .= '</div>';
      }

      wp_reset_postdata();
  }

  wp_send_json($response);
}



add_action('wp_ajax_load_posts', 'load_posts_ajax_handler');
add_action('wp_ajax_nopriv_load_posts', 'load_posts_ajax_handler');



function enqueue_my_scripts() {
    wp_enqueue_script('my-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);

    // AJAX URLをスクリプトに渡す
    wp_localize_script('my-custom-js', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'enqueue_my_scripts');

// お知らせ一覧ページ
