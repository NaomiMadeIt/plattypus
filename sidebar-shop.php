<aside id="sidebar">
  <?php //hide the button if viewing the products archive
  if( ! is_post_type_archive('product')){ ?>
  <section class="widget">
    &larr; View All Products
  </section>
  <?php }//end if not  products archeve ?>
  <section class="widget">
    <h3 class="widget-title">Brands:</h3>
    <ul>
      <?php wp_list_categories( array(
        'taxonomy'    => 'brand',
        'title_li'    => '',
      )); ?>
    </ul>
    <h3 class="widget-title">Features:</h3>
    <ul>
      <?php wp_list_categories( array(
        'taxonomy'    => 'feature',
        'title_li'    => '',
      )); ?>
    </ul>
  </section>
</aside>
