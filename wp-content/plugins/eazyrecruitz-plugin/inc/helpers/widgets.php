<?php
///----Blog widgets---
//Recently Posted
class Eazyrecruitz_Recently_Posted extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_Recently_Posted', /* Name */esc_html__('Eazyrecruitz Recently Posted','eazyrecruitz'), array( 'description' => esc_html__('Show the Recently Posted', 'eazyrecruitz' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Recently Posted -->
        <div class="post-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					 
					$this->posts($query_string);
				?>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recently Posted', 'eazyrecruitz');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';
		?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'eazyrecruitz'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'eazyrecruitz'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'eazyrecruitz'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'eazyrecruitz'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
           
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <div class="post">
                <figure class="post-thumb" style="background-image:url(<?php echo esc_url($post_thumbnail_url);?>);"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"></a></figure>
                <span class="post-date"><?php echo get_the_date();?></span>
                <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h5>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Our Project
class Eazyrecruitz_Our_Projects extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_Our_Projects', /* Name */esc_html__('Eazyrecruitz Our Projects','eazyrecruitz'), array( 'description' => esc_html__('Show the Our Projects', 'eazyrecruitz' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Instagram Widget -->
        <div class="gallery-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <ul class="image-list clearfix">
                    <?php 
						$args = array('post_type' => 'eazyrecruitz_project', 'showposts'=>$instance['number']);
						if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
						 
						$this->posts($args);
					?>
                 </ul>
            </div>
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Our Projects';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Our Projects', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'eazyrecruitz'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'eazyrecruitz'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'eazyrecruitz'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php 
				while( $query->have_posts() ): $query->the_post(); 
				global $post; 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <li>
                <figure class="image-box">
                    <a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" data-fancybox="gallery">
                    	<?php the_post_thumbnail('eazyrecruitz_100x100'); ?>
                    </a>
                </figure>
            </li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//Educational Resources
class Eazyrecruitz_Educational_Resources extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_Educational_Resources', /* Name */esc_html__('Eazyrecruitz Educational Resources','eazyrecruitz'), array( 'description' => esc_html__('Show the Educational Resources', 'eazyrecruitz' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="sidebar-resource">
                <div class="inner-box centred">
                    <div class="pattern-layer">
                        <div class="pattern-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-47.png);"></div>
                        <div class="pattern-2" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-48.png);"></div>
                    </div>
                    <figure class="iocn-box"><img src="<?php echo esc_url($instance['icon_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                    <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                    <a href="<?php echo esc_url($instance['btn_link']); ?>"><?php echo wp_kses_post($instance['btn_title']); ?><i class="flaticon-direct-download"></i></a>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['icon_img'] = strip_tags($new_instance['icon_img']);
		$instance['title'] = $new_instance['title'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$icon_img = ($instance) ? esc_attr($instance['icon_img']) : 'http://www.el.commonsupport.com/newwp/eazyrecruitz/wp-content/uploads/2020/09/icon-68.png';
		$title = ($instance) ? esc_attr($instance['title']) : 'Educational Resources for Job Seekers';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon_img')); ?>"><?php esc_html_e('Icon Image Url:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Icon Image Url', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('icon_img')); ?>" name="<?php echo esc_attr($this->get_field_name('icon_img')); ?>" type="text" value="<?php echo esc_attr($icon_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Educational Resources for Job Seekers', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Guides & E-books', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
               
                
		<?php 
	}
	
}


///----footer widgets---
//About Company
class Eazyrecruitz_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_About_Company', /* Name */esc_html__('Eazyrecruitz About Company','eazyrecruitz'), array( 'description' => esc_html__('Show the About Company', 'eazyrecruitz' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="about-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="text">
                    <p><?php echo wp_kses_post($instance['content']); ?> <i class="fas fa-arrow-up"></i></p>
                    <p><?php echo wp_kses_post($instance['address']); ?></p>
                </div>
                <ul class="social-links clearfix">
                    <li><h5><?php esc_html_e('Connected:', ''); ?></h5></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://www.google-plus.com/" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
                        
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['content'] = $new_instance['content'];
		$instance['address'] = $new_instance['address'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Office';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('title:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Office', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eazyrecruitz'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'eazyrecruitz'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
               
                
		<?php 
	}
	
}

