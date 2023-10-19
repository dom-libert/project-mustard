<?php

/* Template Name: Carousel Test */

get_header();

?>

<!-- Have used Tailwind CDN for time purposes, would ideally install this with a package manager -->
<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-[#FAD763]">
    <div class="container h-screen pt-48 mx-auto overflow-hidden">
        <div class="flex items-center justify-start">
            <div>
                <div class="flex gap-10 carouselWrap transition">
                    <!-- Items -->
                    <?php while(has_sub_field('carousel_items')){ ?>
                        <?php get_template_part('parts/item'); ?>
                    <?php } ?>
                    
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center mt-8 gap-4">
            <div class="bg-black pb-[50px] w-[50px] carouselPrev"></div>
            <div class="bg-black pb-[50px] w-[50px] carouselNext"></div>
        </div>
    </div>
</div>




<!-- Using Query for speed again - Don't think vanilla should be required and not enough time to set up react or vue in an hour -->
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){

        // Set up costs like the widths of the items and paddings
        const itemWidth = parseInt($('.carouselItem:eq(0)').outerWidth());
        const paddingBetweenItems = 40;
        const pixelsToScrollEachClick = itemWidth+paddingBetweenItems;
        const numberOfSlides = $('.carouselItem').length;
        const maxScroll = pixelsToScrollEachClick * numberOfSlides;

        let currentSrollAmount = 0;

        $('.carouselNext').on('click',function(){
            // Bail early if at the end of the list
            if(currentSrollAmount >= (maxScroll-pixelsToScrollEachClick)){
                return;
            }
            // Calculate the amount to scroll
            currentSrollAmount = parseInt(currentSrollAmount) + parseInt(pixelsToScrollEachClick);
            // Move it
            $('.carouselWrap').css({"-webkit-transform":"translateX(-"+currentSrollAmount+"px)"});
        });

        $('.carouselPrev').on('click',function(){
            if(currentSrollAmount == 0){
                return;
            }
            // Calculate the amount to scroll
            currentSrollAmount = parseInt(currentSrollAmount) - parseInt(pixelsToScrollEachClick);
            // Move it
            $('.carouselWrap').css({"-webkit-transform":"translateX(-"+currentSrollAmount+"px)"});
        });


    });

</script>


<?php 
get_footer(); 
?>
