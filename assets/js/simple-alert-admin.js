;jQuery(document).ready(function(){
	(function($){
		$('input[name="sa_set_posts[]"').change(function(){
			if ($(this).is(':checked')) {
				$(this).parents('td').children('.sa_post_ul_li').show(300);
			}
			else{
				$(this).parents('td').children('.sa_post_ul_li').hide(300);
			}
		});

		$('input[name="sa_select_all[]"').change(function(){
			if ($(this).is(':checked')) {
				$(this).parents('ul').children('li').children('label').children('.sa_single_post_cb').prop("checked", true);
			}
			else{
				$(this).parents('ul').children('li').children('label').children('.sa_single_post_cb').prop("checked", false);
			}
		});
		
		$.each($('input[name="sa_set_posts[]"]:checked'),function(i){
			$(this).parents('td').children('.sa_post_ul_li').show();
		});

	}(jQuery))
});