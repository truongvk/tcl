<?php echo $this->Html->script(array('ckeditor/ckeditor', 'ckfinder/ckfinder'));?>
<div class="staticPages form">
    <ul class="breadcrumb">
        <li>
            <?php echo $this->Html->link('Manage Pages', array('action' => 'index')); ?>
            <span class="divider">/</span>
        </li>
        <li class="active"><?php echo __('Edit Page'); ?></li>
    </ul>
    <?php echo $this->Form->create('StaticPage', array('class' => 'form-horizontal')); ?>
    <fieldset>
        <legend><?php echo __('Edit Page'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('title', array('div' => 'control-group', 'placeholder' => '',
            'before' => '<label>' . __('Title') . '</label><div class="controls">',
            'after' => $this->Form->error('title', array(), array('wrap' => 'span', 'class' => 'help-inline')) . '</div>',
            'error' => array('attributes' => array('style' => 'display:none')),
            'label' => false, 'class' => 'input-xlarge'));
        echo $this->Form->input('slug', array('div' => 'control-group', 'placeholder' => '',
            'before' => '<label>' . __('Slug') . '</label><div class="controls">',
            'after' => $this->Form->error('slug', array(), array('wrap' => 'span', 'class' => 'help-inline')) . '</div>',
            'error' => array('attributes' => array('style' => 'display:none')),
            'label' => false, 'class' => 'input-xlarge'));
        echo $this->Form->input('description', array('div' => 'control-group', 'type' => 'textarea', 'placeholder' => '',
            'before' => '<label class="control-label">' . __('Description') . '</label><div class="controls">',
            'after' => $this->Form->error('description', array(), array('wrap' => 'span', 'class' => 'help-inline')) . '</div>',
            'error' => array('attributes' => array('style' => 'display:none')),
            'label' => false, 'class' => 'input-xxlarge'));
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
   ['Format','Bold','Italic','-','OrderedList','UnorderedList','-','Link','Unlink','-'],   
   ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
   ['Table', 'HorizontalRule','SpecialChar','Image','Flash','TextColor','Source','Maximize', 'ShowBlocks']
] ;
CKFinder.setupCKEditor( editor, { basePath  : '<?php echo $this->Html->url("/js/ckfinder");?>', rememberLastFolder  : false } ) ;
</script>