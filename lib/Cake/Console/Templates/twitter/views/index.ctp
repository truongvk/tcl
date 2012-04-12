<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="<?php echo $pluralVar;?>">
	<table cellpadding="0" cellspacing="0" id="table-<?php echo $pluralVar;?>" class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
	<?php
	$orderedField = false;
	$hasToggle = false;

	if(in_array('ordered', $fields)){
		$orderedField = true;
		echo "<th width=\"40px\" nowrap=\"\"><?php echo __('Order'); ?></th>";
	}
	
	if(in_array('status', $fields) || in_array('published', $fields)){
		$hasToggle = true;		
	}

	foreach ($fields as $field):
		$style = "";
		if($field == 'ordered'){
			continue;
		}
		if($field == 'published' || $field == 'status'){
			$style = "style=\"text-align: center\"";
		}
	?>
		<th class="header" <?php echo $style;?>><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
	<?php endforeach;?>
		<th class="header" style="text-align: center"><?php echo "<?php echo __('Actions');?>";?></th>
	</tr>
	</thead>
	<tbody>
	<?php

	echo "<?php
	foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr id='<?php echo \${$singularVar}['{$modelClass}']['{$primaryKey}'];?>'>\n";
		if($orderedField){
			echo "\t\t<td class=\"dragHandle\"></td>\n";
		}
		foreach ($fields as $field) {			
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				if($field == 'ordered'){
					continue;
				}elseif ($field == 'status' || $field == 'published') {					
					echo "\t\t<td style=\"text-align: center\">\n\t\t<span style=\"cursor: pointer\">
		<?php echo \$this->Html->image('icons/allow-' . intval(\${$singularVar}['{$modelClass}']['{$field}']) . '.png',
			array('onclick' => 'published.toggle(\"status-'.\${$singularVar}['{$modelClass}']['{$primaryKey}'].'\",
				\"'.\$this->Html->url(array('action'=>'toggle', \${$singularVar}['{$modelClass}']['{$primaryKey}'], (int)\${$singularVar}['{$modelClass}']['{$field}'], \"{$field}\")).'\");',
				'id' => 'status-'.\${$singularVar}['{$modelClass}']['{$primaryKey}']
		)); ?>
		</span>&nbsp;\n\t\t</td>\n";
				}else{
					echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
				}
			}
		}

		echo "\t\t<td style=\"text-align: center\">\n";
		echo "\t\t\t<span class=\"label label-info link-white\"><i class=\"icon-zoom-in icon-white\"></i> <?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></span>\n";
	 	echo "\t\t\t<span class=\"label label-warning link-white\"><i class=\"icon-edit icon-white\"></i> <?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></span>\n";
	 	echo "\t\t\t<span class=\"label label-important link-white\"><i class=\"icon-trash icon-white\"></i> <?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), null, __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?></span>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "\t<?php endforeach; ?>\n";
	?>
	</tbody>
	</table>
	<div class="pagination">
		<p>
		<?php
		echo "<?php echo \$this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));?>";
		?>
		</p>
		<ul>
		<?php
			echo "<?php\n";
			echo "\t\techo \$this->Paginator->prev('&larr; ' . __('previous'), array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'prev disabled'));\n";
			echo "\t\techo \$this->Paginator->numbers(array('separator' => '','tag' => 'li', 'before'=>'', 'after'=>''));\n";
			echo "\t\techo \$this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'next disabled'));\n";
			echo "\t?>\n";
		?>
		</ul>
	</div>
<?php
if ($orderedField):
echo "<?php echo \$this->Html->script(array(
		'jquery/json2',
		'jquery/tablednd/jquery.tablednd'
));?>
";
?>
<script type="text/javascript">
	$(document).ready(function(){
            // Initialise the table dragable
            $("#table-<?php echo $pluralVar;?> tr").hover(function() {
                $(this.cells[0]).addClass('showDragHandle');
            }, function() {
                $(this.cells[0]).removeClass('showDragHandle');
            });
            $("#table-<?php echo $pluralVar;?>").tableDnD({
                dragHandle: "dragHandle",
                onDrop: function(table, row) {
                    var rows = table.tBodies[0].rows;
                    var newOrder = [];
                    for (var i=0; i<rows.length; i++) {
                        newOrder[i] = rows[i].id;
                    }
                    var params = { 'data[<?php echo $modelClass;?>][ordered]': JSON.stringify(newOrder) };
                    $.post('<?php echo "<?php echo \$this->Html->url('/admin/'.Inflector::tableize('".$modelClass."').'/ordered');?>";?>', params,
                        function(response){}
                    );
                }
            });
	});
</script>
<?php
endif;
?>
<?php if ($hasToggle):?>
<script type="text/javascript">
	var published = { toggle : function(id, url){ obj = $('#'+id).closest("span"); $.ajax({ url: url, type: "POST", success: function(response){ obj.html(response); } }); } };
	$(document).ready(function(){
		$('.asc').closest('th').addClass('headerSortDown');
		$('.desc').closest('th').addClass('headerSortUp');
	});
</script>
<?php endif; ?>
</div>
<?php /*
<div class="actions">
	<h3><?php echo "<?php echo __('Actions'); ?>"; ?></h3>
	<ul>
		<li><?php echo "<?php echo \$this->Html->link(__('New " . $singularHumanName . "'), array('action' => 'add')); ?>";?></li>
<?php
	$done = array();
	foreach ($associations as $type => $data) {
		foreach ($data as $alias => $details) {
			if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
				echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
				echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
				$done[] = $details['controller'];
			}
		}
	}
?>
	</ul>
</div>
*/?>