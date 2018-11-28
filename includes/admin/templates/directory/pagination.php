<div class="um-admin-metabox">
	<?php UM()->admin_forms( array(
		'class'		=> 'um-member-directory-pagination um-half-column',
		'prefix_id'	=> 'um_metadata',
		'fields' => array(
			array(
				'id'            => '_um_must_search',
				'type'          => 'checkbox',
				'label'         => __( 'Show results only after search/filtration', 'ultimate-member' ),
				'tooltip'       => __( 'If turned on, member results will only appear after search/filter is performed', 'ultimate-member' ),
				'value'         => UM()->query()->get_meta_value( '_um_must_search' ),
			),
			array(
				'id'		=> '_um_profiles_per_page',
				'type'		=> 'text',
				'label'		=> __( 'Number of profiles per page', 'ultimate-member' ),
				'tooltip'	=> __( 'Number of profiles to appear on page for standard users', 'ultimate-member' ),
				'value'		=> UM()->query()->get_meta_value( '_um_profiles_per_page', null, 12 ),
				'size'		=> 'small'
			),
			array(
				'id'		=> '_um_profiles_per_page_mobile',
				'type'		=> 'text',
				'label'		=> __( 'Number of profiles per page (for Mobiles & Tablets)', 'ultimate-member' ),
				'tooltip'	=> __( 'Number of profiles to appear on page for mobile users', 'ultimate-member' ),
				'value'		=> UM()->query()->get_meta_value( '_um_profiles_per_page_mobile', null, 8 ),
				'size'		=> 'small'
			),
			array(
				'id'		=> '_um_max_users',
				'type'		=> 'text',
				'label'		=> __( 'Maximum number of profiles', 'ultimate-member' ),
				'tooltip'	=> __( 'Use this setting to control the maximum number of profiles to appear in this directory. Leave blank to disable this limit', 'ultimate-member' ),
				'value'		=> UM()->query()->get_meta_value( '_um_max_users', null, 'na' ),
				'size'		=> 'small'
			),
			array(
				'id'		=> '_um_directory_header',
				'type'		=> 'text',
				'label'		=> __( 'Results Text', 'ultimate-member' ),
				'tooltip'	=> __( 'Customize the search result text . e.g. Found 3,000 Members. Leave this blank to not show result text', 'ultimate-member' ),
				'value'		=> UM()->query()->get_meta_value('_um_directory_header', null, __('{total_users} Members','ultimate-member') ),
			),
			array(
				'id'		=> '_um_directory_header_single',
				'type'		=> 'text',
				'label'		=> __( 'Single Result Text', 'ultimate-member' ),
				'tooltip'	=> __( 'Same as above but in case of 1 user found only', 'ultimate-member' ),
				'value'		=> UM()->query()->get_meta_value('_um_directory_header_single', null, __('{total_users} Member','ultimate-member') ),
			),
			array(
				'id'		=> '_um_directory_no_users',
				'type'		=> 'text',
				'label'		=> __( 'Custom text if no users were found', 'ultimate-member' ),
				'tooltip'	=> __( 'This is the text that is displayed if no users are found during a search', 'ultimate-member' ),
				'value'		=> UM()->query()->get_meta_value('_um_directory_no_users', null, __('We are sorry. We cannot find any users who match your search criteria.','ultimate-member') ),
			),
		)
	) )->render_form(); ?>

	<div class="um-admin-clear"></div>
</div>