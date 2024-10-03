jQuery(document).ready(function($) {
  var currentPage = {
    'all': 1,
    'category1': 1,
    'category2': 1,
    'category3': 1
  };

  function loadTabContent(tabId) {
    var category = $('.tab-link.active').data('category');
    var page = currentPage[category];

    $.ajax({
      url: ajax_object.ajax_url, // AJAX URL
      type: 'POST',
      data: {
        action: 'load_news_list',
        category: category,
        page: page
      },
      success: function(data) {
        $('#' + tabId).html(data);
      }
    });
  }

  $('.tab-link').click(function() {
    var tab_id = $(this).attr('data-tab');

    // すべてのタブリンクとコンテンツを非アクティブ化
    $('.tab-link').removeClass('active');
    $('.tab-content').removeClass('active');

    // クリックされたタブリンクと対応するコンテンツをアクティブ化
    $(this).addClass('active');
    $('#' + tab_id).addClass('active');

    // 現在のページをリセット
    var category = $(this).data('category');
    currentPage[category] = 1; // 現在のページを1にリセット

    // タブコンテンツをロード
    loadTabContent(tab_id);
  });

  $(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var category = $('.tab-link.active').data('category');
    var page = $(this).attr('data-page'); // データ属性からページ番号を取得
    currentPage[category] = page; // 現在のページを更新

    // タブコンテンツを再ロード
    loadTabContent($('.tab-link.active').data('tab'));
  });
});
