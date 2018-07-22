<aside class="cell small-12 medium-6 callout">
	<h3>Supporting Resources</h3>
<?php
	/* Dev Note: This became cumbersome, as the information never changes. Still, should the client wish to go backwards to a time of dynamically generated resources, we have them here*/
	if( have_rows('resource') ):
?>
	<dl>
	<?php
		while ( have_rows('resource') ) : the_row(); ?>
		<dt><?php the_sub_field('name'); ?>: <a href="<?php the_sub_field('href'); ?>"><?php the_sub_field('href'); ?></a></dt>
<?php endwhile; ?>
	</dl>
<?php	else: ?>
	<dl>
		<dt>Company: <a href="https://alation.com/?__hstc=165967457.3351a2124ace9ada46e1042dea0fa949.1503098724838.1505669272819.1505675420057.84&amp;__hssc=165967457.8.1505675420057&amp;__hsfp=3872631867">https://alation.com</a></dt>
		<dt>Twitter: <a href="https://twitter.com/Alation">https://twitter.com/Alation</a></dt>
		<dt>LinkedIn: <a href="https://www.linkedin.com/company/alation">https://www.linkedin.com/company/alation</a></dt>
	</dl>
<?php endif; ?>
</aside>