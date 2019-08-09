<?php
    function setSafer($var, $allow = false) {
        return strip_tags(trim($var), $allow);
    }

    function shortenNumber($n, $precision = 1) {
        if ($n < 1000) {
            // Anything less than a million
            $nFormat = number_format($n);
        }   else if ($n < 1000000) {
            // Anything less than a billion
            $nFormat = number_format($n / 1000, $precision) . ' b'; 
        } else if ($n < 1000000000) {
            // Anything less than a billion
            $nFormat = number_format($n / 1000000, $precision) . ' m';
        } else {
            // At least a billion
            $nFormat = number_format($n / 1000000000, $precision) . ' t';
        }
    
        return $nFormat;
    }