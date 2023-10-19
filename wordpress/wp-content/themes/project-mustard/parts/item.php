<a href="<?php the_sub_field('link'); ?>" class="block w-[400px] relative carouselItem">
        <!-- Main image -->
        <div class="w-[90%] mx-auto">
            <img class="object-cover w-full h-48" src="<?php the_sub_field('image'); ?>" />
            <!-- Item footer -->
        </div>
        <div class="bg-black p-8 w-full h-auto p-8">
            <p class="text-white text-xl font-serif"><?php the_sub_field('text');  ?></p>
        </div>
</a>