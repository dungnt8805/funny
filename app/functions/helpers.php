<?php
/**
 * @Package:
 * @Author: dungnt13
 * @Date: 5/13/2015
 * @Time: 10:32 AM
 */

if (!function_exists('status_show_hidden')) {

    /**
     * Get status [Show|Hidden] of an item
     *
     * @param int $status
     * @return mixed
     */
    function status_show_hidden($status = null)
    {
        $array = [0 => 'Hidden', 1 => 'Show'];
        return $status === null ? $array : $array[$status];
    }
}

if (!function_exists('is_series')) {

    /**
     * Check if film has multi episodes
     * @param int $check
     * @return mixed
     */
    function is_series($check = null)
    {
        $array = [0 => 'No', 1 => 'yes'];
        return $check == null ? $array : $array[$check];
    }
}

if (!function_exists('film_quality')) {
    /**
     * Get quality of film
     * @param string $quality
     * @return mixed
     */
    function film_quality($quality = null)
    {
        $array = ['SD' => 'SD', 'HD' => 'HD'];
        return $quality == null ? $array : $array[$quality];
    }
}