<?php
// Template name: Carousel page
?>

<?php get_header(); ?>

<?php $slides = get_field('carousel_items'); ?>

<div class="carousel" >
  
  <div class="carousel__track">
    <?php foreach ($slides as $slide): ?>
      <a draggable="false" href="<?php echo $slide['link']['url']?>" aria-label="link to <?php echo $slide['link']['title'];?>" target="<?php echo $slide['link']['target']?>" class="carousel__slide">
        <img draggable="false" class="carousel__slide-background" src="<?php echo $slide['featured_image']['url']; ?>" alt="<?php echo $slide['featured_image']['alt'] ?>">
        <img draggable="false" class="carousel__slide-logo" src="<?php echo $slide['logo']['url'] ?>" alt="<?php echo $slide['logo']['alt'];?>">

        <div class="carousel__slide-content">
          <?php echo $slide['content']; ?>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <div class="carousel__control">
    <button class="carousel__control--prev" >prev</button>
    <button class="carousel__control--next">next</button>
  </div>

</div>