<article class="cell small-12 medium-8 large-6">
	<?php
		if(has_excerpt() ){
			the_excerpt();
		}else{
		 the_content();
		}
	?>
</article>