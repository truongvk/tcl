<?php echo $this->Html->script(array('ckeditor/ckeditor', 'ckfinder/ckfinder'));?>
<div class="staticPages form">
    <ul class="breadcrumb">
        <li>
            <?php echo $this->Html->link(__('Manage Page'), array('action' => 'index')); ?>
            <span class="divider">/</span>
        </li>
        <li class="active"><?php echo __('Edit Page'); ?></li>
    </ul>
    <?php echo $this->Form->create('StaticPage', array('class' => 'form-horizontal', 'type'=>'file')); ?>
    <div class="alert alert-info">
    <?php 
    echo $this->Form->input('url', array('div'=>'control-group','placeholder'=>'',
                                        'value'=>FULL_BASE_URL.$this->Html->url('/p/'.$this->data['StaticPage']['slug']),
                                        'onclick'=>'this.select();',
                                        'before'=>'<label>'.__('URL').'</label><div class="controls">',
                                        'after'=>'&nbsp;<span class="label label-info link-white"><i class="icon-eye-open icon-white"></i> <a href='.$this->Html->url('/p/'.$this->data['StaticPage']['slug']).' target="_blank">'.__('View').'</a></span></div>',
                                        'error' => array('attributes' => array('style' => 'display:none')),
                                        'label'=>false, 'class'=>'input-xlarge'));

    ?>
    </div>     
    <fieldset>
        <legend><?php echo __('Edit Page'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', array('div' => 'control-group', 'placeholder' => '',
            'before' => '<label>' . __('Title') . '</label><div class="controls">',
            'after' => $this->Form->error('title', array(), array('wrap' => 'span', 'class' => 'help-inline')) . '</div>',
            'error' => array('attributes' => array('style' => 'display:none')),
            'label' => false, 'class' => 'input-xlarge'));
        echo $this->Form->input('description', array('div' => 'control-group', 'type' => 'textarea', 'placeholder' => '',
            'before' => '<label class="control-label">' . __('Description') . '</label><div class="controls">',
            'after' => $this->Form->error('description', array(), array('wrap' => 'span', 'class' => 'help-inline')) . '</div>',
            'error' => array('attributes' => array('style' => 'display:none')),
            'label' => false, 'class' => 'input-xxlarge'));
        echo $this->Form->input('photo', array('div' => 'control-group', 'type' => 'file', 'placeholder' => '',
            'before' => '<label class="control-label">' . __('Attachment') . '</label><div class="controls">',
            'after' => $this->Form->error('photo', array(), array('wrap' => 'span', 'class' => 'help-inline')) . '</div>',
            'error' => array('attributes' => array('style' => 'display:none')),
            'label' => false, 'class' => 'input-xxlarge'));
        echo $this->Form->input('photo_dir', array('type' => 'hidden'));
        
        if($this->request->data['StaticPage']['photo']){
            if(fileExistsInPath(WWW_ROOT.'files'.DS.'pages'.DS.$this->request->data['StaticPage']['photo_dir'].DS.$this->request->data['StaticPage']['photo'])){
        ?>
        <div class="control-group" id="fileHolder">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
                <p>
                    <a class="btn btn-primary" href="<?php echo $this->Html->url('/files/pages/'.$this->request->data['StaticPage']['photo_dir'].'/'.$this->request->data['StaticPage']['photo']);?>"><i class="icon-download icon-white"></i> <?php echo __('Download');?></a>
                    <a class="btn btn-danger" href="#deleteFileConfirm" data-toggle="modal"><i class="icon-remove icon-white"></i> <?php echo __('Delete');?></a>
                </p>              
            </div>            
        </div>        
         
        <?php
            }
        }
        
        echo $this->Form->input('published', array('div' => 'control-group', 'type' => 'checkbox', 'placeholder' => '',
            'before' => '<label>' . __('Published') . '</label><div class="controls">',
            'after' => $this->Form->error('published', array(), array('wrap' => 'span', 'class' => 'help-inline')) . '</div>',
            'error' => array('attributes' => array('style' => 'display:none')),
            'label' => false, 'class' => ''));
        ?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary', 'div' => false)); ?>            <?php echo $this->Form->reset(__('Cancel'), array('class' => 'btn', 'div' => false)); ?>        </div>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'StaticPageDescription' );
//CKEDITOR.config.skin = 'office2003';
//CKEDITOR.config.toolbar = 'Basic';
CKEDITOR.config.toolbar = [
   ['Templates', 'Format','Bold','Italic','-','OrderedList','UnorderedList','-','Link','Unlink','-'],
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
   ['Table', 'HorizontalRule','SpecialChar','Image','Flash','TextColor','Source','Maximize', 'ShowBlocks']
] ;
CKEDITOR.config.contentsCss = '<?php echo $this->Html->url('/css/twitter/bootstrap.css');?>';
CKFinder.setupCKEditor( editor, { basePath  : '<?php echo $this->Html->url("/js/ckfinder");?>', rememberLastFolder  : false } ) ;
</script>
<div class="modal hide fade" id="deleteFileConfirm">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3><?php echo __('Are you sure');?>...?</h3>
    </div>
    <div class="modal-body">
        <p><?php echo __('This action will be permanently deleted your image');?>…</p>
    </div>
    <div class="modal-footer">
        <a href="javascript:;;" id="deleteFile" class="btn btn-primary"><?php echo __('Yes');?></a>
        <a href="javascript:;;" class="btn" data-dismiss="modal"><?php echo __('No');?></a>
    </div>
</div>
<script type="text/javascript">
    
    $(function () {
             /**
         * delete image
         */
        $("#deleteFile").bind('click', {}, function(){
            var obj = $(this);
            var params = { 'data[StaticPage][id]' : '<?php echo $id;?>', 'data[StaticPage][photo]' : '<?php echo $this->request->data['StaticPage']['photo'];?>' };
            var str = jQuery.param(params);
            $.post('<?php echo $this->Html->url("/admin/static_pages/delete_file");?>', str,
                function(response){
                    if(response==1){
                        $('#deleteFileConfirm').modal('hide');
                        $("#fileHolder").slideUp();
                    }
                }
            );
            
        });
    });

</script>