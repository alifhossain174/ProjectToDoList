<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Mail\UserForgetPasswordMail;
use App\Models\ToDo;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    const AUTHORIZATION_TOKEN = 'INEJEUDYSBW7583837NUDD752022';

    public function userLogin(Request $request){

        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                $id = Auth::user()->id;
                $name = Auth::user()->name;
                $email = Auth::user()->email;

                $data = array(
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                );

                return response()->json(['success' =>true, 'data' => $data]);
            }
            else{
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Login Credential'
                ])->setStatusCode(200);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }
    }

    public function userRegistration(Request $request){

        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {
            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);

            $email_check = User::where('email',$request->email)->first();
            if($email_check){
                return response()->json([
                    'success'=> false,
                    'message'=> 'Email already used ! Please use another Email'
                ]);
            } else {

                $id = DB::table('users')->insertGetId($data);
                $user_details = DB::table('users')->where('id', $id)->first();

                $data = array(
                    'id' => $user_details->id,
                    'name' => $user_details->name,
                    'email' => $user_details->email,
                );

                return response()->json([
                    'success' => true,
                    'data' => $data,
                ]);

            }
        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }

    }

    public function userForgetPassword(Request $request){
        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {

            $code = $request->code; // auto generate hidden from mobile user
            $email = $request->email;
            $user = User::where('email', $email)->first();
            if($user){

                $mailData = array();
                $mailData['code'] = $code;
                Mail::to(trim($email))->send(new UserForgetPasswordMail($mailData));

                $data = array(
                    'id' => $user->id,
                );

                return response()->json([
                    'success'=> true,
                    'data'=> $data
                ]);
            } else {
                return response()->json([
                    'success'=> false,
                    'message'=> 'No Email Found'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }
    }

    public function userChangePassword(Request $request){
        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {

            $user_id = $request->user_id;
            $password = $request->password;

            User::where('id', $user_id)->update([
                'password' => Hash::make($password),
            ]);

            return response()->json([
                'success'=> true,
                'message'=> 'Password Changed Successfully'
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }
    }

    public function userProfileUpdate(Request $request){
        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {

            $user_id = $request->user_id;
            $name = $request->name;

            User::where('id', $user_id)->update([
                'name' => $name,
            ]);

            return response()->json([
                'success'=> true,
                'message'=> 'Profile Updated Successfully'
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }
    }

    public function toDoList(Request $request){
        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {

            $data = ToDo::orderBy('id', 'desc')->where('user_id', $request->user_id)->paginate(15);
            return response()->json([
                'success'=> true,
                'data'=> $data
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }
    }

    public function saveTask(Request $request){
        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {

            ToDo::insert([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'description' => $request->description,
                'slug' => str::random(5) . time(),
                'created_at' => Carbon::now()
            ]);

            return response()->json([
                'success'=> true,
                'message'=> "Task Created"
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }
    }

    public function changeTaskStatus(Request $request){
        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {

            ToDo::where('slug', $request->slug)([
                'status' => 1
            ]);

            return response()->json([
                'success'=> true,
                'message'=> "Task Status Changed"
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }
    }

    public function taskView($slug, Request $request){
        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {

            $data = ToDo::where('slug', $slug)->first();

            return response()->json([
                'success'=> true,
                'data'=> $data
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }
    }

    public function taskUpdate(Request $request){
        if ($request->header('Authorization') == ApiController::AUTHORIZATION_TOKEN) {

            ToDo::where('slug', $request->slug)->where('user_id', $request->user_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            return response()->json([
                'success'=> true,
                'message' => "Task Updated"
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => "Authorization Token is Invalid"
            ], 422);
        }
    }

}
