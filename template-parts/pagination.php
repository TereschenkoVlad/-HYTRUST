<?php

get_header(); ?>

  <!-- site-content -->
  <div class="site-content clearfix">



        <?php

          $ourCurrentPage = get_query_var('page');

          $aboutPosts = new WP_Query(array(
            'category_name' => 'News',
            'posts_per_page' => 3,
            'page' => $ourCurrentPage
          ));

          if ($aboutPosts->have_posts()) :
            while ($aboutPosts->have_posts()) :
              $aboutPosts->the_post();
              ?> <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li> <?php
            endwhile;

            echo paginate_links(array(
              'total' => $aboutPosts->max_num_pages
            ));

          endif;

        ?>

  </div>

<?php get_footer();?>