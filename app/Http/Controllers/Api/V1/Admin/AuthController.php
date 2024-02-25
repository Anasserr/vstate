<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Throwable;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Admin\UserResource;
use App\Http\Requests\ForgotPassordFromApi;
use App\Http\Requests\ValidateProfileEditAPi;
use App\Http\Requests\ChangePasswordApiRequest;
use App\Http\Requests\RegisterValidaterFromAPi;
use App\Http\Requests\ResetPasswordFromAPiRequest;
use App\Http\Requests\ApiLoginValidationParameters;
use App\Http\Resources\Admin\RoleResource as AdminRoleResource;

use function random_int;

class AuthController extends Controller
{
    public function mainTypes()
    {
        try {
            $roles =  Role::all();

            return responseApi(200, 'data retrieve', AdminRoleResource::collection($roles), [], $item = null);
        } catch (Throwable $exception) {
            return ResponseHelper(500, $exception);
        }
    }

    public function userTypes()
    {
        try {
            $roles =  Role::where('show_in_website', 1)->where('active', 'active')->get();

            return responseApi(200, 'data retrieve', AdminRoleResource::collection($roles), [], $item = null);
        } catch (Throwable $exception) {
            return ResponseHelper(500, $exception);
        }
    }

    public function requestForgotPasswordStepOne(ForgotPassordFromApi $request)
    {
        try {
            $user =  User::where('email', $request->email)->first();

            if (empty($user)) {
                return ResponseHelper(404, __('site.There is no account associated with this email'));
            }

            $resetPasswordToken         = random_int(100000, 999999);
            $user->password_reset_token = $resetPasswordToken;
            $user->save();

            // send  reset password token via email
            $data = [
                'name'    => $user->full_name ?? $user->email,
                'email'   => $user->email,
                'message' => $resetPasswordToken . 'كود اعاده ظبط كلمه السر ',
                'textt'   => $resetPasswordToken . 'كود اعاده ظبط كلمه السر ',
            ];

            if ($data['email'] !== '') {
                /* Mail::send('emails.reset_password_api', $data, function ($message) use ($data) {
                    $message->to($data['email'], $data['name'])->subject($data['message']);
                    $message->from('no_replay@dd.com', 'موقع dd ');
                });*/
            }

            return responseApi(200, __('site.An activation message has been sent to your mobile number'), [], [], $resetPasswordToken);
        } catch (Throwable $exception) {
            return ResponseHelper(500, $exception);
        }
    }

    public function sendAnotherCode(ForgotPassordFromApi $request)
    {
        try {
            $user =  User::where('email', $request->email)->first();

            if (empty($user)) {
                return ResponseHelper(404, __('site.There is no account associated with this email'));
            }

            $resetPasswordToken         = random_int(100000, 999999);
            $user->password_reset_token = $resetPasswordToken;
            $user->save();

            if (isset($user->phone)) {
                //sendSms($request->phone, $resetPasswordToken . 'كود ظبط كلمه السر الخاص dd ');
            }

            // send  reset password token via email
            $data = [
                'name'    => $user->full_name ?? $user->email,
                'email'   => $user->email,
                'message' => $resetPasswordToken . 'كود اعاده ظبط كلمه السر ',
                'textt'   => $resetPasswordToken . 'كود اعاده ظبط كلمه السر ',
            ];

            if ($user->email !== '') {
                /* Mail::send('emails.reset_password_api', $data, function ($message) use ($data) {
                    $message->to($data['email'], $data['name'])->subject($data['message']);
                    $message->from('no_replay@ddd.com', 'موقع   ');
                });*/
            }

            return responseApi(200, __('site.The password reset code has been sent again to the email and mobile'), [], [], $resetPasswordToken);
        } catch (Throwable $exception) {
            return ResponseHelper(500, $exception);
        }
    }

