<?php
//
//use App\Http\Controllers\Api\AuthController;
//use App\Http\Controllers\Api\BlogApiController;
//use App\Http\Controllers\Api\BuyerRequestApiController;
//use App\Http\Controllers\Api\CartApiController;
//use App\Http\Controllers\Api\CompanyApiController;
//use App\Http\Controllers\Api\CurrencyConverterController;
//use App\Http\Controllers\Api\HomeController;
//use App\Http\Controllers\Api\OrderApiController;
//use App\Http\Controllers\Api\ProductApiController;
//use App\Http\Controllers\Api\SearchApiController;
//use App\Http\Controllers\Api\ServiceApiController;
//use App\Http\Controllers\Api\UserProfile;
//use App\Http\Controllers\Api\WalletApiController;
//use Illuminate\Support\Facades\Route;
//
//Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
//    Route::get('get-countries', [HomeController::class, 'getAllCountries'])->name('get-countries');
//    Route::get('get-units', [HomeController::class, 'getAllUnits'])->name('get-units');
//    Route::get('get-divisions', [HomeController::class, 'getAllDivisions'])->name('get-divisions');
//    Route::get('get-districts/{division_id}', [HomeController::class, 'getAllDistricts'])->name('get-districts');
//    Route::get('get-upazilas/{district_id}', [HomeController::class, 'getAllUpazilas'])->name('get-upazilas');
//
//    /* ================================== auth API starts ==================================*/
//    Route::get('my-info', [UserProfile::class, 'getLoggedUserInfo'])->name('my-info');
//    Route::post('login', [AuthController::class, 'login'])->name('login');
//    Route::post('register', [AuthController::class, 'register'])->name('register');
//    route::post('verify', [AuthController::class, 'verifyEmail'])->name('email.verify');
//    route::post('reset-password-mail', [AuthController::class, 'resetPasswordMail'])->name('reset.password.mail');
//    route::post('resend/verification-code', [AuthController::class, 'resendVerifyCode'])->name('code.resend');
//    Route::post('password/reset', [AuthController::class, 'resetPassword'])->name('password.reset.submit');
//    /* ================================== auth API ends ==================================*/
//
//    /* ================================== my-account API starts ==================================*/
//    Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'my-account', 'as' => 'my-account.'], function () {
//        //        [ prefix = api/v1/my-account ]
//        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//        Route::post('update', [UserProfile::class, 'updatePersonalInfo'])->name('update');
//        Route::post('change-profile-picture', [UserProfile::class, 'uploadProfilePicture'])->name('change-profile-picture');
//        Route::post('update-password', [UserProfile::class, 'updateUserPassword'])->name('update-password');
//        Route::get('inquiries', [UserProfile::class, 'getInquiries'])->name('inquiries');
//        Route::get('inquiry-details', [UserProfile::class, 'getInquiryDetails'])->name('inquiries-details');
//        Route::get('get-request', [BuyerRequestApiController::class, 'getRequest'])->name('get-buyer-request');
//
//        Route::get('buy-request-list', [BuyerRequestApiController::class, 'buyRequestList'])->name('buy-request-list');
//        Route::get('buy-request-status-change/{request_id}', [BuyerRequestApiController::class, 'changeBuyRequestStatus'])->name('buy-request-status-change');
//        Route::post('make-buy-request-feature', [BuyerRequestApiController::class, 'getBuyRequestFeature'])->name('make-buy-request-feature');
//        Route::post('submit-buy-request', [BuyerRequestApiController::class, 'submitBuyRequest'])->name('submit.buy.request');
//        Route::post('edit-buy-request', [BuyerRequestApiController::class, 'editBuyRequest'])->name('edit.buy.request');
//
//        Route::get('get-payment-methods', [WalletApiController::class, 'getPaymentMethods'])->name('payment.methods');
//        Route::get('get-user-payment-methods', [WalletApiController::class, 'getUserPaymentMethods'])->name('user.payment.methods');
//        Route::get('delete-user-payment-method', [WalletApiController::class, 'deleteUserPaymentMethod'])->name('delete.user.payment.methods');
//        Route::get('get-my-payment-accounts', [WalletApiController::class, 'getMyPaymentAccounts'])->name('payment.accounts');
//        Route::post('add-payment-method', [WalletApiController::class, 'addPaymentMethod'])->name('add.payment.method');
//        Route::post('add-wallet-balance', [WalletApiController::class, 'addBalance'])->name('add.wallet.balance');
//        Route::get('wallet-history', [WalletApiController::class, 'walletHistory'])->name('walltet.history');
//        Route::post('transfer-wallet-balance', [WalletApiController::class, 'transferWalletBalance'])->name('transfer.wallet.balance');
//
//    });
//    /* ================================== my-account API ends ==================================*/
//
//
//    /* ================================== common API starts ==================================*/
//    Route::get('categories', [HomeController::class, 'getCategories'])->name('categories');
//    Route::get('parent-categories-slug/{catSlug}', [HomeController::class, 'getParentCategoriesSlug']);
//    Route::get('item-category', [ProductApiController::class, 'itemCategory'])->name('item-category');
//    Route::get('admin-web-settings', [HomeController::class, 'adminWebSettings'])->name('admin.web.settings');
//    Route::get('getParentCategories', [HomeController::class, 'getParentCategories'])->name('parent.categories');
//    Route::post('submit-rating', [UserProfile::class, 'submitRating'])->name('submit.user.rating')->middleware('auth:sanctum');
//    /* ================================== common details API ends ==================================*/
//
//    /* ================================== home API starts ==================================*/
//    Route::get('admin-web-carousel', [HomeController::class, 'adminWebCarousel'])->name('admin.web.carousel');
//    Route::get('sponsored-products', [HomeController::class, 'sponsoredProducts'])->name('sponsored_products');
//    Route::get('sponsored-services', [HomeController::class, 'sponsoredServices'])->name('sponsored_services');
//    Route::get('sponsored-brands', [HomeController::class, 'sponsoredBrands'])->name('sponsored-brands');
//    Route::get('new-products', [ProductApiController::class, 'getNewProducts'])->name('new_products');
//    Route::get('new-services', [ServiceApiController::class, 'getNewServices'])->name('new_services');
//    /* ================================== home API ends ==================================*/
//
//    /* ================================== search API starts ==================================*/
//    Route::group(['prefix' => 'search', 'as' => 'search.'], function () {
//
//        //        [ prefix = api/v1/search ]
//        Route::get('keyword/{query}', [SearchApiController::class, 'getKeywords'])->name('keywords');
//
//        //        [ prefix = api/v1/search/product ]
//        Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
//            Route::get('categories', [SearchApiController::class, 'getProductCategories'])->name('categories');
//            Route::get('lists', [SearchApiController::class, 'getProductLists'])->name('lists');
//            Route::get('feature', [SearchApiController::class, 'getFeatureProducts'])->name('feature');
//
//        });
//
//        //        [ prefix = api/v1/search/service ]
//        Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
//            Route::get('categories', [SearchApiController::class, 'getServiceCategories'])->name('categories');
//            Route::get('lists', [SearchApiController::class, 'getServiceLists'])->name('lists');
//            Route::get('feature', [SearchApiController::class, 'getFeatureServices'])->name('feature');
//        });
//
//        //        [ prefix = api/v1/search/company ]
//        Route::group(['prefix' => 'company', 'as' => 'company.'], function () {
//            Route::get('categories', [SearchApiController::class, 'getCompanyCategories'])->name('categories');
//            Route::get('lists', [SearchApiController::class, 'getCompanyLists'])->name('lists');
//            Route::get('feature', [SearchApiController::class, 'getFeatureIndustries'])->name('feature');
//
//        });
//    });
//    /* ================================== search API ends ==================================*/
//
//    /* ================================== product details API starts ==================================*/
//    Route::group(['prefix' => 'product/{slug}', 'as' => 'product.'], function () {
//        //        [ prefix = api/v1/product/{slug} ]
//        Route::get('/', [ProductApiController::class, 'productDetails'])->name('details');
//        Route::get('comments', [ProductApiController::class, 'getProductComments'])->name('comments');
//        Route::post('submit-question', [ProductApiController::class, 'submitQuestion'])->name('submit.question')->middleware('auth:sanctum');
//        Route::post('submit-inquiry', [ProductApiController::class, 'submitInquiry'])->name('submit.inquiry')->middleware('auth:sanctum');
//    });
//    /* ================================== product details API ends ==================================*/
//
//    /* ================================== service details API starts ==================================*/
//    Route::group(['prefix' => 'service/{slug}', 'as' => 'service.'], function () {
//        //        [ prefix = api/v1/service/{slug} ]
//        Route::get('/', [ServiceApiController::class, 'serviceDetails'])->name('service.details');
//        Route::get('comments', [ServiceApiController::class, 'getServiceComments'])->name('get-service-comments');
//        Route::post('submit-question', [ServiceApiController::class, 'submitServiceQuestion'])->name('submit.service.question')->middleware('auth:sanctum');
//        Route::post('submit-inquiry', [ServiceApiController::class, 'submitServiceInquiry'])->name('submit.service.inquiry')->middleware('auth:sanctum');
//    });
//    /* ================================== service details API ends ==================================*/
//
//    /* ================================== buyer request API starts ==================================*/
//    Route::get('buyer-request-categories', [BuyerRequestApiController::class, 'buyerRequestCategories'])->name('buyer.request.categories');
//    Route::get('buyer-request-list', [BuyerRequestApiController::class, 'getBuyerRequestList'])->name('buyer.request.list');
//    Route::get('featured-buyer-request-list', [BuyerRequestApiController::class, 'getFeaturedBuyerRequestList'])->name('feature.buyer.request.list');
//    Route::get('buyer-request-details/{slug}', [BuyerRequestApiController::class, 'getBuyerRequestDetails'])->name('buyer.request.details');
//    Route::get('buyer-request-stat-count', [BuyerRequestApiController::class, 'getBuyerRequestStatCount'])->name('buyer.request.statistics.count');
//    Route::get('request-responses-list/{request_uid}/', [BuyerRequestApiController::class, 'buyRequestResponses'])->name('buy_request.responses');
//    /* ================================== buyer request API ends ==================================*/
//
//    /* ================================== blog API starts ==================================*/
//    Route::get('blog-categories', [BlogApiController::class, 'blogRootCategories']);
//    Route::get('blog-list', [BlogApiController::class, 'getBlogList'])->name('buyer.blog.list');
//    Route::get('get-recent-blog-list', [BlogApiController::class, 'getRecentBlogList'])->name('buyer.recent.blog.list');
//    Route::get('blog/{slug}', [BlogApiController::class, 'blogDetails'])->name('blog.details');
//    /* ================================== blog API ends ==================================*/
//
//    /* ================================== category wise product/service API starts ==================================*/
//    Route::get('get-items/{category_slug}', [HomeController::class, 'getItems'])->name('get-items');
//    /* ================================== category wise product/service API ends ==================================*/
//
//    /* ================================== company API starts ==================================*/
//    Route::group(['prefix' => 'company/{slug}', 'as' => 'company.'], function () {
//        //        [ prefix = api/v1/company/{slug} ]
//        Route::get('info', [CompanyApiController::class, 'getDetails'])->name('details');
//        Route::get('categories', [CompanyApiController::class, 'getCategories'])->name('categories');
//        Route::get('items', [CompanyApiController::class, 'getItems'])->name('products');
//        Route::get('faq', [CompanyApiController::class, 'getFAQs'])->name('faq');
//        Route::get('tos', [CompanyApiController::class, 'getTOS'])->name('tos');
//        Route::get('about', [CompanyApiController::class, 'getAboutContent'])->name('about');
//        Route::get('media', [CompanyApiController::class, 'getMedias'])->name('media');
//        Route::get('gallery', [CompanyApiController::class, 'getGalleries'])->name('gallery');
//        Route::get('blog', [CompanyApiController::class, 'getBlogs'])->name('blog');
//        Route::get('web-carousel', [CompanyApiController::class, 'getCarousels'])->name('web.carousel');
//        Route::post('send-message', [CompanyApiController::class, 'submitMessage'])->name('submit.message')->middleware('auth:sanctum');
//        Route::get('client', [CompanyApiController::class, 'getClient'])->name('client');
//        Route::get('addresses', [CompanyApiController::class, 'getOrganizationAddress'])->name('address');
//    });
//    /* ================================== company API ends ==================================*/
//    Route::group(['middleware' => 'auth:sanctum'], function(){
//        Route::post('save-address', [OrderApiController::class, 'saveAddress'])->name('save.address');
//        Route::get('get-address', [OrderApiController::class, 'getAddress'])->name('get.address');
//        Route::get('get-order-address', [OrderApiController::class, 'getOrderAddress'])->name('get.order.address');
//        Route::get('address-delete', [OrderApiController::class, 'deleteAddress'])->name('delete.address');
//        Route::post('confirm-order', [OrderApiController::class, 'confirmOrder'])->name('confirm.order');
//        Route::get('get-current-order', [OrderApiController::class, 'getSelectedOrder'])->name('get.selected.order');
//        Route::get('get-all-order', [OrderApiController::class, 'getAllOrder'])->name('get.all.order');
//        Route::post('confirm_payment', [OrderApiController::class, 'confirmPayment'])->name('confirm.payment');
//        Route::post('cancel-order', [OrderApiController::class, 'cancelOrder'])->name('cancel.order');
//        Route::post('confirm-delivery', [OrderApiController::class, 'confirmDelivery'])->name('confirm.delivery');
//        Route::get('download-invoice/{id}', [OrderApiController::class,'downloadInvoice'])->name('download.invoice');
//    });
//
//    // cart module start............
//    Route::post('add-to-cart', [OrderApiController::class, 'addToCart'])->name('add.cart');
//    Route::get('get-cart', [OrderApiController::class, 'getCart'])->name('get.cart');
//    Route::get('get-min-quantity', [OrderApiController::class, 'getMinQuan'])->name('get.min-quantity');
//    Route::post('update-cart', [OrderApiController::class, 'updateCart'])->name('update.cart');
//    Route::get('cart-destroy', [OrderApiController::class, 'destroyCart'])->name('destroy.cart');
//    Route::get('delivery-info', [CartApiController::class, 'deliveryInfo'])->name('delivery.info');
//
//    Route::get('cost-amount',[HomeController::class, 'getCostAmount'])->name('get.cost.amount');
//
//    Route::get('offer-products',[SearchApiController::class, 'getOfferProducts'])->name('get.offer.products');
//
//    Route::get('get-currencies',[CurrencyConverterController::class, 'getCurrencies']);
//    Route::get('currency-rate', [CurrencyConverterController::class,'currencyRate']);
//    Route::get('currency-converter', [CurrencyConverterController::class,'currencyConvert'])->name('currencyConverter');
//});
