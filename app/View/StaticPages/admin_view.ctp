<div class="staticPages view">
    <ul class="breadcrumb">
        <li>
            <?php echo $this->Html->link('Page', array('action' => 'index')); ?>
            <span class="divider">/</span>
        </li>
        <li class="active"><?php echo __('Preview Page'); ?></li>
    </ul>
    <table class="table">
        <tr>
            <th>
                <?php echo h($staticPage['StaticPage']['title']); ?>                
            </th>
        </tr>
        <tr>           
            <td>
                <?php echo $staticPage['StaticPage']['description']; ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
