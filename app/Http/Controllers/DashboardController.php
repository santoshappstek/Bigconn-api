<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Discounts;
use App\Notifications;
use App\Messages;
use App\Discount_Documents;
use App\Albums;
use App\Photos;
use App\MailAttachments;
use App\Notification_log;
use App\Helpers\Helper;
use App\Helpers\constants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Response;

class DashboardController extends Controller
{
    //Add Discount
    
    public function AddDiscount(Request $request)
    {
      $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'program_name' => 'required',
        //   'partner_name' => 'required',
        //   'description' => 'required',
        //   'start_date' => 'required',
        //   'end_date' => 'required',
        //   'active_status' => 'required',
        //   'user_id' => 'required',
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
            $discount = new Discounts();
            $discount->program_name = $request->program_name;  
            $discount->partner_name = $request->partner_name;
            $discount->description = $request->description;
            $discount->start_date = $request->start_date;
            $discount->end_date = $request->end_date;
            $discount->created_by = $user->user_id;
            $discount->chapterid = $request->chapter_id;
            $discount->active_status = $request->active_status;
            $discount->save();

            if($request->documents != '')
            {
              $files = $request->file('documents');

              foreach($files as $documents)
              {             
                $fullName=$documents->getClientOriginalName();
                $name=explode('.',$fullName)[0];

                $documentName = env('FILE_PATH').'/discount_documents/'.$name.'-'.time().'.'.$documents->getClientOriginalExtension();  

                $documents->move(public_path('discount_documents'),$documentName);

                  $discount_documents = new Discount_Documents();
                  $discount_documents->discountid = $discount->discount_id;
                  $discount_documents->document_name = $documentName;
                  $discount_documents->save();
              }                     
            }

            $file_path = env('FILE_PATH').'/discount_documents';            
    
            return response(['success'=>true,'discount'=>$discount,'file_path'=>$file_path,'status'=>200], 200);
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

    public function EditDiscount(Request $request)
    {
      $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'discount_id' => 'required',
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
          $discount = DB::table('discounts')->where('discount_id', $request->discount_id)->first();
          $user = Auth::user();

          if($discount)
          {
            $discount_update = Discounts::find($discount->discount_id);
            $discount_update->program_name = $request->program_name;  
            $discount_update->partner_name = $request->partner_name;
            $discount_update->description = $request->description;
            $discount_update->start_date = $request->start_date;
            $discount_update->end_date = $request->end_date;
            $discount_update->created_by = $user->user_id;
            $discount_update->chapterid = $request->chapter_id;
            $discount_update->active_status = $request->active_status;
            $discount_update->save();

            if($request->deletedocumentids != '')
            {
              foreach($request->deletedocumentids as $ids)
              { 
               $document = DB::table('discount_documents')
                          ->where('discountdocument_id',$ids)
                          ->update(['delete_status'=>1]); 
              }            
            }

            else if($request->documents != '')
            {
              $files = $request->file('documents');
              foreach($files as $documents)
              {           
                $fullName=$documents->getClientOriginalName();
                $name=explode('.',$fullName)[0];

                $documentName = env('FILE_PATH').'/discount_documents/'.$name.'-'.time().'.'.$documents->getClientOriginalExtension();  

                $documents->move(public_path('discount_documents'),$documentName);

                  $discount_documents = new Discount_Documents();
                  $discount_documents->discountid = $discount->discount_id;
                  $discount_documents->document_name = $documentName;
                  $discount_documents->save();
               }
              }
             // $file_path = config('constants.FILE_PATH').'/discount_documents';
    
            return response(['success'=>true,'discount'=>$discount_update,'status'=>200], 200);
          }
          else{
            $message = config('constants.Discount_notfound');
            return response(['success'=>false,'discount'=>$message,'status'=>201], 201);
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

    public function DiscountsList(Request $request)
    {
      $user = Auth::user();

      if($user)
      {
        if($request->chapter_id == 0)
        {
          $discounts = DB::table('discounts')//->where('created_by', $user->user_id)
                                         //->where('chapterid', $request->chapter_id)
                                         ->whereIn('active_status', [0, 1])
                                         ->latest('end_date')
                                         ->get();
        }
        else
        {
          $discounts = DB::table('discounts')//->where('created_by', $user->user_id)
                                         ->where('chapterid', $request->chapter_id)
                                         ->whereIn('active_status', [0, 1])
                                         ->latest('end_date')
                                         ->get();
        }

        foreach ($discounts as $key => $value) 
        {         
          $doc = DB::table('discount_documents')->where('discountid', $value->discount_id)->first();
            if($doc != '')
            {
              $documents = Discount_Documents::select('document_name')
                                            ->where('discountid', $value->discount_id)
                                            ->where('delete_status',0)
                                            ->select('discountdocument_id','document_name')->get();
            }
            else
            {
              $documents = "";
            }
            
            $value->discount_id = $value->discount_id;
            $value->program_name = $value->program_name;
            $value->partner_name = $value->partner_name;
            $value->description = $value->description;
            $value->start_date = $value->start_date;
            $value->end_date = $value->end_date;
            $value->created_by = $value->created_by;
            $value->chapterid = $value->chapterid;
            $value->active_status = $value->active_status;
            $value->created_at = $value->created_at;
            $value->updated_at = $value->updated_at;
            $value->documents = $documents;
          }
      
      //$file_path = config('constants.FILE_PATH').'/discount_documents'; 

     return response(['success'=>true,'discounts'=> $discounts,'status'=>200],200);
   }
   else
   {
      $message = config('constants.User_notfound');
      return  response(['success'=>false,'message'=> $message,'status'=>201],201);
   }
  }

    public function InactivateDiscount(Request $request)
    {
      $discounts = DB::table('discounts')->where('discount_id',$request->discount_id)->first();
      
      if($discounts)
      {
        $discounts = DB::table('discounts')->where('discount_id',$request->discount_id)->update(['active_status'=>2]);
         
        $message = config('constants.Discount_Deleted');

        return  response(['success'=>true,'message'=> $message,'status'=>200],200);
      }
      else
      {
        $message = config('constants.Discount_notfound');

        return  response(['success'=>false,'message'=> $message,'status'=>201],201);
      }
    }

    public function SearchDiscount(Request $request)
    {
      // $validator = Validator::make($request->all(), [
      //   'search_by' => 'required',
      // ]);

      // if ($validator->fails()) { 
      //           $error_msg = "search_by is required";
      //           return response(['error'=>$error_msg, 'status'=>222], 222);
      // }
      try
      {
        $search = $request->input('search_by');

        $discounts = DB::table('discounts')
                          ->where('program_name', 'like', '%' . $search . '%')
                          ->orWhere('partner_name', 'like', '%' . $search . '%')
                          ->orWhere('description', 'like', '%' . $search . '%')
                          ->get(); 
        //$file_path = config('constants.FILE_PATH').'/discount_documents';    

        return response(['success'=>true,'discounts'=>$discounts,'status'=>200],200);
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
    
    public function DeleteDiscountDocument(Request $request)
    {
      $input = $request->all();

      $document = DB::table('discount_documents')
                          ->where('discountdocument_id',$request->discountdocument_id)
                          ->update(['delete_status'=>1]);    
         
        $message = config('constants.Discount_Deleted');

        return  response(['success'=>true,'message'=> $message,'status'=>200],200);
    }

    public function AddNotification(Request $request)
    {

      $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'message' => 'required',
        //   'sent_date' => 'required',
        //   'scheduled_datetime' => 'required',
        //   'timezone' => 'required',
        //   'sent_date' => 'required',
        //   'user_id' => 'required'
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
              if($request->sent_to != 'all')
              {
                 $sent_to = implode(",", $request->get('sent_to'));
              }
              else
              {
                $sent_to = $request->sent_to;
              }
              if($request->message_status == 'sent')
              {
                $notifications = new Notifications();
                $notifications->message = $request->message;
                $notifications->sent_to = $sent_to;
                $notifications->message_status = 'sent';
                $notifications->sent_date = Carbon::now();
                $notifications->created_by = $user->user_id;
                $notifications->chapterid = $request->chapter_id;
                $notifications->save();
              }
              else
              {
                $notifications = new Notifications();
                $notifications->message = $request->message; 
                $notifications->sent_to = $sent_to;
                $notifications->scheduled_date =  $request->scheduled_date;
                $notifications->scheduled_time = $request->scheduled_time;
                $notifications->timezone = $request->timezone;
                $notifications->message_status = 'scheduled';
                //$notifications->sent_date = $request->scheduled_date;
                $notifications->created_by = $user->user_id;
                $notifications->chapterid = $request->chapter_id;
                $notifications->save();
              }    
              return response(['success'=>true,'notifications'=>$notifications,'status'=>200],200);
            }  
           else{
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

    public function EditNotification(Request $request)
    {

      $input = $request->all();

      // $validator = Validator::make($request->all(), [
      //     'notify_id' => 'required',
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
        $notification = DB::table('notifications')->where('notify_id', $request->notify_id)
                                                  ->where('created_by',$user->user_id)->first();        

        if($notification)
        {
          if($request->sent_to != 'all')
          {
             $sent_to = implode(",", $request->get('sent_to'));
          }
          else
          {
            $sent_to = $request->sent_to;
          }

          if($user)
          {

          if($request->message_status == 'sent')
          {
            $notification_update = Notifications::find($notification->notify_id);
            $notification_update->message = $request->message;  
            $notification_update->scheduled_date = '';          
            $notification_update->scheduled_time = '';
            $notification_update->timezone = '';
            $notification_update->message_status = 'sent';
            $notification_update->sent_date = Carbon::now();
            $notification_update->created_by = $user->user_id;
            $notification_update->chapterid = $request->chapter_id;
            $notification_update->save();
          }
          else
          {
            $notification_update = Notifications::find($notification->notify_id);
            $notification_update->message = $request->message; 
            $notification_update->sent_to = $sent_to;
            $notification_update->scheduled_date = $request->scheduled_date;
            $notification_update->scheduled_time = $request->scheduled_time;
            //$notification_update->scheduled_time = Carbon::parse($request->input('scheduled_time'))->format('g:i A');
            $notification_update->timezone = $request->timezone;
            $notification_update->message_status = 'scheduled';
            //$notifications->sent_date = '';
            $notification_update->created_by = $user->user_id;
            $notification_update->chapterid = $request->chapter_id;
            $notification_update->save();
          }             
          return response(['success'=>true,'notifications'=>$notification_update,'status'=>200],200);
        }
        else
        {
          $message = config('constants.user_wrong');
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

    public function AllNotifications(Request $request)
    {      
      // $keys = array('name');
      // $a = array_fill_keys($keys, 'banana');
      // print_r($a);

      $user = Auth::user();

      if($user)
      {
        if($request->chapter_id == 0)
        {
          $notifications = DB::table('notifications')//->where('created_by', $user->user_id)
                                    //->where('notifications.chapterid', $request->chapter_id)
                                    ->where('notifications.note_status',0)
                                    ->select('notifications.*',DB::raw('GROUP_CONCAT(users.display_name) as username'),DB::raw('GROUP_CONCAT(users.user_id) as selected_userid'))
                                    ->leftjoin('users', DB::raw('FIND_IN_SET(users.user_id,notifications.sent_to)'),'>',DB::raw('0'))
                                    ->groupBy('notifications.notify_id')
                                    ->latest('notifications.created_at')
                                    ->get();
        }
        else
        {
          $notifications = DB::table('notifications')//->where('created_by', $user->user_id)
                                    ->where('notifications.chapterid', $request->chapter_id)
                                    ->where('notifications.note_status',0)
                                    ->select('notifications.*',DB::raw('GROUP_CONCAT(users.display_name) as username'),DB::raw('GROUP_CONCAT(users.user_id) as selected_userid'))
                                    ->leftjoin('users', DB::raw('FIND_IN_SET(users.user_id,notifications.sent_to)'),'>',DB::raw('0'))
                                    ->groupBy('notifications.notify_id')
                                    ->latest('notifications.created_at')
                                    ->get();
        }
                                                     
          foreach ($notifications as $key => $value) {
                $value->notify_id = $value->notify_id;
                $value->message = $value->message;
                if($value->sent_to == 'all')
                {
                  $value->sent_to = 'All';
                  $value->sentto_status = 'all';
                }
                else
                {
                  $value->sent_to = count(explode(",",$value->sent_to));
                  $value->sentto_status = 'selected'; 
                  $value->selected_userid = explode(',', $value->selected_userid);
                  $value->username = explode(',', $value->username);      
                }
                $value->scheduled_date = $value->scheduled_date;
                $value->scheduled_time = $value->scheduled_time;
                $value->timezone = $value->timezone;
                $value->sent_date = $value->sent_date;
                $value->message_status = $value->message_status;            
                $value->note_status = $value->note_status;
                $value->viewed_status = $value->viewed_status;
                $value->created_by = $value->created_by;
                $value->chapterid = $value->chapterid;
                $value->created_at = $value->created_at;
                $value->updated_at = $value->updated_at;
            }
           return  response(['success'=>true,'notifications'=> $notifications,'status'=>200],200);
         }
         else{
        return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
      }
    }

    public function SentNotifications(Request $request)
    {
      $user = Auth::user();

      if($user)
      {
        if($request->chapter_id == 0)
        {
          $notifications = DB::table('notifications')//->where('created_by', $user->user_id)
                                         //->where('notifications.chapterid', $request->chapter_id)
                                         ->where('notifications.message_status','=','sent')
                                         ->where('notifications.note_status',0)
                                         ->select('notifications.*',DB::raw('GROUP_CONCAT(users.display_name) as username'),DB::raw('GROUP_CONCAT(users.user_id) as selected_userid'))
                                  ->leftjoin('users', DB::raw('FIND_IN_SET(users.user_id,notifications.sent_to)'),'>',DB::raw('0'))
                                  ->groupBy('notifications.notify_id')
                                  ->latest('notifications.created_at')
                                  ->get();
        }
        else
        {
          $notifications = DB::table('notifications')//->where('created_by', $user->user_id)
                                         ->where('notifications.chapterid', $request->chapter_id)
                                         ->where('notifications.message_status','=','sent')
                                         ->where('notifications.note_status',0)
                                         ->select('notifications.*',DB::raw('GROUP_CONCAT(users.display_name) as username'),DB::raw('GROUP_CONCAT(users.user_id) as selected_userid'))
                                  ->leftjoin('users', DB::raw('FIND_IN_SET(users.user_id,notifications.sent_to)'),'>',DB::raw('0'))
                                  ->groupBy('notifications.notify_id')
                                  ->latest('notifications.created_at')
                                  ->get();
        }

            foreach ($notifications as $key => $value) {
              $value->notify_id = $value->notify_id;
              $value->message = $value->message;
              if($value->sent_to == 'all')
              {
                $value->sent_to = 'All';
                $value->sentto_status = 'all';
              }
              else
              {
                $value->sent_to = count(explode(",",$value->sent_to));
                $value->sentto_status = 'selected';
                $value->selected_userid = explode(',', $value->selected_userid);
                $username = explode(',', $value->username);
                $value->username = $username;
              }
              $value->scheduled_date = $value->scheduled_date;
              $value->scheduled_time = $value->scheduled_time;
              $value->timezone = $value->timezone;
              $value->sent_date = $value->sent_date;
              $value->message_status = $value->message_status;            
              $value->note_status = $value->note_status;
              $value->viewed_status = $value->viewed_status;
              $value->created_by = $value->created_by;
              $value->chapterid = $value->chapterid;
              $value->created_at = $value->created_at;
              $value->updated_at = $value->updated_at;
          }

         return  response(['success'=>true,'notifications'=> $notifications,'status'=>200],200);
        }
        else{
        return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
      }
    }

    public function ScheduledNotifications(Request $request)
    {
      $user = Auth::user();

      if($user)
      {
        if($request->chapter_id == 0)
        {
          $notifications = DB::table('notifications')//->where('created_by', $user->user_id)
                                         //->where('notifications.chapterid', $request->chapter_id)
                                          ->where('notifications.message_status','=','scheduled')
                                          ->where('notifications.note_status',0)
                                          ->select('notifications.*',DB::raw('GROUP_CONCAT(users.display_name) as username'),DB::raw('GROUP_CONCAT(users.user_id) as selected_userid'))
                                ->leftjoin('users', DB::raw('FIND_IN_SET(users.user_id,notifications.sent_to)'),'>',DB::raw('0'))
                                ->groupBy('notifications.notify_id')
                                                 ->orderBy('notifications.scheduled_date')
                                                 //->latest('created_at')
                                                 ->get();
        }
        else
        {
          $notifications = DB::table('notifications')//->where('created_by', $user->user_id)
                                         ->where('notifications.chapterid', $request->chapter_id)
                                          ->where('notifications.message_status','=','scheduled')
                                          ->where('notifications.note_status',0)
                                          ->select('notifications.*',DB::raw('GROUP_CONCAT(users.display_name) as username'),DB::raw('GROUP_CONCAT(users.user_id) as selected_userid'))
                                ->leftjoin('users', DB::raw('FIND_IN_SET(users.user_id,notifications.sent_to)'),'>',DB::raw('0'))
                                ->groupBy('notifications.notify_id')
                                                 ->orderBy('notifications.scheduled_date')
                                                 //->latest('created_at')
                                                 ->get();
        }

        foreach ($notifications as $key => $value) {
            $value->notify_id = $value->notify_id;
            $value->message = $value->message;
            if($value->sent_to == 'all')
            {
              $value->sent_to = 'All';
              $value->sentto_status = 'all';
            }
            else
            {
              $value->sent_to = count(explode(",",$value->sent_to));
              $value->sentto_status = 'selected';
              $value->selected_userid = explode(',', $value->selected_userid);
              $username = explode(',', $value->username);
              $value->username = $username;
            }
            $value->scheduled_date = $value->scheduled_date;
            $value->scheduled_time = $value->scheduled_time;
            $value->timezone = $value->timezone;
            $value->sent_date = $value->sent_date;
            $value->message_status = $value->message_status;            
            $value->note_status = $value->note_status;
            $value->viewed_status = $value->viewed_status;
            $value->created_by = $value->created_by;
            $value->chapterid = $value->chapterid;
            $value->created_at = $value->created_at;
            $value->updated_at = $value->updated_at;
        }
       return  response(['success'=>true,'notifications'=> $notifications,'status'=>200],200);
     }
     else{
        return response(['success'=>false,'message'=>'user not exist','status'=>201],201);
      }
    }    

    public function DeleteNotification(Request $request)
    {
      $note = DB::table('notifications')->where('notify_id', $request->notify_id)
                                        ->where('note_status',0)->first();
      if($note)
      {
        $notifications = DB::table('notifications')->where('notify_id', $request->notify_id)->update(['note_status'=>1]);

        $message = config('constants.Notification_Delete');

         return  response(['success'=>true,'message'=> $message,'status'=>200],200);
      }
      else
      {
        $message = config('constants.Notification_notfound');

         return  response(['success'=>false,'message'=> $message,'status'=>201],201);
      }
    }

    public function SearchNotification(Request $request)
    {
      // $validator = Validator::make($request->all(), [
      //   'search_by' => 'required',
      // ]);

      // if ($validator->fails()) { 
      //           $error_msg = "search_by is required";
      //           return response(['error'=>$error_msg, 'status'=>222], 222);
      // }
      try
      {
        $search = $request->input('search_by');

        $notification = DB::table('notifications')
                          ->where('message', 'like', '%' . $search . '%')
                          ->orWhere('sent_date', 'like', '%' . $search . '%')
                          ->get();      

        return response(['success'=>true,'notification'=>$notification,'status'=>200],200);
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

    public function SendMessage(Request $request)
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
          $user = Auth::user();

          //$user = DB::table('users')->where('user_id', $user->user_id)->first();

          if($user)
          {
            $receiver = DB::table('users')->where('email', $request->email)->first();
            if($receiver)
            {
              if($request->message_id != '')
              {
                $newmessage = DB::table('messages')->where('message_id',$request->message_id)
                                                 ->update([
                                                  'email' => $receiver->email,
                                                  'receiver_id' => $receiver->user_id,
                                                  'subject'=> $request->subject,
                                                  'body' => $request->body,
                                                  'message_type' => 'sent'
                                                ]);  

                $notification_log = new notification_log();
                $notification_log->user_id = $receiver->user_id;
                $notification_log->sender_id = $user->user_id;
                $notification_log->log_type = 'message';
                $notification_log->message = 'sent you a message';
                $notification_log->source_id = $request->message_id;
                //$notification_log->created_at = Carbon::now();
                $notification_log->save();                                          

              }
              else if($request->message_type == 'drafts')
              {
                $newmessage = new Messages();
                $newmessage->sender_id = $user->user_id;
                $newmessage->receiver_id = $receiver->user_id;
                $newmessage->email = $receiver->email;
                $newmessage->subject = $request->subject;
                $newmessage->body = $request->body;
                $newmessage->message_type = 'draft';
                $newmessage->save();
              }
              else
              {
                $newmessage = new Messages();
                $newmessage->sender_id = $user->user_id;
                $newmessage->receiver_id = $receiver->user_id;
                $newmessage->email = $receiver->email;
                $newmessage->subject = $request->subject;
                $newmessage->body = $request->body;
                $newmessage->message_type = 'sent';
                $newmessage->save();

                $notification_log = new notification_log();
                $notification_log->user_id = $receiver->user_id;
                $notification_log->sender_id = $user->user_id;
                $notification_log->log_type = 'message';
                $notification_log->message = 'Sent a new message';
                $notification_log->source_id = $newmessage->message_id;
                $notification_log->save();
              }
              if($request->file('attachments') != '')
              {
                $files = $request->file('attachments');

                foreach($files as $documents)
                {                             
                  $fullName=$documents->getClientOriginalName();
                  $name=explode('.',$fullName)[0];

                  $attachmentName = env('FILE_PATH').'/mail_attachments/'.$name.'-'.time().'.'.$documents->getClientOriginalExtension();  

                  $documents->move(public_path('mail_attachments'),$attachmentName);

                    $mail_attachments = new MailAttachments();
                    $mail_attachments->messageid = $newmessage->message_id;
                    $mail_attachments->attachment = $attachmentName;
                    $mail_attachments->save();                    
                 } 
             }
            
            $message = config('constants.Message_Sent'); 
            //$file_path = config('constants.FILE_PATH').'/mail_attachments';         
    
            return response(['success'=>true,'message'=>$message,'message_data'=>$newmessage,'status'=>200], 200); 
          }
            else{
            $message = config('constants.User_notfound');
            return response(['success'=>false,'message'=>$message,'status'=>201], 201); 
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

    public function ToListUsers(Request $request)
    {
      $input = $request->all();           

        try
        {  
          $users = DB::table('users')->Where('first_name', 'like', $request->name . '%')
                                   ->orWhere('last_name', 'like', $request->name . '%' )
                                   ->orWhere('display_name', 'like', $request->name . '%')
                                    ->orWhere('email', 'like', $request->name . '%')
                                    ->select('user_id','display_name','first_name','last_name','email','profile_pic')
                                    ->get();
          if($users)
          {     
            return response(['success'=>true,'users'=>$users,'status'=>200], 200); 
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

    public function RecievedMessages()
    {
     //$input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'user_id' => 'required',
        //   ]);
        //   if ($validator->fails()) { 
        //         $error_msg = "";
        //         foreach (json_decode($validator->errors()) as $key => $value) {
        //            $error_msg = $value[0]; 
        //            break;}
        //         return response(['success'=>true,'error'=>$error_msg, 'status'=>222], 222);
        //   }
        try
        {  
          $user = Auth::user();
          //$user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($user)
          {
            $list = DB::table('messages')->where('receiver_id', $user->user_id)
                                        ->where('messages.active_status',0)
                                        ->where('messages.message_type','=','sent')
                                        ->join('users','users.user_id','=','messages.sender_id')
                                        ->select('messages.message_id','messages.body','messages.subject','messages.viewed_status','users.first_name','users.last_name','users.display_name','users.email','users.profile_pic','messages.created_at')
                                        //->groupBy('messages.sender_id')
                                        ->latest('created_at')
                                        ->get();

            foreach ($list as $key => $value) {

              $attach = DB::table('mail_attachments')->where('messageid', $value->message_id)->first();
              if($attach != '')
              {
                $attachments = MailAttachments::select('attachment')
                                            ->where('messageid', $value->message_id)
                                            ->select('attachment')->get();
              }
              else
              {
                $attachments = "";
              }
              $value->message_id = $value->message_id;
              $value->subject = $value->subject;
              $value->body = $value->body;
              $value->first_name = $value->first_name;
              $value->last_name = $value->last_name; 
              $value->display_name = $value->display_name;             
              $value->email = $value->email;
              $value->viewed_status = $value->viewed_status;
              $value->profile_pic = $value->profile_pic;
              $value->created_at = $value->created_at;
              $value->attachments = $attachments;
            }
            return response(['success'=>true,'list'=>$list,'status'=>200],200);
          }
          else{
            $message = config('constants.User_notfound');
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

    public function ViewMessage(Request $request)
    {
     $input = $request->all(); 
        try
        { 
          $user = Auth::user();

          $message_sender = DB::table('messages')->where('message_id',$request->message_id)
                                                 ->where('sender_id',$user->user_id)
                                                 ->first();

           $message_reciever = DB::table('messages')->where('message_id',$request->message_id)
                                                    ->where('receiver_id',$user->user_id)
                                                    ->first();

            if($request->message_type !='')
            {
              if($request->email != '')
              {
                $receiver = DB::table('users')->where('email', $request->email)->first();            
                
                $newmessage = new Messages();
                $newmessage->sender_id = $user->user_id;
                $newmessage->receiver_id = $receiver->user_id;
                $newmessage->email = $receiver->email;
                $newmessage->subject = $request->subject;
                $newmessage->body = $request->body;
                $newmessage->message_type = 'draft';
                $newmessage->save();
              }
              else
              {
                $newmessage = new Messages();
                $newmessage->sender_id = $user->user_id;
                $newmessage->receiver_id = '';
                $newmessage->email = $request->email;
                $newmessage->subject = $request->subject;
                $newmessage->body = $request->body;
                $newmessage->message_type = 'draft';
                $newmessage->save(); 
              }
            }

            if($message_sender)
            {
                $message = Messages::select('users.first_name','users.last_name','users.display_name',             'users.email','messages.message_id','messages.subject','messages.body',              'messages.viewed_status','messages.delivery_status','messages.active_status','messages.delete_status','messages.created_at','users.profile_pic','messages.message_type')
                                    // DB::raw('mail_attachments.attachment'))
                                  ->join('users','users.user_id','=','messages.receiver_id')
                                  // ->leftJoin('mail_attachments','mail_attachments.messageid','=','messages.message_id') 
                                  ->where('message_id', $request->message_id)
                                  //->where('active_status',0)                                  
                                  ->first();
            }
            else
            {
              $message = Messages::select('users.first_name','users.last_name','users.display_name',             'users.email as sender_email','messages.message_id','messages.subject'              ,'messages.body','messages.viewed_status','messages.delivery_status',
                              'messages.active_status','messages.delete_status','messages.created_at','users.profile_pic','messages.message_type')
                                  ->join('users','users.user_id','=','messages.sender_id')
                                  ->where('message_id', $request->message_id)                  
                                  ->first();
            }

            $update = DB::table('messages')->where('message_id', $request->message_id)
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

    public function SentMessages()
    {
     //$input = $request->all(); 
        try
        {  
          $user = Auth::user();
          //$user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($user)
          {
            $list = DB::table('messages')->where('sender_id', $user->user_id)
                                        ->where('messages.active_status',0)
                                        ->join('users','users.user_id','=','messages.receiver_id')
                                        ->select('messages.message_id','messages.body','messages.subject','messages.viewed_status','users.first_name','users.last_name','users.display_name','users.email','users.profile_pic','messages.created_at')
                                        //->groupBy('messages.sender_id')
                                        ->latest('created_at')
                                        ->get();

             foreach ($list as $key => $value) {

              $attach = DB::table('mail_attachments')->where('messageid', $value->message_id)->first();
              if($attach != '')
              {
                $attachments = DB::table('mail_attachments')->where('messageid', $value->message_id)
                                            ->select('attachment')->get();
              }
              else
              {
                $attachments = "";
              }
              $value->message_id = $value->message_id;
              $value->subject = $value->subject;
              $value->body = $value->body;
              $value->body = $value->body;
              $value->display_name = $value->display_name;
              $value->first_name = $value->first_name;
              $value->last_name = $value->last_name;
              $value->viewed_status = $value->viewed_status;
              $value->profile_pic = $value->profile_pic;
              $value->created_at = $value->created_at;
              $value->attachments = $attachments;
            }
            return response(['success'=>true,'list'=>$list,'status'=>200], 200);
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
    public function DraftsMessages()
    {
     //$input = $request->all(); 
        try
        { 
          $user = Auth::user(); 
          //$user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($user)
          {
            $list = DB::table('messages')->where('sender_id', $user->user_id)
                                        ->where('messages.active_status',0)
                                        ->where('message_type','=','draft')
                                        ->leftjoin('users','users.user_id','=','messages.receiver_id')
                                        ->select('messages.message_id','messages.body','messages.subject','messages.viewed_status','users.first_name','users.last_name','users.display_name','users.email','users.profile_pic','messages.created_at')
                                        //->groupBy('messages.sender_id')
                                        ->latest('created_at')
                                        ->get();

             foreach ($list as $key => $value) {

              $attach = DB::table('mail_attachments')->where('messageid', $value->message_id)->first();
              if($attach != '')
              {
                $attachments = DB::table('mail_attachments')->where('messageid', $value->message_id)
                                            ->select('attachment')->get();
              }
              else
              {
                $attachments = "";
              }
              $value->message_id = $value->message_id;
              $value->subject = $value->subject;
              $value->body = $value->body;
              $value->body = $value->body;
              $value->display_name = $value->display_name;
              $value->first_name = $value->first_name;
              $value->last_name = $value->last_name;
              $value->viewed_status = $value->viewed_status;
              $value->profile_pic = $value->profile_pic;
              $value->created_at = $value->created_at;
              $value->attachments = $attachments;
            }
            return response(['success'=>true,'list'=>$list,'status'=>200], 200);
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

      public function DeleteMessage(Request $request)
      {
        $input = $request->all(); 
        try
        {  
          $message = DB::table('messages')->where('message_id', $request->message_id)->first();
          if($message)
          {
            if($request->delete_from == 'trash')
            {
              $update_status = DB::table('messages')->where('message_id', $request->message_id)
                                                  ->update(['active_status'=>2]);
            }
            else
            {
              $update_status = DB::table('messages')->where('message_id', $request->message_id)
                                                  ->update(['active_status'=>1]);
            }

            $message = config('constants.message_deleted'); 

            return response(['success'=>true,'message'=>$message,'status'=>200], 200);
          }
          else
          {
            $message = config('constants.message_notfound'); 

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

      public function DeletedMessagesList()
      {
        //$input = $request->all();         
        
        try
        {  
          $user = Auth::user();
          //$user = DB::table('users')->where('user_id', $request->user_id)->first();

          if($user)
          {
            $sent = DB::table('messages')->where('messages.active_status',1) 
                                        ->Where('messages.sender_id', $user->user_id)
                                        //->orWhere('messages.receiver_id', $request->user_id)         
                                        ->leftjoin('users','users.user_id','=','messages.receiver_id')
                                        ->select('messages.message_id','messages.body','messages.subject','users.first_name','users.last_name','users.display_name','users.email','users.profile_pic','messages.created_at')
                                        ->groupBy('messages.message_id');
                                        //->get();
            $list = DB::table('messages')->where('messages.active_status',1) 
                                        ->Where('messages.receiver_id', $user->user_id)         
                                        ->leftjoin('users','users.user_id','=','messages.sender_id')
                                        ->select('messages.message_id','messages.body','messages.subject','users.first_name','users.last_name','users.display_name','users.email','users.profile_pic','messages.created_at')
                                        ->union($sent)
                                        ->groupBy('messages.message_id')
                                        ->latest('created_at')
                                        ->get();
            foreach ($list as $key => $value) {

              $attach = DB::table('mail_attachments')->where('messageid', $value->message_id)->first();
              if($attach != '')
              {
                $attachments = DB::table('mail_attachments')->where('messageid', $value->message_id)
                                            ->select('attachment')->get();
              }
              else
              {
                $attachments = "";
              }
              $value->message_id = $value->message_id;
              $value->subject = $value->subject;
              $value->body = $value->body;
              $value->display_name = $value->display_name;
              // $value->first_name = $value->first_name;
              // $value->last_name = $value->last_name;
              $value->email = $value->email;
              $value->profile_pic = $value->profile_pic;
              $value->created_at = $value->created_at;
              $value->attachments = $attachments;
            }
            return response(['success'=>true,'list'=>$list,'status'=>200], 200);
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
      

    public function AddAlbum(Request $request)
    {
      // $validator = Validator::make($request->all(), [
      //   'album_name' => 'required'
      // ]);

      // if ($validator->fails()) { 
      //           $error_msg = "search_by is required";
      //           return response(['error'=>$error_msg, 'status'=>222], 222);
      // }
      try
      {
        $user = Auth::user();

        if($user)
        {
          $album = new Albums();
          $album->album_name = $request->album_name;
          $album->userid = $user->user_id;
          $album->save();

          $message = config('constants.album_added');

          return response(['success'=>true,'message' => $message ,'album'=>$album,'status'=>200], 200);
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

    public function AlbumsList(Request $request)
    {   
      $user = Auth::user();

      $data = Config::get('constants.default');

      $default[] = $data;

      $albums =   Albums::select( 'albums.*',
            DB::raw('(select photo_name from photos where albumid = albums.album_id and photo_status = 0 order by photo_id asc limit 1) as photo_name'))
            ->where('userid', $user->user_id)
            ->where('album_status',0)
            ->latest('created_at')
            ->get();

        foreach ($albums as $value) {
          $default[] = $value;
         }
      return  response(['success'=>true,'albums'=>$default,'status'=>200],200);
    }

    public function ViewAlbum(Request $request)
    {
      $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'album_id' => 'required',
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
          $album = DB::table('photos')->where('albumid', $request->album_id)->first();

          if($album)
          {
            $photos = DB::table('photos')->where('albumid', $request->album_id)
                                         ->where('photo_status',0)
                                         ->latest('created_at')
                                         ->get(); 

              //$file_path = env('FILE_PATH').'/images';                  
              
              return response(['success'=>true,'photos'=>$photos,'status'=>200], 200);
          }            
          else{
            $message = config('constants.photo_notfound');
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

    public function DeleteAlbum(Request $request)
    {
      $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'user_id' => 'required',
        //   'album_id' => 'required',
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
          //$user = DB::table('users')->where('user_id', $request->user_id)->first();

          $user = Auth::user();

          if($user)
          {
            $album = DB::table('albums')->where('album_id', $request->album_id)
                                        ->first();
            if($album)
            {
              $DeleteAlbum = DB::table('albums')->where('userid',$user->user_id)
                                               ->where('album_id', $request->album_id)
                                               ->update(['album_status'=>1]);

               $Deletephoto = DB::table('photos')->where('albumid', $request->album_id)
                                               ->update(['photo_status'=>1]);     
         
              $message = config('constants.album_delete');       
              
              return response(['success'=>true,'message'=>$message,'status'=>200], 200);
            }
            else
            {       
              $message = config('constants.album_notfound');       
            
              return response(['success'=>false,'message'=>$message,'status'=>201], 201);  
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

    public function AddPhotos(Request $request)
    {
      $input = $request->all();    
        
        // $validator = Validator::make($request->all(), [
        //   'album_id' => 'required',
        //   'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        //   'images' => 'max:10',
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
          if($request->file('images') != '')
          {
            $files = $request->file('images');
            
            foreach($files as $images)
            {              
              $fullName=$images->getClientOriginalName();
              $name=explode('.',$fullName)[0];

              $imageName = env('FILE_PATH').'/images/'.$name.'-'.time().'.'.$images->getClientOriginalExtension();

              $images->move(public_path('images'),$imageName);

              $photos = new Photos();
              $photos->photo_name = $imageName;
              $photos->albumid = $request->album_id;
              $photos->save();
            }
           // $file_path = 'http://54.187.114.170/images';

            $message = config('constants.photo_added');

           return response(['success'=>true,'message'=> $message,'photos'=>$photos,'status'=>200], 200);
        }
        else
        {
          $message = config('constants.please_addphoto');
          return response(['success'=>false,'message'=> $message,'status'=>201], 201);
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

    public function DeletePhoto(Request $request)
    {
      $input = $request->all(); 
        
        // $validator = Validator::make($request->all(), [
        //   'photo_id' => 'required',
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
          $photos = DB::table('photos')->where('photo_id', $request->photo_id)
                                        ->first();
            if($photos)
            {
              $Deletephoto = DB::table('photos')->where('photo_id', $request->photo_id)
                                               ->update(['photo_status'=>1]);
         
              $message = config('constants.photo_delete');       
              
              return response(['success'=>true,'message'=>$message,'status'=>200], 200);
            }
            else
            {       
              $message = config('constants.photo_notfound');       
            
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

    public function PhotoGallery(Request $request)
    {
      $input = $request->all(); 
        
        try
        { 
          $user = DB::table('users')->where('user_id',$request->user_id)->first();

          //$user = Auth::user();

            if($user)
            {
              $album = DB::table('albums')->where('userid', $user->user_id)
                                          ->where('album_status', 0)->first();
              if($album)
              {
                $photos = DB::table('albums')->where('userid', $user->user_id)
                                        ->where('album_status', 0)
                                        ->join('photos','photos.albumid','=','albums.album_id')
                                        ->join('users','users.user_id','=','albums.userid')
                                        ->select('photos.photo_id','photos.photo_name','albums.album_id','albums.album_name','photos.photo_status','photos.created_at','photos.updated_at','albums.userid','users.display_name','users.first_name','users.last_name','users.email')
                                        ->where('photos.photo_status',0)
                                        ->latest('photos.created_at')->get();
                                        
                if(count($photos)==0)
                { 
                  $message = config('constants.no_photos');    
                  return response(['success'=>true,'photos'=>$photos,'message'=>$message,'status'=>200],200);
                }
                else
                {                                      
                  return response(['success'=>true,'photos'=>$photos,'message'=>'','status'=>200], 200);
                }
            }
            else
            {
              $message = config('constants.no_photos');      
            
              return response(['success'=>true,'photos'=>[],'message'=>$message,'status'=>200], 200);  
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


  public function AllUsersPhotoGallery(Request $request)
    {
      $input = $request->all(); 

        try
        { 
          $user = Auth::user();

          //$log_user = DB::table('users')->where('user_id',$request->user_id)->first();

          if($request->chapter_id == 0)
          {         
            $users = DB::table('user_chapters')//->where('chapterid', $request->chapter_id)
                                    ->select('userid','chapterid')
                                    ->get();   
          }
          else
          {
            $users = DB::table('user_chapters')->where('chapterid', $request->chapter_id)
                                    ->select('userid','chapterid')
                                    ->get(); 
          }       
            if($users)
            {              
              $photos = [];
              foreach ($users as $value) 
              {
                $album = DB::table('albums')->where('userid', $value->userid)
                                            ->where('album_status', 0)->select('album_id')->first();

                if($album) 
                {   
                   $photo = DB::table('albums')->where('userid', $value->userid)
                                        ->where('album_status', 0)
                                        ->join('photos','photos.albumid','=','albums.album_id')
                                        ->join('users','users.user_id','=','albums.userid')
                                        ->select('photos.photo_id','photos.photo_name','albums.album_id','albums.album_name','photos.photo_status','photos.created_at','photos.updated_at','albums.userid','users.display_name','users.first_name','users.last_name','users.email')
                                        ->where('photos.photo_status',0)
                                        ->latest('photos.created_at')->get();
                  $photos[] = $photo;
                }
                
              }
                                        
                if(count($photos)==0)
                { 
                  $message = config('constants.no_photos');    
                  return response(['success'=>true,'photos'=>$photos,'message'=>$message,'status'=>200],200);
                }
                else
                { 
                   $allphotos = $photos;
                                                    
                  return response(['success'=>true,'photos'=>$allphotos,'message'=>'','status'=>200], 200);
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

    public function PhotoDownload(Request $request)
    {
      $path = public_path('/images/');
      //dd($path);
      $filepath = public_path('/images/').$request->image_name;
          return Response::download($filepath);
    }
}  