<?php if(isset($flot_data_visits) && isset($flot_data_views)): ?>
<?php echo $this->Html->script(array(
        'jquery/flot/jquery.flot'
    ));
$iSelectedMonth = date('n');
$iSelectedYear = date('Y');
?>
<div class="row">
    <div class="span10">
        <h3>Pageviews & Visits</h3>
        <div id="placeholder"></div>
    </div>
</div>
<script type="text/javascript">
$(function(){
	var month = '<?php echo date("F", mktime(0, 0, 0, $iSelectedMonth, 10)); ?>';
	var year = '<?php echo $iSelectedYear; ?>';
	var visits = <?php echo $flot_data_visits; ?>;
	var views = <?php echo $flot_data_views; ?>;
	var dates = [];

	// set the frequency of ticks
	$.each(visits, function(index, value) {//alert(value[0]);
	    sdate = value[0];
		//if(index % 5 == 0) {
			dates.push([sdate, sdate]);
		//}
	});

	$('#placeholder').css({
		height: '350px',
		width: '1170px',
	});
	$.plot($('#placeholder'),[
		{ label: 'Visits', data: visits },
		{ label: 'Pageviews', data: views }
	],{
		lines: { show: true },
		points: { show: true },
		grid: { hoverable: true, clickable: true, backgroundColor: '#fffaff' },

		xaxis : {
			ticks : dates
		}
	});

	function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5,
            border: '1px solid #f0f0f0',
            padding: '2px',
            'background-color': '#ffffff',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }



    var previousPoint = null;
    $("#placeholder").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));


            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(0),
                        y = item.datapoint[1].toFixed(2);

                    showTooltip(item.pageX, item.pageY,
                                "<b>"+item.series.label + ":</b> "+ y+ "<br/>" + month + ", " + x + " " +year);
                }
            }


    });
});
</script>
<?php endif;?>