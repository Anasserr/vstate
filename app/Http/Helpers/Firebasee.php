<?php

namespace App\Http\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class Firebasee
{
    // type equal 1 if first time  2 for login
    public static function createFirebaseToken($userId, $token, $deviceId, $type)
    {
        switch ($type) {
            case 1:
                try {
                    if (isset($token) && isset($deviceId) && '' != $deviceId && '' != $token) {
                        $listOfTokens = \App\Models\FirebaseToken::where([['device_id', $deviceId], ['token', $token]])->get();
                        if ($listOfTokens) {
                            foreach ($listOfTokens as $record) {
                                $record->token = null;
                                $record->save();
                            }
                        }

                        $check = \App\Models\FirebaseToken::where([['user_id', $userId], ['device_id', $deviceId]])->first();
                        if ($check) {
                            $check->token = $token;
                            $check->save();
                        } else {
                            $fireBaseToken = new \App\Models\FirebaseToken();
                            $fireBaseToken->user_id = $userId;
                            $fireBaseToken->token = $token;
                            $fireBaseToken->device_id = $deviceId;
                            $fireBaseToken->save();
                        }
                    }
                } catch (\Exception $exception) {
                    return ResponseHelper(420, 'حدث خطا ماء اذا اضافه الكود الخاص بكم للنتوفتيشن ');
                }
                break;
            case 2:
                try {
                    if (isset($token) && isset($deviceId) && '' != $deviceId && '' != $token) {
                        $listOfTokens = \App\Models\FirebaseToken::where([['device_id', $deviceId], ['user_id', $userId]])->get();
                        if ($listOfTokens) {
                            foreach ($listOfTokens as $record) {
                                $record->token = null;
                                $record->save();
                            }
                        }
                    }
                } catch (\Exception $exception) {
                    //   DB::rollback();
                    return ResponseHelper(420, 'حدث خطا ماء اذا اضافه الكود الخاص بكم للنتوفتيشن ');
                }
                break;
            default:
                break;
        }
    }

    public static function pushAllUser()
    {
        $factory = (new Factory())
            ->withServiceAccount(__DIR__.'/jerrah-aucation-firebase-adminsdk-c13v9-0417b2a5c2.json')
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://jeerah.firebaseio.com');

        $database = $factory->createDatabase();
        $users = \App\Models\User::all();
        $data = [];
        foreach ($users as $user) {
            $userData = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'mobile' => $user->mobile,
                'image' => $user->image_path,
            ];
            array_push($data, $userData);
        }

        //    $newPost = $database
        //      ->getReference('users')
        //   ->getChild($reservationId)
        //      ->set($data);

        $newPost = $database
            ->getReference('users')
            ->push($data);

