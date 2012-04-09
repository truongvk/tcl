<?php if(!empty($attributes) && !empty($categories)): ?>
<?php
if(!empty($categories)):
?>
<div class="widget-shop">
    <div class="widget-title"><?php echo __('Filter By Category');?></div>
    <form class="form-search">
        <?php
        $category_id = (isset($category_id)) ? $category_id : null;
        echo $this->Form->input('category_id', array('options'=>$categories, 'value'=>$category_id, 'div'=>'control-group','placeholder'=>'','id'=>'filterBy',
                                            'onchange'=>'javascript: window.location.href="'.$this->Html->url(array('controller'=>'products', 'action'=>'view')).'/"+this.value',
                                            'before'=>'<div class="controls">',
                                            'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-large search-query'));
        ?>
   </form>
</div>
<?php    
endif;
?>
<div class="widget-shop">
    <div class="widget-title"><?php echo __('Filter By Features');?>&nbsp;&nbsp;<span class="label label-warning"><a href="<?php echo $this->Html->url(array($category_id));?>" style="color:#FFFFFF"><i class="icon-retweet icon-white"></i> <?php echo __('Reset');?></a></span></div>
    <ul class="nav nav-list">
        <?php
        $limit = Configure::read('Settings.expand_collapse_attributes.value');
        foreach($attributes as $attribute):
            $header = $attribute['Property']['name'];
        ?>
        <li class="nav-header"><?php echo $header;?></li>
        <?php
            $i = 0;
            $hasFilter=null;
            foreach($attribute['children'] as $child):
                $selectProperty = (isset($this->request->params["named"][$attribute["Property"]["slug"]]) && $child["Property"]["slug"] == $this->request->params["named"][$attribute["Property"]["slug"]]) ? 'active' : '';
                $url = array('controller'=>'products', 'action'=>'view');
                $url_pass = $this->NamedParams->set($attribute["Property"]["slug"], $child["Property"]["slug"]);
                if(!empty($url_pass)){
                    $url = array_merge($url, $url_pass);
                }
                $propertyURL = $this->Html->link($child["Property"]["name"], $url, array('escape'=>false, 'encode'=>false));

                $class = "always_show";
                if ($i >= $limit) {
                    $class = 'hidden';
                }
                if($selectProperty){
                    $hasFilter[] = $selectProperty;
                }
        ?>
                <li class="<?php echo $class.' '.$selectProperty;?> <?php echo 'group-'.$attribute['Property']['id'];?>"><?php echo $propertyURL;?></li>
        <?php
                $i++;
            endforeach;
            if($i > $limit){
        ?>
                <span class="label" style="cursor: pointer;text-transform: none" id="bt-expand-<?php echo $attribute['Property']['id'];?>" onclick="property.choose_more(this, '.group-<?php echo $attribute['Property']['id'];?>');"><?php echo __('expand');?></span>
        <?php
            }
            if(!empty($hasFilter)){
        ?>
            <script>$(document).ready(function(){property.choose_more($("#bt-expand-<?php echo $attribute['Property']['id'];?>"), '.group-<?php echo $attribute['Property']['id'];?>')});</script>
        <?php
            }
        endforeach;
        ?>
    </ul>
</div>

<script type="text/javascript">
var expand = '<?php echo __('expand');?>';
var collapse = '<?php echo __('collapse');?>';
var property = {
    choose_more : function(obj, group) {
        $obj   = $(obj);
        $group = $obj.closest('ul').find(group);

        $.each($group, function(i, val) {
             $liObj = $(this);
             if($liObj.hasClass("hidden")){
                 $liObj.removeClass('hidden').addClass('tmpShow');
             }else{
                 if(!$liObj.hasClass("always_show")){
                    $liObj.removeClass('tmpShow').addClass('hidden');
                 }
             }
        });


        if($obj.html() == expand){
            $obj.html(collapse);
        }else{
            $obj.html(expand);
        }
    }
}
</script>
<?php endif; ?>