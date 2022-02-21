<!-- content-modules-image -->
<?php extract( $template_args ) ?>
<?php //var_dump( $template_args ) ?>
<?php 
	$val = isset( $v ) && !empty( $v ) ? $v : 'video'; 

	$class = isset( $c ) && !empty( $c ) ? 'class="'.$c.'"' : ''; 
?>
<?php $option = isset( $o ) && !empty( $o ) ? $o : false; ?>
<?php $ww = isset( $w ) && !empty( $w ) ? $w : false; ?>
<?php $wclass = isset( $wc ) && !empty( $wc ) ? $wc : ''; ?>
<?php 
	if( 'o' == $option ){
		$video = get_field( $val, 'option' );
	} 
	elseif( 'f' == $option ){
		$video = get_field( $val );
	}
	else{
		$video = get_sub_field( $val );
	}
?>
<?php //var_dump_pre( $video ); ?>
<?php if( !empty( $video ) ): ?>
	<?php if( $ww ): ?>
		<<?php echo $ww; ?> <?php if( $wclass ){ echo 'class="'.$wclass.'"'; } ?>>
	<?php endif ?>
		<video <?php echo $class; ?> loop autoplay playsinline muted preload="metadata" src="<?php echo $video; ?>" poster="<?php echo $image_url; ?>">
			<source src="<?php echo $video; ?>" type="video/mp4">
		</video>
	<?php if( $ww ): ?>
		</<?php echo $ww; ?>>
	<?php endif; ?>
<?php endif; ?>