//For Employers
class Eazyrecruitz_For_Employers extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_For_Employers', /* Name */esc_html__('Eazyrecruitz For Employers','eazyrecruitz'), array( 'description' => esc_html__('Show the For Employers', 'eazyrecruitz' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="contact-widget">
                <div class="single-info-box">
                    <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                    <ul class="info-box clearfix">
                        <li><a href="tel:<?php echo esc_url($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a></li>
                        <li><a href="mailto:<?php echo esc_url($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a></li>
                    </ul>
                </div>
                <div class="single-info-box">
                    <div class="widget-title">
                        <h3><?php echo wp_kses_post($instance['sub_heading']); ?></h3>
                    </div>
                    <ul class="info-box clearfix">
                        <li><a href="tel:<?php echo esc_url($instance['phone_no1']); ?>"><?php echo wp_kses_post($instance['phone_no1']); ?></a></li>
                        <li><a href="mailto:<?php echo esc_url($instance['email_address1']); ?>"><?php echo wp_kses_post($instance['email_address1']); ?></a></li>
                    </ul>
                </div>
            </div>
                       
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['sub_heading'] = $new_instance['sub_heading'];
		$instance['phone_no1'] = $new_instance['phone_no1'];
		$instance['email_address1'] = $new_instance['email_address1'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'For Employers';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$sub_heading = ($instance) ? esc_attr($instance['sub_heading']) : '';
		$phone_no1 = ($instance) ? esc_attr($instance['phone_no1']) : '';
		$email_address1 = ($instance) ? esc_attr($instance['email_address1']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('title:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('For Employers', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Phone Number', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Address:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Email Address', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>     
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('sub_heading')); ?>"><?php esc_html_e('Sub Heading:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('For Employers', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sub_heading')); ?>" name="<?php echo esc_attr($this->get_field_name('sub_heading')); ?>" type="text" value="<?php echo esc_attr($sub_heading); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no1')); ?>"><?php esc_html_e('Phone Number:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Phone Number', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no1')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no1')); ?>" type="text" value="<?php echo esc_attr($phone_no1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address1')); ?>"><?php esc_html_e('Email Address:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Email Address', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address1')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address1')); ?>" type="text" value="<?php echo esc_attr($email_address1); ?>" />
        </p>   
              
		<?php 
	}
	
}


///----footer Two widgets---
//About Company Two
class Eazyrecruitz_About_Company_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_About_Company_V2', /* Name */esc_html__('Eazyrecruitz About Company V2','eazyrecruitz'), array( 'description' => esc_html__('Show the About Company V2', 'eazyrecruitz' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="about-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="text">
                    <p><?php echo wp_kses_post($instance['content']); ?> <i class="fas fa-arrow-up"></i></p>
                </div>
                <form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" method="post" class="subscribe-form">
                    <div class="form-group">
                        <input type="hidden" id="uri7" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                        <input type="email" name="email" placeholder="<?php esc_html_e('Enter Your Email...', 'eazyrecruitz'); ?>" required="">
                        <button type="submit"><i class="flaticon-right-arrow"></i><?php esc_html_e('Subscribe US', 'eazyrecruitz'); ?></button>
                    </div>
                </form>
            </div>
                        
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['content'] = $new_instance['content'];
		$instance['id'] = $new_instance['id'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Company';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$id = ($instance) ? esc_attr($instance['id']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('title:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('About Company', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eazyrecruitz'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
               
                
		<?php 
	}
	
}

//Call Back Form
class Eazyrecruitz_Callback_Form extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_Callback_Form', /* Name */esc_html__('Eazyrecruitz Call Back Form','eazyrecruitz'), array( 'description' => esc_html__('Show the Call Back Form', 'eazyrecruitz' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="callback-widget">
                <div class="pattern-layer">
                    <div class="pattern-1" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-25.png);"></div>
                    <div class="pattern-2"></div>
                    <div class="pattern-3"></div>
                    <div class="pattern-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/shape/pattern-23.png);"></div>
                </div>
                <div class="widget-content">
                    <div class="callback-form">
                        <?php echo do_shortcode($instance['contact_form_url2']); ?>
                    </div>
                </div>
            </div>
                        
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['contact_form_url2'] = $new_instance['contact_form_url2'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$contact_form_url2 = ($instance) ? esc_attr($instance['contact_form_url2']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_form_url2')); ?>"><?php esc_html_e('Contact Form 7 Url:', 'eazyrecruitz'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_form_url2')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_form_url2')); ?>" ><?php echo wp_kses_post($contact_form_url2); ?></textarea>
        </p>
               
                
		<?php 
	}
	
}


