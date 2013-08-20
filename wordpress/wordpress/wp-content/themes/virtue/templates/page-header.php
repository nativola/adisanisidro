<div class="page-header">
  <h1>
    <?php echo kadence_title(); ?>
  </h1>
  <?php global $post; $bsub = get_post_meta( $post->ID, '_kad_subtitle', true ); if($bsub != '') echo '<p class="subtitle"> '.$bsub.' </p>'; ?>
</div>