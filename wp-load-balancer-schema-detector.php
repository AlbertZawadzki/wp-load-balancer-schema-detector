<?php
/**
 * Plugin name:         Load balancer schema detector
 * Plugin URI:          https://github.com/AlbertZawadzki/wp-load-balancer-schema-detector
 * Description:         Fixes infinite redirection bug in admin panel caused by is_ssl() method if the admin panel is behind any load balancer
 * Version:             1.0
 * Author:              Albert Zawadzki
 * Author URI:          https://github.com/AlbertZawadzki
 * Requires at least:   5.2
 * Requires PHP:        7.3
 */

if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    if (isset($_SERVER['HTTP_CF_VISITOR'])) {
        try {
            $visitorData = json_decode($_SERVER['HTTP_CF_VISITOR'], true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            $visitorData = ['scheme' => 'http'];
        }

        $visitorScheme = $visitorData['scheme'] ?? 'http';
        if ($visitorScheme === 'https') {
            $_SERVER['HTTPS'] = 'on';
        }
    }

    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && 'https' === $_SERVER['HTTP_X_FORWARDED_PROTO']) {
        $_SERVER['HTTPS'] = 'on';
    }
}