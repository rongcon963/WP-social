<?php

/**
 * Media Tab Settings.
 */
function youzify_profile_media_tab_settings() {

    global $Youzify_Settings;

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Media Tab Settings', 'youzify' ),
            'type'  => 'openBox'
        )
    );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Items Per Page', 'youzify' ),
            'id'    => 'youzify_profile_media_tab_per_page',
            'desc'  => __( 'How many items per page on the all media page?', 'youzify' ),
            'type'  => 'number'
        )
    );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Layout', 'youzify' ),
            'opts'  => $Youzify_Settings->get_field_options( 'media_layouts' ),
            'desc'  => __( 'Select media items layout', 'youzify' ),
            'id'    => 'youzify_profile_media_tab_layout',
            'type'  => 'select'
        )
    );

    $Youzify_Settings->get_field( array( 'type' => 'closeBox' ) );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Media Subtabs Settings', 'youzify' ),
            'type'  => 'openBox'
        )
    );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Items Per Page', 'youzify' ),
            'id'    => 'youzify_profile_media_subtab_per_page',
            'desc'  => __( 'How many items per page on the media subtabs?', 'youzify' ),
            'type'  => 'number'
        )
    );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Layout', 'youzify' ),
            'opts'  => $Youzify_Settings->get_field_options( 'media_layouts' ),
            'desc'  => __( 'Select media subtabs items layout', 'youzify' ),
            'id'    => 'youzify_profile_media_subtab_layout',
            'type'  => 'select'
        )
    );

    $Youzify_Settings->get_field( array( 'type' => 'closeBox' ) );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Media Types Visibility', 'youzify' ),
            'class' => 'ukai-box-2cols',
            'type'  => 'openBox'
        )
    );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Photos', 'youzify' ),
            'id'    => 'youzify_show_profile_media_tab_photos',
            'desc'  => __( 'Show media photos', 'youzify' ),
            'type'  => 'checkbox'
        )
    );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Videos', 'youzify' ),
            'id'    => 'youzify_show_profile_media_tab_videos',
            'desc'  => __( 'Show media videos', 'youzify' ),
            'type'  => 'checkbox'
        )
    );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Audios', 'youzify' ),
            'id'    => 'youzify_show_profile_media_tab_audios',
            'desc'  => __( 'Show media audios', 'youzify' ),
            'type'  => 'checkbox'
        )
    );

    $Youzify_Settings->get_field(
        array(
            'title' => __( 'Files', 'youzify' ),
            'id'    => 'youzify_show_profile_media_tab_files',
            'desc'  => __( 'Show media files', 'youzify' ),
            'type'  => 'checkbox'
        )
    );

    $Youzify_Settings->get_field( array( 'type' => 'closeBox' ) );
}