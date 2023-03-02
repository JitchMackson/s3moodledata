<?php

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_s3moodledata_plugin_settings', 'S3 Moodledata Plugin Settings');

    // Add the S3 access key setting.
    $settings->add(new admin_setting_configtext('s3moodledata_access_key', get_string('access_key', 'local_s3moodledata_plugin'), get_string('access_key_desc', 'local_s3moodledata_plugin'), '', PARAM_TEXT));

    // Add the S3 secret key setting.
    $settings->add(new admin_setting_configtext('s3moodledata_secret_key', get_string('secret_key', 'local_s3moodledata_plugin'), get_string('secret_key_desc', 'local_s3moodledata_plugin'), '', PARAM_TEXT));

    // Add the S3 bucket name setting.
    $settings->add(new admin_setting_configtext('s3moodledata_bucket_name', get_string('bucket_name', 'local_s3moodledata_plugin'), get_string('bucket_name_desc', 'local_s3moodledata_plugin'), '', PARAM_TEXT));

    // Add the S3 region setting.
    $settings->add(new admin_setting_configtext('s3moodledata_region', get_string('region', 'local_s3moodledata_plugin'), get_string('region_desc', 'local_s3moodledata_plugin'), '', PARAM_TEXT));

    $ADMIN->add('localplugins', $settings);
}
