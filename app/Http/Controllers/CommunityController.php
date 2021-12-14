<?php
namespace App\Http\Controllers;

use DB;
use Response;
use App\Outings;
use App\Community;
use App\OutingsShare;
use App\Connections;
use App\Resources;
use App\JoinOutings;
use App\EventMaster;
use App\EventDates;
use App\EventRegistration;
use App\EventsChapters;
use App\UnwantedUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;

class CommunityController extends Controller
{
    public function CreateOuting(Request $request)
    {
       $input = $request->all();
       try
        {  
            $user = Auth::user();
            if($user)
            {
                $outings = new Outings();
                $outings->outing_name = $request->outing_name;  
                $outings->location = $request->location;
                $outings->city = $request->city;
                $outings->state = $request->state;
                $outings->description = $request->description;
                $outings->date = $request->date;
                $outings->time = $request->time;
                $outings->outing_type = $request->outing_type;
                $outings->latitude = $request->latitude;
                $outings->longitude = $request->longitude;
                $outings->created_by = $user->user_id;
                $outings->chapterid = $request->chapter_id;
                $outings->save();

                $message = config('constants.outing_created');
        
                return response(['success'=>true,'message'=>$message,'outing'=>$outings,'status'=>200], 200);
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

    public function UpdateOuting(Request $request)
    {
       $input = $request->all();
       try
        {  
            $user = Auth::user();
            if($user)
            {
                $outing_update = DB::table('outings')->where('outing_id',$request->outing_id)
                                                ->where('created_by',$user->user_id)
                                                ->update(['outing_name' => $request->outing_name,
                                                            'location' => $request->location,
                                                            'city' => $request->city,
                                                            'state' => $request->state,
                                                            'description' => $request->description,
                                                            'date' => $request->date,
                                                            'time' => $request->time,
                                                            'outing_type' => $request->outing_type,
                                                            'latitude' => $request->latitude,
                                                            'longitude' => $request->longitude,
                                                            'chapterid' => $request->chapter_id]);

                $message = config('constants.outing_updated');    
                return response(['success'=>true,'message'=>$message,'status'=>200], 200);
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

    public function MyOutings()
    {      
       try
        {  
            $user = Auth::user();
            if($user)
            {
                $joinlist = DB::table('join_outings')->where('joined_userid',$user->user_id)
                                                ->where('join_status', 0)
                                    ->leftJoin('outings','outings.outing_id','=','join_outings.outingid')
                                    ->select('outings.outing_id','outings.outing_name','outings.location','outings.city','outings.state','outings.description','outings.date','outings.time','outings.outing_type','outings.latitude','outings.longitude','outings.created_by','outings.active_status','outings.created_at')
                                    ->groupBy('outings.outing_id');

                $list = DB::table('outings')->where('created_by',$user->user_id)
                                          ->select('outing_id','outing_name','location','city','state','description','date','time','outing_type','latitude','longitude','created_by','active_status','created_at')
                                          ->union($joinlist)
                                          ->groupby('outing_id')
                                          ->latest('created_at')
                                          ->get();

                return response(['success'=>true,'outings_list'=>$list,'status'=>200], 200);
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

    public function OutingDetails(Request $request)
    {
        $input = $request->all();      
       try
        {  
            $outing = DB::table('outings')->where('outing_id',$request->outing_id)
                                           ->first();
            if($outing != '')
            {
              $details = DB::table('outings')->where('outing_id',$request->outing_id)
                                ->join('users','users.user_id','=','outings.created_by')
                                ->select('outings.outing_id','outings.outing_name','outings.location',
                                  'outings.city','outings.state','outings.description','outings.date',
                                  'outings.time','outings.outing_type','outings.latitude','outings.longitude',
                                  'outings.created_by as organized_by','users.display_name as organizer_name','users.profile_pic as organizer_Pic','outings.active_status','outings.created_at',
                                  'outings.updated_at',DB::raw('(SELECT count(distinct(joined_userid)) FROM `join_outings` WHERE `join_status` = 0) as people_joined'),'join_outings.join_status')
                                ->leftJoin('join_outings','join_outings.outingid','=','outings.outing_id')
                                ->first();

              return response(['success'=>true,'outing_details'=>$details,'status'=>200], 200);
            }
            else
            {
              $message = config('constants.outing_notexist');
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

    public function OutingsNearme(Request $request)
    {
        $lat = $request->latitude;
        $long = $request->longitude;
        $distance = $request->distance; 

        $outings = DB::table('outings')->select('outings.outing_id','outings.outing_name','outings.location','outings.date','outings.time','outings.outing_type','outings.description','users.display_name','users.user_id',DB::raw('6371 * acos(cos(radians(' . $lat . ')) 
        * cos(radians(outings.latitude)) 
        * cos(radians(outings.longitude) - radians(' . $long . ')) 
        + sin(radians(' .$lat. ')) 
        * sin(radians(outings.latitude))) AS distance'))
        ->groupBy('outings.outing_id')
        ->having('distance', '<', 500)
        ->join('users','users.user_id','=','outings.created_by')
        ->orderBy('distance')
        ->get();

      return  response(['success'=>true,'outings'=>$outings,'status'=>200],200);
    }

    public function ShareOuting(Request $request)
    {
      $shared_to = implode(",", $request->get('shared_to'));

      foreach ($request->shared_to as $key => $value) 
      {
        $user = DB::table('users')->where('email',$value)->first();

        $sharedata = DB::table('outings_share')->where('outingid',$request->outing_id)
                                               ->where('shared_by',$request->shared_by)
                                               ->where('user_id',$user->user_id)->first();

        if($sharedata != '')
        {
          $share = DB::table('outings_share')->where('outingid',$request->outing_id)
                                             ->where('shared_by',$request->shared_by)
                                             ->where('user_id',$user->user_id)
                                             ->update(['created_at'=>Carbon::now()]);
        }
        else
        {
          $share = new OutingsShare();
          $share->outingid = $request->outing_id;
          $share->shared_by = $request->shared_by;
          $share->shared_to = $value;
          $share->user_id = $user->user_id;
          $share->save();
        }
      }
        $message = config('constants.outing_shared');
      return  response(['success'=>true,'message'=>$message,'status'=>200],200);
    }

    // public function JoinOuting(Request $request)
    // {
    //    $data = DB::table('outings_share')->where('outingid',$request->outing_id)                   
    //                                      ->where('shared_by',$request->shared_by)
    //                                      ->where('user_id',$request->user_id)
    //                                      ->first();
    //     if($data)
    //     {
    //         $join = DB::table('outings_share')
    //                                        ->where('outingid',$request->outing_id)                   
    //                                      ->where('shared_by',$request->shared_by)
    //                                      ->where('user_id',$request->user_id)
    //                                      ->update(['join_status'=>0]);

    //         $message = config('constants.outing_joined');

    //         return  response(['success'=>true,'message'=>$message,'status'=>200],200);
    //     }
    //     else
    //     {
    //        $message = config('constants.outing_notexist');

    //         return  response(['success'=>false,'message'=>$message,'status'=>201],201); 
    //     }
    // }

    // public function UnJoinOuting(Request $request)
    // {
    //    $data = DB::table('outings_share')->where('outingid',$request->outing_id)                   
    //                                      ->where('shared_by',$request->shared_by)
    //                                      ->where('user_id',$request->user_id)
    //                                      ->first();
    //     if($data)
    //     {
    //         $join = DB::table('outings_share')->where('outingid',$request->outing_id)                   
    //                                      ->where('shared_by',$request->shared_by)
    //                                      ->where('user_id',$request->user_id)
    //                                      ->update(['join_status'=>1]);

    //         $message = config('constants.outing_unjoined');

    //         return  response(['success'=>true,'message'=>$message,'status'=>200],200);
    //     }
    //     else
    //     {
    //        $message = config('constants.outing_notexist');

    //         return  response(['success'=>false,'message'=>$message,'status'=>201],201); 
    //     }
    // }

    // public function HideOuting(Request $request)
    // {
    //    $data = DB::table('outings_share')->where('outingid',$request->outing_id)
    //                                      ->where('shared_by',$request->shared_by)    
    //                                     ->where('user_id',$request->user_id)
    //                                      ->update(['active_status'=>1]);
        
    //     $message = config('constants.hide_outing');

    //     return  response(['success'=>true,'message'=>$message,'status'=>200],200);
    // }

    public function JoinOuting(Request $request)
    {
        $user = Auth::user();

       $data = DB::table('outings')->where('outing_id',$request->outing_id)                  
                                  ->first();
        if($data)
        {
          $out = DB::table('join_outings')->where('outingid',$request->outing_id) 
                                     ->where('joined_userid',$user->user_id)
                                     ->where('join_status',0)->first();
          if($out)
          {                                    
            $message = config('constants.outing_alreadyjoined');

            return  response(['success'=>true,'message'=>$message,'status'=>200],200);
          }
          else
          {
            $joinoutings = new JoinOutings();          
            $joinoutings->outingid = $request->outing_id;  
            $joinoutings->organized_by = $request->organized_by;
            $joinoutings->joined_userid = $user->user_id;           
            $joinoutings->save();

            $message = config('constants.outing_joined');

            return  response(['success'=>true,'message'=>$message,'status'=>200],200);            
          }
        }
        else
        {
           $message = config('constants.outing_notexist');

            return  response(['success'=>false,'message'=>$message,'status'=>201],201); 
        }
    }

    public function UnJoinOuting(Request $request)
    {
        $user = Auth::user();
       $data = DB::table('join_outings')->where('outingid',$request->outing_id)
                                         ->where('joined_userid',$user->user_id)
                                         ->first();
        if($data)
        {
            $join = DB::table('join_outings')->where('outingid',$request->outing_id)                           ->where('joined_userid',$user->user_id)
                                         ->update(['join_status'=>1]);

            $message = config('constants.outing_unjoined');

            return  response(['success'=>true,'message'=>$message,'status'=>200],200);
        }
        else
        {
           $joinoutings = new JoinOutings();          
           $joinoutings->outingid = $request->outing_id;  
           $joinoutings->organized_by = $request->organized_by;
           $joinoutings->joined_userid = $user->user_id;  
           $joinoutings->join_status = 1;         
           $joinoutings->save();

           $message = config('constants.outing_unjoined');

            return  response(['success'=>true,'message'=>$message,'status'=>200],200); 
        }
    }

    public function HideOuting(Request $request)
    {
        $user = Auth::user();
       $data = DB::table('join_outings')->where('outingid',$request->outing_id)   
                                        ->where('joined_userid',$user->user_id)
                                         ->update(['active_status'=>1]);
        
        $message = config('constants.hide_outing');

        return  response(['success'=>true,'message'=>$message,'status'=>200],200);
    }

     public function CancelOuting(Request $request)
    {
       $data = DB::table('outings')->where('outing_id',$request->outing_id)
                                   ->update(['active_status'=>1]);
        
        $message = config('constants.cancel_outing');

        return  response(['success'=>true,'message'=>$message,'status'=>200],200);
    }

    public function SearchBigs(Request $request)
    {
       $search = $request->input('search_by');     
       try
        { 
            $user = Auth::user();
          if($search) 
          {           
            $list = DB::table('users')
                    ->Where('display_name', 'like', $search . '%')
                    ->orWhere('first_name', 'like', $search . '%')
                    ->orWhere('last_name', 'like', $search . '%')
                    ->join('user_chapters','user_chapters.userid','=','users.user_id')
                    ->where('user_chapters.chapterid', $request->chapter_id)            
                    ->select('users.user_id','users.display_name','users.first_name','users.last_name','users.email','users.profile_pic')
                        ->orderBy('users.created_at', 'desc')->get();

                        //->where('email', 'like', '%' . $search . '%')
                        // ->Where('display_name', 'like', $search . '%')
                        // ->orWhere('first_name', 'like', $search . '%')
                        // ->orWhere('last_name', 'like', $search . '%')

            if($list !='')
            {
              foreach ($list as $key => $value) {

              $user1 = DB::table('connections')->where('sender_id',$user->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('reciever_id as fr')
                                            ->groupby('sender_id');

              $user2 = DB::table('connections')->where('reciever_id',$user->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('sender_id as fr')
                                            ->union($user1)
                                            ->groupby('reciever_id')
                                            ->get();
              $fr2 =[];

              foreach ($user2 as $key => $frvalue) {
               $fr2[]= $frvalue->fr;
              }

              $user3 = DB::table('connections')->where('sender_id',$value->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('reciever_id as fr')->groupby('sender_id');

              $user4 = DB::table('connections')->where('reciever_id',$value->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('sender_id as fr')
                                            ->union($user3)
                                            ->groupby('reciever_id')
                                            ->get();

                $fr4 = [];
                foreach ($user4 as $key => $frsvalue) {
                  $fr4[]= $frsvalue->fr;
                }

              $common = array_intersect($fr2, $fr4); 
              $count_common = count($common);
           
              $value->user_id = $value->user_id;
              $value->first_name = $value->first_name; 
              $value->last_name = $value->last_name;             
              $value->display_name = $value->display_name;
              $value->email = $value->email;
              $value->profile_pic = $value->profile_pic;
              $value->mutual = $count_common;
            }                               
              return response(['success'=>true,'list'=>$list,'status'=>200], 200);
            }
            else
            {
              return response(['success'=>true,'list'=>'No data found','status'=>201], 201);
            }
          }
          else
          {
            $list = [];
            return response(['success'=>true,'list'=>$list,'status'=>200], 200);
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

    public function AddResource(Request $request)
    {
      $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'title' => 'required',
        //   'description' => 'required',
        //   'active_status' => 'required',       
        //   'documents.*' => 'mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        //   'documents' => 'max:10',
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
            $user = Auth::user();
            if($user)
            {
              if($request->file('files') != '')
                {
                  $file = $request->file('files');

                  $fullName=$file->getClientOriginalName();
                    $name=explode('.',$fullName)[0];

                    $fileName = env('FILE_PATH').'/resources/'.$name.'-'.time().'.'.$file->getClientOriginalExtension();  

                    $file->move(public_path('resources'),$fileName);
                }
                else
                {
                  $fileName = '';
                }

                $resources = new Resources();
                $resources->title = $request->title;  
                $resources->description = $request->description;
                $resources->files = $fileName;
                $resources->created_by = $user->user_id;
                $resources->chapterid = $request->chapter_id;
                $resources->active_status = $request->active_status;            
                $resources->save();

                //$file_path = env('FILE_PATH').'/resources';            
        
                return response(['success'=>true,'resources'=>$resources,'status'=>200], 200);
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

    public function EditResource(Request $request)
    {
      $input = $request->all(); 
        
        $validator = Validator::make($request->all(), [
          'resource_id' => 'required',
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

          $resource = DB::table('resources')->where('resource_id', $request->resource_id)->first();
          
          if($resource)
          {
            // if($request->file('files') != '')
            // {
            //   $file = $request->file('files');

            //   $fullName=$file->getClientOriginalName();
            //     $name=explode('.',$fullName)[0];

            //     $fileName = env('FILE_PATH').'/resources/'.$name.'-'.time().'.'.$file->getClientOriginalExtension();  

            //     $file->move(public_path('resources'),$fileName);
            // }
            // else
            // {
            //   $fileName = '';
            // }  
            

            $resource_update = DB::table('resources')->where('resource_id', $request->resource_id)
                                            ->update(['title'=>$request->title, 'description'=>$request->description, 'chapterid' => $request->chapterid,'active_status'=>$request->active_status]);

            $message = config('constants.resource_updated');
            return response(['success'=>true,'message'=>$message,'status'=>200], 200);
        } 
      }
        catch (Exception $e)
        {
            $error_msg = "";
            foreach (json_decode($e->errors()) as $key => $value) {
               $error_msg = $value[0]; 
               break;
            }
            return response(['error'=>$error_msg, 'status'=>201], 201); 
        }
    }

    public function InactivateResource(Request $request)
    {
      $resources = DB::table('resources')->where('resource_id',$request->resource_id)                       ->update(['active_status' => 2]);

        $message = config('constants.resource_deleted');
      return response(['success'=>true,'message'=>$message,'status'=>200], 200);
    }
    

    public function Resources(Request $request)
    {
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
                if($user)
                {
                    if($request->chapter_id == 0)
                    {
                        $resources = DB::table('resources')->whereIn('active_status', [0, 1])
                                                ->latest('created_at')
                                                ->get();
                    }
                    else
                    {
                        $resources = DB::table('resources')
                                    //->Where('created_by', $user->user_id)
                                    ->where('chapterid',$request->chapter_id)
                                    ->whereIn('active_status', [0, 1])               
                                    ->latest('created_at')
                                    ->get();
                    }
                return response(['success'=>true,'resources'=>$resources,'status'=>200],200);
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

    public function ViewResources(Request $request)
    {
      $resource = DB::table('resources')
                        ->where('resource_id', $request->resource_id)
                        ->first();

      return response(['success'=>true,'resource'=>$resource,'status'=>200], 200);
    }

    public function SentRequest(Request $request)
    {
      $input = $request->all();
       try
        {  
          $exit1 = DB::table('connections')->where('sender_id', $request->sender_id)
                                          ->where('reciever_id', $request->reciever_id)->first();

          $exit2 = DB::table('connections')->where('sender_id', $request->reciever_id)
                                           ->where('reciever_id', $request->sender_id)
                                          ->first();
          if(($exit1 == '')&&($exit2 == ''))
          {
            $connections = new Connections();
            $connections->sender_id = $request->sender_id;  
            $connections->reciever_id = $request->reciever_id;
            $connections->save();

            $message = config('constants.request_sent');
    
            return response(['success'=>true,'message'=>$message,'connections'=>$connections,'status'=>200], 200);
          }
          else
          {
            $message = config('constants.already_exit');    
            return response(['success'=>true,'message'=>$message,'status'=>200], 200);
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

    public function AcceptRequest(Request $request)
    {
      $input = $request->all();
       try
        {
          $accept = DB::table('connections')->where('connection_id', $request->connection_id) 
                                            ->update(['accept_status'=>1,'reject_status'=>0,'block_status'=>0]);

          $message = config('constants.request_accept');

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

    public function RejectRequest(Request $request)
    {
      $input = $request->all();
       try
        {
          $accept = DB::table('connections')->where('connection_id', $request->connection_id) 
                                            ->update(['accept_status'=>0,'reject_status'=>1,'block_status'=>01]);

          $message = config('constants.request_reject');

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

    public function MyConnections()
    {
       try
        {
          $user = Auth::user();
          $user_exit =  DB::table('connections')->where('accept_status',1)
                                                ->where('sender_id', $user->user_id)
                                                ->orWhere('reciever_id', $user->user_id)->first();   
          if( $user_exit)
          {
            $sender = DB::table('connections')->where('accept_status',1)
                                              ->where('reject_status',0)
                                            ->where('block_status',0)
                                    ->where('sender_id', $user->user_id)
                                    ->join('users','users.user_id','=','connections.reciever_id')
                                    ->select('connections.connection_id','users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.profile_pic')
                                    ->groupby('connection_id');

            $connections = DB::table('connections')->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                    ->where('reciever_id', $user->user_id)
                                    ->join('users','users.user_id','=','connections.sender_id')
                                    ->select('connections.connection_id','users.user_id','users.first_name','users.last_name','users.display_name','users.email','users.profile_pic')
                                    ->union($sender)
                                    ->groupby('connection_id')
                                    ->get(); 

            $total = count($connections);
          
            foreach ($connections as $key => $value) {

              $user1 = DB::table('connections')->where('sender_id',$user->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('reciever_id as fr')
                                            ->groupby('sender_id');

              $user2 = DB::table('connections')->where('reciever_id',$user->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('sender_id as fr')
                                            ->union($user1)
                                            ->groupby('reciever_id')
                                            ->get();
              $fr2 =[];

              foreach ($user2 as $key => $frvalue) {
               $fr2[]= $frvalue->fr;
              }

              $user3 = DB::table('connections')->where('sender_id',$value->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('reciever_id as fr')->groupby('sender_id');

              $user4 = DB::table('connections')->where('reciever_id',$value->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('sender_id as fr')
                                            ->union($user3)
                                            ->groupby('reciever_id')
                                            ->get();

                $fr4 = [];
                foreach ($user4 as $key => $frsvalue) {
                  $fr4[]= $frsvalue->fr;
                }

              $common = array_intersect($fr2, $fr4); 
              $count_common = count($common);
           
              $value->connection_id = $value->connection_id;
              $value->user_id = $value->user_id;
              $value->first_name = $value->first_name; 
              $value->last_name = $value->last_name;             
              $value->display_name = $value->display_name;
              $value->email = $value->email;
              $value->profile_pic = $value->profile_pic;
              $value->mutual = $count_common;
            }                                                       
          return response(['success'=>true,'total_connections'=>$total,'connections'=>$connections,'status'=>200], 200);
         }
         else
         {          
            //$message = config('constants.noconnections');
           return response(['success'=>true,'total_connections'=>0,'connections'=>[],'status'=>200], 200);
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

    public function BIGSyoumayKnow(Request $request)
    {
      
      $user = Auth::user();

       $unwanted_users = UnwantedUsers::select('unwanted_userid')
                            ->where('sent_userid',$user->user_id)->get();
      if($unwanted_users)
      {                   
        $people = DB::table('users')->where('users.usertypeid',3)
                                  ->where('users.user_id','!=',$user->user_id)
                                  ->whereNotIn('users.user_id', $unwanted_users)
                                  ->join('user_chapters','user_chapters.userid','=','users.user_id')   
                                  ->where('user_chapters.chapterid',$request->chapter_id)                   
                                  ->select('users.user_id','users.display_name','users.first_name','users.last_name','users.email','users.phone_number','users.profile_pic')
                                  ->orderBy('users.created_at', 'desc')
                                  ->get(); 
      }
      else
      {
        $people = DB::table('users')->where('users.usertypeid',3)
                                  ->where('users.user_id','!=',$user->user_id)
                                  ->join('user_chapters','user_chapters.userid','=','users.user_id')   
                                  ->where('user_chapters.chapterid',$request->chapter_id)               
                                  ->select('users.user_id','users.display_name','users.first_name','users.last_name','users.email','users.phone_number','users.profile_pic')
                                  ->orderBy('users.created_at', 'desc')
                                  ->get(); 
      }
                                         
        foreach ($people as $key => $value) {
            
            $u1 = $user->user_id;
            $u2 = $value->user_id;

              $user1 = DB::table('connections')->where('sender_id',$user->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('reciever_id as fr')
                                            ->groupby('sender_id');

              $user2 = DB::table('connections')->where('reciever_id',$user->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('sender_id as fr')
                                            ->union($user1)
                                            ->groupby('reciever_id')
                                            ->get();
              $fr2 =[];

              foreach ($user2 as $key => $frvalue) {
               $fr2[]= $frvalue->fr;
              }

              //dd($fr2);
              $user3 = DB::table('connections')->where('sender_id',$value->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('reciever_id as fr')->groupby('sender_id');

              $user4 = DB::table('connections')->where('reciever_id',$value->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('sender_id as fr')
                                            ->union($user3)
                                            ->groupby('reciever_id')
                                            ->get();

                $fr4 = [];
                foreach ($user4 as $key => $frsvalue) {
                  $fr4[]= $frsvalue->fr;
                }

              $common = array_intersect($fr2, $fr4); 
              $count_common = count($common);

              $req = DB::table('connections')
                                        ->where(function($query) use ($u1,$u2)
                                          {                                            
                                              $query->where('sender_id',$u1)
                                              ->Where('reciever_id', $u2);
                                          })
                                       ->orwhere(function($query) use ($u1,$u2)
                                          {                                            
                                              $query->Where('sender_id', $u2)
                                              ->where('reciever_id',$u1);
                                          }) 
                                        ->first();                                   

          if($req)
          {
            if(($req->accept_status == 0)&&($req->reject_status == 0))
            {            
              $value->user_id = $value->user_id;
              $value->display_name = $value->display_name;
              $value->email = $value->email;
              $value->phone_number = $value->phone_number;
              $value->profile_pic = $value->profile_pic;
              $value->mutual = $count_common;
              $value->active_status = 'requested';              
            }
            else if($req->accept_status == 1)
            {
              $value->user_id = $value->user_id;
              $value->display_name = $value->display_name;
              $value->email = $value->email;
              $value->phone_number = $value->phone_number;
              $value->profile_pic = $value->profile_pic;
              $value->mutual = $count_common;
              $value->active_status = 'friend';
            }
            else if(($req->reject_status == 1)&&($req->block_status == 0))
            {
              $value->user_id = $value->user_id;
              $value->display_name = $value->display_name;
              $value->email = $value->email;
              $value->phone_number = $value->phone_number;
              $value->profile_pic = $value->profile_pic;
              $value->mutual = $count_common;
              $value->active_status = 'rejected';
            }            
             else
            {
              $value->user_id = $value->user_id;
              $value->display_name = $value->display_name;
              $value->email = $value->email;
              $value->phone_number = $value->phone_number;
              $value->profile_pic = $value->profile_pic;
              $value->mutual = $count_common;
              $value->active_status = 'blocked';
            }
          }          
          else
          {
            $value->user_id = $value->user_id;
            $value->display_name = $value->display_name;
            $value->email = $value->email;
            $value->phone_number = $value->phone_number;
            $value->profile_pic = $value->profile_pic;
            $value->mutual = $count_common;
            $value->active_status = 'not friend';
          }          
        }
      return response(['success'=>true,'people'=>$people,'status'=>200], 200);
    }

    public function RequestsList(Request $request)
    {
        $user = Auth::user();
      $list = DB::table('connections')->where('accept_status',0)
                                      ->where('reject_status',0)
                                      ->where('reciever_id',$user->user_id)
                                      ->join('users','users.user_id','=','connections.sender_id')
                                      //->join('user_chapters','user_chapters.userid','=','users.user_id')
                                      //->where('user_chapters.chapterid',$request->chapter_id)
                                      ->select('connections.connection_id','users.first_name','users.last_name','users.display_name','users.email','users.phone_number','users.profile_pic','users.user_id','connections.created_at')
                                      ->latest('created_at')
                                      ->get();

        $total_requests = count($list);

          foreach ($list as $key => $value) {

              $user1 = DB::table('connections')->where('sender_id',$user->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('reciever_id as fr')
                                            ->groupby('sender_id');

              $user2 = DB::table('connections')->where('reciever_id',$user->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('sender_id as fr')
                                            ->union($user1)
                                            ->groupby('reciever_id')
                                            ->get();
              $fr2 =[];

              foreach ($user2 as $key => $frvalue) {
               $fr2[]= $frvalue->fr;
              }

              $user3 = DB::table('connections')->where('sender_id',$value->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('reciever_id as fr')->groupby('sender_id');

              $user4 = DB::table('connections')->where('reciever_id',$value->user_id)
                                            ->where('accept_status',1)
                                            ->where('reject_status',0)
                                            ->where('block_status',0)
                                            ->select('sender_id as fr')
                                            ->union($user3)
                                            ->groupby('reciever_id')
                                            ->get();

                $fr4 = [];
                foreach ($user4 as $key => $frsvalue) {
                  $fr4[]= $frsvalue->fr;
                }

              $common = array_intersect($fr2, $fr4); 
              $count_common = count($common);
           
              $value->connection_id = $value->connection_id;
              $value->first_name = $value->first_name; 
              $value->last_name = $value->last_name;             
              $value->display_name = $value->display_name;
              $value->email = $value->email;
              $value->phone_number = $value->phone_number;
              $value->profile_pic = $value->profile_pic;              
              $value->user_id = $value->user_id;
              $value->created_at = $value->created_at;
              $value->mutual = $count_common;
            }                     

      return response(['success'=>true,'list'=>$list,'total_requests'=>$total_requests,'status'=>200], 200);
    }

    public function RemoveConnection(Request $request)
    {
      // $sender = DB::table('connections')->where('sender_id', $request->connected_userid)
      //                                   ->orWhere('sender_id', $request->user_id)
      //                                   ->where('reciever_id', $request->connected_userid)
      //                                   ->orWhere('reciever_id', $request->user_id)
      //                                   ->update(['reject_status'=>1]);

      $sender = DB::table('connections')->where('connection_id', $request->connection_id)
                                        ->first();
      if($sender)
      {

        $sender = DB::table('connections')->where('connection_id', $request->connection_id)
                                        ->update(['reject_status'=>1]);

        $message = config('constants.connection_removed');
        return response(['success'=>true,'message'=>$message,'status'=>200], 200);
      }
      else
      {
        $message = config('constants.noconnections');
        return response(['success'=>true,'message'=>$message,'status'=>200], 200);
      }
    }

    public function RemoveUser(Request $request)
    {
      $input = $request->all();
       try
        {
          $exit = DB::table('unwanted_users')->where('sent_userid',$request->sent_userid)
                                     ->where('unwanted_userid',$request->unwanted_userid)
                                     ->where('active_status',0)->first();

          if($exit)
          {
            $message = config('constants.user_removed');
          } 
          else
          {      
            $UnwantedUsers = new UnwantedUsers();
            $UnwantedUsers->sent_userid = $request->sent_userid;  
            $UnwantedUsers->unwanted_userid = $request->unwanted_userid;
            $UnwantedUsers->save();

            $message = config('constants.user_removed');
          }
      
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
    public function EventTypes(Request $request)
    {
      $eventtypes = DB::table('event_types')
                            ->select('eventtype_id','eventtype_shortdesc','eventtype_fulldesc')
                            ->get();

      return response(['success'=>true,'eventtypes'=>$eventtypes,'status'=>200], 200);
    }    

    public function AddEvent(Request $request)
    {
     $input = $request->all();
       try
        {  
            $user = Auth::user();
            $event = new EventMaster();
            $event->event_name = $request->event_name;  
            $event->eventtypeid = $request->eventtypeid;
            //$event->chapterid = $request->chapterid;
            $event->organized_by = $request->organized_by;
            $event->description = $request->description;
            $event->prerequisites = $request->prerequisites;
            $event->notes = $request->notes;
            $event->disclaimer = $request->disclaimer;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->created_userid = $user->user_id;
            $event->self_register = $request->self_register;
            $event->noof_seats = $request->noof_seats;
            $event->available_seats = $request->available_seats;
            $event->paid_event = $request->paid_event;
            $event->send_notifications = $request->send_notifications;
            $event->active_status = $request->active_status;
            if($request->eventtypeid == 1) {
              $event->tag_color = 'FF6565';
            }
            else if($request->eventtypeid == 2) {
              $event->tag_color = '3B86FF';
            } 
            else {
              $event->tag_color = 'A3A0FB';
            }          
            $event->save();

            $event_date = new EventDates();
            $event_date->eventid = $event->event_id;
            $event_date->event_date = $request->start_date;
            $event_date->start_time = $request->start_time;
            $event_date->end_time = $request->end_time;           
            $event_date->duration = $request->duration;            
            $event_date->save();

            if($request->chapterids !='')
            {
              foreach ($request->chapterids as $value) 
              {              
                $events_chapters = new EventsChapters();
                $events_chapters->eventid = $event->event_id;
                $events_chapters->chapterid = $value;
                $events_chapters->save();
              } 
            }  

            $message = config('constants.event_created');
    
            return response(['success'=>true,'message'=>$message,'event'=>$event,'status'=>200], 200);
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

    public function EditEvent(Request $request)
    {
     $input = $request->all();
       try
        { 
            $user = Auth::user();
         $event_update = DB::table('event_master')->where('event_id',$request->event_id)
                                        ->update(['event_name' => $request->event_name,
                                                  'eventtypeid' => $request->eventtypeid,
                                                  //'chapterid' => $request->chapterid,
                                                  'organized_by' => $request->organized_by,
                                                  'description' => $request->description,
                                                  'prerequisites' => $request->prerequisites,
                                                  'notes' => $request->notes,
                                                  'disclaimer' => $request->disclaimer,
                                                  'start_date' => $request->start_date,
                                                  'end_date' => $request->end_date,
                                                  'created_userid' => $user->user_id,
                                                  'self_register' => $request->self_register,
                                                  'noof_seats' => $request->noof_seats,
                                                  'available_seats' => $request->available_seats,
                                                  'paid_event' => $request->paid_event,
                                                  'send_notifications' => $request->send_notifications,
                                                  'active_status' => $request->active_status
                                                ]);

            $eventdate_update = DB::table('event_dates')->where('eventid',$request->event_id)
                                        ->update(['event_date' => $request->event_date,
                                          'start_time' => $request->start_time,
                                          'duration' => $request->duration,
                                          'end_time' => $request->end_time
                                          ]);

            $eventchapter_inactive = DB::table('events_chapters')
                                        ->where('eventid',$request->event_id)
                                        ->update(['active_status' => 1]);

            foreach ($request->chapterids as $value) 
              {
                $chapter = DB::table('events_chapters')->where('eventid',$request->event_id)
                                                    ->where('chapterid',$value)
                                                    ->first();
                if($chapter == '')
                {
                  $events_chapters = new EventsChapters();
                  $events_chapters->eventid = $request->event_id;
                  $events_chapters->chapterid = $value;
                  $events_chapters->save();
                }
                else
                {
                  $chapter = DB::table('events_chapters')->where('eventid',$request->event_id)
                                                    ->where('chapterid',$value)
                                                    ->update(['active_status'=>0]);
                }
              }

            $message = config('constants.event_update');
    
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

    public function InactivateEvent(Request $request)
    {
      $event = DB::table('event_master')->where('event_id', $request->event_id)
                                        ->update(['active_status'=>1]);

      $event_chapters = DB::table('events_chapters')->where('eventid', $request->event_id)
                                        ->update(['active_status'=>1]);

      $message = config('constants.event_deleted');

      return response(['success'=>true,'message'=>$message,'status'=>200], 200);
    }

    public function EventsList(Request $request)
    {
        $chapter_id = $request->chapter_id;
       
            $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                  ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  ->where(function($query) use ($chapter_id)
                                  {
                                     $query->where('events_chapters.chapterid', $chapter_id)
                                        ->orWhere('events_chapters.chapterid',0);
                                     })
                                  ->where('events_chapters.active_status',0)
                                  ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                  ->select('event_master.event_id','event_master.eventtypeid','events_chapters.chapterid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_master.active_status','event_master.created_at','event_master.updated_at','event_master.tag_color')
                                  ->latest('event_master.start_date')
                                  ->get();
       
          $total_events = count($eventslist);

            foreach ($eventslist as $key => $value) 
                {             
                  $value->event_id = $value->event_id;
                  $value->eventtypeid = $value->eventtypeid;
                  $value->chapterid = $value->chapterid;
                  $value->organized_by = $value->organized_by;
                  $value->event_name = $value->event_name;
                  $value->description = $value->description;
                  $value->prerequisites = $value->prerequisites;
                  $value->notes = $value->notes;
                  $value->disclaimer = $value->disclaimer;
                  $value->tag_color = $value->tag_color;
                  $value->start_date = $value->start_date;
                  $value->end_date = $value->end_date;
                  $value->start_time = $value->start_time;
                  $value->end_time = $value->end_time;
                  $value->created_userid = $value->created_userid;
                  $value->self_register = $value->self_register;
                  $value->noof_seats = $value->noof_seats;
                  $value->available_seats = $value->available_seats;
                  $value->paid_event = $value->paid_event;
                  $value->send_notifications = $value->send_notifications;
                  $value->active_status = $value->active_status;
                  $value->created_at = $value->created_at;
                  $value->updated_at = $value->updated_at;
                }

      return response(['success'=>true,'eventslist'=>$eventslist,'total_events'=>$total_events,'status'=>200], 200);
    }

    public function AllEventsList(Request $request)
    {
        $chapter_id = $request->chapter_id;
        $date = \Carbon\Carbon::parse($request->input('date'));      
        $from = $date->startOfMonth()->format('Y-m-d H:i:s');
        $to = $date->endOfMonth()->format('Y-m-d H:i:s');
        $organized_by = $request->input('organized_by');
        $today = Carbon::today();
        $current_month = Carbon::now()->month;

        if($request->input('date')!= '')
        {
          if($request->chapter_id == 0)
          {
            $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                  ->where('event_master.organized_by','=', $organized_by)
                                  ->where(function($query) use ($from,$to)
                                          {                                            
                                            $query->whereDate('event_master.start_date','>=',$from)
                                              ->orwhereDate('event_master.end_date','>=',$from);
                                          })
                                  ->where(function($query) use ($from,$to)
                                          {                                            
                                            $query->whereDate('event_master.start_date','<=',$to)
                                              ->orwhereDate('event_master.end_date','<=',$to);
                                          })
                                  // ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                  ->select('event_master.event_id','event_master.eventtypeid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at','event_master.tag_color')
                                  ->latest('event_master.start_date')
                                  ->get();
          }
          else
          {
            $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                  ->where('event_master.organized_by','=', $organized_by)
                                  ->where(function($query) use ($from,$to)
                                          {                                            
                                            $query->whereDate('event_master.start_date','>=',$from)
                                              ->orwhereDate('event_master.end_date','>=',$from);
                                          })
                                  ->where(function($query) use ($from,$to)
                                          {                                            
                                            $query->whereDate('event_master.start_date','<=',$to)
                                              ->orwhereDate('event_master.end_date','<=',$to);
                                          })
                                  ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  ->where(function($query) use ($chapter_id)
                                  {
                                     $query->where('events_chapters.chapterid', $chapter_id)
                                           ->orWhere('events_chapters.chapterid',0);
                                     })   
                                    ->where('events_chapters.active_status',0)                                
                                  ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                  ->select('event_master.event_id','event_master.eventtypeid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at','event_master.tag_color')
                                  ->latest('event_master.start_date')
                                  ->get();
            }                   
          
        }
        else if($request->input('day') == 'today')
        {
          if($request->chapter_id == 0)
          {
            $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                  ->where('event_master.organized_by',$organized_by)
                                  ->where(function($query) use ($today)
                                          {                                            
                                            $query->whereDate('event_master.start_date','=',$today)
                                              ->orwhereDate('event_master.end_date','=',$today)
                                              ->orwhere(function($query) use ($today)
                                            {                                            
                                              $query->Where('event_master.start_date','<=',$today)
                                              ->where('event_master.end_date','>=',$today);
                                            });
                                          })
                                   
                                  ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                  // ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  // ->where('events_chapters.active_status',0)
                                  ->select('event_master.event_id','event_master.eventtypeid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at','event_master.tag_color')
                                  ->latest('event_master.start_date')
                                  ->get();
          }
          else
          {
            $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                  ->where('event_master.organized_by',$organized_by)
                                  ->where(function($query) use ($today)
                                          {                                            
                                            $query->whereDate('event_master.start_date','=',$today)
                                              ->orwhereDate('event_master.end_date','=',$today);
                                          })
                                  // ->where(function($query) use ($chapter_id)
                                  // {
                                  //    $query->where('chapterid', $chapter_id)
                                  //       ->orWhere('chapterid',0);
                                  //    })
                                  ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  ->where('events_chapters.active_status',0)
                                  ->where(function($query) use ($chapter_id)
                                  {
                                     $query->where('events_chapters.chapterid', $chapter_id)
                                        ->orWhere('events_chapters.chapterid',0);
                                     })
                                  ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                  ->select('event_master.event_id','event_master.eventtypeid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at','event_master.tag_color')
                                  ->latest('event_master.start_date')
                                  ->get();
            }
        }

        else if($request->input('month') == 'current')
        {
          if($request->chapter_id == 0)
          {
            $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                  ->where('event_master.organized_by',$organized_by)
                                  ->where(function($query) use ($current_month)
                                          {                                            
                                            $query->whereMonth('event_master.start_date',$current_month)
                                              ->orwhereMonth('event_master.end_date',$current_month);
                                          })                                  
                                  ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                  // ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  // ->where('events_chapters.active_status',0)
                                  ->select('event_master.event_id','event_master.eventtypeid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at','event_master.tag_color')
                                  ->latest('event_master.start_date')
                                  ->get();
          }
          else
          {
            $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                  ->where('event_master.organized_by',$organized_by)
                                  ->where(function($query) use ($current_month)
                                          {                                            
                                            $query->whereMonth('event_master.start_date',$current_month)
                                              ->orwhereMonth('event_master.end_date',$current_month);
                                          })                                  
                                  ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  ->where('events_chapters.active_status',0)
                                  ->where(function($query) use ($chapter_id)
                                  {
                                     $query->where('events_chapters.chapterid', $chapter_id)
                                        ->orWhere('events_chapters.chapterid',0);
                                     })
                                  ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                  ->select('event_master.event_id','event_master.eventtypeid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at','event_master.tag_color')
                                  ->latest('event_master.start_date')
                                  ->get();
            }
        }

        else
        {
            if($request->chapter_id == 0)
          {
            $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                  ->where('event_master.organized_by',$organized_by)   
                                  ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                  // ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  // ->where('events_chapters.active_status',0)
                                  ->select('event_master.event_id','event_master.eventtypeid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at','event_master.tag_color')
                                  ->latest('event_master.start_date')
                                  ->get();
            }
            else
            {
             $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                  ->where('event_master.organized_by',$organized_by)                
                                  ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  ->where('events_chapters.active_status',0)
                                  ->where(function($query) use ($chapter_id)
                                  {
                                     $query->where('events_chapters.chapterid', $chapter_id)
                                        ->orWhere('events_chapters.chapterid',0);
                                   })
                                  ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                  ->select('event_master.event_id','event_master.eventtypeid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at','event_master.tag_color')
                                  ->latest('event_master.start_date')
                                  ->get();
            }
        }

          $total_events = count($eventslist);

            foreach ($eventslist as $key => $value) 
                {
                    $chapters = DB::table('events_chapters')
                                        ->where('events_chapters.eventid', $value->event_id)
                                        ->where('events_chapters.active_status',0)
                                        ->join('chapters','chapters.chapter_id','=','events_chapters.chapterid')
                                        ->select('events_chapters.chapterid','chapters.chapter_name')->get();

                    $chapterid = [];
                    $chapterid  = $chapters;

                    //dd($chapterid);

                  $value->event_id = $value->event_id;
                  $value->eventtypeid = $value->eventtypeid;
                  $value->chapterid = $chapterid;
                  $value->organized_by = $value->organized_by;
                  $value->event_name = $value->event_name;
                  $value->description = $value->description;
                  $value->prerequisites = $value->prerequisites;
                  $value->notes = $value->notes;
                  $value->disclaimer = $value->disclaimer;
                  $value->tag_color = $value->tag_color;
                  $value->start_date = $value->start_date;
                  $value->end_date = $value->end_date;
                  $value->start_time = $value->start_time;
                  $value->end_time = $value->end_time;
                  $value->created_userid = $value->created_userid;
                  $value->self_register = $value->self_register;
                  $value->noof_seats = $value->noof_seats;
                  $value->available_seats = $value->available_seats;
                  $value->eventdate_id = $value->eventdate_id;
                  $value->paid_event = $value->paid_event;
                  $value->send_notifications = $value->send_notifications;
                  $value->active_status = $value->active_status;
                  $value->created_at = $value->created_at;
                  $value->updated_at = $value->updated_at;
                }

      return response(['success'=>true,'eventslist'=>$eventslist,'total_events'=>$total_events,'status'=>200], 200);
    } 

    // public function BIGSEventsList(Request $request)
    // {
    //     $chapter_id = $request->chapter_id;

    //     $eventslist = DB::table('event_master')->where('active_status',0)
    //                           ->where('organized_by','=','bigs' )
    //                           ->where(function($query) use ($chapter_id)
    //                               {
    //                                  $query->where('chapterid', $chapter_id)
    //                                     ->orWhere('chapterid',0);
    //                                  })
    //                           ->join('event_dates','event_dates.eventid','=','event_master.event_id')
    //                           ->select('event_master.event_id','event_master.eventtypeid','event_master.chapterid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at')
    //                           ->latest('event_master.start_date')
    //                           ->get();

    //   $total_events = count($eventslist);

    //     foreach ($eventslist as $key => $value) 
    //         {             
    //           $value->event_id = $value->event_id;
    //           $value->eventtypeid = $value->eventtypeid;
    //           $value->chapterid = $value->chapterid;
    //           $value->organized_by = $value->organized_by;
    //           $value->event_name = $value->event_name;
    //           $value->description = $value->description;
    //           $value->prerequisites = $value->prerequisites;
    //           $value->notes = $value->notes;
    //           $value->disclaimer = $value->disclaimer;
    //           $value->start_date = $value->start_date;
    //           $value->end_date = $value->end_date;
    //           $value->start_time = $value->start_time;
    //           $value->end_time = $value->end_time;
    //           $value->created_userid = $value->created_userid;
    //           $value->self_register = $value->self_register;
    //           $value->noof_seats = $value->noof_seats;
    //           $value->available_seats = $value->available_seats;
    //           $value->eventdate_id = $value->eventdate_id;
    //           $value->paid_event = $value->paid_event;
    //           $value->send_notifications = $value->send_notifications;
    //           $value->active_status = $value->active_status;
    //           $value->created_at = $value->created_at;
    //           $value->updated_at = $value->updated_at;
    //         }

    //   return response(['success'=>true,'eventslist'=>$eventslist,'total_events'=>$total_events,'status'=>200], 200);
    // }    

    public function UpcomingEvents(Request $request)
    {
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
            $chapter_id = $request->chapter_id;
            if($user)
            {
              $eventslist = DB::table('event_master')->where('event_master.active_status',0)
                                      ->join('events_chapters','events_chapters.eventid','=','event_master.event_id')
                                  ->where(function($query) use ($chapter_id)
                                  {
                                     $query->where('events_chapters.chapterid', $chapter_id)
                                        ->orWhere('events_chapters.chapterid',0);
                                     })
                                      ->where('event_master.start_date','>=',Carbon::today())
                                      ->where('events_chapters.active_status',0)                                      
                                      ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                                      ->select('event_master.event_id','event_master.eventtypeid','events_chapters.chapterid','event_master.organized_by','event_master.event_name','event_master.description','event_master.prerequisites','event_master.notes','event_master.disclaimer','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.created_userid','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.noof_seats','event_master.available_seats','event_dates.eventdate_id','event_master.active_status','event_master.created_at','event_master.updated_at')
                                      ->latest('event_master.start_date')
                                      ->get();

              $total_events = count($eventslist);

                foreach ($eventslist as $key => $value) 
                    {             
                      $value->event_id = $value->event_id;
                      $value->eventtypeid = $value->eventtypeid;
                      $value->chapterid = $value->chapterid;
                      $value->organized_by = $value->organized_by;
                      $value->event_name = $value->event_name;
                      $value->description = $value->description;
                      $value->prerequisites = $value->prerequisites;
                      $value->notes = $value->notes;
                      $value->disclaimer = $value->disclaimer;
                      $value->start_date = $value->start_date;
                      $value->end_date = $value->end_date;
                      $value->start_time = $value->start_time;
                      $value->end_time = $value->end_time;
                      $value->created_userid = $value->created_userid;
                      $value->self_register = $value->self_register;
                      $value->noof_seats = $value->noof_seats;
                      $value->available_seats = $value->available_seats;
                      $value->eventdate_id = $value->eventdate_id;
                      $value->paid_event = $value->paid_event;
                      $value->send_notifications = $value->send_notifications;
                      $value->active_status = $value->active_status;
                      $value->created_at = $value->created_at;
                      $value->updated_at = $value->updated_at;
                    }

                return response(['success'=>true,'eventslist'=>$eventslist,'total_events'=>$total_events,'status'=>200], 200);
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

    public function ViewEvent(Request $request)
    {
      $event = DB::table('event_master')->where('event_id', $request->event_id)
                ->join('event_types','event_types.eventtype_id','=','event_master.eventtypeid')
                ->join('event_dates','event_dates.eventid','=','event_master.event_id')
                ->select('event_master.event_id','event_master.event_name','event_types.eventtype_fulldesc as event_type','event_master.description','event_master.start_date','event_master.end_date','event_dates.start_time','event_dates.end_time','event_master.noof_seats','event_master.available_seats','event_master.prerequisites','event_master.notes','event_dates.eventdate_id','event_master.self_register','event_master.paid_event','event_master.send_notifications','event_master.active_status')
                ->first();

      return response(['success'=>true,'event'=>$event,'status'=>200], 200);
    }

    public function RegisterEvent(Request $request)
    {
      $input = $request->all();
       try
        {  
            $event_register = new EventRegistration();
            $event_register->eventdateid = $request->eventdateid;
            $event_register->userid = $request->user_id;
            $event_register->eventid = $request->event_id;
            $event_register->registered_seats = $request->registered_seats;
            $event_register->accept_notifications=$request->accept_notifications;
            $event_register->active_status=$request->active_status;
            $event_register->save();

            if($event_register->register_id != '')
            {
              $available_seats = DB::table('event_dates')
                            ->where('eventdate_id',$request->eventdateid)
                            ->join('event_master','event_master.event_id','=','event_dates.eventid')
                            ->decrement('event_master.available_seats',$request->registered_seats);
            }
;
            $message = config('constants.event_register');
    
            return response(['success'=>true,'message'=>$message,'event_register'=>$event_register,'status'=>200], 200);
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

   public function MyEvents()
   {
     //$input = $request->all();
       try
        {
            $user = Auth::user();
            if ($user) 
            {            
                $events = DB::table('event_registration')
                          ->where('event_registration.userid', $user->user_id)
                          ->where('event_registration.active_status',0)
                        ->join('event_dates','event_dates.eventdate_id','=','event_registration.eventdateid')
                        ->join('event_master','event_master.event_id','=','event_dates.eventid')
                        ->select('event_registration.register_id','event_master.event_name','event_dates.event_date','event_dates.start_time')
                        ->get();

                  $count = count($events);
                  return response(['success'=>true,'events'=>$events,'count' => $count,'status'=>200], 200);
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


    public function ViewMessage(Request $request)
    {
     $input = $request->all(); 
        try
        { 
          $username = DB::table('users')->where('user_id',$request->user_id)
                                        ->select('display_name')->first();

          $message_sender = DB::table('messages')->where('message_id',$request->message_id)
                                                 ->where('sender_id',$request->user_id)
                                                 ->first();

           $message_reciever = DB::table('messages')->where('message_id',$request->message_id)
                                                    ->where('receiver_id',$request->user_id)
                                                    ->first();


            if($message_sender)
            {
                $message = Messages::select('users.first_name','users.last_name','users.display_name',             'users.email','messages.message_id','messages.subject','messages.body',              'messages.viewed_status','messages.delivery_status','messages.active_status','messages.delete_status','messages.created_at','users.profile_pic','messages.messahge_type')
                                    // DB::raw('mail_attachments.attachment'))
                                  ->join('users','users.user_id','=','messages.receiver_id')
                                  // ->leftJoin('mail_attachments','mail_attachments.messageid','=','messages.message_id') 
                                  ->where('message_id', $request->message_id)
                                  //->where('active_status',0)                                  
                                  ->get();
                foreach ($message as $value) {
                  $value->first_name = $value->first_name;
                  $value->last_name = $value->last_name;
                  $value->display_name = $value->display_name;
                  $value->email = $value->email;
                  $value->message_id = $value->message_id;
                  $value->subject = $value->subject;
                  $value->body = $value->body;
                  $value->viewed_status = $value->viewed_status;
                  $value->delivery_status = $value->delivery_status;
                  $value->delete_status = $value->delete_status;
                  $value->created_at = $value->created_at;
                  $value->profile_pic = $value->profile_pic;
                  $value->username = $username->display_name;
                }
               // $message->push('username', $username);
            }
            else
            {
              $message = Messages::select('users.first_name','users.last_name','users.display_name',             'users.email as sender_email','messages.message_id','messages.subject'              ,'messages.body','messages.viewed_status','messages.delivery_status',
                              'messages.active_status','messages.delete_status','messages.created_at','users.profile_pic')
                                  ->join('users','users.user_id','=','messages.sender_id')
                                  ->where('message_id', $request->message_id)                  
                                  ->get();

              foreach ($message as $value) {
                  $value->first_name = $value->first_name;
                  $value->last_name = $value->last_name;
                  $value->display_name = $value->display_name;
                  $value->email = $value->email;
                  $value->message_id = $value->message_id;
                  $value->subject = $value->subject;
                  $value->body = $value->body;
                  $value->viewed_status = $value->viewed_status;
                  $value->delivery_status = $value->delivery_status;
                  $value->delete_status = $value->delete_status;
                  $value->created_at = $value->created_at;
                  $value->profile_pic = $value->profile_pic;
                  $value->username = $username->display_name;
                }
             // $message->push('username', $username);
            }

            $update = DB::table('messages')->where('messageid', $request->message_id)
                                           ->update(['viewed_status'=>1]);

            $attach = DB::table('mail_attachments')->where('messageid', $request->message_id)->first();
            if($attach != '')
            {
               $attachments = MailAttachments::select('attachment')
                                          ->where('messageid', $request->message_id)
                                          ->get();
            }
            else
            {
              $attachments = "";
            }
          return response(['success'=>true,'message'=>$message,'attachments'=> $attachments,'status'=>200], 200);
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
}
