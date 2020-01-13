<?php

namespace App\Helpers;


use Carbon\Carbon;

class DateTimeHelper {

  static function longWordDate ($date) {
    return date_format(date_create($date), 'l, jS F Y');
  }

  static function shortDate ($date) {
    return date_format(date_create($date), 'd-m-y');
  }

  static function shortTime ($time) {
    return date_format(date_create($time), 'g:ia');
  }

  static function getShortDate() {
    return date_format(date_create(Carbon::now()), 'd-m-y');
  }

}
