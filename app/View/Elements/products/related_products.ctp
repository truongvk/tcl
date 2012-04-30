<?php
$countPost = count($related_products);
if($countPost > 0):
?>
<?php echo $this->Html->script(array('related_posts/related_posts'), array('block' => '')); ?>
<?php echo $this->Html->css(array('../js/related_posts/style'), null, array('block' => '')); ?>

<div id="rp_list" class="rp_list">
    <ul>
        <?php foreach ($related_products as $product) :?>
        <li>
            <div>
                <a href="<?php echo $this->Html->url('/sp/'.$product['Product']['slug'].'.html');?>">
                <?php
                if(!empty($product['Gallery'])):
                    foreach($product['Gallery'] as $gallery):
                        if(fileExistsInPath(WWW_ROOT.DS.'/files/products/'.$gallery['dir'].'/'.$gallery['attachment'])):
                ?>
                                <img src="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/thumb_'.$gallery['attachment']);?>">
                <?php
                            endif;
                        endforeach;
                    else:
                        echo '<img alt="" src="http://placehold.it/120x80">';
                    endif;
                ?>
                </a>
                <span class="rp_title"><?php echo h($product['Product']['name']);?></span>
                <span class="rp_links">
                    <?php echo $this->Html->link(__('detail'), '/sp/'.$product['Product']['slug'].'.html')?>
                </span>
            </div>
        </li>
        <?php endforeach;?>
    </ul>

    <span id="rp_shuffle" class="rp_shuffle">
    </span>
</div>
<script type="text/javascript">
$(function(){
    $(document).related_posts ({
        post_count: '<?php echo intval($countPost);?>'
    });
});
</script>
<?php endif; ?>