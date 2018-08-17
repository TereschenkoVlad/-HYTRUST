<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chefeedback
 */

?>
	<div class="entry-content">
        <?php
		    the_content();
		?>
        <section class="welcome-section" style="
                background: url('<?php echo get_the_post_thumbnail_url( get_the_ID()); ?>')">
            <div class="container">
                <div class="small-container">
                    <h2><?php the_title(); ?></h2>
                    <?php dynamic_sidebar('sidebar-4'); ?>
                </div>
            </div>
        </section>
        <div class="main-div" >

            <section class="post-section">
                <div class="post-container">
                    <?php dynamic_sidebar('title-for-post') ?>
                    <div class="posts">
                        <h4>Filter Posts by Tag</h4>
                        <form action="" method="GET" id="taglist">
                            <select name="poststag" id="poststag">
                                <option value="" <?php echo ($_GET['poststag'] == '') ? ' selected="selected"' : ''; ?>></option>
                                <?php
                                $tags = get_tags();
                                foreach ($tags as $tag) :
                                    echo '<option value="'.$tag->name.'"';
                                    echo ($_GET['poststag'] == ''.$tag->name.'') ? ' selected="selected"' : '';
                                    echo '>'.$tag->name.'</option>';
                                endforeach;
                                ?>
                            </select>

                            <h4>Filter Posts by Category<b>*</b></h4>
                            <select name="postscat" id="postscat">
                                <option value=" <?php echo ($_GET['postscat'] == '') ? ' selected="selected"' : '' ; ?>">Show all</option>
                                <?php
                                $categories = get_categories( );
                                foreach ($categories as $category) :
                                    echo '<option value="'.$category->name.'"';
                                    echo ($_GET['postscat'] == ''.$category->name.'') ? ' selected="selected"' : '';
                                    echo '>'.$category->name.'</option>';
                                endforeach;
                                ?>
                            </select>
                            <button type="submit">Search</button>
                        </form>

                        <?php // let the queries begin
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                        if ( $_GET['postscat']) {
                            $newslist = new WP_Query( array(
                                'post_type' => 'post',
                                'category_name' => $_GET['postscat'],
                                'tag' => $_GET['poststag'],
                                'posts_per_page' => 4,
                                'orderby' => 'DATE',
                                'paged' => $paged
                            ) );

                        ?>
                        <ul>
                        <?php

                        while ($newslist->have_posts()) : $newslist->the_post();
                            ?>

                            <?php get_template_part('template-parts/post', 'view') ?>

                        <?php endwhile; ?>
                        </ul>

                       <?php
                        } else {
                        echo '<p>Пусто, як у банці!</p>';
                        }
                        ?>
                        <?php wp_reset_postdata(); ?>

                        <?php
                        $temp = $wp_query;
                        $wp_query = null;
                        $wp_query = new WP_Query();
                        $wp_query->query('showposts=4&post_type=post'.'&paged='.$paged);

                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            ?>

                            <?php get_template_part('template-parts/post', 'view') ?>

                        <?php endwhile; ?>

                        <nav>
                            <?php previous_posts_link('&laquo; Newer') ?>
                            <?php next_posts_link('Older &raquo;') ?>
                        </nav>

                        <?php
                        $wp_query = null;
                        $wp_query = $temp;  // Reset
                        ?>
                    </div>






                    <?php  dynamic_sidebar('under-post'); ?>
                    <?php get_template_part( 'template-parts/contact', 'forms'); ?>
                </div>
            </section>
            <section class="side-bar">
                <div class="sidebar-container">
                    <?php get_sidebar('right'); ?>
                </div>
            </section>

        </div>
	</div>