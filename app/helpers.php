<?php

use Illuminate\Support\Facades\Request;


function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'active' : '';
    }
    return Request::path() == $route ? 'active' : '';
}

//helper for invoice number generator
// function IDGenerator($model, $trow, $prefix, $length = 4)
// {
//     $data = $model::orderBy('id', 'desc')->first();
//     if (!$data) {
//         $og_length = $length;
//         $last_number = ''; //start from 0
//     } else {
//         $code = substr($data->$trow, strlen($prefix) + 1);
//         $actial_last_number = ($code / 1) * 1;
//         //si l'actuel number exixt faire plus 1
//         $increment_last_number = ((int)$actial_last_number) + 1;
//         $last_number_length = strlen($increment_last_number);
//         $og_length = $length - $last_number_length;
//         $last_number = $increment_last_number;
//     }
//     $zeros = "";
//     for ($i = 0; $i < $og_length; $i++) {
//         $zeros .= "0";
//     }
//     return $prefix . '-' . $zeros . $last_number;
// }

function IDGenerator($model, $trow, $prefix, $length = 4)
{
    $cache_key = $model . '_' . $trow . '_id';

    // Try to get last generated ID from cache
    $id = cache()->get($cache_key);

    if (!$id) {
        // Query the database to get the last generated ID
        $data = $model::orderBy('id', 'desc')->first();

        if (!$data) {
            // No records found, start from 0
            $id = 0;
        } else {
            $code = substr($data->$trow, strlen($prefix) + 1);
            $id = ($code / 1) * 1 + 1;
        }

        // Cache the last generated ID for 1 day
        cache()->put($cache_key, $id, now()->addDay());
    }

    // Generate the ID string
    $last_number_length = strlen((int)$id);
    $zeros = str_repeat('0', max(0, $length - $last_number_length));
    return $prefix . '-' . $zeros . $id;
}