    public function requestForgotPasswordStepTwo(ResetPasswordFromAPiRequest $request)
    {
        DB::beginTransaction();

        try {
            $userCheckTwo =  User::where('password_reset_token', $request->token)->first();

            if (empty($userCheckTwo)) {
                return ResponseHelper(420, __('site.The code is incorrect'));
            }

            $user =  User::where('password_reset_token', $request->token)->first();

            if (isset($request->password)) {
                $user->password = Hash::make($request->password);
            }

            $user->password_reset_token = null;
            $user->save();
            DB::commit();

            if (isset($user->phone)) {
                // sendSms($request->phone, 'تم تغير كلمه السر الخاصه بك فى  ');
            }

            if (!empty($user)) {
                $token = JWTAuth::attempt(['email' => $user->email, 'password' => $request->password]);

                if ($token) {
                    if (Auth::check()) {
                        if (isset($request->fireBaseToken) && isset($request->deviceId)) {
                            //   \App\Http\Helpers\Firebasee::createFirebaseToken(Auth::user()->id, $request->fireBaseToken, $request->deviceId, 1);
                            // send WelCome Notifcation
                            //\App\Http\Helpers\Firebasee::pushNotification(Auth::user()->id, 'مرجبا بكم فى  ', 'تم  انشاء حسابك فى موقع   الرجاء تفعيل حسابكم ', $push_type = null, 2, $conversationId = '', null);
                        }
                    }

                    return responseApi(200, __('site.Your password has been changed'), new UserResource(Auth::user()), [], $token);
                }
            }
        } catch (Throwable $exception) {
            DB::Rollback();

            return ResponseHelper(500, $exception);
        }
    }

    public function login(ApiLoginValidationParameters $requests)
    {
        try {
            $token = null;

            if (!$token = JWTAuth::attempt(['email' => $requests->email, 'password' => $requests->password])) {
                return ResponseHelper(420, trans('site.login_fail'));
            }

            /*   if (isset($requests->token) && isset($requests->deviceId)) {
                \App\Http\Helpers\Firebasee::createFirebaseToken(Auth::user()->id, $requests->token, $requests->deviceId, 1);
                // send WelCome Notifcation
                \App\Http\Helpers\Firebasee::pushNotification(Auth::user()->id, 'مرجبا بكم فى  ', 'تم تسجيل دخولك فى      تمتع بيوم سعيد', $push_type = null, 1, $conversationId = '', null);
            }*/

            return responseApi(200, '', new  UserResource(Auth::user()), [], $token);
        } catch (Throwable $exception) {
            return ResponseHelper(500, $exception);
        }
    }

    public function register(RegisterValidaterFromAPi $request)
    {
        try {
            DB::beginTransaction();
            // create user
            $request['verified_at'] =   Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));

            $user = User::create($request->all());
            $user->roles()->sync($request->input('roles', []));
            if ($request->input('image', false)) {
                $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }

            DB::commit();

            return responseApi(200, trans('site.register_done_please_check_mail_for_Active_acount'), [], [], '');
        } catch (Throwable $exception) {
            DB::rollBack();

            return ResponseHelper(500, $exception);
        }
    }

    // update profile data
    public function completeProfileData(ValidateProfileEditAPi $request)
    {
        DB::beginTransaction();

        try {
            $user = User::find(Auth::user()->id) ;
            $user->update($request->all());

            if (isset($request->roles)) {
                $user->roles()->sync($request->input('roles', []));
            }

            if ($request->input('image', false)) {
                if (!$user->image || $request->input('image') !== $user->image->file_name) {
                    if ($user->image) {
                        $user->image->delete();
                    }

                    $user->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
                }
            } elseif ($user->image) {
                $user->image->delete();
            }

            DB::commit();

            return responseApi(Response::HTTP_ACCEPTED, __('site.Data update saved successfully'), new  UserResource($user), [], '');
        } catch (Throwable $e) {
            DB::rollback();

            return ResponseHelper(500, $e);
        }
    }

    public function changePassword(ChangePasswordApiRequest $request)
    {
        DB::beginTransaction();

        try {
            $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);

            if ($currentPasswordStatus) {
                $user = User::find(Auth::user()->id)  ; //Auth::user();

                if (isset($request->password)) {
                    $user->password = Hash::make($request->password);
                    $user->save();
                    DB::commit();
                }

                return responseApi(200, __('site.Data update saved successfully'), [], [], '');
            } else {
                return ResponseHelper(422, trans('site.Current Password does not match with Old Password'));
            }
        } catch (Throwable $e) {
            DB::rollback();

            return ResponseHelper(500, $e);
        }
    }

    public function me()
    {
        return responseApi(200, __('site.Data update saved successfully'), new UserResource($this->guard()->user()), [], '');
    }

    public function logout(Request $request)
    {
        Auth::user()->logout ;

        return ResponseHelper(200, __('site.bye_bye_logout'));
    }

    public function guard()
    {
        return Auth::guard();
    }
}