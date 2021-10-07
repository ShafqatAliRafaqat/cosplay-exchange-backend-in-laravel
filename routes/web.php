<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Route;

Route::get('/DevInfo', function(){
    echo "Mubashar Rashid";
});

Route::get('/membersarea', function(){
    echo "Zubair Khan";
});

Route::get('/mail',function (){

    $user=\App\User::find(2);
    event(new \App\Events\NewMemberRegisteredEvent($user));
	return "done";
});
Route::get('/','Front\FrontController@index')->name('home');
Route::get('/dev','Front\FrontController@dev')->name('home');
Route::get('/contact','Front\FrontController@contact')->name('contact');
Route::get('/terms-and-condition','Front\FrontController@termsAndConditions')->name('t&c');
Route::post('/notifyMail','Front\FrontController@notifyMail')->name('notifyMail');
Route::get('/mark-as-read',function (){
    Auth::user()->notifications->markAsRead();
    return redirect()->back();
})->name('notification.mark-as-read');
Route::get('/questions&answers','Front\FrontController@faq')->name('faq');

/*Member Panel Routes*/
//Route::group(['as'=>'member.','prefix'=>'member','middleware'=>['auth','profile']],function (){
Route::group(['as'=>'member.','prefix'=>'member','middleware'=>['auth']],function (){
    Route::get('/area','Member\MemberController@index')->name('area');
    Route::get('/member-area','Member\MemberController@area')->name('memberArea');
    Route::put('/costume/status/{status}','Member\CostumeController@updateStatus')->name('costume.status.update')->middleware('subscriber');
    Route::resource('/costume','Member\CostumeController')->middleware('subscriber');
    Route::resource('/coin','Member\CoinController')->middleware('subscriber');
    Route::get('/subscription/cancel', 'Member\SubscriptionController@cancel')->name('subscription.cancel');
    Route::resource('/subscription', 'Member\SubscriptionController');
    Route::resource('/shipping', 'Member\ShippingController')->middleware('subscriber');
    Route::get('/forum','Front\FrontController@forum')->name('forum.index');
    Route::post('/forum/search','Front\FrontController@forumSearch')->name('forum.search');
    Route::resource('/post','Forum\PostController');
    Route::resource('/comment','Forum\CommentController');
});
Route::group(['as'=>'member.','prefix'=>'member','middleware'=>['auth']],function (){
    Route::get('/profilearea/up-email','Member\MemberController@editemail')->name('area.edit.email');
    Route::get('/profilearea/up-password','Member\MemberController@editpassword')->name('area.edit.password');
    Route::put('/profile/update-email/{userid}','Member\ProfileController@updateEmail')->name('profile.updateemail');
    Route::put('/profile/update-pass/{userid}','Member\ProfileController@updatePassword')->name('profile.updatepass');
    Route::resource('/profile','Member\ProfileController');
});


/*Admin Panel Routes*/
Route::group(['as'=>'admin.','prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/dashboard','Admin\AdminController@index')->name('dashboard');
    Route::put('/admin/delivered/{delivered}','Admin\DeliveredCostumeController@refundBoth')->name('delivered.refund.both');
    Route::resource('/user','Admin\UserController');
    Route::resource('/role','Admin\RoleController');
    Route::resource('/category','Admin\CategoryController');
    Route::resource('/status','Admin\StatusController');
    Route::resource('/costume','Admin\CostumeController');
    Route::resource('/delivered','Admin\DeliveredCostumeController');
    Route::resource('/questions','Admin\QuestionAnswerController');
});



/*Front Routes*/

Route::group(['as'=>'cosplay.','prefix'=>'cosplay','middleware'=>['auth']],function (){
    Route::post('/search', 'Front\CostumeController@search')->name('costume.search')->middleware('subscriber');
    Route::get('/question/question-all/{costumeid}','Member\QuestionController@showAll')->name('questions.all')->middleware('subscriber');
    Route::get('/cart-clear','Member\CartController@clearCart')->name('cart.clear')->middleware('subscriber');
    Route::get('/wishlist-clear','Member\WishlistController@clearcart')->name('wishlist.clear')->middleware('subscriber');
    Route::resource('/costume','Front\CostumeController')->middleware('subscriber');
    Route::resource('/category','Front\CategoryController')->middleware('subscriber');
    Route::resource('/question','Member\QuestionController')->middleware('subscriber');
    Route::resource('/answer','Member\AnswerController')->middleware('subscriber');
    Route::resource('/cart','Member\CartController')->middleware('subscriber');
    Route::resource('/checkout','Member\CheckoutController')->middleware('subscriber');
    Route::resource('/request','Member\ExchangeController')->middleware('subscriber');
});

 Route::get('home/index','Member\MemberController@index')->middleware('subscriber');
 Route::post('/searchCostumes','Member\CostumeController@search')->middleware('subscriber')->name('searchCostumes');

