<ul class="breadcrumb">
    <li><a href="<?php echo $this->Html->url('/');?>"><i class="icon-home"></i> <?php echo __('Homepage');?></a> <span class="divider">/</span></li>
<?php
    if (isset($data) && !empty($data)) {
        $numItems = count($data);
        $path = null;
        $i = 0;
        foreach ($data as $breadscrumb) {
            if ($i + 1 == $numItems) {
                $path.= "<li class=\"active\">".$breadscrumb["name"]."</li>";                
            }else{
                $path.= "<li>".$this->Html->link($breadscrumb["name"], $breadscrumb["url"]).' <span class="divider">/</span></li>';
            }
            $i++;
        }
        echo $path;        
    }
    
    if (isset($breadscrumbs) && !empty($breadscrumbs)) {
        $numItems = count($breadscrumbs);
        $path = null;
        $i = 0;
        foreach ($breadscrumbs as $breadscrumb) {
            if ($i + 1 == $numItems) {
                if ((isset($product_name)) && (!empty($product_name))) {
                    $path.= "<li>".$this->Html->link($breadscrumb["Category"]["name"], array('action'=>'view', $breadscrumb["Category"]["id"])).' <span class="divider">/</span></li>';
                    $path.= "<li class=\"active\">".$product_name."</li>";
                }else{
                    $path.= "<li class=\"active\">".$breadscrumb["Category"]["name"]."</li>";
                }
            }else{
                $path.= "<li>".$this->Html->link($breadscrumb["Category"]["name"], array('action'=>'view', $breadscrumb["Category"]["id"])).' <span class="divider">/</span></li>';
            }
            $i++;
        }
        echo $path;
    }
?>
</ul>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Session->flash(); ?>