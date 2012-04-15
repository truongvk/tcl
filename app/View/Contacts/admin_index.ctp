<div class="contacts">
    <table cellpadding="0" cellspacing="0" id="table-contacts" class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header" ><?php echo $this->Paginator->sort('name'); ?></th>
                <th class="header" ><?php echo $this->Paginator->sort('title'); ?></th>
                <th class="header" ><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="header" style="text-align: center"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr id='<?php echo $contact['Contact']['id']; ?>'>
                    <td><?php echo h($contact['Contact']['name']); ?>&nbsp;</td>
                    <td><?php echo h($contact['Contact']['title']); ?>&nbsp;</td>
                    <td><?php echo h($contact['Contact']['created']); ?>&nbsp;</td>
                    <td style="text-align: center">
                        <span class="label label-info link-white"><i class="icon-zoom-in icon-white"></i> <?php echo $this->Html->link(__('View'), array('action' => 'view', $contact['Contact']['id'])); ?></span>
                        <span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contact['Contact']['id']), null, __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?></span>
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
