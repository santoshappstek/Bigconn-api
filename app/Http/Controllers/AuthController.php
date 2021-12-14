<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\User;
use App\UserChapters;
use DB;
class AuthController extends Controller
{
    
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password 
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
   public function Login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|email',
            'password' => 'required|string'
        ]);     
       $request['email'] = $request->username;
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
        {
           $message = config('constants.login_fail');       
           return response(["success"=>false,"message"=>$message,"status"=>201],201); 
        }

        $user = $request->user();

        if($user)
        {
            if(($user->active_status == 0)&&($user->is_deleted == 0))
              {
                 $data['user'] = $user;
                 $data['token'] = $user->createToken('Personal Access Token')->accessToken;  
                 
                 if($request->login_from == 'web')
                 { 
                    if(($user->usertypeid == 2)||($user->usertypeid == 3))
                    {
                      $message = config('constants.login_notallowed');       
                      return response(["success"=>false,"message"=>$message,"status"=>201],201);
                    }
                    else
                    {                    
                      if(($user->usertypeid == 4)||($user->usertypeid == 5))
                        {
                            $data['chapter_id'] = 0;
                        }
                        else
                       {
                            $chapter_id = DB::table('users')->where('user_id', $user->user_id)
                                                                ->join('user_chapters','user_chapters.userid','=','users.user_id')
                                                                ->where('user_chapters.active_status',0)
                                                                ->select('user_chapters.chapterid')
                                                                ->first(); 
                            $data['chapter_id'] = $chapter_id->chapterid;
                        }  
                      }
                    }
                    else
                    {       
                        $chapter_id = DB::table('users')->where('user_id', $user->user_id)
                                    ->join('user_chapters','user_chapters.userid','=','users.user_id')
                                    ->where('user_chapters.active_status',0)
                                    ->select('user_chapters.chapterid')
                                    ->first(); 

                        $data['chapter_id'] = $chapter_id->chapterid;
                    } 
                $user_update = DB::table('users')->where('user_id', $user->user_id)
                                ->update(['logged_in_time' => Carbon::now()->toDateString()]);

               
            $message = config('constants.login_success');
            //$file_path = config('constants.FILE_PATH').'/profile_pic';
      
             return response(['success'=>true,'message'=>$message,'user'=>$data,'status'=>200], 200);                                                                              
            }           
            else { 
                $message = config('constants.login_fail');       
                return response(["success"=>false,"message"=>$message,"status"=>201],201);
        }             
      }
        else { 
                $message = config('constants.login_fail');       
                return response(["success"=>false,"message"=>$message,"status"=>201],201);
        } 
    }

    public function Register(Request $request)
    {
      $input = $request->all();

       $validator = Validator::make($request->all(), [        
        'email' => 'unique:users',
       // 'password' => 'required',
        //'repeat_password' => 'required',
        //'usertype_id' => 'required'                
      ]);
      if ($validator->fails()) { 
                $error_msg = "";
                foreach (json_decode($validator->errors()) as $key => $value) {
                   $error_msg = $value[0]; 
                   break;}
                return response(['success'=>false,'message'=>$error_msg,'status'=>222], 222);
      }
      try 
      {   
            $chapterid = env('CHAPTER_ID');

        if($request->password == $request->repeat_password)
        {
          $password = Hash::make($request->password);                  
            
          //$otp_text =env('OTP_TEXT');    
          //$otp=rand(1000, 9999); 
          $otp = 123456;         
          
          $user = new User();
          $user->first_name = $request->first_name;
          $user->last_name  = $request->last_name; 
          $user->display_name  = $request->first_name.' '.$request->last_name;          
          $user->email = $request->email;            
          $user->password = $password;
          $user->otp=$otp;
          $user->usertypeid = $request->usertype_id; 
          $user->registered_on = Carbon::now()->toDateString();
          $user->logged_in_time = Carbon::now()->toDateString();
          $user->profile_pic = env('FILE_PATH').'/profile_pic/'.'default.png';
          $user->save();

            $user_chapters = new UserChapters();
            $user_chapters->userid = $user->user_id;
            $user_chapters->chapterid = $chapterid;
            $user_chapters->save();

          $data['user'] = $user;
          $data['token'] = $user->createToken('Personal Access Token')->accessToken;
          $data['chapter_id'] = $chapterid;

          $message = config('constants.register_success');
              
          return response(['success'=>true,'message'=> $message,'user'=>$data,'status'=>200],200); 
       }
       else {
          $message = config('constants.passwords_mismatch');          
          return response(['success'=>false,'message'=>$message,'status'=>201],201);
        }
    } 
     catch(Exception $e)
     {
            $error_msg = "";
            foreach (json_decode($e->errors()) as $key => $value) {
               $error_msg = $value[0]; 
               break;
            }
            return response(['error'=>$error_msg,'status'=>401], 401); 
      }
    }


    public function CheckPattern(Request $request)
    {
      $input = $request->all();

      $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'pattern' => 'required'
        ]); 

          if ($validator->fails()) { 
                $error_msg = "";
                foreach (json_decode($validator->errors()) as $key => $value) {
                   $error_msg = $value[0]; 
                   break;}
                return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
          }
        try
        { 
          $user = User::where('email',$request->email)->first();

          if($user)
          {
            if($user->pattern == $request->pattern)
            { 
              $chapter_id = DB::table('users')->where('user_id', $user->user_id)
                                    ->join('user_chapters','user_chapters.userid','=','users.user_id')
                                    ->where('user_chapters.active_status',0)
                                    ->select('user_chapters.chapterid')
                                    ->first(); 

              $data['user'] = $user;
              $data['token'] = $user->createToken('Personal Access Token')->accessToken;
              $data['chapter_id'] = $chapter_id->chapterid;

              $message = config('constants.pattern_correct');
              return response(['success'=>true,'message'=>$message,'user'=>$data,'status'=>200],200);
            }
            else
            {
              $message = config('constants.pattern_incorrect');
              return response(['success'=>false,'message'=>$message,'status'=>201],201);
            }
          }          
          else{
            $message = config('constants.User_notfound');
            return response(['success'=>false,'message'=>$message,'status'=>201], 201); 
          }
      }
      catch (Exception $e)
      {
            $error_msg = "";
            foreach (json_decode($e->errors()) as $key => $value) {
               $error_msg = $value[0]; 
               break;
            }
            return response(['error'=>$error_msg, 'status'=>401], 401); 
      }
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function Logout(Request $request)
    {
        $request->user()->token()->revoke();        
        $message = config('constants.logout_success');
                
          return response(['success'=>true,'message'=>$message,'status'=>200], 200);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function Authenticatecheck()
    {
        $user = Auth::user();        
    
    if($user)
    {
        return response(['success'=>true,'user'=>$user,'message' => 'Token Verified Successfully','status' => 200],200);
  }
  else{
        return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
      }
    }
}