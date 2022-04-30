<?php

use Illuminate\Support\Facades\Route;

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


/* Route::get('/', function () {
    return view('index.index');    
});*/
Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth']], function () {

    Route::get('/',                                     'DashboardController@index')->name('dashboard.index');
    Route::post('/',                                     'DashboardController@index')->name('dashboard.index');
    Route::get('dashboard/cryptocurrency',              'DashboardController@cryptocurrency')->name('dashboard.cryptocurrency');
    Route::get('dashboard/campaign',                    'DashboardController@campaign')->name('dashboard.campaign');
    Route::get('dashboard/ecommerce',                   'DashboardController@ecommerce')->name('dashboard.ecommerce');

    /* Apps */
    Route::get('apps/inbox',                            'AppsController@inbox')->name('apps.inbox');
    Route::get('apps/inboxdetail',                      'AppsController@inboxdetail')->name('apps.inboxdetail');
    Route::get('apps/inboxcompose',                     'AppsController@inboxcompose')->name('apps.inboxcompose');
    Route::get('apps/chat',                             'AppsController@chat')->name('apps.chat');
    Route::get('apps/calendar',                         'AppsController@calendar')->name('apps.calendar');
    Route::get('apps/events',                           'AppsController@events')->name('apps.events');
    Route::get('apps/todolist',                         'AppsController@todolist')->name('apps.todolist');
    Route::get('apps/filemanager',                      'AppsController@filemanager')->name('apps.filemanager');
    Route::get('apps/contacts',                         'AppsController@contacts')->name('apps.contacts');
    Route::get('apps/scrumboard',                       'AppsController@scrumboard')->name('apps.scrumboard');
    Route::get('apps/blog',                             'AppsController@blog')->name('apps.blog');
    Route::get('apps/social',                           'AppsController@social')->name('apps.social');

    /* elements */
    Route::get('elements/helperclass',                  'ElementsController@helperclass')->name('elements.helperclass');
    Route::get('elements/bootstrap',                    'ElementsController@bootstrap')->name('elements.bootstrap');
    Route::get('elements/typography',                   'ElementsController@typography')->name('elements.typography');
    Route::get('elements/tabs',                         'ElementsController@tabs')->name('elements.tabs');
    Route::get('elements/buttons',                      'ElementsController@buttons')->name('elements.buttons');
    Route::get('elements/icons',                        'ElementsController@icons')->name('elements.icons');
    Route::get('elements/notifications',                'ElementsController@notifications')->name('elements.notifications');
    Route::get('elements/colors',                       'ElementsController@colors')->name('elements.colors');
    Route::get('elements/dialogs',                      'ElementsController@dialogs')->name('elements.dialogs');
    Route::get('elements/listgroup',                    'ElementsController@listgroup')->name('elements.listgroup');
    Route::get('elements/mediaobject',                  'ElementsController@mediaobject')->name('elements.mediaobject');
    Route::get('elements/modals',                       'ElementsController@modals')->name('elements.modals');
    Route::get('elements/nestable',                     'ElementsController@nestable')->name('elements.nestable');
    Route::get('elements/progressbars',                 'ElementsController@progressbars')->name('elements.progressbars');
    Route::get('elements/rangesliders',                 'ElementsController@rangesliders')->name('elements.rangesliders');

    /* Form elements */
    Route::get('forms/formsbasic',                      'FormsController@formsbasic')->name('forms.formsbasic');
    Route::get('forms/advanced',                        'FormsController@advanced')->name('forms.advanced');
    Route::get('forms/validation',                      'FormsController@validation')->name('forms.validation');
    Route::get('forms/wizard',                          'FormsController@wizard')->name('forms.wizard');
    Route::get('forms/dragdropupload',                  'FormsController@dragdropupload')->name('forms.dragdropupload');
    Route::get('forms/cropping',                        'FormsController@cropping')->name('forms.cropping');
    Route::get('forms/summernote',                      'FormsController@summernote')->name('forms.summernote');
    Route::get('forms/editors',                         'FormsController@editors')->name('forms.editors');
    Route::get('forms/markdown',                        'FormsController@markdown')->name('forms.markdown');

    /* Tables elements */
    Route::get('tables/normal',                         'TablesController@normal')->name('tables.normal');
    Route::get('tables/datatable',                      'TablesController@datatable')->name('tables.datatable');
    Route::get('tables/editable',                       'TablesController@editable')->name('tables.editable');
    Route::get('tables/tablecolor',                     'TablesController@tablecolor')->name('tables.tablecolor');
    Route::get('tables/filter',                         'TablesController@filter')->name('tables.filter');
    Route::get('tables/dragger',                        'TablesController@dragger')->name('tables.dragger');

    /* Charts*/
    Route::get('charts/apex',                           'ChartsController@apex')->name('charts.apex');
    Route::get('charts/c_chart',                        'ChartsController@c_chart')->name('charts.c_chart');
    Route::get('charts/morris',                         'ChartsController@morris')->name('charts.morris');
    Route::get('charts/flot',                           'ChartsController@flot')->name('charts.flot');
    Route::get('charts/chartjs',                        'ChartsController@chartjs')->name('charts.chartjs');
    Route::get('charts/knob',                           'ChartsController@knob')->name('charts.knob');
    Route::get('charts/sparkline',                      'ChartsController@sparkline')->name('charts.sparkline');

    // widgets
    Route::get('widgets/widget',                        'WidgetsController@widget')->name('widgets.widget');

    // extra pages
    Route::get('pages/blank',                           'PagesController@blank')->name('pages.blank');
    Route::get('pages/searchresults',                   'PagesController@searchresults')->name('pages.searchresults');
    Route::get('pages/profile',                         'PagesController@profile')->name('pages.profile');
    Route::get('pages/invoices',                        'PagesController@invoices')->name('pages.invoices');
    Route::get('pages/invoicesview',                    'PagesController@invoicesview')->name('pages.invoicesview');
    Route::get('pages/gallery',                         'PagesController@gallery')->name('pages.gallery');
    Route::get('pages/timeline',                        'PagesController@timeline')->name('pages.timeline');
    Route::get('pages/pricing',                         'PagesController@pricing')->name('pages.pricing');
    Route::get('pages/settings',                        'PagesController@settings')->name('pages.settings');


    Route::get('map/vectormap',                        'MapController@vectormap')->name('map.vectormap');

    Route::get('authentication/logout',                  'AuthenticationController@logout')->name('admin-logout');

    
});
Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'user'], function () {
    Route::get('list',                  'UserController@list')->name('admin.listUser');
    Route::get('get-list',                  'UserController@getList')->name('admin.getListUser');
    Route::get('add',                  'UserController@add')->name('admin.addUser');
    Route::post('add',                  'UserController@add')->name('admin.addUser');
    Route::get('edit/{id}',                  'UserController@edit')->name('admin.editUser');
    Route::post('edit/{id}',                  'UserController@edit')->name('admin.editUser');
    Route::get('delete/{id}',                  'UserController@delete')->name('admin.deleteUser');
    Route::get('active-status/{id}',                  'UserController@active')->name('admin.activeUser');
    Route::get('deactive-status/{id}',                  'UserController@deactive')->name('admin.deactiveUser');
});


Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'categorys-post'], function () {
    Route::get('list',                  'CategoryPostController@list')->name('admin.listCategoryPost');
    Route::get('get-list',                  'CategoryPostController@getList')->name('admin.getListCategoryPost');
    Route::post('edit/{id}',                  'CategoryPostController@edit')->name('admin.editCategoryPost');
    Route::get('delete/{id}',                  'CategoryPostController@delete')->name('admin.deleteCategoryPost');
    Route::post('add',                  'CategoryPostController@addData')->name('admin.addCategoryPost');
});


Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'categorys'], function () {
    Route::get('list',                  'CategorysController@list')->name('admin.listCategory');
    Route::get('get-list',                  'CategorysController@getList')->name('admin.getListCategory');
    Route::post('edit/{id}',                  'CategorysController@edit')->name('admin.editCategory');
    Route::get('delete/{id}',                  'CategorysController@delete')->name('admin.deleteCategory');
    Route::post('add',                  'CategorysController@addData')->name('admin.addCategory');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'level'], function () {
    Route::get('list',                  'LevelsController@list')->name('admin.listLevel');
    Route::get('get-list',                  'LevelsController@getList')->name('admin.getListLevel');
    Route::post('edit/{id}',                  'LevelsController@edit')->name('admin.editLevel');
    Route::get('delete/{id}',                  'LevelsController@delete')->name('admin.deleteLevel');
    Route::post('add',                  'LevelsController@addData')->name('admin.addLevel');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'banners'], function () {
    Route::get('list',                  'BannersController@list')->name('admin.listBanners');
    Route::get('get-list',                  'BannersController@getList')->name('admin.getListBanners');
    Route::post('edit/{id}',                  'BannersController@edit')->name('admin.editBanners');
    Route::get('delete/{id}',                  'BannersController@delete')->name('admin.deleteBanners');
    Route::post('add',                  'BannersController@addData')->name('admin.addBanners');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'advertisements'], function () {
    Route::get('list',                  'AdsController@list')->name('admin.listAdvertisements');
    Route::get('get-list',                  'AdsController@getList')->name('admin.getListAdvertisements');
    Route::post('edit/{id}',                  'AdsController@edit')->name('admin.editAdvertisements');
    Route::get('delete/{id}',                  'AdsController@delete')->name('admin.deleteAdvertisements');
    Route::post('add',                  'AdsController@addData')->name('admin.addAdvertisements');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'contacts'], function () {
    Route::get('list',                  'ContactsController@list')->name('admin.listContacts');
    Route::get('get-list',                  'ContactsController@getList')->name('admin.getListContacts');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'deliveries'], function () {
    Route::get('list',                  'DeliveriesController@list')->name('admin.listDeliveries');
    Route::get('get-list',                  'DeliveriesController@getList')->name('admin.getListDeliveries');
    Route::post('edit/{id}',                  'DeliveriesController@edit')->name('admin.editDeliveries');
    Route::get('delete/{id}',                  'DeliveriesController@delete')->name('admin.deleteDeliveries');
    Route::post('add',                  'DeliveriesController@addData')->name('admin.addDeliveries');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'settings'], function () {
    Route::get('list',                  'SettingsController@list')->name('admin.listSettings');
    Route::get('get-list',                  'SettingsController@getList')->name('admin.getListSettings');
    Route::post('edit/{id}',                  'SettingsController@edit')->name('admin.editSettings');
    Route::get('delete/{id}',                  'SettingsController@delete')->name('admin.deleteSettings');
    Route::post('add',                  'SettingsController@addData')->name('admin.addSettings');
});


Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'origins'], function () {
    Route::get('list',                  'OriginsController@list')->name('admin.listOrigins');
    Route::get('get-list',                  'OriginsController@getList')->name('admin.getListOrigins');
    Route::post('edit/{id}',                  'OriginsController@edit')->name('admin.editOrigins');
    Route::get('delete/{id}',                  'OriginsController@delete')->name('admin.deleteOrigins');
    Route::post('add',                  'OriginsController@addData')->name('admin.addOrigins');
});


Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'trademarks'], function () {
    Route::get('list',                  'TrademarksController@list')->name('admin.listTrademarks');
    Route::get('get-list',                  'TrademarksController@getList')->name('admin.getListTrademarks');
    Route::get('edit/{id}',                  'TrademarksController@edit')->name('admin.editTrademarks');
    Route::post('edit/{id}',                  'TrademarksController@edit')->name('admin.editTrademarks');
    Route::get('delete/{id}',                  'TrademarksController@delete')->name('admin.deleteTrademarks');
    Route::post('add',                  'TrademarksController@addData')->name('admin.addTrademarks');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'promotions'], function () {
    Route::get('list',                  'PromotionsController@list')->name('admin.listPromotions');
    Route::get('get-list',                  'PromotionsController@getList')->name('admin.getListPromotions');
    Route::post('edit/{id}',                  'PromotionsController@edit')->name('admin.editPromotions');
    Route::get('delete/{id}',                  'PromotionsController@delete')->name('admin.deletePromotions');
    Route::post('add',                  'PromotionsController@addData')->name('admin.addPromotions');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'partnerstyle'], function () {
    Route::get('list',                  'PartnerStyleController@list')->name('admin.listPartnerStyle');
    Route::get('get-list',                  'PartnerStyleController@getList')->name('admin.getListPartnerStyle');
    Route::post('edit/{id}',                  'PartnerStyleController@edit')->name('admin.editPartnerStyle');
    Route::get('delete/{id}',                  'PartnerStyleController@delete')->name('admin.deletePartnerStyle');
    Route::post('add',                  'PartnerStyleController@addData')->name('admin.addPartnerStyle');
});


Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'partner'], function () {
    Route::get('list',                  'PartnerController@list')->name('admin.listPartner');
    Route::get('get-list',                  'PartnerController@getList')->name('admin.getListPartner');
});


Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'products'], function () {
    Route::get('list',                  'ProductsController@list')->name('admin.listProducts');
    Route::get('get-list',                  'ProductsController@getList')->name('admin.getListProducts');
    Route::get('edit/{id}',                  'ProductsController@edit')->name('admin.editProducts');
    Route::post('edit/{id}',                  'ProductsController@edit')->name('admin.editProducts');
    Route::get('delete/{id}',                  'ProductsController@delete')->name('admin.deleteProducts');
    Route::post('add',                  'ProductsController@addData')->name('admin.addProducts');
    Route::get('active-status/{id}',                  'ProductsController@active')->name('admin.activeProducts');
    Route::get('deactive-status/{id}',                  'ProductsController@deactive')->name('admin.deactiveProducts');
    Route::get('active-status-hot/{id}',                  'ProductsController@activeHot')->name('admin.activeProductsHot');
    Route::get('deactive-status-hot/{id}',                  'ProductsController@deactiveHot')->name('admin.deactiveProductsHot');
    
    Route::get('get-comment/{id}',                  'ProductsController@getListComment')->name('admin.getCommentProduct');
    Route::get('delete-comment/{id}',                  'ProductsController@deleteComment');
    Route::get('active-comment/{id}',                  'ProductsController@activeComment');
    Route::get('deactive-comment/{id}',                  'ProductsController@deactiveComment');


    Route::get('delete-faq/{id}',                  'ProductsController@deleteFaq');
    Route::post('answer-faq/{id}',                  'ProductsController@answerFAQ');
    Route::get('list-faq/{id}',                  'ProductsController@getListFaq');
    Route::get('active-faq/{id}',                  'ProductsController@activeFAQ');
    Route::get('deactive-faq/{id}',                  'ProductsController@deactiveFAQ');

    Route::get('delete-option/{id}',                  'ProductsController@deleteOption');
    Route::get('list-option/{id}',                  'ProductsController@getListOption');
    Route::post('update-option/{id}',                  'ProductsController@updateOption');
    Route::post('add-option',                  'ProductsController@addOption');

    Route::get('delete-notify/{id}',                  'ProductsController@deleteNotify');
    Route::get('list-notify/{id}',                  'ProductsController@getListNotify');
    Route::post('update-notify/{id}',                  'ProductsController@updateNotify');
    Route::post('add-notify',                  'ProductsController@addNotify');

    Route::post('warehouses-import',                  'WarehouseController@warehousesImport');
    
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'posts'], function () {
    Route::get('list',                  'PostsController@list')->name('admin.listPosts');
    Route::get('get-list',                  'PostsController@getList')->name('admin.getListPosts');
    Route::get('edit/{id}',                  'PostsController@edit')->name('admin.editPosts');
    Route::post('edit/{id}',                  'PostsController@edit')->name('admin.editPosts');
    Route::get('delete/{id}',                  'PostsController@delete')->name('admin.deletePosts');
    Route::post('add',                  'PostsController@addData')->name('admin.addPosts');

    Route::get('active-status/{id}',                  'PostsController@active')->name('admin.activePosts');
    Route::get('deactive-status/{id}',                  'PostsController@deactive')->name('admin.deactivePosts');

    Route::get('active-popup/{id}',                  'PostsController@popup')->name('admin.activePopup');
    Route::get('deactive-popup/{id}',                  'PostsController@depopup')->name('admin.deactivePopup');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'warehouse'], function () {
    Route::get('history-import',                  'WarehouseController@historyImport')->name('admin.historyImport');
    Route::post('history-import-list',                  'WarehouseController@historyImportList');

    Route::get('history-export',                  'WarehouseController@historyExport')->name('admin.historyExport');
    Route::post('history-export-list',                  'WarehouseController@historyExportList');
});

Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'notifications'], function () {
    Route::get('list',                  'NotificationsController@list')->name('admin.listNotifications');
    Route::get('get-list',                  'NotificationsController@getList')->name('admin.getListNotifications');
    Route::post('edit/{id}',                  'NotificationsController@edit')->name('admin.editNotifications');
    Route::get('delete/{id}',                  'NotificationsController@delete')->name('admin.deleteNotifications');
    Route::post('add',                  'NotificationsController@addData')->name('admin.addNotifications');
});


Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'orders'], function () {
    Route::get('list',                  'OrdersController@list')->name('admin.listOrders');
    Route::post('get-list',                  'OrdersController@getList')->name('admin.getListOrders');
    Route::get('detail/{id}',                  'OrdersController@edit');
    Route::post('detail/{id}',                  'OrdersController@edit');
    Route::post('update-status/{id}',                  'OrdersController@updateStatus');
});
Route::group(['namespace' => 'Admin', 'middleware' => ['adminAuth'],  'prefix' => 'sales'], function () {
    Route::get('list',                  'SalesController@list')->name('admin.listSales');
    Route::post('get-list',                  'SalesController@getList')->name('admin.getListSales');
    Route::get('detail/{id}',                  'SalesController@edit');
});


Route::group(['namespace' => 'Admin',   'prefix' => 'district'], function () {
    Route::get('list-by-province/{id}',                  'DistrictController@getDistrictByProvinces');
});

Route::group(['namespace' => 'Admin',   'prefix' => 'ward'], function () {
    Route::get('list-by-district/{id}',                  'WardsController@getWardsByDistrict');
});

Route::group(['namespace' => 'Admin',  'prefix' => 'authentication'], function () {
        Route::get('login',                  'AuthenticationController@login')->name('login');
        Route::post('login',                  'AuthenticationController@postLogin')->name('post-login');
        Route::get('register',               'AuthenticationController@register')->name('authentication.register');
        Route::get('forgotpassword',         'AuthenticationController@forgotpassword')->name('authentication.forgotpassword');
        Route::get('error404',               'AuthenticationController@error404')->name('authentication.error404');
});

/* Dashboard */
