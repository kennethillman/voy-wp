<?php
/*
 * Template Name: Stories Page
 * */
get_header();
?>

<?php get_template_part('parts/s-featured-image'); ?>
<?php get_template_part('parts/s-breadcrumbs'); ?>

<article class="s- content p-stories">
    <?php get_template_part('parts/s-no-featured-image'); ?>

    <div class="gc" >
        <div class="g-8 g-push-2 g-m-12 g-m-push-0 g-t-10 g-t-push-1" >
            <?php
                while (have_posts()) :
                    the_post();
                    the_content();
                endwhile;
            ?>
        </div>
    </div>


<!--     <section class="s-stories-teaser-big">

        <div class="m-stories-teaser-big">
            <div class="gc">
                <div class="g-4">
                    <figure class="-round">
                        <img src="http://voy-wp:8888/wp-content/uploads/2019/05/Soninke-1.jpg">
                    </figure>
                </div>
                <div class="g-8">
                    <div class="header"><h3 class="-block">Soninke Combrinck</h3> Feb 15, 2019 / UX Designer / North
                        Kingdom
                    </div>
                    <p>Working with Voy Talent was great. The two co-founders helped me land my
                        dream job on the other side of the world, in the northernmost part of Sweden. I couldn’t be
                        further away from my home
                        in sunny South Africa. Despite the drastic switch in culture, climate, and well, everything, I
                        am hungry to start my new life as a UX Design intern at North Kingdom in the Lapland town of
                        Skellefteå.

                    </p>
                    <p>I wouldn’t be here if it wasn’t for a red thread that tied me to the people
                        that led me here. The connections I built and the people I met all led me to this moment. A
                        lecturer at Harbour.Space University led to a digital talent agency called Voy Talent, which
                        steered me to this connection in northern Sweden. The conversations I had
                        with the pioneers behind Voy Talent helped me prepare for the job I wanted. The two remarkable
                        women facilitated my transition from being a student to being a part of an international team of
                        talented people at a recognised design and communications agency.</p>

                </div>
            </div>
        </div>

        <br/>
        <br/>

        <div class="m-stories-teaser-big">
            <div class="gc">
                <div class="g-8">
                    <div class="header"><h3 class="-block">Clara Nordlander Wiberg</h3> Video Director &amp; Social
                        Media Strategist
                    </div>
                    <p>It was such a pleasure collaborating with Voy! Both Pernilla and Stella are efficient,
                        professional and caring people. They introduced me to an amazing position at EF Educations and I
                        still can't believe how lucky I was connecting with them. During the whole recruiting process
                        they supported and advised me and they literally helped me change my life into something I only
                        dreamt of. Now I'm really satisfied with my new country, in my new position and company and even
                        though I really recommend Voy I think it will take a long time until I need their service again.
                        A great review for a company who works with recruitment!</p>

                </div>
                <div class="g-4">
                    <figure class="-round">
                        <img src="http://voy-wp:8888/wp-content/uploads/2019/05/clara-1.jpg">
                    </figure>
                </div>
            </div>
        </div>

    </section> -->

</article>

<?php
get_footer();
?>
