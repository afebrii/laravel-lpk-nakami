<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return Setting::getValue($key, $default);
    }
}

if (!function_exists('parse_google_maps_url')) {
    /**
     * Extract the src URL from a Google Maps embed code if provided,
     * otherwise return the string as is.
     *
     * @param string|null $value
     * @return string|null
     */
    function parse_google_maps_url(?string $value): ?string
    {
        if (!$value) return null;

        // If it looks like an iframe tag, try to extract the src
        if (str_contains($value, '<iframe')) {
            preg_match('/src="([^"]+)"/', $value, $matches);
            if (isset($matches[1])) {
                return $matches[1];
            }
        }

        return $value;
    }
}
