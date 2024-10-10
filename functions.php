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

  if(is_single()){
    wp_enqueue_style('single-style', $theme_directory . '/assets/css/single.css', array('common-style'));
    wp_enqueue_script('single-script', $theme_directory . '/assets/js/single.js', array('jquery'), null, true);
  }

  if(is_page('contactthanks')){
    wp_enqueue_style('contactthanks-style', $theme_directory . '/assets/css/contactthanks.css', array('common-style'));
    wp_enqueue_script('contactthanks-script', $theme_directory . '/assets/js/contact.js', array('jquery'), null, true);
  }

  if(is_page('contactcheck')){
    wp_enqueue_style('contactcheck-single-style', $theme_directory . '/assets/css/contactcheck.css', array('common-style'));
    wp_enqueue_script('contactcheck-script', $theme_directory . '/assets/js/contact.css', array('jquery'), null, true);
  }

  if(is_404()){
    wp_enqueue_style('404-style', $theme_directory . '/css/404.css', array('common-style'));
    wp_enqueue_script('404-script', $theme_directory . '/js/404.js', array('jquery'), null, true);
  }

  if(is_page('information')){
    wp_enqueue_style('thankspage-style', $theme_directory. '/assets/css/information.css', array('common-style'));
    wp_enqueue_script('thankspage-script', $theme_directory. '/assets/js/information.js', array('jquery'), null, true);
  }

  if(is_page('contact')){
    wp_enqueue_style('contactcf7-style', $theme_directory. '/assets/css/contact.css', array('common-style'));
    wp_enqueue_script('contactcf7-script', $theme_directory. '/assets/js/contact.js', array('jquery'), null, true);
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
                <div class="top__inner__flex">
                <p class="top__inner__h2">NEWS</p>
                <p class="top__inner__day"><span class="top__inner__day__sp">更新日: </span><?php echo get_the_modified_date('Y.m.d'); ?></p>
                </div>
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
          $output .= '<span class="post-date">' . get_the_date('Y.m.d') . '</span>';
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
              $response['posts'] .= '<div class="post__item__left"><a href="' .get_permalink() .'">' . get_the_post_thumbnail(get_the_ID(), 'full') . "</a>"; // サムネイルサイズでアイキャッチを表示
          } else {
              // アイキャッチ画像がない場合のデフォルト画像
              $response['posts'] .= '<div class="post__item__left"><a href="' .get_permalink() .'">' . '<img src="' . get_template_directory_uri() . '/assets/images/no-image.webp" alt="デフォルト画像" /></a>';  // 適切なデフォルト画像のパスを指定
          }
          $response['posts'] .= '</div>'; 
          $response['posts'] .= '<div class="post__item__right">'; 
          // 投稿日
          $response['posts'] .= '<span class="post__item__date">' . get_the_date('Y.m.d') . '</span>'; 
          // カテゴリー
          $response['posts'] .= '<span class="post__item__category">' . get_the_category_list(', ') . '</span>'; 
          // タイトル
          $response['posts'] .= '<h2 class="post__item__title"><a href=" '.get_permalink() .'">' . get_the_title() . '</a></h2>'; 
          // 本文（抜粋）
          $response['posts'] .= '<p class="post__item__excerpt"><a href="' .get_permalink() .'">' . get_the_excerpt() . '</a></p>'; 
          $response['posts'] .= '</div>'; 
          $response['posts'] .= '</div>';
      endwhile;

      // ページネーションの生成部分
      $pagination_html = '<div class="pagination">';

      // 前のページがある場合のみ「戻る」を表示
      if ($paged > 1) {
          $pagination_html .= '<a href="#" class="pagination-prev" data-page="' . ($paged - 1) . '"><</a>';
      }

      // ページ番号を表示
      for ($i = 1; $i <= $posts->max_num_pages; $i++) {
          if ($i === $paged) {
              $pagination_html .= '<span class="pagination-current">' . $i . '</span>'; // 現在のページ
          } else {
              $pagination_html .= '<a href="#" class="pagination-link" data-page="' . $i . '">' . $i . '</a>'; // 他のページ
          }
      }

      // 次のページがある場合のみ「次」を表示
      if ($paged < $posts->max_num_pages) {
          $pagination_html .= '<a href="#" class="pagination-next" data-page="' . ($paged + 1) . '"> ></a>';
      }

      $pagination_html .= '</div>';

      // 新しいページネーションをレスポンスに設定
      $response['pagination'] = $pagination_html;

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

function my_custom_category_list() {
  $categories = get_the_category();
  if ( ! empty( $categories ) ) {
      $category_list = array();
      foreach ( $categories as $category ) {
          $category_list[] = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
      }
      echo implode( ', ', $category_list );
  }
}


function setup_theme() {
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'setup_theme');



function custom_wpcf7_validation_error_email($result, $tag)
{
    if ('your-email' == $tag->name) {
        if (empty($_POST[$tag->name])) {
            $result->invalidate($tag, '正しいメールアドレスを入力してください。');
        }
    }
        return $result;
}
add_filter('wpcf7_validate_email', 'custom_wpcf7_validation_error_email', 10, 2);


