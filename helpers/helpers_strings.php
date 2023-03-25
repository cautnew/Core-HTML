<?php

if (!function_exists('str_sanity_space')) {
  function str_sanity_space(string $str): string
  {
    $str = preg_replace('/\s\s+/', ' ', $str);
    $str = trim($str);

    return $str;
  }
}