///----footer Three widgets---
//About Company Three
class Eazyrecruitz_About_Company_V3 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_About_Company_V3', /* Name */esc_html__('Eazyrecruitz About Company V3','eazyrecruitz'), array( 'description' => esc_html__('Show the About Company V3', 'eazyrecruitz' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="logo-widget">
                <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['footer_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></a></figure>
                <div class="text">
                    <p><?php echo wp_kses_post($instance['content']); ?></p>
                </div>
                <div class="upload-btn"><a href="<?php echo esc_url($instance['btn_link']); ?>"><i class="flaticon-cloud-computing"></i><?php echo wp_kses_post($instance['btn_title']); ?></a></div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['footer_logo_img'] = strip_tags($new_instance['footer_logo_img']);
		$instance['content'] = $new_instance['content'];
		$instance['btn_link'] = $new_instance['btn_link'];
		$instance['btn_title'] = $new_instance['btn_title'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$footer_logo_img = ($instance) ? esc_attr($instance['footer_logo_img']) : 'http://www.el.commonsupport.com/newwp/eazyrecruitz/wp-content/uploads/2020/09/footer-logo.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : 'Upload Resume';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('footer_logo_img')); ?>"><?php esc_html_e('Logo Image Url:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('footer_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('footer_logo_img')); ?>" type="text" value="<?php echo esc_attr($footer_logo_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'eazyrecruitz'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Button Title', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
                
		<?php 
	}
	
}

//Recent Post 
class Eazyrecruitz_Recent_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_Recent_Post', /* Name */esc_html__('Eazyrecruitz Recent Post','eazyrecruitz'), array( 'description' => esc_html__('Show the Recent Post', 'eazyrecruitz' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Trending Posts -->
        <div class="post-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="post-inner">
                <?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					 
					$this->posts($query_string);
				?>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent Post', 'eazyrecruitz');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'eazyrecruitz'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'eazyrecruitz'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'eazyrecruitz'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'eazyrecruitz'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <div class="post">
                <figure class="image-box" style="background-image:url(<?php echo esc_url($post_thumbnail_url);?>);"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"></a></figure>
                <span class="post-date"><?php echo get_the_date();?></span>
                <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h5>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}


///----Service Sidebar widgets---
//Services SideBar
class Eazyrecruitz_services_sidebar extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Eazyrecruitz_services_sidebar', /* Name */esc_html__('Eazyrecruitz Services Sidebar', 'eazyrecruitz'), array( 'description' => esc_html__('Show the Services Sidebar', 'eazyrecruitz')));
    }

    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);

        echo wp_kses_post($before_widget); ?>

        <div class="categories-widget">
            <ul class="categories-list clearfix">
                <?php
                $args = array('post_type' => 'eazyrecruitz_service', 'showposts'=>$instance['number']);
				if ($instance['cat']) {
					$args['tax_query'] = array(array('taxonomy' => 'service_cat','field' => 'id','terms' => (array)$instance['cat']));
				}
				$this->posts($args); ?>
            </ul>
        </div>

        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }
    /** @see WP_Widget::form */
    public function form($instance)
    {
        $number = ($instance) ? esc_attr($instance['number']) : 6;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'eazyrecruitz'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'eazyrecruitz'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'eazyrecruitz'), 'selected'=>$cat, 'taxonomy' => 'service_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($args)
    {
        $query = new WP_Query($args);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php 
				global $post; 
				while( $query->have_posts() ): $query->the_post(); 
			?>
            <li><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true ));?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}

//Place a Job
class Eazyrecruitz_Place_a_Job extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Eazyrecruitz_Place_a_Job', /* Name */esc_html__('Eazyrecruitz Place a Job','eazyrecruitz'), array( 'description' => esc_html__('Show the Place a Job', 'eazyrecruitz' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="recruitment-widget">
                <div class="widget-content">
                    <div class="text">
                        <div class="pattern-layer" style="background-image: url(<?php echo esc_url($instance['bg_img']); ?>);"></div>
                        <figure class="image-box"><img src="<?php echo esc_url($instance['men_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'eazyrecruitz'); ?>"></figure>
                        <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                    </div>
                    <div class="link">
                        <a href="<?php echo esc_url($instance['btn_link']); ?>"><i class="flaticon-right-arrow"></i><?php echo wp_kses_post($instance['btn_title']); ?></a>
                    </div>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['bg_img'] = strip_tags($new_instance['bg_img']);
		$instance['men_img'] = strip_tags($new_instance['men_img']);
		$instance['title'] = $new_instance['title'];
		$instance['btn_title'] = $new_instance['btn_title'];
		$instance['btn_link'] = $new_instance['btn_link'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$bg_img = ($instance) ? esc_attr($instance['bg_img']) : 'http://www.el.commonsupport.com/newwp/eazyrecruitz/wp-content/uploads/2020/09/pattern-43.png';
		$men_img = ($instance) ? esc_attr($instance['men_img']) : 'http://www.el.commonsupport.com/newwp/eazyrecruitz/wp-content/uploads/2020/09/men-1.png';
		$title = ($instance) ? esc_attr($instance['title']) : 'Recruitment Solutions for All Industries...';
		$btn_title = ($instance) ? esc_attr($instance['btn_title']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bg_img')); ?>"><?php esc_html_e('background Image Url:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('background Image Url', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('bg_img')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_img')); ?>" type="text" value="<?php echo esc_attr($bg_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('men_img')); ?>"><?php esc_html_e('Men Image Url:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Men Image Url', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('men_img')); ?>" name="<?php echo esc_attr($this->get_field_name('men_img')); ?>" type="text" value="<?php echo esc_attr($men_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Recruitment Solutions for All Industries...', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title')); ?>"><?php esc_html_e('Button Title:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('Place a Job Order', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title')); ?>" type="text" value="<?php echo esc_attr($btn_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'eazyrecruitz'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'eazyrecruitz');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
               
                
		<?php 
	}
	
}

