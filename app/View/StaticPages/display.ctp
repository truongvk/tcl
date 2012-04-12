<?php echo $this->element('front/breadscrumbs', array('data'=>array(array('name'=>h($content['StaticPage']['title'])))));?>
<div class="row">
    <div class="span9" style="">
        <?php echo $content['StaticPage']['description'];?>
    </div>
</div>
<?php
    if($content['StaticPage']['photo']){
            if(fileExistsInPath(WWW_ROOT.'files'.DS.'pages'.DS.$content['StaticPage']['photo_dir'].DS.$content['StaticPage']['photo'])){
?>
<div class="row">
    <div class="span9" style="">
        <div class="well" id="fileHolder">
                <p>
                    <a class="btn btn-info" href="<?php echo $this->Html->url('/files/pages/'.$content['StaticPage']['photo_dir'].'/'.$content['StaticPage']['photo']);?>"><i class="icon-download icon-white"></i> <?php echo __('Download');?></a>
                </p>              
        </div>        
    </div>
</div>
               
         
<?php
    }
}
?>
