<div class="contacts view">
    <ul class="breadcrumb">
        <li>
            <?php echo $this->Html->link(__('Contact'), array('action' => 'index')); ?>
            <span class="divider">/</span>
        </li>
        <li class="active"><?php echo __('Detail'); ?></li>
    </ul>
    <table class="table table-condensed table-bordered">
        <tr>
            <th><?php echo __('Name'); ?></th>
            <td>
                <?php echo h($contact['Contact']['name']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Email'); ?></th>
            <td>
                <?php echo h($contact['Contact']['email']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Title'); ?></th>
            <td>
                <?php echo h($contact['Contact']['title']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Content'); ?></th>
            <td>
                <?php echo h($contact['Contact']['content']); ?>
                &nbsp;
            </td>
        </tr>
        <tr>
            <th><?php echo __('Created'); ?></th>
            <td>
                <?php echo h($contact['Contact']['created']); ?>
                &nbsp;
            </td>
        </tr>
    </table>
</div>
