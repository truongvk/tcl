<?php
$rightbanner = $this->requestAction('/rightbanners/get_rightbanner');
$url = '#';
$image = '';//'http://placehold.it/220x600';
if(!empty($rightbanner)):
    $i=0;

    if(fileExistsInPath(WWW_ROOT.DS.'/files/rightbanners/'.$rightbanner['Rightbanner']['photo_dir'].'/big_'.$rightbanner['Rightbanner']['photo'])):
        $image = $this->Html->url('/files/rightbanners/'.$rightbanner['Rightbanner']['photo_dir'].'/big_'.$rightbanner['Rightbanner']['photo']);
    endif;


    if(!empty($rightbanner['Rightbanner']['url'])){
        $url = $rightbanner['Rightbanner']['url'];
    }
    
    if($image):
?>
<ul class="thumbnails">
    <li class="span3">
        <div class="thumbnail">
            <a href="<?php echo $url;?>"><img src="<?php echo $image;?>"></a>
        </div>
    </li>
</ul>    
<?php
    endif;
endif;
?>