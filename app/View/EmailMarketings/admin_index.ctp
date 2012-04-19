<div class="emailMarketings">
    <table cellpadding="0" cellspacing="0" id="table-emailMarketings" class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header" style="width:200px"><?php echo $this->Paginator->sort('CustomerType.name', __('Customer Type')); ?></th>
                <th class="header" ><?php echo $this->Paginator->sort('title', __('Title')); ?></th>
                <th class="header" ><?php echo $this->Paginator->sort('content', __('Content')); ?></th>
                <th class="header" style="text-align: center; width:200px"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emailMarketings as $emailMarketing): ?>
                <tr id='<?php echo $emailMarketing['EmailMarketing']['id']; ?>'>
                    <td><?php echo h($emailMarketing['EmailMarketing']['customer_type_id']); ?>&nbsp;</td>
                    <td><?php echo h($emailMarketing['EmailMarketing']['title']); ?>&nbsp;</td>
                    <td><?php echo h(date('d/m/Y', strtotime($emailMarketing['EmailMarketing']['created']))); ?>&nbsp;</td>
                    <td style="text-align: center">
                        <span class="label label-info link-white"><i class="icon-zoom-in icon-white"></i> <?php echo $this->Html->link(__('View'), array('action' => 'view', $emailMarketing['EmailMarketing']['id'])); ?></span>
                        <span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $emailMarketing['EmailMarketing']['id'])); ?></span>
                        <span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $emailMarketing['EmailMarketing']['id']), null, __('Are you sure you want to delete # %s?', $emailMarketing['EmailMarketing']['id'])); ?></span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>		</p>
        <ul>
            <?php
            echo $this->Paginator->prev('&larr; ' . __('previous'), array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'before' => '', 'after' => ''));
            echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'next disabled'));
            ?>
        </ul>
    </div>
</div>
