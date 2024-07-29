<?php
// Jobs API Data
class Tkxel_Jobs_Board_API {
    public static function fetch_jobs() {
        $response = wp_remote_get('https://api-careers.tkxel.com/api/zoho-job-openings');
        if (is_wp_error($response)) {
            return 'Unable to retrieve job openings.';
        }

        $body = wp_remote_retrieve_body($response);
        $jobs_data = json_decode($body, true);

        if (empty($jobs_data['data']['data'])) {
            return 'No job openings found.';
        }
        
        $open_jobs = array_filter( $jobs_data['data']['data'], function ( $item ) {
            return isset( $item['Job_Opening_Status'] ) && $item['Job_Opening_Status'] === "In-progress";
        } );

        // print_r($open_jobs);

        return $open_jobs;
    }
}
