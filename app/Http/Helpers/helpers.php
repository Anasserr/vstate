<?php

use Carbon\Carbon;
/*use App\Notifications\DbNotification;*/
use Illuminate\Support\Facades\File ;

/*use App\Notifications\MailNotification;*/

//send sms and function for format phone number
if (!function_exists('formatNumbers')) {
    function formatNumbers($numbers, $separator)
    {
        if (!is_array($numbers)) {
            return formatNumber($numbers);
        }
        $numbers_array = [];
        foreach ($numbers as $number) {
            $n = formatNumber($number);
            array_push($numbers_array, $n);
        }

        return implode($separator, $numbers_array);
    }
}

if (!function_exists('formatNumber')) {
    function formatNumber($number)
    {
        if (strlen($number) == 10 && starts_with($number, '05')) {
            return preg_replace('/^0/', '++966', $number);
        } elseif (starts_with($number, '00')) {
            return preg_replace('/^00/', '', $number);
        } elseif (starts_with($number, '+')) {
            return preg_replace('/^+/', '', $number);
        }

        return $number;
    }
}

if (!function_exists('checkLanguage')) {
    //check which language is used and return value to the middleware file 'checkLanguage'
    function checkLanguage($language)
    {
        if (isset($language)) {
            return $language;
        }

        return 'en';
    }
}

if (!function_exists('generateCode')) {
    //Generate Activation code to users
    function generateCode($length)
    {
        $characters       = '01029324278';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; ++$i) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}

if (!function_exists('arabicSlug')) {
    function arabicSlug($string, $separator = '_')
    {
        if (is_null($string)) {
            return '';
        }

        $string = trim($string);

        $string = mb_strtolower($string, 'UTF-8');

        $arabic        = 'اأآؤءئبتثجحخدذرزسشـصضطظعغفقكلمنهوية';
        $stringtext    = strtolower(preg_replace('/[^a-z0-9~%.:_-' . $arabic . ']+/i', $separator, $string));

        $string = preg_replace("/[\s-]+/", ' ', $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;

        if (is_null($string)) {
            return '';
        }
    }
}

//////////////////////////////
// using error response for api.
if (!function_exists('errorResponse')) {
    function errorResponse($code, $message)
    {
        return response()->json([
            'code'       => $code,
            'data'       => [],
            'pagination' => [],
            'message'    => $message,
            'item'       => '',
        ], $code);
    }
}

if (!function_exists('responseApi')) {
    function responseApi($code, $message = '', $data = [], $pagination = [], $item = '')
    {
        return response()->json([
            'code'       => $code,
            'data'       => $data,
            'pagination' => $pagination,
            'message'    => $message,
            'item'       => $item,
        ], $code);
    }
}

//////////////////////////////
// using error response for api.
if (!function_exists('ResponseHelper')) {
    function ResponseHelper($code, $message)
    {
        return response()->json([
            'code'       => $code,
            'data'       => [],
            'pagination' => [],
            'message'    => $message,
            'item'       => '',
        ], $code);
    }
}

// using Slug.
if (!function_exists('slugg')) {
    function slugg($string, $separator)
    {
        if (is_null($string)) {
            return '';
        }

        $arabic = 'اأآؤءئبتثجحخدذرزسشـصضطظعغفقكلمنهوية';

        return strtolower(preg_replace('/[^a-z0-9~%.:_-' . $arabic . ']+/i', $separator, $string));

        //   $string = trim($string);
        //  $string = mb_strtolower($string, 'UTF-8');

        // Make alphanumeric (removes all other characters)
        // this makes the string safe especially when used as a part of a URL
        // this keeps latin characters and Persian characters as well
        //    $string = preg_replace("/[^a-z0-9_\s-ءاآؤئبپتثجچحخدذرزژسشصضطظعغفقکگلمنوهی]/u", '', $string);

        // Remove multiple dashes or whitespaces or underscores
        //      $string = preg_replace("/[\s-_]+/", ' ', $string);

        // Convert whitespaces and underscore to the given separator
        //      $string = preg_replace("/[\s_]/", $separator, $string);

        //    return $string;
    }
}

// using upload file.
if (!function_exists('assignNotifications')) {
    function assignNotifications($model, $data, $email = '')
    {
        $model->notify(new DbNotification($data));
        $model->notify(new MailNotification($data));
        if ($email) {
            $model->notify(new MailNotification($data));
        }
    }
}
// prep breadcrumps trails

// assign notification as read
if (!function_exists('assignNotificationAsRead')) {
    function assignNotificationAsRead($notificationId)
    {
        try {
            if (!isset($notificationId)) {
                throw new Exception();
            }
            //     $update = Notif::findOrFail($notificationId)->update(['read_at' => Carbon::now()]);
            //      return $update;
        } catch (\Exception $e) {
            return 0;
        }
    }
}

// getLastPartFromEmail
if (!function_exists('getLastPartFromEmail')) {
    function getLastPartFromEmail($email)
    {
        // split on @ and return last value of array (the domain)
        $domain = explode('@', $email) ;

        // output domain
        return  $domain[1] ;
    }
}

// getFirstPartFromEmail
if (!function_exists('getFirstPartFromEmail')) {
    function getFirstPartFromEmail($email)
    {
        // split on @ and return last value of array (the domain)
        $domain = explode('@', $email) ;

        // output domain
        return  $domain[0] ;
    }
}

// ditance  using lat and lang
if (!function_exists('distance')) {
    function distance($lat1, $lon1, $lat2, $lon2)
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist  = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist  = acos($dist);
            $dist  = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;

            return ($miles * 1.609344);
        }
    }
}

// unique_multidim_array
if (!function_exists('unique_multidim_array')) {
    function unique_multidim_array($array, $key)
    {
        $temp_array = [];
        $i          = 0;
        $key_array  = [];

        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i]  = $val[$key];
                $temp_array[$i] = $val;
            }
            ++$i;
        }

        return $temp_array;
    }
}

// return part of name  number of world and strign
if (!function_exists('returnPartOfName')) {
    function returnPartOfName($text, $number)
    {
        try {
            if (count(preg_split("~[^\p{L}\p{N}\']+~u", $text)) == 0) {
                return '' ;
            }

            if (count(preg_split("~[^\p{L}\p{N}\']+~u", $text)) < $number) {
                if (strlen($text) < 24) {
                    return $text ;
                } else {
                    return substr($text, 0, 24) ;
                }
            }

            $textone = preg_split("~[^\p{L}\p{N}\']+~u", $text) ;
            $text    = '' ;
            for ($i = 0; $i < $number ; ++$i) {
                $text .= ' ' . $textone[$i];
            }

            if (strlen($text) < 24) {
                return $text ;
            } else {
                return substr($text, 0, 24) ;
            }
        } catch (\Exception $e) {
            return ' ';
        }
    }
}