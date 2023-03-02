<?php

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/vendor/autoload.php');

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

/**
 * This function initializes the S3Moodledata plugin.
 */
function local_s3moodledata_plugin_init() {
    global $CFG;

    // Check if the S3 settings are configured.
    if (empty($CFG->s3moodledata_access_key) || empty($CFG->s3moodledata_secret_key) || empty($CFG->s3moodledata_bucket_name) || empty($CFG->s3moodledata_region)) {
        return;
    }

    // Configure the AWS SDK.
    $s3 = new S3Client([
        'version' => 'latest',
        'region' => $CFG->s3moodledata_region,
        'credentials' => [
            'key' => $CFG->s3moodledata_access_key,
            'secret' => $CFG->s3moodledata_secret_key,
        ],
    ]);

    // Set the Moodledata file system to use S3.
    require_once($CFG->libdir . '/filestorage/azure.php');
    $fs = get_file_storage();
    $fs->set_area_for_external_storage(FILE_STORAGE_S3, 's3moodledata', $s3, $CFG->s3moodledata_bucket_name, '/');
}
