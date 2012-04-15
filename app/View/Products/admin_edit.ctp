<?php echo $this->Html->script(array('ckeditor/ckeditor', 'ckfinder/ckfinder', 'application/properties/get_properties'));?>
<?php echo $this->Html->script(array(
        'jquery/cloneform/jquery.cloneform',
        'jquery/jquery-ui/jquery-ui-sort.min'
    ));?>
<div class="products form">
<ul class="breadcrumb">
        <li>
		<?php echo $this->Html->link('Product', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Update Product'); ?></li>
</ul>

<?php echo $this->Form->create('Product', array('class'=>'form-horizontal', 'type'=>'file'));?>
<div class="alert alert-info">
<?php 
echo $this->Form->input('url', array('div'=>'control-group','placeholder'=>'',
                                     'value'=>FULL_BASE_URL.$this->Html->url(array('admin'=>false,'action' => 'detail', $this->data['Product']['slug'])),
                                     'onclick'=>'this.select();',
                                     'before'=>'<label>'.__('URL').'</label><div class="controls">',
                                     'after'=>'&nbsp;<span class="label label-info link-white"><i class="icon-eye-open icon-white"></i> <a href='.$this->Html->url(array('admin'=>false,'action' => 'detail', $this->data['Product']['slug'])).' target="_blank">'.__('View').'</a></span></div>',
                                     'error' => array('attributes' => array('style' => 'display:none')),
                                     'label'=>false, 'class'=>'input-xlarge'));

?>
</div>    
    
<div class="tabbable" style="margin-bottom: 9px;">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#1" data-toggle="tab"><?php echo __('General Infomation'); ?></a></li>
        <li class=""><a href="#2" data-toggle="tab"><?php echo __('Attributes'); ?></a></li>
        <li class=""><a href="#3" data-toggle="tab"><?php echo __('Excerpt'); ?></a></li>
        <li class=""><a href="#4" data-toggle="tab"><?php echo __('Features'); ?></a></li>
        <li><a href="#5" data-toggle="tab"><?php echo __('Article'); ?></a></li>
        <li><a href="#6" data-toggle="tab"><?php echo __('Gallery'); ?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="1">
            <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('name', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Name').'</label><div class="controls">',
                                            'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('price', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Price').'</label><div class="controls">',
                                            'after'=>$this->Form->error('price', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('promotion_price', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Promotion Price').'</label><div class="controls">',
                                            'after'=>$this->Form->error('promotion_price', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));                    
                    echo $this->Form->input('instock', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Instock').'</label><div class="controls">',
                                            'after'=>$this->Form->error('instock', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('is_promoted', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Promoted Product').'</label><div class="controls">',
                                            'after'=>$this->Form->error('is_promoted', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('published', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Status').'</label><div class="controls">',
                                            'after'=>$this->Form->error('is_promoted', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
            ?>
        </div>
        <div class="tab-pane" id="2">
                <?php
                    echo $this->Form->input('category_id', array('div'=>'control-group','placeholder'=>'','empty'=>array('0'=>__('Select a category')),
                                    'before'=>'<label>'.__('Category').'</label><div class="controls">',
                                    'after'=>$this->Form->error('category_id', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                    'error' => array('attributes' => array('style' => 'display:none')),
                                    'label'=>false, 'class'=>'input-xlarge'));
                ?>
            <div class="row">
                <div class="span1">&nbsp;</div>
                <div class="span4"><div class="well"><span id="list_property"></span></div></div>
            </div>
        </div>
        <div class="tab-pane" id="3">
            <div><strong><?php echo __('Product Excerpt');?></strong></div>
             <?php
                    echo $this->Form->input('excerpt', array('div'=>'control-group', 'type'=>'textarea','placeholder'=>'',
                                                            'before'=>'',
                                                            'after'=>$this->Form->error('description', array(), array('wrap' => 'span', 'class' => 'help-inline')).'',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xxlarge'));
              ?>
             <div><strong><?php echo __('Promotion Content');?></strong></div>
             <?php
                    echo $this->Form->input('promotion_content', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'',
                                                            'after'=>$this->Form->error('features', array(), array('wrap' => 'span', 'class' => 'help-inline')).'',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xxlarge'));
            ?>
        </div>
        <div class="tab-pane" id="4">
            <div><strong><?php echo __('Features Excerpt');?></strong></div>
             <?php
                    echo $this->Form->input('features_excerpt', array('div'=>'control-group', 'type'=>'textarea','placeholder'=>'',
                                                            'before'=>'',
                                                            'after'=>$this->Form->error('description', array(), array('wrap' => 'span', 'class' => 'help-inline')).'',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xxlarge'));
              ?>
            <div><strong><?php echo __('Features');?></strong></div>
            <?php
                    echo $this->Form->input('features', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'',
                                                            'after'=>$this->Form->error('features', array(), array('wrap' => 'span', 'class' => 'help-inline')).'',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xxlarge'));
                ?>
        </div>
        <div class="tab-pane" id="5">
            <?php
                    echo $this->Form->input('article', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'',
                                                            'after'=>$this->Form->error('features', array(), array('wrap' => 'span', 'class' => 'help-inline')).'',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xxlarge'));
                ?>
        </div>
        <div class="tab-pane" id="6">
            <div class="row">
                <div class="span4">
                    <?php
                        echo $this->Form->input('Gallery.upload', array('type' => 'file', 'div'=>'control-group clonable','placeholder'=>'','name'=>'data[Gallery][upload][]',
                                                'before'=>'<label>'.__('Upload file').'</label><div class="controls">',
                                                'after'=>$this->Form->error('upload', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                'error' => array('attributes' => array('style' => 'display:none')),
                                                'label'=>false, 'class'=>'input-xlarge'));
                        ?>
                    <div class="control-group"><label>&nbsp;</label>
                        <div class="controls">
                            <a class="btn btn-small btn-info" id="addnew" href="javascript:;;"><i class="icon-plus icon-white"></i></a>
                        </div>
                    </div>
                    <span id="cloneContainer"></span>
                </div>
                <div class="span8">
                    <ul class="thumbnails" id="product-gallery">
                        <?php
                        foreach($this->data['Gallery'] as $gallery){
                        ?>
                        <li class="span2" id="listItem_<?php echo $gallery['id']?>">
                            <div class="thumbnail ">
                                <img class="handle" style="cursor: move" alt="" src="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/small_'.$gallery['attachment']);?>">
                                <div class="caption">
                                <p><a class="btn btn-danger deleteImg" ref="<?php echo $gallery['id']?>" href="javascript:;;">Delete</a></p>
                                </div>
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="form-actions">
    <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
    <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
</div>

<?php
    echo $this->Form->end();
    $category_id = isset($this->data["Product"]["category_id"]) ? $this->data["Product"]["category_id"] : null;
    $select_properties =  isset($properties) ? "'".implode("','", $properties)."'" : null;
?>
</div>
<script type="text/javascript">
CKEDITOR.config.toolbar = [
   ['Templates','Format','Bold','Italic','-','OrderedList','UnorderedList','-','Link','Unlink','-'],
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
   ['Table', 'HorizontalRule','SpecialChar','Image','Flash','TextColor','Maximize','Source', 'Preview']
] ;
CKEDITOR.config.contentsCss = '<?php echo $this->Html->url('/css/twitter/bootstrap.css');?>';

//var excerpt = CKEDITOR.replace( 'ProductExcerpt' );
//CKFinder.setupCKEditor( excerpt, { basePath  : '<?php echo $this->Html->url("/js/ckfinder");?>', rememberLastFolder  : false } ) ;
var promotion = CKEDITOR.replace( 'ProductPromotionContent' );
CKFinder.setupCKEditor( promotion, { basePath  : '<?php echo $this->Html->url("/js/ckfinder");?>', rememberLastFolder  : false } ) ;
var feature_excerpt = CKEDITOR.replace( 'ProductFeaturesExcerpt' );
CKFinder.setupCKEditor( feature_excerpt, { basePath  : '<?php echo $this->Html->url("/js/ckfinder");?>', rememberLastFolder  : false } ) ;
var feature = CKEDITOR.replace( 'ProductFeatures' );
feature.config.height = '500px';
CKFinder.setupCKEditor( feature, { basePath  : '<?php echo $this->Html->url("/js/ckfinder");?>', rememberLastFolder  : false } ) ;
var article = CKEDITOR.replace( 'ProductArticle' );
article.config.height = '500px';
CKFinder.setupCKEditor( article, { basePath  : '<?php echo $this->Html->url("/js/ckfinder");?>', rememberLastFolder  : false } ) ;


$(function(){
        /**
         * Get the properties by category
         */
        fieldset = new Array();
        fieldset['style']  = 'width:285px';
        fieldset['legend'] = '<?php echo __('Properties');?>';
        $(document).get_properties({
            url: '<?php echo $this->Html->url('/properties/get_properties_by_category/'); ?>',
            display_container: 'list_property',
            list_categories_id: 'ProductCategoryId',
            fieldset: false,
            fieldset_options: fieldset,
            doloadProperty: '<?php echo $category_id;?>',
            selected_data:  new Array(<?php echo $select_properties;?>),
            container_style:  'padding:2px'
        });

    /**
     * Add Upload Form
     */
    $("#addnew").click(function(){
        var yourclass=".clonable"; //The class you have used in your form
        var clonecount = $(yourclass).length; //how many clones do we already have?
        var newid = Number(clonecount) + 1; //Id of the new clone
        $(yourclass+":first").fieldclone({//Clone the original elelement
            newid_: newid, //Id of the new clone, (you can pass your own if you want)
            target_: $("#cloneContainer"), //where do we insert the clone? (target element)
            insert_: "before" //where do we insert the clone? (after/before/append/prepend...)
            //limit_: config.maximumNumOfAnswers //Maximum Number of Clones
        });
        //return false;
    });
    /**
     * Sort gallery
     */
    $('#product-gallery').sortable({
        handle : '.handle', 
        update: function() {
                var ordered = $('#product-gallery').sortable('serialize');
                $.post('<?php echo $this->Html->url('/admin/products/gallery_ordered');?>', {'data[Gallery][ordered]':ordered},
                    function(){}
                );
        }
    });
    /**
    * Delete image
    */
    $('.deleteImg').bind('click', {}, function(){
        $obj = $(this);
        $imgId = $obj.attr('ref');
        $.post('<?php echo $this->Html->url('/admin/products/delete_image/');?>'+$imgId, {}, function(response){
            if(response==1){
                $obj.closest('li').fadeOut();
            }
        });
    });
});

</script>