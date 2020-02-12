<?php
/**
 * The admin-specific functionality of the plugin.
 */
class Simple_Alert_Admin {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_settings_page' ) );
	}
	public function add_admin_settings_page(){
		add_options_page( 'Simple Alert Settings','Simple Alert', 'manage_options', 'simple-alert',array($this,'simple_alert_settings') );
	}
	public function simple_alert_settings(){
		$post_types = get_post_types( array('public'   => true,'_builtin' => false), 'names', 'and' );
		?>
		<div class="wrap">
			<h1><?php echo __('Simple Alert Settings','simple-alert'); ?></h1>
			<h3><?php echo __('Select below post type to show alert','simple-alert'); ?></h3>
			<form method="post">
				<?php 
				if(isset($_POST['alerttext'])){
					update_option('simple_alert_text',$_POST['alerttext']);
					if(isset($_POST['sa_set_posts'])){
						update_option('simple_alert_is_posts',$_POST['sa_set_posts']);	
					}
				}
				
				$save_posts 	=	get_option('simple_alert_is_posts');

				if(in_array('post',$save_posts)){
					$is_posts=1;
				}
				else{
					$is_posts=0;
				}
				if(in_array('page',$save_posts)){
					$is_pages=1;
				}
				else{
					$is_pages=0;
				}
				?>
				<table class="form-table" role="presentation"><tbody>
					<tr>
					<th scope="row"><label for="alerttext">Alert Text</label></th>
					<td><input name="alerttext" type="text" id="alerttext" aria-describedby="alert-text" class="regular-text" value="<?php echo get_option('simple_alert_text'); ?>">
					<p class="description" id="alert-text">This text will be show in alert box</p></td>
					</tr>
					<tr>
						<th scope="row"><label for="setposts">Posts</label></th>
						<td>
							<label for="sa_set_posts"><input name="sa_set_posts[]" type="checkbox" id="sa_set_posts" value="post" <?php if($is_posts==1){ echo 'checked'; }?>> show alert in posts</label>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="setpages">Pages</label></th>
						<td>
							<label for="sa_set_pages"><input name="sa_set_posts[]" type="checkbox" id="sa_set_pages" value="page" <?php if($is_pages==1){ echo 'checked'; }?>> show alert in pages</label>
						</td>
					</tr>
					<?php

					if(!empty($post_types)){
						foreach($post_types as $post_type){
							?>
							<tr>
								<th scope="row"><label for="set<?php echo $post_type; ?>"><?php echo $post_type; ?></label></th>
								<td>
									<label for="sa_set_<?php echo $post_type; ?>"><input name="sa_set_posts[]" type="checkbox" id="sa_set_<?php echo $post_type; ?>" value="<?php echo $post_type; ?>"<?php if(in_array($post_type,$save_posts)){ echo 'checked'; } ?>> show alert in <?php echo $post_type; ?></label>
								</td>
							</tr>
							<?php
						}
					}

					?>
					<tr>
						<th scope="row"></th>
						<td><?php  submit_button(); ?></td>
					</tr>
				</tbody></table>
			</form>
		</div>
		<?php
	}

}