        return 'all user pushed to firebase ';
    }

  /*  public static function addBiddingToFireBase($aucationId, $amount, $bidderId, $check, $userId = null, $attenderBidderId)
    {
        if (Auth::check()) {
            $factory = (new Factory())
                ->withServiceAccount(__DIR__.'/jerrah-aucation-firebase-adminsdk-c13v9-0417b2a5c2.json')
                // The following line is optional if the project id in your credentials file
                // is identical to the subdomain of your Firebase project. If you need it,
                // make sure to replace the URL with the URL of your project.
                ->withDatabaseUri('https://jeerah.firebaseio.com');

            $database = $factory->createDatabase();

            $useraName = '';
            if (isset($aucationId)) {
                $auctionUserId = \App\Models\Aucation::where('id', $aucationId)->select('user_id')->first();
                if (!empty($auctionUserId)) {
                    if ($auctionUserId->user_id == Auth::user()->id) {
                        if (null != $attenderBidderId) {
                            $attendingData = \App\Models\AttendingBidder::where('id', intval($attenderBidderId))->first();

                            $useraName = 'رقم المضرب '.' '.$attendingData->racket_number;
                        } else {
                            $useraName = 'المزايد الحضورى';
                        }
                    } else {
                        $useraName = returnPartOfName(Auth::user()->full_name, 1);
                    }
                }
            }

            $biddingData = [
                'id' => 1, // $bidderId ,
                'offer' => $amount,
                'winer' => $check,
                'userId' => Auth::user()->id,
                'name' => $useraName,
                'image' => (isset(Auth::user()->image)) ? url('/').'/uploads/users/'.Auth::user()->image : url('/').'/img/avatar.png',
                'created_at' => Carbon::now()->format('Y-m-d'),
            ];

            $newPost = $database
                ->getReference('biddings/'.$aucationId)
                ->push($biddingData);
        } else {
            if (null != $userId) {
                $user = \App\Models\User::find(intval($userId));
                $factory = (new Factory())
                    ->withServiceAccount(__DIR__.'/jerrah-aucation-firebase-adminsdk-c13v9-0417b2a5c2.json')
                    // The following line is optional if the project id in your credentials file
                    // is identical to the subdomain of your Firebase project. If you need it,
                    // make sure to replace the URL with the URL of your project.
                    ->withDatabaseUri('https://jeerah.firebaseio.com');

                $database = $factory->createDatabase();

                $biddingData = [
                    'id' => 1, // $bidderId ,
                    'offer' => $amount,
                    'winer' => $check,
                    'userId' => $user->id,
                    'name' => $user->full_name,
                    'image' => (isset($user->image)) ? url('/').'/uploads/users/'.$user->image : url('/').'/img/avatar.png',
                    'created_at' => Carbon::now()->format('Y-m-d'),
                ];

                $newPost = $database
                    ->getReference('biddings/'.$aucationId)
                    ->push($biddingData);
            }
        }
    }*/



    /*
     * push notifications  code
     */
    // sending push message to single user by firebase reg id
    public static function send($to, $message)
    {
        // $bady = json_decode($message) ;
        // dd() ;

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);
        $optionBuilder->setContentAvailable(1);
        // $optionBuilder->setMutableContent(true);
        $notificationBuilder = new PayloadNotificationBuilder('تنبيه من موقع وابليكيشن مزادت جيره');
        /*$notificationBuilder->setBody(json_encode((isset($bady->data->message)) ? $bady->data->message : "") )
            ->setSound('default');*/

        $notificationBuilder->setBody($message['data']['message'])
            ->setSound('default');
        //   ->setIcon( 'http://jeerahspace.com/demo/front/img/location.png');

        $dataBuilder = new PayloadDataBuilder();

        $dataBuilder->addData($message['data']);
        /*$dataBuilder->addData(['data' => json_encode(array(
            'title' => 'test' ,
            'body' => 'test' ,
            'ididi' => 'test' ,
        ))]);*/
        //  $dataBuilder->addData();

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        //  dd($dataBuilder) ;
        $data = $dataBuilder->build();

        // You must change it to get your tokens
        $tokens = \App\Models\FirebaseToken::where('token', '!=', null)->where('user_id', $to)->pluck('token')->toArray();
        if ($tokens) {
            $downstreamResponse = FCM::sendTo(array_unique($tokens), $option, $notification, $data);

            $downstreamResponse->numberSuccess();
            $downstreamResponse->numberFailure();
            $downstreamResponse->numberModification();

            // return Array - you must remove all this tokens in your database
            $downstreamResponse->tokensToDelete();

            // return Array (key : oldToken, value : new token - you must change the token in your database )
            $downstreamResponse->tokensToModify();

            // return Array - you should try to resend the message to the tokens in the array
            $downstreamResponse->tokensToRetry();

            // return Array (key:token, value:errror) - in production you should remove from your database the tokens present in this array
            $downstreamResponse->tokensWithError();
        }
    }

    // Sending message to a topic by topic name
    public static function sendToTopic($to, $message)
    {
        $fields = [
            'to' => '/topics/'.$to,
            'data' => $message,
        ];

        return self::sendPushNotification($fields);
    }

    // sending push message to multiple users by firebase registration ids
    public static function sendMultiple($registration_ids, $message)
    {
        $fields = [
            'to' => $registration_ids,
            'data' => $message,
        ];

        return self::sendPushNotification($fields);
    }

    /*
     * push notification to firebase
     */
    public static function pushNotification($userId, $title, $message, $push_type = null, $type, $conversationId = '', $aucationId = '')
    {
        // save notification
        // notifcation savinf in  database
        $aucationObject = [];
        $user = \App\Models\User::find($userId);
        $aucation = \App\Models\Aucation::find(intval($aucationId));
        if (!empty($aucation)) {
            /*$aucationObject =  array(
                'id' => $aucation->id  ,
                'name' => $aucation->name  ,
                'image' =>   (!empty($aucation->aucationImages()->inRandomOrder()->first())) ?  url('/public').'/uploads/aucation_attachments/'.$aucation->aucationImages()->inRandomOrder()->first()->attachment  : ""  ,
                'link' => url('/aucation').'/'.arabicSlug($aucation->name).'/'.$aucation->id  ,
            ) ;*/
            $aucationObject = [
                'id' => $aucation->id,
                'name' => $aucation->name,
                'image' => (!empty($aucation->aucationImages()->inRandomOrder()->first())) ? url('/public').'/uploads/aucation_attachments/'.$aucation->aucationImages()->inRandomOrder()->first()->attachment : '',
                'link' => env('APP_URL').'/aucation/'.arabicSlug($aucation->name).'/'.$aucation->id,
            ];
        } else {
            $aucationObject = null;
        }

        // notification
        if (isset($conversationId)) {
            $conversationId = intval($conversationId);
        } else {
            $conversationId = null;
        }
        $notificationData = ['msg' => $message, 'title' => $title, 'type_of_send' => (isset($type)) ? intval($type) : 1, 'aucation' => $aucationObject, 'conversationId' => $conversationId];
        $user->receiver_id = $user->id;
        assignNotifications($user, $notificationData, $user->email);

        //   $user = array('id' => Auth::user()->id , 'name' => Auth::user()->full_name  , 'image' => Auth::user()->image_path );
        $userObject = ['name' => $user->full_name,
            'image' => (isset($user->image)) ? url('/').'/uploads/users/'.$user->image : url('/').'/img/avatar.png',  // file_exists( url('/').'/uploads/users/'.$this->image) &&
        ];
        $push = new \App\Http\Helpers\Push();
        $push->setId(1);
        $push->setType(intval($type));
        $push->setUser($userObject);
        $push->setTitle($title);
        $push->setMessage($message);
        $push->setMessage($message);
        $push->setaAucation($aucationObject);
        $json = $push->getPush();

        self::send($userId, $json);

        $numberOfUnReadedNotication = \App\Models\Notif::where('read_at', null)->where('user_id', intval($userId))->count('id');
        self::pushNumberOfUnreadedNotifcation(intval($userId), intval($numberOfUnReadedNotication));
    }


    /*
        * send notification to specific user
        */
    public static function sendNotificationToUser($title, $message, $userId, $type, $gameId = 0)
    {
        self::pushNotification(intval($userId), $title, $message, $push_type = 'individual', intval($type), $gameId);
    }



    public static function pushNumberOfUnreadedNotifcation($userId, $numberOfNotifcations)
    {
        $factory = (new Factory())
            ->withServiceAccount(__DIR__.'/jerrah-aucation-firebase-adminsdk-c13v9-0417b2a5c2.json')
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://jeerah.firebaseio.com');

        $database = $factory->createDatabase();
        $data = [
            'userId' => intval($userId),
            'numberOfNotifcations' => $numberOfNotifcations,
        ];
        $newPost = $database
            ->getReference('numberOfNotifcations')
            ->getChild(intval($userId))
            ->set($data);
    }

}
