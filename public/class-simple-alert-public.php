<?php
/**
 * The public-facing functionality of the plugin.
 */
class Simple_Alert_Public{

	public function __construct() {
		add_action('wp_footer',array($this,'show_alert_box'));

	}
	public function show_alert_box(){
		$post_id 	=	get_the_ID();
		$save_post_types 	=	get_option('sa_post_types');
		$save_single_post 	=	get_option('sa_single_post');

		if(in_array('post',$save_post_types)){
			if(is_single()){
				if($save_single_post){
					if(in_array($post_id,$save_single_post)){
						Simple_Alert_Public::alert_box();
					}
				}
			}
		}
		if(in_array('page',$save_post_types)){
			if(is_page()){
				if($save_single_post){
					if(in_array($post_id,$save_single_post)){
						Simple_Alert_Public::alert_box();
					}
				}
			}
		}
		$post_types = get_post_types( array('public'   => true,'_builtin' => false), 'names', 'and' );

		if(!empty($post_types)){
			foreach($post_types as $post_type){
				if(in_array($post_type,$save_post_types)){
					if(is_singular($post_type)){
						if($save_single_post){
							if(in_array($post_id,$save_single_post)){
								Simple_Alert_Public::alert_box();
							}
						}
					}
				}	
			}
		}
	}
	public function alert_box(){
		$simple_alert_text=get_option('simple_alert_text');
		if($simple_alert_text){
		?>
		<script type="text/javascript">
			alert('<?php echo $simple_alert_text; ?>');
		</script>
		<?php	
		}
		
	}

}
