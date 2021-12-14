<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['json.response']], function () {

	Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
	
		//User APP
	    Route::post('login', 'AuthController@Login');
	    Route::post('signup', 'AuthController@Signup');
	    Route::post('/register', 'AuthController@Register');
	    Route::post('/validateOTP', 'BaseController@OTPValidation');
	   	Route::post('/forgotPassword', 'BaseController@ForgotPassword');
	   	Route::post('password/reset', 'BaseController@reset');
	   	Route::post('/setPattern', 'BaseController@SetPattern');
	   	Route::post('/signInRemember', 'BaseController@SignInRemember');
	   	Route::post('/reSendOtp', 'BaseController@ReSendOtp');
	   	Route::post('/checkPattern', 'AuthController@CheckPattern');


	   	//UserManagement
	   	Route::post('/homeTabscount', 'UserController@HomeTabCount');
	   	Route::get('/userType', 'UserController@UserType');
	   	Route::post('/getusertypename', 'UserController@GetUserTypename');
	   	Route::get('/permissions', 'UserController@Permissions');
	   	Route::post('/userInformation', 'UserController@UserInformation');
	   	Route::get('/caseManagers', 'UserController@CaseManager');	    
	    Route::post('/activateUser', 'UserController@ActivateUser');
	    Route::post('/deleteUser', 'UserController@DeleteUser');
	    Route::post('/userDetails', 'UserController@UserDetails');
	    Route::post('/accountSettings', 'UserController@AccountSettings');	     


	    //Outings
	   Route::post('/outingDetails', 'CommunityController@OutingDetails');	   
	   Route::post('/outingsNearme', 'CommunityController@OutingsNearme');
	   Route::post('/shareOuting', 'CommunityController@ShareOuting');   
	   Route::post('/cancelOuting','CommunityController@CancelOuting');

	   //MyLittle
	   Route::post('/uploadMylittlepic', 'BaseController@UploadMylittlepic');
	   Route::get('/myliitle_homescreen', 'BaseController@MylittleHomeScreen');

	   //Discounts	  
	   Route::post('/searchDiscount', 'DashboardController@SearchDiscount');	   

	   //Notifications
	   Route::post('/searchNotification', 'DashboardController@SearchNotification');

	   //photos
	   Route::put('/deletePhoto', 'DashboardController@DeletePhoto');
	   Route::post('/viewAlbum', 'DashboardController@ViewAlbum');
	   Route::post('/photoGallery', 'DashboardController@PhotoGallery');
   	   Route::post('/photoDownload', 'DashboardController@PhotoDownload');   	   
	   Route::post('/addPhotos', 'DashboardController@AddPhotos');	

   	   //Connections
   	   Route::post('/sentRequest', 'CommunityController@SentRequest');
  	   Route::post('/acceptRequest', 'CommunityController@AcceptRequest');
	   Route::post('/rejectRequest', 'CommunityController@RejectRequest');
	   Route::post('/removeConnection', 'CommunityController@RemoveConnection');
	   Route::post('/removeUser', 'CommunityController@RemoveUser');


	   //Messages	   
	   //Route::post('/messagesList', 'DashboardController@MessagesList');	   
	    Route::post('/toListUsers', 'DashboardController@ToListUsers');
	    Route::post('/deleteMessage', 'DashboardController@DeleteMessage');

   	   //Events
   	   Route::post('/viewEvent', 'CommunityController@ViewEvent');
   	   Route::post('/registerEvent', 'CommunityController@RegisterEvent');
   	   Route::get('/eventTypes', 'CommunityController@EventTypes');
   	   
  
    Route::group(['middleware' => 'auth:api'], function() {

    	//User App
    	Route::get('authenticatedcheck', 'AuthController@Authenticatecheck');
        Route::get('logout', 'AuthController@Logout');
        Route::get('user', 'AuthController@user');
        
   		//Route::post('/changePattern', 'BaseController@ChangePattern');
   		Route::post('/profilepicUpload', 'BaseController@UploadProfilepicture');
   		Route::get('/getprofilepic', 'BaseController@GetProfilepicture');
   		

   	    //User Management
	    Route::post('/addUser', 'UserController@AddUser');    
	    Route::put('/activeUsers', 'UserController@ActiveUsers');
	    Route::put('/inactiveUsers', 'UserController@InactiveUsers');
	    Route::put('/bigsUsers', 'UserController@BigsUsers');
	    Route::put('/agencyUsers', 'UserController@AgencyUsers');
	    Route::put('/organizationUsers', 'UserController@OrganizationUsers');     
	    Route::get('/viewSettings', 'UserController@ViewSettings');


	   //Discounts
	   Route::post('/addDiscount', 'DashboardController@AddDiscount');
	   Route::post('/editDiscount', 'DashboardController@EditDiscount');
	   Route::put('/discountsList', 'DashboardController@DiscountsList');
	   Route::put('/inactivateDiscount', 'DashboardController@InactivateDiscount');
	   Route::post('/deleteDiscountdocument', 'DashboardController@DeleteDiscountDocument');


	   //Notifications
       Route::post('/addNotification', 'DashboardController@AddNotification');      
       Route::post('/editNotification', 'DashboardController@EditNotification');
	   Route::put('/allNotifications', 'DashboardController@AllNotifications');
	   Route::put('/sentNotifications', 'DashboardController@SentNotifications');
	   Route::put('/scheduledNotifications', 'DashboardController@ScheduledNotifications');
	   Route::put('/deleteNotification', 'DashboardController@DeleteNotification');	     


	   //Photos
	   Route::post('/addAlbum', 'DashboardController@AddAlbum');
	   Route::post('/deleteAlbum', 'DashboardController@DeleteAlbum');
	   Route::get('/albumsList', 'DashboardController@AlbumsList');   
	   Route::put('/Allusersphotos', 'DashboardController@AllUsersPhotoGallery');


	   //MyLittle
	   Route::post('/myLittle', 'UserController@AddMyLittle');
	   Route::get('/viewLittle', 'BaseController@ViewLittle');
	   Route::post('/editLittle', 'UserController@EditLittle');

	   //Outings	   
	   Route::post('/createOuting', 'CommunityController@CreateOuting');
	   Route::post('/updateOuting', 'CommunityController@UpdateOuting');
	   Route::get('/myOutings','CommunityController@MyOutings');
	   Route::post('/joinOuting', 'CommunityController@JoinOuting');
	   Route::post('/unjoinOuting', 'CommunityController@UnJoinOuting');
	   Route::post('/hideOuting','CommunityController@HideOuting');	   


	   //Connections
	   Route::post('/searchBigs', 'CommunityController@SearchBigs');	   
	   Route::get('/myConnections', 'CommunityController@MyConnections');
	   Route::put('/BIGSyoumayKnow', 'CommunityController@BIGSyoumayKnow');
	   Route::get('/requestsList', 'CommunityController@RequestsList');   


	   //Resources
	   Route::post('/addResource', 'CommunityController@AddResource');
	   Route::post('/editResource', 'CommunityController@EditResource');
	   Route::put('/inactivateResource', 'CommunityController@InactivateResource');
	   Route::put('/resources', 'CommunityController@Resources');
	   Route::put('/viewResource', 'CommunityController@ViewResources');


	   //Events	   
	   Route::post('/addEvent', 'CommunityController@AddEvent');
	   Route::post('/editEvent', 'CommunityController@EditEvent');
	   Route::post('/inactivateEvent', 'CommunityController@InactivateEvent');
	   Route::put('/eventsList', 'CommunityController@EventsList');
	   //Route::put('/bigseventsList', 'CommunityController@BIGSEventsList');
	   Route::put('/upcomingEvents', 'CommunityController@UpcomingEvents');    
	   Route::get('/myEvents', 'CommunityController@MyEvents');
	   Route::post('/allEventsList', 'CommunityController@AllEventsList');

	   //Messages
	   Route::post('/sendMessage', 'DashboardController@SendMessage');
	   Route::get('/recievedMessages', 'DashboardController@RecievedMessages');
	   Route::get('/sentMessages', 'DashboardController@SentMessages');
	   Route::get('/draftsMessages', 'DashboardController@DraftsMessages');
	   Route::post('/viewMessage', 'DashboardController@ViewMessage');  
	   Route::get('/deletedMessagesList', 'DashboardController@DeletedMessagesList');


	   //Notification_Log
	   Route::get('/notification_log', 'UserController@NotificationLog');
	   Route::post('/viewNotificationLog', 'UserController@ViewNotificationLog');   


	   //Chapters
	   Route::post('/addChapter', 'BaseController@AddChapter');
	   Route::get('/chaptersList', 'BaseController@ChaptersList');
	   Route::get('/myChapters', 'BaseController@MyChapters');
	   Route::post('/editChapter', 'BaseController@EditChapter');
	   Route::put('/deleteChapter', 'BaseController@DeleteChapter'); 


	   //HelpCenter
	   Route::post('/createhelp', 'BaseController@CreateHelp');
	   Route::get('/helpList', 'BaseController@HelpList');  

    });     

});
