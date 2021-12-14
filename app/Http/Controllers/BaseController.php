<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Discounts;
use App\UserPermissions;
use App\MyLittle;
use App\Chapters;
use App\Help;
use Response;
use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;


class BaseController extends Controller
{
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
                return response(['success'=>false,'error'=>$error_msg,'status'=>222], 222);
      }
      try 
      {    
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

          $message = config('constants.register_success');
              
          return response(['success'=>true,'message'=> $message,'user'=>$user,'status'=>200],200); 
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

    

    public function UploadProfilepicture(Request $request)
    {
      $input = $request->all();

      // $validator = Validator::make($request->all(), [
      //     'user_id' => 'required',
      //     'profile_pic' => 'required'          
      //     ]);

      //     if ($validator->fails()) { 
      //           $error_msg = "";
      //           foreach (json_decode($validator->errors()) as $key => $value) {
      //              $error_msg = $value[0]; 
      //              break;}
      //           return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
      //     }

        try
        { 
        $user = Auth::user();        
    
        if($user)
        {          
            if($request->profile_pic != '')
            {
              $profile_pic = $request->file('profile_pic');           
              $fullName=$profile_pic->getClientOriginalName();
              $name=explode('.',$fullName)[0];
              $picName = env('FILE_PATH').'/profile_pic/'.$name.'-'.time().'.'.$profile_pic->getClientOriginalExtension();
              $profile_pic->move(public_path('profile_pic'),$picName);

              $user_update = User::find($user->user_id);
              $user_update->profile_pic = $picName;
              $user_update->save();

              //$message = config('constants.photo_added');
              return response(['success'=>true,'profile_pic'=>$picName,'status'=>200],200);
            }
            else
            {
              $picName = env('FILE_PATH').'/profile_pic/'.'default.png';
              return response(['success'=>true,'profile_pic'=>$picName,'status'=>201],201);
            }
          }
          //$file_path = config('constants.FILE_PATH').'/profile_pic'; 
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

    public function GetProfilepicture(Request $request)
    {
      $input = $request->all();  

      $user = Auth::user();        
    
      if($user)
      {   
        $user = DB::table('users')->where('user_id', $user->user_id)          
                                   ->select('user_id','display_name','first_name','last_name','email','profile_pic')->first();

        return response(['success'=>true,'user_pic'=>$user,'status'=>200], 200);
      }
      else{
            $message = config('constants.User_notfound');
            return response(['success'=>false,'message'=>$message,'status'=>201], 201); 
          }
    }

    public function SetPattern(Request $request)
    {
      $input = $request->all();

      // $validator = Validator::make($request->all(), [
      //     'user_id' => 'required',
      //     'pattern' => 'required'          
      //     ]);

      //     if ($validator->fails()) { 
      //           $error_msg = "";
      //           foreach (json_decode($validator->errors()) as $key => $value) {
      //              $error_msg = $value[0]; 
      //              break;}
      //           return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
      //     }
      try
      {         
          if($request->pattern != '')
          {
            $user_update = User::find($request->user_id);
            $user_update->pattern = $request->pattern;
            $user_update->save();
          }
          else
          {
            $pattern = '';
          }
          $message = config('constants.pattern_added');
          return response(['success'=>true,'message'=>$message,'status'=>200],200);
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

    

     public function OTPValidation(Request $request) 
    {            
      $input = $request->all();

      // $validator = Validator::make($request->all(), [
      //     'username' => 'required',
      //     'otp' => 'required'          
      //     ]);

      //     if ($validator->fails()) { 
      //           $error_msg = "";
      //           foreach (json_decode($validator->errors()) as $key => $value) {
      //              $error_msg = $value[0]; 
      //              break;}
      //           return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
      //     }
        try
        { 
          $user =  DB::table('users')//->where('username', $request->username)
                                     ->Where('email', $request->username)->first();

          if($user->otp == $request->otp)
          { 
            $message = config('constants.otp_success');
            return response(['success'=>true,'message'=>$message,'status'=>200],200);
          }
          else
          {
            $message = config('constants.otp_wrong');
            return response(['success'=>flase,'message'=>$message,'status'=>201],201);
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

  public function ReSendOtp(Request $request)
  {
    $input = $request->all();

    // $validator = Validator::make($request->all(), [
    //   'username' => 'required'                   
    // ]);
    //   if ($validator->fails()) { 
    //     $error_msg = "";
    //     foreach (json_decode($validator->errors()) as $key => $value) {
    //       $error_msg = $value[0]; 
    //       break;}
    //       return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
    //   }
    try
    {                     
      $otp = 123456;
      $user = User::where('email','=',$request->input('username'))                    
                     ->first();

      //$user = Auth::user();

      if($user != [] || $user != 0)
      {    
        $otp_text =env('OTP_TEXT');             
        $user->otp = $otp;
        $user->save(); 

        $message = config('constants.otp_sent');                       
        return response(['success'=>true,'message'=>$message,'otp'=>$otp,'status'=>200], 200);
      }
      else
      {
        $message = config('constants.mail_wrong');
        return response(['success'=>false,'message'=>$message,'status'=>201],201); 
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

  public function SignInRemember(Request $request)
  {
    $input = $request->all();

    // $validator = Validator::make($request->all(), [
    //   'profile_pic' => 'required',
    //   'password' => 'required'                  
    // ]);
    //   if ($validator->fails()) { 
    //     $error_msg = "";
    //     foreach (json_decode($validator->errors()) as $key => $value) {
    //       $error_msg = $value[0]; 
    //       break;}
    //       return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
    //   }
      try
          {
            $user = DB::table('users')->where('profile_pic', $request->profile_pic)
                                      ->first();
            if($user)
            {
              if(Hash::check($request->password, $user->password)) {               

               $user->logged_in_time = Carbon::now()->toDateString();
               $data['user'] = $user;
               $data['token'] = $user->createToken('Personal Access Token')->accessToken;              
                $chapter_id = DB::table('users')->where('user_id', $user->user_id)
                                        ->join('user_chapters','user_chapters.userid','=','users.user_id')
                                        ->where('user_chapters.active_status',0)
                                        ->select('user_chapters.chapterid')
                                        ->first(); 

                $data['chapter_id'] = $chapter_id->chapterid;
                
               $message = config('constants.login_success');
               
               //$file_path = config('constants.FILE_PATH').'/profile_pic';
      
             return response(['success'=>true,'message'=>$message,'user'=>$data,'status'=>200], 200);
            } 
            else {  
                 $message = config('constants.invalid_password');          
                 return response(["success"=>false,"message"=>$message,"status"=>201],201);                
               }          

          } else { 
                $message = config('constants.login_fail');       
             return response(["success"=>false,"message"=>$message,"status"=>201],201);
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

  // public function ForgotPassword(Request $request)
  // {
  //   $credentials = request()->validate(['email' => 'required|email']);

  //       Password::sendResetLink($credentials);

  //       return response()->json(["msg" => 'Reset password link sent on your email id.']);
  // }

  public function ForgotPassword(Request $request)
  {
    // $user = DB::table('users')->where('email',$request->email)->first();
    // if($user)
    // {
        $key=md5(time()+123456789% rand(4000, 55000000));    

        $to = $request->email;
        $subject = 'Changing password DEMO- psuresh.com.np';
        $msg = "Please copy the link and paste in your browser address bar". "\r\n"."www.psuresh.com.np/misc/forgot-password-php/forgot_password_reset.php?key=".$key."&email=".$request->email;
        $headers = 'From:BigS APP';
        mail($to, $subject, $msg, $headers);

          $message = config('constants.forgot_link');       
          return response(["success"=>true,'to'=>$msg,"message"=>$message,"status"=>200],200);
      // }
      // else
      // {
            // $message = config('constants.mail_wrong');
            // return response(['success'=>false,'message'=>$message,'status'=>201],201);
      // }
  }

  public function reset(ResetPasswordRequest $request) 
  {
        $reset_password_status = Password::reset($request->validated(), function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return $this->respondBadRequest(ApiCode::INVALID_RESET_PASSWORD_TOKEN);
        }

        return $this->respondWithMessage("Password has been successfully changed");
  }

  public function UploadMylittlepic(Request $request)
  {
      $input = $request->all();
        // $validator = Validator::make($request->all(), [
      //     'mylittle_id'=>'required',
      //     'little_pic' => 'required'          
      //     ]);

      //     if ($validator->fails()) { 
      //           $error_msg = "";
      //           foreach (json_decode($validator->errors()) as $key => $value) {
      //              $error_msg = $value[0]; 
      //              break;}
      //           return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
      //     }

        try
        {         
          if($request->little_pic != '')
          {
            $little = DB::table('mylittle')->where('mylittle_id',$request->mylittle_id)->first();
            if($little)
            {
              $little_pic = $request->file('little_pic');           
              $fullName=$little_pic->getClientOriginalName();
              $name=explode('.',$fullName)[0];
              $picName = env('FILE_PATH').'/mylittle_pic/'.$name.'-'.time().'.'.$little_pic->getClientOriginalExtension();
              $little_pic->move(public_path('mylittle_pic'),$picName);

              $little_update = MyLittle::find($request->mylittle_id);
              $little_update->picture = $picName;
              $little_update->save();

            return response(['success'=>true,'little_pic'=>$picName,'status'=>200],200);
          }
          else
          {
            $message = config('constants.little_not');
            return response(['success'=>false,'message'=>$message,'status'=>201],201);
          }
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

    public function ViewLittle(Request $request)
    {
      $input = $request->all();
      try
      {
        $user = Auth::user();
        if($user)
        {
          $little = DB::table('mylittle')->where('userid',$user->user_id)
                                        ->first();
        }

         return response(['success'=>true,'little'=>$little,'status'=>200],200);
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

    public function MylittleHomeScreen()
    {
      $screens = DB::table('home_screens')
                      //->whereIn('screen_id', [1,2,3,4,5,6])
                      ->whereIn('screen_id', [7,8,9,10,11,12])
                      ->get();
      $message = config('constants.homescreen_message');
                
      return response(['success'=>true,'home_screens'=>$screens,'message'=>$message,'status'=>200],200);
    }

    public function AddChapter(Request $request)
    {
        $input = $request->all(); 
        
        $validator = Validator::make($request->all(), [
          'chapter_name' => 'unique:chapters',
          'description' => 'required',
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
          $user = Auth::user();
          if($user)
          {
            $chapters = new Chapters();
            $chapters->chapter_name = $request->chapter_name;  
            $chapters->description = $request->description; 
            $chapters->created_by = $user->user_id;  
            $chapters->active_status = $request->active_status; 
            $chapters->save();

            $message = config('constants.chapter_added');    
           return response(['success'=>true,'message'=>$message,'chapters'=>$chapters,'status'=>200], 200);
          }
          else
          {
            return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
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

    public function ChaptersList()
    {
        $list = DB::table('chapters')->whereIn('active_status',[0,1])
                                     ->latest('created_at')
                                     //->orderBy('chapter_name')
                                     ->get();

        return response(['success'=>true,'chapters_list'=>$list,'status'=>200], 200);
    } 

    public function MyChapters(Request $request)
    {

        $user = Auth::user();

        if($user){

          $list = DB::table('user_chapters')->where('userid',$user->user_id)                               ->join('chapters','chapters.chapter_id','=','user_chapters.chapterid')
                                      ->select('chapters.chapter_id','chapters.chapter_name','user_chapters.userid','user_chapters.userchapter_id')
                                      ->orderBy('chapters.chapter_name')
                                      ->get();
      
          return response(['success'=>true,'chapters_list'=>$list,'status'=>200], 200);
        }
        else
        {
          return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
        }
    }

    public function EditChapter(Request $request)
    {
        $input = $request->all(); 
        
        $validator = Validator::make($request->all(), [
          'chapter_id' => 'required',
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
          $user = Auth::user();

          $chapter = DB::table('chapters')->where('chapter_id', $request->chapter_id)
                                            ->first();
          if($chapter)
          {           
            $chapter_update = Chapters::find($chapter->chapter_id);
            $chapter_update->chapter_name = $request->chapter_name;  
            $chapter_update->description = $request->description; 
            $chapter_update->updated_by = $user->user_id;
            $chapter_update->active_status = $request->active_status;   
            $chapter_update->save();

            $message = config('constants.chapter_updated');    
            return response(['success'=>true,'message'=>$message,'chapter_update'=>$chapter_update,'status'=>200], 200);
          }
          else
          {
            return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
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

    public function DeleteChapter(Request $request)
    {
      $chapter = DB::table('user_chapters')->where('chapterid', $request->chapter_id)
                                            ->first();
      
      if($chapter)
      {         
        $message = config('constants.Chapter_notdeleted');

        return  response(['success'=>true,'message'=> $message,'status'=>200],200);
      }
      else
      {
        $chapter = DB::table('chapters')->where('chapter_id', $request->chapter_id)->update(['active_status'=>2]);
         
        $message = config('constants.chapter_deleted');

        return  response(['success'=>true,'message'=> $message,'status'=>200],200);
      }
    }
    
    public function CreateHelp(Request $request)
    {
      $input = $request->all(); 
        
        $validator = Validator::make($request->all(), [
          'category' => 'required',
          'title' => 'required',
          'description' => 'required',
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
          $user = Auth::user();
          if($user)
          {
            $help = new Help();
            $help->category = $request->category;  
            $help->title = $request->title;
            $help->description = $request->description;   
            $help->active_status = $request->active_status; 
            $help->save();

            $message = config('constants.chapter_added');    
           return response(['success'=>true,'message'=>'data added Successfully','help'=>$help,'status'=>200], 200);
          }
          else
          {
            return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
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

    public function HelpList()
    {
      $list = DB::table('help')->whereIn('active_status',[0,1])
                                     ->get();

        return response(['success'=>true,'help_list'=>$list,'status'=>200], 200);
    }
    
}
