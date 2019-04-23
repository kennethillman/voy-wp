<?php
    get_header();
    global $wp_query;
?>
    <div class="wapper">
        <div class="contentarea clearfix">
            <div class="s-search-result content ">

              <div class="gc">
                <div class="g-12">
                  <div class="m-list -search">

                    <h3 class="m-list-header"><?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: <span>"<?php the_search_query(); ?>"</span> </h3>

                    <?php if ( have_posts() ) { ?>
                        <ul>
                            <?php while ( have_posts() ) { the_post(); ?>

                                <li>
                                  <a href="<?php echo get_permalink(); ?>">
                                    <!-- <?php  the_post_thumbnail('medium') ?> -->
                                    <div class="text"><strong class="-block"><?php the_title();  ?> </strong> <?php echo substr(get_the_excerpt(), 0,200); ?></div>
                                    <span class="btn -orange -icon-only">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"></path></svg>
                                    </span>
                                  </a>
                                </li>

                            <?php } ?>

                        </ul>
                      <?php echo paginate_links(); ?>
                    <?php } ?>

                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
<?php
    get_footer();
?>