Route::post('/save_emails','HomeController@saveUserEmails')->name('saveEmails');

Route::get('/newHome','HomeController@home');
Auth::routes();


/*Resource Project Routes*/
Route::group(['prefix'=>'resource'],function () {
    $US_STATES = ['AL' => "Alabama",
        'AK' => "Alaska",
        'AZ' => "Arizona",
        'AR' => "Arkansas",
        'CA' => "California",
        'CO' => "Colorado",
        'CT' => "Connecticut",
        'DE' => "Delaware",
        'DC' => "District Of Columbia",
        'FL' => "Florida",
        'GA' => "Georgia",
        'HI' => "Hawaii",
        'ID' => "Idaho",
        'IL' => "Illinois",
        'IN' => "Indiana",
        'IA' => "Iowa",
        'KS' => "Kansas",
        'KY' => "Kentucky",
        'LA' => "Louisiana",
        'ME' => "Maine",
        'MD' => "Maryland",
        'MA' => "Massachusetts",
        'MI' => "Michigan",
        'MN' => "Minnesota",
        'MS' => "Mississippi",
        'MO' => "Missouri",
        'MT' => "Montana",
        'NE' => "Nebraska",
        'NV' => "Nevada",
        'NH' => "New Hampshire",
        'NJ' => "New Jersey",
        'NM' => "New Mexico",
        'NY' => "New York",
        'NC' => "North Carolina",
        'ND' => "North Dakota",
        'OH' => "Ohio",
        'OK' => "Oklahoma",
        'OR' => "Oregon",
        'PA' => "Pennsylvania",
        'RI' => "Rhode Island",
        'SC' => "South Carolina",
        'SD' => "South Dakota",
        'TN' => "Tennessee",
        'TX' => "Texas",
        'UT' => "Utah",
        'VT' => "Vermont",
        'VA' => "Virginia",
        'WA' => "Washington",
        'WV' => "West Virginia",
        'WI' => "Wisconsin",
        'WY' => "Wyoming"];
    Route::get('/', function () {
        return view('resource.convention.index');
    });
    Route::get('/cosplayer-award', function () {
        return view('resource.cosplayer-award.index');
    });
    Route::get('/cosplayer-groups', function () {
        return view('resource.cosplayer-group.index', ['us_states' => ['AL' => "Alabama",
            'AK' => "Alaska",
            'AZ' => "Arizona",
            'AR' => "Arkansas",
            'CA' => "California",
            'CO' => "Colorado",
            'CT' => "Connecticut",
            'DE' => "Delaware",
            'DC' => "District Of Columbia",
            'FL' => "Florida",
            'GA' => "Georgia",
            'HI' => "Hawaii",
            'ID' => "Idaho",
            'IL' => "Illinois",
            'IN' => "Indiana",
            'IA' => "Iowa",
            'KS' => "Kansas",
            'KY' => "Kentucky",
            'LA' => "Louisiana",
            'ME' => "Maine",
            'MD' => "Maryland",
            'MA' => "Massachusetts",
            'MI' => "Michigan",
            'MN' => "Minnesota",
            'MS' => "Mississippi",
            'MO' => "Missouri",
            'MT' => "Montana",
            'NE' => "Nebraska",
            'NV' => "Nevada",
            'NH' => "New Hampshire",
            'NJ' => "New Jersey",
            'NM' => "New Mexico",
            'NY' => "New York",
            'NC' => "North Carolina",
            'ND' => "North Dakota",
            'OH' => "Ohio",
            'OK' => "Oklahoma",
            'OR' => "Oregon",
            'PA' => "Pennsylvania",
            'RI' => "Rhode Island",
            'SC' => "South Carolina",
            'SD' => "South Dakota",
            'TN' => "Tennessee",
            'TX' => "Texas",
            'UT' => "Utah",
            'VT' => "Vermont",
            'VA' => "Virginia",
            'WA' => "Washington",
            'WV' => "West Virginia",
            'WI' => "Wisconsin",
            'WY' => "Wyoming"]]);
    });
    Route::get('/commissioners', function () {
        return view('resource.commissioner.index', ['us_states' => ['AL' => "Alabama",
            'AK' => "Alaska",
            'AZ' => "Arizona",
            'AR' => "Arkansas",
            'CA' => "California",
            'CO' => "Colorado",
            'CT' => "Connecticut",
            'DE' => "Delaware",
            'DC' => "District Of Columbia",
            'FL' => "Florida",
            'GA' => "Georgia",
            'HI' => "Hawaii",
            'ID' => "Idaho",
            'IL' => "Illinois",
            'IN' => "Indiana",
            'IA' => "Iowa",
            'KS' => "Kansas",
            'KY' => "Kentucky",
            'LA' => "Louisiana",
            'ME' => "Maine",
            'MD' => "Maryland",
            'MA' => "Massachusetts",
            'MI' => "Michigan",
            'MN' => "Minnesota",
            'MS' => "Mississippi",
            'MO' => "Missouri",
            'MT' => "Montana",
            'NE' => "Nebraska",
            'NV' => "Nevada",
            'NH' => "New Hampshire",
            'NJ' => "New Jersey",
            'NM' => "New Mexico",
            'NY' => "New York",
            'NC' => "North Carolina",
            'ND' => "North Dakota",
            'OH' => "Ohio",
            'OK' => "Oklahoma",
            'OR' => "Oregon",
            'PA' => "Pennsylvania",
            'RI' => "Rhode Island",
            'SC' => "South Carolina",
            'SD' => "South Dakota",
            'TN' => "Tennessee",
            'TX' => "Texas",
            'UT' => "Utah",
            'VT' => "Vermont",
            'VA' => "Virginia",
            'WA' => "Washington",
            'WV' => "West Virginia",
            'WI' => "Wisconsin",
            'WY' => "Wyoming"]]);
    });
    Route::get('/photography-videography', function () {
        return view('resource.photography-videography.index', ['us_states' => ['AL' => "Alabama",
            'AK' => "Alaska",
            'AZ' => "Arizona",
            'AR' => "Arkansas",
            'CA' => "California",
            'CO' => "Colorado",
            'CT' => "Connecticut",
            'DE' => "Delaware",
            'DC' => "District Of Columbia",
            'FL' => "Florida",
            'GA' => "Georgia",
            'HI' => "Hawaii",
            'ID' => "Idaho",
            'IL' => "Illinois",
            'IN' => "Indiana",
            'IA' => "Iowa",
            'KS' => "Kansas",
            'KY' => "Kentucky",
            'LA' => "Louisiana",
            'ME' => "Maine",
            'MD' => "Maryland",
            'MA' => "Massachusetts",
            'MI' => "Michigan",
            'MN' => "Minnesota",
            'MS' => "Mississippi",
            'MO' => "Missouri",
            'MT' => "Montana",
            'NE' => "Nebraska",
            'NV' => "Nevada",
            'NH' => "New Hampshire",
            'NJ' => "New Jersey",
            'NM' => "New Mexico",
            'NY' => "New York",
            'NC' => "North Carolina",
            'ND' => "North Dakota",
            'OH' => "Ohio",
            'OK' => "Oklahoma",
            'OR' => "Oregon",
            'PA' => "Pennsylvania",
            'RI' => "Rhode Island",
            'SC' => "South Carolina",
            'SD' => "South Dakota",
            'TN' => "Tennessee",
            'TX' => "Texas",
            'UT' => "Utah",
            'VT' => "Vermont",
            'VA' => "Virginia",
            'WA' => "Washington",
            'WV' => "West Virginia",
            'WI' => "Wisconsin",
            'WY' => "Wyoming"]]);
    });
});
/* Sales Project Routes*/
Route::get('/sales', function () {
    return view('layouts.app_sales');
});
Route::get('/my_Profile', function () {
    return view('myProfile.index');
});
Route::get('/contact_us',function (){
    return view('contact_us');
});
Route::get('/favorites',function (){
    return view('myProfile.favorites');
});
Route::get('/galleryPage',function (){
    return view('myProfile.gallery');
});
/* DesginPages */
Route::get('subscriptionDashboard','DesignPagesController@subscriptionDashboard');
Route::get('profileForm','DesignPagesController@profileForm');
Route::get('subscription','DesignPagesController@subscription');
