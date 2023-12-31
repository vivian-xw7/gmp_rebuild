<?php
/*
Template Name: Main Archive
*/


$investment_args = array(
    'post_type' => 'investments',
    'posts_per_page' => -1,
);
$investment_query = new WP_Query($investment_args);

$experience_args = array(
    'post_type' => 'operating-experience',
    'posts_per_page' => -1,
);
$experience_query = new WP_Query($experience_args);
?>

<div class="custom-main-content">
    <h1>Investments</h1>
    <ul>
        <?php
        if ($investment_query->have_posts()) :
            while ($investment_query->have_posts()) :
                $investment_query->the_post();
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'No investments found.';
        endif;
        ?>
    </ul>

    <h1>Operating Experience</h1>
    <ul>
        <?php
        if ($experience_query->have_posts()) :
            while ($experience_query->have_posts()) :
                $experience_query->the_post();
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'No operating experience found.';
        endif;
        ?>
    </ul>
</div>


