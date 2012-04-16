<!-- Main hero unit for a primary marketing message or call to action -->
<div class="carousel slide" id="myCarousel">
        <!-- Carousel items -->
        <div class="carousel-inner">
        <?php 
        $sliders = $this->requestAction('/sliders/get_sliders');
        if(!empty($sliders)):
            $i=0;
            foreach($sliders as $slider):
                $image = '<img alt="" src="http://placehold.it/960x340">';
                if(fileExistsInPath(WWW_ROOT.DS.'/files/sliders/'.$slider['Slider']['photo_dir'].'/big_'.$slider['Slider']['photo'])):
                    $image = $this->Html->image('../files/sliders/'.$slider['Slider']['photo_dir'].'/big_'.$slider['Slider']['photo']);
                endif;
                
                $active = null;
                if($i==0){
                    $active='active';
                }
                
                $url = '#';
                if(!empty($slider['Slider']['url'])){
                    $url = $slider['Slider']['url'];
                }
        ?>    
                <div class="item <?php echo $active;?>">
                    <?php echo $image;?>
                    <div class="carousel-caption">
                    <h3><?php echo $this->Html->link($slider['Slider']['title'], $url, array('style'=>'color: #FFFFFF'));?></h3>
                    <p><?php echo h($slider['Slider']['description']);?></p>
                    </div>
                </div>
        <?php 
                $i++;
            endforeach;
        endif;
        ?>        
        </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>