<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Discounts;
use App\UserPermissions;
use App\MyLittle;
use App\UserChapters;
use Carbon\Carbon;
use Response;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /* input: "first_name","last_name","email","phone_number","user_type","profile_pic"*/
    /* Output: {
    "success": true,
    "message": "User Added Successfully",
    "user": {
        "first_name","last_name","email","phone_number","user_type","profile_pic","otp",
        "updated_at","created_at","user_id"},"file_path": "/profile_pic","status_code": 200 
      } */

    public function AddUser(Request $request)
    {
        $input = $request->all(); 

        $validator = Validator::make($request->all(), [      
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'unique:users',
        'phone_number' => 'required',
        'user_type' => 'required',                
      ]);
      if ($validator->fails()) { 
                $error_msg = "";
                foreach (json_decode($validator->errors()) as $key => $value) {
                   $error_msg = $value[0]; 
                   break;}
                return response(['success'=>false,'error'=>$error_msg,'status'=>222], 222);
      }

          if($request->profile_pic != '')
          {
            $profile_pic = $request->file('profile_pic');
            //$profile_pic=Helper::upload_file($request->profile_pic, 'profile_pic');

               $fullName=$profile_pic->getClientOriginalName();
                $name=explode('.',$fullName)[0];
                $picName = env('FILE_PATH').'/profile_pic/'.$name.'-'.time().'.'.$profile_pic->getClientOriginalExtension();
                $profile_pic->move(public_path('profile_pic'),$picName);
          }
          else
          {
            $picName = env('FILE_PATH').'/profile_pic/'.'default.png';
          }
        try
        {
          $users = Auth::user();

         // dd($user->user_id;

          if(($request->user_type == 2)||($request->user_type == 3))
          {
            $user = new User();
            $user->first_name = $request->first_name;  
            $user->last_name = $request->last_name;
            $user->display_name  = $request->first_name.' '.$request->last_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->usertypeid = $request->user_type;
            $user->casemanagerid = $request->casemanagerid;
            $user->profile_pic = $picName;
            $user->otp = '123456';
            $user->created_by = $users->user_id;
            $user->registered_on = Carbon::now()->toDateString();
            $user->save();

            $user_chapters = new UserChapters();
            $user_chapters->userid = $user->user_id;
            $user_chapters->chapterid = $request->chapter_id;
            $user_chapters->save();
          }          

          else if($request->user_type == 1)
          {
            $user = new User();
            $user->first_name = $request->first_name;  
            $user->last_name = $request->last_name;
            $user->display_name  = $request->first_name.' '.$request->last_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->usertypeid = $request->user_type;
            $user->addto_agency = $request->addto_agency;
            $user->case_manager = $request->case_manager;
            $user->profile_pic = $picName;
            $user->otp = '123456';
            $user->created_by = $users->user_id;
            $user->registered_on = Carbon::now()->toDateString();
            $user->save();

            if($request->user_permissions !='')
            {
              foreach ($request->user_permissions as $value) 
              {              
                $user_permissions = new UserPermissions();
                $user_permissions->userid = $user->user_id;
                $user_permissions->permissionid = $value;
                $user_permissions->save();
              } 
            }

            if($request->user_chapters !='')
            {
              foreach ($request->user_chapters as $value) 
              {              
                $user_chapters = new UserChapters();
                $user_chapters->userid = $user->user_id;
                $user_chapters->chapterid = $value;
                $user_chapters->save();
              } 
            }         
          }

          else
          {
            $user = new User();
            $user->first_name = $request->first_name;  
            $user->last_name = $request->last_name;
            $user->display_name  = $request->first_name.' '.$request->last_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->usertypeid = $request->user_type;
            $user->addto_agency = $request->addto_agency;
            $user->case_manager = $request->case_manager;
            $user->profile_pic = $picName;
            $user->otp = '123456';
            $user->created_by = $users->user_id;
            $user->registered_on = Carbon::now()->toDateString();
            $user->save();
          }
         
            $message = config('constants.User_Added');
    
            return response(['success'=>true,'message'=>$message,'user'=>$user,'status'=>200], 200);
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
    
 /**/
    public function UserInformation(Request $request)
    {
        $input = $request->all(); 
        
        $validator = Validator::make($request->all(), [
          'user_id' => 'required',
          'first_name' => 'required',
          'last_name' => 'required',
          //'email' => 'unique:users',
          'phone_number' => 'required'
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
          $user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($user)
          {
            $user_update = User::find($user->user_id);
            $user_update->first_name = $request->first_name;  
            $user_update->last_name = $request->last_name;
            $user_update->display_name  = $request->first_name.' '.$request->last_name;
            $user_update->email = $request->email;
            $user_update->phone_number = $request->phone_number;
            $user_update->city = $request->city;
            $user_update->state = $request->state;
            $user_update->post_code = $request->post_code;
            $user_update->dateof_birth = $request->dateof_birth;
            $user_update->save();

            // $chapter_update = DB::table('user_chapters')->where('userid',$user->user_id)->update(['chapterid' => $request->chapter_id]);

            $message = config('constants.User_Updated');
            //$file_path = config('constants.FILE_PATH').'/profile_pic';
    
            return response(['success'=>true,'message'=>$message,'user_update'=>$user_update,'status'=>200], 200);  

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
    
 /**/
    public function DeleteUser(Request $request)
    {
      $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'user_id' => 'required',
        //   'action_type' => 'required',
        //   ]);
        //   if ($validator->fails()) { 
        //         $error_msg = "";
        //         foreach (json_decode($validator->errors()) as $key => $value) {
        //            $error_msg = $value[0]; 
        //            break;}
        //         return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
        //   }
        try
        {  
          $user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($user)
          {
            if($request->action_type == 'deleteuser')
            {
              $DeleteUser = DB::table('users')->where('user_id',$request->user_id)->update(['is_deleted'=>1]);
         
              $message = config('constants.User_Delete');       
              
              return response(['success'=>true,'message'=>$message,'status'=>200], 200);
            }
            else
            {
              $DeactivateUser = DB::table('users')->where('user_id',$request->user_id)->update(['active_status'=>1]);
       
              $message = config('constants.User_Deactivated');       
            
              return response(['success'=>true,'message'=>$message,'status'=>200], 200);  
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

    public function ActivateUser(Request $request)
    {
      $input = $request->all(); 
        
        $validator = Validator::make($request->all(), [
          'user_id' => 'required',
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
          $user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($user)
          {            
              $ActivateUser = DB::table('users')->where('user_id',$request->user_id)->update(['active_status'=>0]);
       
              $message = config('constants.User_Activated');       
            
              return response(['success'=>true,'message'=>$message,'status'=>200], 200);  
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

 /**/
    public function UserType()
    {
      $user_type = DB::table('user_type')->select('usertype_id','user_type')->get();

      return response(['success'=>true,'user_type'=>$user_type,'status'=>200], 200); 
    }

    public function GetUserTypename(Request $request)
    {
      $usertype_name = DB::table('user_type')
                                  ->where('usertype_id', $request->usertype_id)
                                  ->select('usertype_id','user_type')          
                                  ->first();

      return response(['success'=>true,'usertype_name'=>$usertype_name,'status'=>200], 200);
    }

    public function Permissions()
    {
      $permissions = DB::table('permissions')->select('permission_id','permission_name')->get();

      return response(['success'=>true,'permissions'=>$permissions,'status'=>200], 200);
    }

    
 /**/
    public function ActiveUsers(Request $request)
    {
     // token,chapter_id

        $user = Auth::user();

        if($user)
        {
          if($user->usertypeid == 5)
          {
            $list = DB::table('users')->where('users.usertypeid','!=', 5)
                                ->where('users.active_status',0)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                //->join('user_chapters','user_chapters.userid','=','users.user_id')
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','users.active_status','users.created_at')
                                ->latest('users.created_at')                           
                                ->get();
          }
          else if($user->usertypeid == 4)
          {
              $list = DB::table('users')//->where('users.created_by', $user->user_id)
                                ->whereIn('users.usertypeid',[1,2,3])
                                ->where('users.active_status',0)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                //->join('user_chapters','user_chapters.userid','=','users.user_id')
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','users.active_status','users.created_at')
                                //->where('user_chapters.chapterid',$request->chapter_id)
                                ->latest('users.created_at')                           
                                ->get();
          } 
          else
          {
               $list = DB::table('users')->where('users.created_by', $user->user_id)
                                ->whereIn('users.usertypeid',[1,2,3])
                                ->where('users.active_status',0)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                ->join('user_chapters','user_chapters.userid','=','users.user_id')
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','users.active_status','users.created_at')
                                ->where('user_chapters.chapterid',$request->chapter_id)
                                ->where('user_chapters.active_status',0)
                                ->latest('users.created_at')                           
                                ->get();                             // code...
          }                               
          return response(['success'=>true,'active_users'=>$list,'status'=>200], 200);
        }
        else{
          return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
      }
    }

 /**/
    public function InactiveUsers(Request $request)
    {
      $user = Auth::user();

      if($user)
        {
          if($user->usertypeid == 5)
          {
            $list = DB::table('users')->where('users.usertypeid','!=',5)
                                ->where('users.active_status',1)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                //->join('user_chapters','user_chapters.userid','=','users.user_id')
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','users.active_status','users.created_at')
                                ->latest('users.created_at')                           
                                ->get();
          }
          else if($user->usertypeid == 4)
          {
              $list = DB::table('users')//->where('users.created_by', $user->user_id)
                                ->whereIn('users.usertypeid',[1,2,3])
                                ->where('users.active_status',1)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                //->join('user_chapters','user_chapters.userid','=','users.user_id')
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','users.active_status','users.created_at')
                                //->where('user_chapters.chapterid',$request->chapter_id)
                                ->latest('users.created_at')                           
                                ->get();
          } 
          else
          {
               $list = DB::table('users')->where('users.created_by', $user->user_id)
                                ->whereIn('users.usertypeid',[1,2,3])
                                ->where('users.active_status',1)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                ->join('user_chapters','user_chapters.userid','=','users.user_id')
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','users.active_status','users.created_at')
                                ->where('user_chapters.chapterid',$request->chapter_id)
                                ->where('user_chapters.active_status',0)
                                ->latest('users.created_at')                           
                                ->get();                             
          }                               
          return response(['success'=>true,'active_users'=>$list,'status'=>200], 200);
        }
        else{
          return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
      }
    }

 /**/
    public function BigsUsers(Request $request)
    {
      $user = Auth::user();

      if($user)
      {
        if(($user->usertypeid == 5)||($user->usertypeid == 4))
          {
            $list = DB::table('users')->whereIn('users.usertypeid', [2,3])
                                ->where('users.active_status',0)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')                                
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','users.active_status','users.created_at')
                                ->latest('users.created_at')                           
                                ->get();
          }
          else
          {
            $list = DB::table('users')->where('users.created_by', $user->user_id)
                                ->whereIn('users.usertypeid', [2,3])
                                ->where('users.active_status',0)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                ->join('user_chapters','user_chapters.userid','=','users.user_id')
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','user_chapters.chapterid','users.active_status','users.created_at')
                                ->where('user_chapters.chapterid',$request->chapter_id)
                                ->where('user_chapters.active_status',0)
                                ->latest('users.created_at')
                                ->get();
          }

        return response(['success'=>true,'bigs_users'=>$list,'status'=>200], 200);
      }
        else{
          return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
      }
    }

 /**/
    public function AgencyUsers(Request $request)
    {
      $user = Auth::user();

      if($user)
      {
        if(($user->usertypeid == 5)||($user->usertypeid == 4))
        {
            $list = DB::table('users')->where('users.usertypeid',1)
                                ->where('users.active_status',0)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')                                
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','users.active_status','users.created_at')
                                ->latest('users.created_at')                           
                                ->get();
          }
        else
        {
            $list = DB::table('users')->where('users.created_by', $user->user_id)
                                ->where('users.usertypeid', 1)
                                ->where('users.active_status',0)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                ->join('user_chapters','user_chapters.userid','=','users.user_id')
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','user_chapters.chapterid','users.active_status','users.created_at')
                                ->where('user_chapters.chapterid',$request->chapter_id)
                                ->where('user_chapters.active_status',0)
                                ->latest('users.created_at')
                                ->get();
        }

        return response(['success'=>true,'agency_users'=>$list,'status'=>200], 200);
      }
        else{
          return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
      }
    }

    public function OrganizationUsers(Request $request)
    {
      $user = Auth::user();

      if($user)
      {
        $list = DB::table('users')//->where('users.created_by', $user->user_id)
                                ->where('users.usertypeid', 4)
                                ->where('users.active_status',0)
                                ->where('users.is_deleted',0)
                                ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                // ->join('user_chapters','user_chapters.userid','=','users.user_id')
                                ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.usertypeid','user_type.user_type','users.city','users.state','users.post_code','users.dateof_birth','users.active_status','users.created_at')
                                //->where('user_chapters.chapterid',$request->chapter_id)
                                ->latest('users.created_at')
                                ->get();

        return response(['success'=>true,'organization_users'=>$list,'status'=>200], 200);
      }
        else{
          return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
      }
    }

    public function CaseManager()
    {
      $list = DB::table('users')->where('case_manager', 1)
                                ->where('active_status',0)
                                ->select('user_id','first_name','last_name','display_name')
                                //->latest('created_at')
                                ->get();

      return response(['success'=>true,'case_managers'=>$list,'status'=>200], 200);
    }

    public function UserDetails(Request $request)
    {
      $user = DB::table('users')->where('user_id', $request->user_id)->first();
      //$user = Auth::user();

        if($user)
        {
          if($user->usertypeid == 1)
          {
            $permissions = DB::table('users')->where('user_id', $user->user_id)
                                  ->join('user_permissions','user_permissions.userid','=','users.user_id')
                                  ->where('user_permissions.active_status',0)
                                  ->select('user_permissions.permissionid')->get();

            $details = DB::table('users')->where('user_id', $user->user_id)
                                   ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                   ->select('users.user_id','users.first_name','users.last_name','users.email','users.display_name','user_type.usertype_id','user_type.user_type','users.created_at as active_since','users.logged_in_time as lastapp_activity','users.profile_pic','mylittle.mylittle_id','users.city','users.state','users.post_code','users.phone_number','users.dateof_birth','users.case_manager','users.addto_agency')
                                   ->leftjoin('mylittle','mylittle.userid','=','users.user_id')
                                   // ->leftjoin('user_permissions','user_permissions.userid','=','users.user_id')
                                   ->first();

            $chapters = DB::table('user_chapters')->where('userid', $user->user_id)
                                ->join('chapters','chapters.chapter_id','=','user_chapters.chapterid')
                                ->where('user_chapters.active_status',0)
                                ->where('chapters.active_status',0)
                                ->select('user_chapters.chapterid','chapters.chapter_name')
                                ->latest('chapters.created_at')
                                ->get();
            $casemanager = '';
            $mylittle = '';
                      
          }
          else if(($user->usertypeid == 2)||($user->usertypeid == 3))
          {
            $details = DB::table('users')->where('user_id', $user->user_id)
                                   ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                   ->select('users.user_id','users.first_name','users.last_name','users.email','users.display_name','user_type.usertype_id','user_type.user_type','users.created_at as active_since','users.logged_in_time as lastapp_activity','users.profile_pic','mylittle.mylittle_id','users.city','users.state','users.post_code','users.phone_number','users.dateof_birth','users.casemanagerid')
                                   ->leftjoin('mylittle','mylittle.userid','=','users.user_id')
                                   ->first();

            $chapters = DB::table('user_chapters')->where('userid', $user->user_id)
                                ->join('chapters','chapters.chapter_id','=','user_chapters.chapterid')
                                ->where('user_chapters.active_status',0)
                                ->where('chapters.active_status',0)
                                ->select('user_chapters.chapterid','chapters.chapter_name')
                                ->latest('chapters.created_at')
                                ->get();

            $permissions = [];

            if($details->casemanagerid != 'null')
            {
              $casemanager = DB::table('users')->where('user_id', $details->casemanagerid)
                                            ->select('display_name')->first();
            }
            else
            {
               $casemanager = '';
            }

            $little = DB::table('mylittle')->where('userid', $user->user_id)->first();
            if($little)
            {
              $mylittle = DB::table('mylittle')->where('userid', $user->user_id)
                                            //->where('active_status',0)                     
                                            ->select('mylittle_id','first_name','last_name','phone_number','phone_type','match_start','dateof_birth','guardian_name','guardian_number','emergency_name','emergency_number')                            
                                            ->first();
            }
            else
            {
              $mylittle = '';
            }
          } 

          else
          {
            $details = DB::table('users')->where('user_id', $user->user_id)
                                   ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                   ->select('users.user_id','users.first_name','users.last_name','users.email','users.display_name','user_type.usertype_id','user_type.user_type','users.created_at as active_since','users.logged_in_time as lastapp_activity','users.profile_pic','mylittle.mylittle_id','users.city','users.state','users.post_code','users.phone_number','users.dateof_birth','users.casemanagerid')
                                   ->leftjoin('mylittle','mylittle.userid','=','users.user_id')
                                   ->first();

            $chapters = [];

            $permissions = [];
            
            $casemanager = '';

            $mylittle = '';
          } 
          return response(['success'=>true,'user_details'=>$details,'permissions'=>$permissions,'casemanager'=>$casemanager,'chapters'=>$chapters,'mylittle'=>$mylittle,'status'=>200], 200);          
        }
        else{
            $message = config('constants.User_notfound');
            return response(['success'=>false,'message'=>$message,'status'=>201], 201); 
          } 
    }

 /**/
    public function AddMyLittle(Request $request)
    {
        $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'user_id' => 'required',
        //   'first_name' => 'required',
        //   'last_name' => 'required',
        //   'match_start' => 'required',
        //   ]);
        //   if ($validator->fails()) { 
        //         $error_msg = "";
        //         foreach (json_decode($validator->errors()) as $key => $value) {
        //            $error_msg = $value[0]; 
        //            break;}
        //         return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
        //   }
        try
        {  
          $user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($user)
          {
            $mylittle = new MyLittle();
            $mylittle->first_name = $request->first_name;  
            $mylittle->last_name = $request->last_name;
            $mylittle->display_name = $request->first_name.' '.$request->last_name;
            $mylittle->phone_number = $request->phone_number;
            $mylittle->phone_type = $request->phone_type;
            $mylittle->match_start = $request->match_start;
            $mylittle->dateof_birth = $request->dateof_birth;
            $mylittle->guardian_name = $request->guardian_name;
            $mylittle->guardian_number = $request->guardian_number;
            $mylittle->emergency_name = $request->emergency_name;
            $mylittle->emergency_number = $request->emergency_number;
            $mylittle->userid = $request->user_id;
            $mylittle->picture = env('FILE_PATH').'/mylittle_pic/'.'defaultmylittle.png';
            $mylittle->save();

            $message = config('constants.mylittle_added');    
           return response(['success'=>true,'message'=>$message,'mylittle'=>$mylittle,'status'=>200], 200);
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

    public function EditLittle(Request $request)
    {
      $input = $request->all();
       try
        {  
            $user = Auth::user();
            if($user)
            {
              $little = DB::table('mylittle')->where('mylittle_id',$request->mylittle_id)
                                        ->where('userid', $request->user_id)
                                        ->first();
              if($little)
              {
                $little_update = DB::table('mylittle')
                                      ->where('mylittle_id',$request->mylittle_id)
                                      ->update(['first_name' => $request->first_name,
                                                'last_name' => $request->last_name,
                                                'phone_number' => $request->phone_number,
                                                'phone_type' => $request->phone_type,
                                                'match_start' => $request->match_start,
                                                'dateof_birth' => $request->dateof_birth,
                                                'guardian_name' => $request->guardian_name,
                                                'guardian_number' => $request->guardian_number,
                                                'emergency_name' => $request->emergency_name,
                                                'emergency_number' => $request->emergency_number,
                                              ]);

                $message = config('constants.little_updated');    
                return response(['success'=>true,'message'=>$message,'status'=>200], 200);
              }
              else
              {
                $message = config('constants.little_notfound');
                return response(['success'=>false,'message'=>$message,'status'=>201], 201);
              }
            }
            else
            {
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

    public function UserPermissions(Request $request)
    {
      $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'user_id' => 'required',
        //   ]);
        //   if ($validator->fails()) { 
        //         $error_msg = "";
        //         foreach (json_decode($validator->errors()) as $key => $value) {
        //            $error_msg = $value[0]; 
        //            break;}
        //         return response(['success'=>false,'error'=>$error_msg, 'status'=>222], 222);
        //   }
        try
        {  
          $user = DB::table('users')->where('user_id', $request->user_id)->first();

          if(($request->addto_agency == 1)||($request->usertype_id == 1))
          {
            $user_update = DB::table('users')->where('user_id', $request->user_id)
                                             ->update(['usertypeid'=>1,'addto_agency'=>1]);

            $remove_permissions = DB::table('user_permissions')->where('userid',$request->user_id)
                                                    ->update(['active_status'=>1]);

          }
          else
          {
            $user_update = DB::table('users')->where('user_id', $request->user_id)
                                             ->update(['usertypeid'=>2]);
            $remove_permissions = DB::table('user_permissions')->where('userid',$request->user_id)
                                                    ->update(['active_status'=>1]);
          }

          if($user)
          {
            foreach ($request->permissions as $value) 
            {
              $per = DB::table('user_permissions')->where('userid',$request->user_id)
                                                  ->where('permissionid',$value)
                                                  ->first();
              if($per == '')
              {
                $user_permissions = new UserPermissions();
                $user_permissions->userid = $request->user_id;
                $user_permissions->permissionid = $value;
                $user_permissions->save();
              }
              else
              {
                $per = DB::table('user_permissions')->where('userid',$request->user_id)
                                                  ->where('permissionid',$value)
                                                  ->update(['active_status'=>0]);
              }
            }            
            $message = config('constants.permissions_updated');

           return response(['success'=>true,'message'=>$message,'status'=>200], 200);  

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

    public function AccountSettings(Request $request)
    {
      $input = $request->all(); 
        try
        {  
          $user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($request->user_type == 1)
          {
            $user_update = DB::table('users')->where('user_id', $request->user_id)
                                             ->update(['usertypeid'=>1,'case_manager'=>$request->case_manager,'addto_agency'=>$request->addto_agency]);
            
            if($request->user_permissions != '')
            {
              $remove_permissions = DB::table('user_permissions')->where('userid',$request->user_id)
                                                    ->update(['active_status'=>1]);

              foreach ($request->user_permissions as $value) 
              {
                $per = DB::table('user_permissions')->where('userid',$request->user_id)
                                                    ->where('permissionid',$value)
                                                    ->first();
                if($per == '')
                {
                  $user_permissions = new UserPermissions();
                  $user_permissions->userid = $request->user_id;
                  $user_permissions->permissionid = $value;
                  $user_permissions->save();
                }
                else
                {
                  $per = DB::table('user_permissions')->where('userid',$request->user_id)
                                                    ->where('permissionid',$value)
                                                    ->update(['active_status'=>0]);
                }
              }
            }
            if($request->user_chapters != '')
            {
              $remove_chapters = DB::table('user_chapters')
                                            ->where('userid',$request->user_id)
                                            ->update(['active_status'=>1]);

              foreach ($request->user_chapters as $value) 
              {
                $chapters = DB::table('user_chapters')->where('userid',$request->user_id)
                                                    ->where('chapterid',$value)
                                                    ->first();
                if($chapters == '')
                {
                  $user_chapters = new UserChapters();
                  $user_chapters->userid = $request->user_id;
                  $user_chapters->chapterid = $value;
                  $user_chapters->save();
                }
                else
                {
                  $cha = DB::table('user_chapters')->where('userid',$request->user_id)
                                                    ->where('chapterid',$value)
                                                    ->update(['active_status'=>0]);
                }
              }
            }
          }
          else
          {
            $user_update = DB::table('users')->where('user_id', $request->user_id)
                                             ->update(['usertypeid'=>2,'casemanagerid'=>$request->casemanagerid]);

            $remove_permissions = DB::table('user_permissions')->where('userid',$request->user_id)
                                                    ->update(['active_status'=>1]);

            if($request->user_chapters != '')
            {
              $remove_chapters = DB::table('user_chapters')
                                            ->where('userid',$request->user_id)
                                            ->update(['active_status'=>1]);
              foreach ($request->user_chapters as $value) 
              {
                  $user_chapters = new UserChapters();
                  $user_chapters->userid = $request->user_id;
                  $user_chapters->chapterid = $value;
                  $user_chapters->save();          
              }
            }   
          }     
            $message = config('constants.permissions_updated');
           return response(['success'=>true,'message'=>$message,'status'=>200], 200);       
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


    public function AccountSettingslate(Request $request)
    {
      $input = $request->all(); 
        try
        {  
          $user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($user)
          {
              if($request->user_type != '')
              {
                $user = DB::table('users')->where('user_id', $request->user_id)
                                        ->update(['usertypeid'=>$request->user_type]);
              }
              else{}
              if($request->permission_ids != '')
              {
                foreach ($request->permission_ids as $key => $value)
                {           
                  $data = DB::table('user_permissions')->where('userid',$request->user_id)
                                ->where('permissionid', $value)
                                ->first();                                
                  if($data)
                  {
                    $status = $data->active_status;

                    if($status == 0)
                    {
                       $update = DB::table('user_permissions')->where('userid',$request->user_id)
                                ->where('permissionid', $value)->update(['active_status'=>1]);
                    }
                    else
                    {
                      $update = DB::table('user_permissions')->where('userid',$request->user_id)
                                ->where('permissionid', $value)->update(['active_status'=>0]);
                    }
                  }
                  else
                  {
                    $user_permissions = new UserPermissions();
                    $user_permissions->userid = $request->user_id;
                    $user_permissions->permissionid = $value;
                    $user_permissions->save();
                  }              
                }
              }

              $message = config('constants.permissions_updated');
              return response(['success'=>true,'message'=>$message,'status'=>200], 200);             
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

    public function ViewSettings()
    {
      $users = Auth::user();

      if($users)
      {
        $user = DB::table('users')->where('user_id', $users->user_id)
                                    ->join('user_type','user_type.usertype_id','=','users.usertypeid')
                                    ->select('users.user_id','users.usertypeid','user_type.user_type','users.case_manager','users.addto_agency')
                                    ->get();

        $settings = DB::table('user_permissions')
                    ->where('user_permissions.userid', $users->user_id)     
                    ->join('permissions','permissions.permission_id','=','user_permissions.permissionid')
                    ->select('user_permissions.permissionid','permissions.permission_name')
                    ->where('user_permissions.active_status',0)
                    ->get();

        $allsettings = DB::table('permissions')->select('permission_id','permission_name')
                    //->where('active_status',0)
                    ->get();

          return response(['success'=>true,'user'=>$user,'settings'=>$settings,'allsettings'=>$allsettings,'status'=>200], 200);
      }
      else{
            $message = config('constants.User_notfound');
            return response(['success'=>false,'message'=>$message,'status'=>201], 201); 
          }  

    }

    // public function SettingsUpdate(Request $request)
    // {
    //   try
    //     {  
    //       $user = DB::table('users')->where('user_id', $request->user_id)->first();

    //       if($user)
    //       {
    //         if($request->user_type != '')
    //         {
    //           $user = DB::table('users')->where('user_id', $request->user_id)
    //                                     ->update(['usertypeid'=>$request->user_type]);
    //         }
    //         else{}
    //         if($request->permission_id != '')
    //         {
    //           foreach ($request->permission_id as $key => $value)
    //           {           
    //             $data = DB::table('user_permissions')->where('userid',$request->user_id)
    //                             ->where('permissionid', $value)
    //                             ->first();
                                
    //             if($data)
    //             {
    //               $status = $data->active_status;

    //               if($status == 0)
    //               {
    //                 $update = DB::table('user_permissions')->where('userid',$request->user_id)
    //                             ->where('permissionid', $value)->update(['active_status'=>1]);
    //               }
    //               else
    //               {
    //                 $update = DB::table('user_permissions')->where('userid',$request->user_id)
    //                             ->where('permissionid', $value)->update(['active_status'=>0]);
    //               }
    //             }
    //             else
    //             {
    //               $user_permissions = new UserPermissions();
    //               $user_permissions->userid = $request->user_id;
    //               $user_permissions->permissionid = $value;
    //               $user_permissions->save();
    //             }
    //           }
    //         }
    //           $message = config('constants.permissions_updated');
    //           return response(['success'=>true,'message'=>$message,'status'=>200], 200);
    //       }            
    //       else{
    //         $message = config('constants.User_notfound');
    //         return response(['success'=>false,'message'=>$message,'status'=>201], 201); 
    //       }          
    //     } 
    //     catch (Exception $e)
    //     {
    //         $error_msg = "";
    //         foreach (json_decode($e->errors()) as $key => $value) {
    //            $error_msg = $value[0]; 
    //            break;
    //         }
    //         return response(['error'=>$error_msg, 'status'=>401], 401); 
    //     }
    // }

    public function ChangePassword(Request $request)
    {
    //   $validator = Validator::make($request->all(), [
    //     'user_id' => 'required',
    //     'old_password' => 'required',
    //     'new_password' => 'required',
    //     'confirm_password' => 'required',               
    // ]);
    // if ($validator->fails()) { 
    //             $error_msg = "";
    //             foreach (json_decode($validator->errors()) as $key => $value) {
    //                $error_msg = $value[0]; 
    //                break;}
    //             return response(['error'=>$error_msg, 'status'=>222], 222);
    //   }

      $user = DB::table('users')->where('user_id',$request->user_id)->first();   

    if($user){
      if (Hash::check($request->old_password , $user->password))
      {
        if (Hash::check($request->new_password, $user->password))
        {
          $message = config('constants.passwords_match');
          return response(['success'=>false ,'message'=> $message,'status'=>201],201);        
        }
        else
        {
          if($request['new_password'] == $request['confirm_password'])
            {  
              $user->password = Hash::make($request['new_password']);
              $user->save();

              $message = config('constants.passwords_success');
              return response(['success'=>true,'message'=> $message,'status'=>200],200);
            }
            else{
              $message = config('constants.passwords_same');
              return response(['success'=>false,'message'=> $message,'status'=>201],201);
            }
        }
      }
      else{
            $message = config('constants.oldpassword_wrong');
            return response(['success'=>false ,'message'=>$message ,'status'=>201],201);
          }
    }    
    else{
          $message = config('constants.User_notfound');
          return response(['success'=>false,'message'=> $message,'status'=>201],201);
        }
    }

// public function FunctionName($value='')
// {
  // $pageNumber = $request->page;
  //     $perPage = 10;
       // $perPage = $request->perPage;

       //  if ($request->page == "") {
       //      $skip = 0;
       //      $list = DB::table('users')->where('users.active_status',0)
       //                          ->where('users.is_deleted',0)
       //                          ->join('user_type','user_type.usertype_id','=','users.usertypeid')
       //                          ->select('users.user_id','users.first_name','users.last_name','users.username','users.email','users.phone_number','users.profile_pic','user_type.user_type')                                
       //                          ->get();
       //    }
       //  else {
       //      $skip = $perPage * $request->page;
       //      $list = DB::table('users')->where('users.active_status',0)
       //                          ->where('users.is_deleted',0)
       //                          ->join('user_type','user_type.usertype_id','=','users.usertypeid')
       //                          ->select('users.user_id','users.first_name','users.last_name','users.username','users.email','users.phone_number','users.profile_pic','user_type.user_type')
       //                          ->skip($skip)
       //                          ->take($perPage)
       //                          ->get();
       //  } 
        // $list = DB::table('users')->where('users.active_status',0)
        //                         ->where('users.is_deleted',0)
        //                         ->join('user_type','user_type.usertype_id','=','users.usertypeid')
        //                         ->select('users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','user_type.user_type')  
        //                         ->paginate($perPage,['*'], 'page',$pageNumber);                              
                                //->get();
      // return response(['success'=>true,'active_users'=>$list,'status'=>200], 200);
  //}

  public function HomeTabCount(Request $request)
  {
    $events = DB::table('event_master')->select('event_id')->get();

    $events_count = count($events);

    $connect = DB::table('connections')->where('accept_status',0)
                                      ->where('reject_status',0)
                                      ->where('reciever_id',$request->user_id)
                                      ->get();

    $connect_count = count($connect);

    $inbox = DB::table('messages')->where('receiver_id', $request->user_id)
                                        ->where('active_status',0)
                                        ->where('viewed_status',0)
                                        ->where('message_type','=','sent')        
                                        ->get();

    $inbox_count = count($inbox);

    return response(['success'=>true,'user_id'=>$request->user_id,'events_count'=>$events_count,'connect_count'=>$connect_count,'inbox_count'=>$inbox_count,'status'=>200], 200);
  }

  public function NotificationLog()
  {
    $users = Auth::user();
    $user = DB::table('notification_log')->where('user_id',$users->user_id)->first();
    
    if($user)
    {
        $list = DB::table('notification_log')->where('notification_log.user_id',$users->user_id)
                                //->where('notification_log.viewed_status',0)
                                ->join('users','users.user_id','=','notification_log.sender_id')
                                ->select('notification_log.note_id','notification_log.user_id','notification_log.sender_id','users.display_name','notification_log.log_type','notification_log.message','notification_log.source_id','notification_log.viewed_status','notification_log.created_at','users.profile_pic')
                                ->orderby('notification_log.note_id','DESC')
                                ->get();

        $view = DB::table('notification_log')->where('notification_log.user_id',$users->user_id)
                                ->where('notification_log.viewed_status',0)->get();

        $total = count($view);

      return response(['success'=>true,'list'=>$list,'total_count'=>$total,'status'=>200], 200);
    }
    else
    {
      return response(['success'=>false,'message'=>'user not found','status'=>201], 201);
    }
  }

  public function ViewNotificationLog(Request $request)
  {
    $log = DB::table('notification_log')->where('note_id',$request->note_id)
                                ->update(['viewed_status'=>1]);

    return response(['success'=>true,'log'=>'Status Updated','status'=>200],200);
  }
}

