<?php
namespace um\core;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'um\core\Chart' ) ) {


	/**
	 * Class Chart
	 * @package um\core
	 */
	class Chart {


		/**
		 * Chart constructor.
		 */
		function __construct() {

		}


		/**
		 * Create a new chart
		 *
		 * @param array $args
		 */
		function create( $args = array() ) {

			$defaults = array(
				'id'                    => 0,
				'type'                  => 'LineChart',
				'data'                  => null,
				'x_label'               => null,
				'y_label'               => null,
				'vertical_max_lines'    => 6,
				'colors'                => '#0085ba',
				'backgroundcolor'       => 'transparent',
				'basetextcolor'         => '#666',
				'basebordercolor'       => '#bbb',
				'days'                  => 30
			);

			$args = wp_parse_args( $args, $defaults );


			/**
			 * @var $type
			 */
			extract( $args );

			if ( $type == 'LineChart' ) {
				$this->linechart( $args );
			}
		}


		/**
		 * LineChart
		 *
		 * @param $args
		 */
		function linechart( $args ) {
			/**
			 * @var $x_label
			 * @var $y_label
			 * @var $vertical_max_lines
			 * @var $backgroundcolor
			 * @var $colors
			 * @var $basebordercolor
			 * @var $basetextcolor
			 * @var $data
			 * @var $id
			 */
			extract( $args ); ?>

			<script type="text/javascript">

				google.load( "visualization", "1", {packages:["corechart"]});

				function draw_linechart() {

					var data = new google.visualization.DataTable();
					data.addColumn('string', '<?php echo esc_attr( $x_label ); ?>');
					data.addColumn('number', '<?php echo esc_attr( $y_label ); ?>');

					var min_data = 0;
					var max_data = data.getColumnRange(1).max;

					var vgrid_count = <?php echo esc_attr( $vertical_max_lines ); ?>;
					var hgrid_count = Math.floor( data.getNumberOfRows() / 4 );

					/* Options */
					var options = {
						backgroundColor: '<?php echo esc_attr( $backgroundcolor ); ?>',
						colors: ['<?php echo esc_attr( $colors ); ?>'],
						curveType: 'function',
						pointSize: 8,
						lineWidth: 4,
						vAxis:{
							baselineColor: '<?php echo esc_attr( $basebordercolor ); ?>',
							gridlineColor: '<?php echo esc_attr( $basebordercolor ); ?>',
							gridlines: {color: 'transparent', count: vgrid_count},
							textStyle: {color: '<?php echo esc_attr( $basetextcolor ); ?>', fontSize: 12 },
							format: '#',
							viewWindow: {min: min_data, max: max_data + 10}
						},
						hAxis:{
							textStyle: {color: '<?php echo esc_attr( $basetextcolor ); ?>', fontSize: 12, italic: true },
							showTextEvery: hgrid_count,
							maxAlternation: 1,
							maxTextLines: 1
						},
						legend: {
							position: 'top',
							alignment: 'start',
							textStyle: {color: '<?php echo esc_attr( $basetextcolor ); ?>', fontSize: 13}
						},
						tooltip: {
							textStyle: {color: '<?php echo esc_attr( $basetextcolor ); ?>', fontSize: 12}
						},
						chartArea: {
							top:50,left:30,width: '95%', 'height' : ( vgrid_count * 50 ) - 100,
							backgroundColor: {
								stroke: '<?php echo esc_attr( $basebordercolor ); ?>',
								strokeWidth: 1
							}
						},
						width: '100%',
						height: ( vgrid_count * 50 )
					};

					var chart = new google.visualization.LineChart( document.getElementById( 'chart_<?php echo esc_attr( $data . $id ); ?>' ) );
					chart.draw( data, options );

				}

			</script>

			<div id="chart_<?php echo esc_attr( $data . $id ); ?>"></div>

			<?php
		}

	}
}