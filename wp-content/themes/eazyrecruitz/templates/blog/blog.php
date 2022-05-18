<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage EAZYRECRUITZ
 * @author     Theme Kalia
 * @version    1.0
 */

if ( class_exists( 'Eazyrecruitz_Resizer' ) ) {
	$img_obj = new Eazyrecruitz_Resizer();
} else {
	$img_obj = array();
}
	$allowed_tags = wp_kses_allowed_html('post');
	global $post;

?>

<?php
    $format = get_post_format(get_the_id());
    if ($format == 'video') :
?>

<div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
    <div class="inner-box">
        <figure class="image-box">
            <a href="<?php echo (get_post_meta(get_the_id(), 'video_link', true)); ?>" class="lightbox-image video-btn" data-caption="">
                <?php the_post_thumbnail('eazyrecruitz_1170x600'); ?>
            </a>
            <span class="post-date"><?php echo get_the_date('d'); ?><br /><?php echo get_the_date('M'); ?></span>
        </figure>
        <div class="lower-content">
            <div class="inner">
                <?php if( has_category() ):?><div class="category"><i class="flaticon-note"></i><p><?php the_category(' '); ?></p></div><?php endif; ?>
                <h2><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                <ul class="post-info clearfix">
                    <li>
                    	<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
							<?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                        <?php endif; ?>
                    	<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>">
							<?php the_author(); ?>
                        </a>
                    </li>
                    <li><i class="far fa-comment"></i><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'eazyrecruitz'), true), wp_kses(__('1 Comment' , 'eazyrecruitz'), true), wp_kses(__('% Comments' , 'eazyrecruitz'), true)); ?></a></li>
                </ul>
                <?php if(function_exists('bunch_share_us')):?>
                <div class="share-box">
                    <a href="javascript():;" class="share-link"><i class="fas fa-share-alt"></i></a>
                    <?php echo wp_kses(bunch_share_us(get_the_id(),$post->post_name ), true);?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php elseif ($format == 'gallery') : ?>

<div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
    <div class="inner-box">
        <div class="banner-carousel owl-carousel owl-theme owl-dots-none">
            <?php $gall_images = (get_post_meta(get_the_id(), 'gallery_imgs', true));
				$gall_images = explode(',', $gall_images);
				if ($gall_images) :
				foreach ($gall_images as $gall) :
			?>
            <figure class="image-box">
                <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php echo wp_get_attachment_image($gall, 'eazyrecruitz_1170x600');  ?></a>
                <span class="post-date"><?php echo get_the_date('d'); ?><br /><?php echo get_the_date('M'); ?></span>
            </figure>
            <?php endforeach; endif; ?>
        </div>
        <div class="lower-content">
            <div class="inner">
                <?php if( has_category() ):?><div class="category"><i class="flaticon-note"></i><p><?php the_category(' '); ?></p></div><?php endif; ?>
                <h2><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                <ul class="post-info clearfix">
                    <li>
                    	<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
							<?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                        <?php endif; ?>
                    	<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>">
							<?php the_author(); ?>
                        </a>
                    </li>
                    <li><i class="far fa-comment"></i><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'eazyrecruitz'), true), wp_kses(__('1 Comment' , 'eazyrecruitz'), true), wp_kses(__('% Comments' , 'eazyrecruitz'), true)); ?></a></li>
                </ul>
                <?php if(function_exists('bunch_share_us')):?>
                <div class="share-box">
                    <a href="javascript():;" class="share-link"><i class="fas fa-share-alt"></i></a>
                    <?php echo wp_kses(bunch_share_us(get_the_id(),$post->post_name ), true);?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php else: ?>

<div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
    <div class="inner-box">
        <?php if( has_post_thumbnail() ):?>
        <figure class="image-box">
            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_post_thumbnail('eazyrecruitz_1170x600'); ?></a>
            <span class="post-date"><?php echo get_the_date('d'); ?><br /><?php echo get_the_date('M'); ?></span>
        </figure>
        <?php endif;?>
        <div class="lower-content">
            <div class="inner">
                <?php if( has_category() ):?><div class="category"><i class="flaticon-note"></i><p><?php the_category(' '); ?></p></div><?php endif; ?>
                <h2><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                <ul class="post-info clearfix">
                    <li>
                    	<?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
							<?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                        <?php endif; ?>
                    	<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>">
							<?php the_author(); ?>
                        </a>
                    </li>
                    <li><i class="far fa-comment"></i><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><?php comments_number( wp_kses(__('0 Comments' , 'eazyrecruitz'), true), wp_kses(__('1 Comment' , 'eazyrecruitz'), true), wp_kses(__('% Comments' , 'eazyrecruitz'), true)); ?></a></li>
                </ul>
                <?php if(function_exists('bunch_share_us')):?>
                <div class="share-box">
                    <a href="javascript():;" class="share-link"><i class="fas fa-share-alt"></i></a>
                    <?php echo wp_kses(bunch_share_us(get_the_id(),$post->post_name ), true);?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>