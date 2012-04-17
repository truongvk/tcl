<div class="subscribers">
    <table cellpadding="0" cellspacing="0" id="table-subscribers" class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header" ><?php echo $this->Paginator->sort('email'); ?></th>
                <th class="header" style="text-align: center; width:200px"><?php echo $this->Paginator->sort('published'); ?></th>
                <th class="header" style="text-align: center; width:200px"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subscribers as $subscriber): ?>
                <tr id='<?php echo $subscriber['Subscriber']['id']; ?>'>
                    <td><?php echo h($subscriber['Subscriber']['email']); ?>&nbsp;</td>
                    <td style="text-align: center">
                        <span style="cursor: pointer">
                            <?php
                            echo $this->Html->image('icons/allow-' . intval($subscriber['Subscriber']['published']) . '.png', array('onclick' => 'published.toggle("status-' . $subscriber['Subscriber']['id'] . '",
				"' . $this->Html->url(array('action' => 'toggle', $subscriber['Subscriber']['id'], (int) $subscriber['Subscriber']['published'], "published")) . '");',
                                'id' => 'status-' . $subscriber['Subscriber']['id']
                            ));
                            ?>
                        </span>&nbsp;
                    </td>
                    <td style="text-align: center">
                        <span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subscriber['Subscriber']['id'])); ?></span>
                        <span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subscriber['Subscriber']['id']), null, __('Are you sure you want to delete # %s?', $subscriber['Subscriber']['id'])); ?></span>
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
    <script type="text/javascript">
        var published = { toggle : function(id, url){ obj = $('#'+id).closest("span"); $.ajax({ url: url, type: "POST", success: function(response){ obj.html(response); } }); } };
        $(document).ready(function(){
            $('.asc').closest('th').addClass('headerSortDown');
            $('.desc').closest('th').addClass('headerSortUp');
        });
    </script>
</div>
