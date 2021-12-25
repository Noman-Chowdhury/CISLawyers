
<?php

use App\Http\Controllers\Admin\AccessController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\VerificationController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\Admin\BuyerInfoController;
use App\Http\Controllers\Admin\BuyRequestController;
use App\Http\Controllers\Admin\CategoryAttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\CustomizationController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrganizationsController;
use App\Http\Controllers\Admin\OrganizationStatisticController;
use App\Http\Controllers\Admin\ProductCommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductInquiryController;
use App\Http\Controllers\Admin\ProductServiceFeatureController;
use App\Http\Controllers\Admin\RatingReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\ServiceCommentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceInquiryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\WalletController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin'], function () {
    //admin authentication system
    Route::get('slogon', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('slogon', [AdminLoginController::class, 'login']);
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
        Route::post('add-partner', [AdminHomeController::class, 'add_partner'])->name('admin.partner.add');
        Route::get('partner-list', [AdminHomeController::class, 'partner_list'])->name('admin.partner.list');

        Route::get('frontend/home',[\App\Http\Controllers\FrontendController::class, 'getHomeSetting'])->name('home.setting');
        Route::post('frontend/home/carousel',[\App\Http\Controllers\FrontendController::class, 'storeCarousel'])->name('store.carousel');
        Route::get('frontend/home/carousel/{id}',[\App\Http\Controllers\FrontendController::class, 'sliderImageDelete'])->name('slider.image.delete');
        Route::put('frontend/home/carousel-text', [\App\Http\Controllers\FrontendController::class, 'storeSliderText'])->name('store.slider.text');
        Route::put('frontend/home/feature', [\App\Http\Controllers\FrontendController::class, 'storeFeature'])->name('store.feature');
        Route::put('frontend/home/law', [\App\Http\Controllers\FrontendController::class, 'storeLaw'])->name('store.law');
        Route::put('frontend/home/lawHeader', [\App\Http\Controllers\FrontendController::class, 'lawHeader'])->name('store.law.header');
        Route::get('frontend/home/laws', [\App\Http\Controllers\FrontendController::class, 'laws'])->name('law.list');
    });
});
