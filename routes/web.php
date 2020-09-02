<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Front Panel Route List
|
*/

    Route::get('/h', 'Frontend\PagesController@homePage')->name('index');
    Route::get('/products/{slug}', 'Frontend\ProductsController@show')->name('products.show');
    Route::get('/order-details', 'Frontend\ProductsController@orderDetails')->name('order-details');
    Route::get('/my-orders', 'Frontend\ProductsController@myOrders')->name('my-orders');
    Route::get('/categories/{slug}', 'Frontend\CategoriesController@show')->name('category.show');
    Route::get('/p/{slug}', 'Frontend\SitePagesController@show')->name('pages.show');


// Route::get('/articles/{id}/{slug}', 'Frontend\CategoriesController@show')->name('category.show');




/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Admin Panel Route List
|
*/

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Auth::routes();

        Route::get('/', 'Backend\Modules\Dashboard\DashboardsController@index')->name('index');

        // Login Routes
        Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('login');
        Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('login.submit');
        Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('logout');

        // Reset Password Routes
        Route::get('/password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/reset', 'Backend\Auth\ResetPasswordController@reset')->name('password.update');

    /**
     * Admin Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('admins', 'Backend\Modules\Admin\AdminsController');
        Route::get('admins/trashed/view', 'Backend\Modules\Admin\AdminsController@trashed')->name('admins.trashed');
        Route::get('profile/edit', 'Backend\Modules\Admin\AdminsController@editProfile')->name('admins.profile.edit');
        Route::put('profile/update', 'Backend\Modules\Admin\AdminsController@updateProfile')->name('admins.profile.update');
        Route::delete('admins/trashed/destroy/{id}', 'Backend\Modules\Admin\AdminsController@destroyTrash')->name('admins.trashed.destroy');
        Route::put('admins/trashed/revert/{id}', 'Backend\Modules\Admin\AdminsController@revertFromTrash')->name('admins.trashed.revert');
    });

    /**
     * Role & Permission Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('roles', 'Backend\Modules\Admin\RolesController');
    });


    /**
     * Category Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('categories', 'Backend\Modules\Category\CategoriesController');
        Route::get('categories/trashed/view', 'Backend\Modules\Category\CategoriesController@trashed')->name('categories.trashed');
        Route::delete('categories/trashed/destroy/{id}', 'Backend\Modules\Category\CategoriesController@destroyTrash')->name('categories.trashed.destroy');
        Route::put('categories/trashed/revert/{id}', 'Backend\Modules\Category\CategoriesController@revertFromTrash')->name('categories.trashed.revert');
    });
    /**
     * Post Management Routes
     */
    // Route::group(['prefix' => ''], function () {
    //     Route::resource('posts', 'Backend\Modules\Post\PostsController');
    //     Route::get('posts/trashed/view', 'Backend\Modules\Post\PostsController@trashed')->name('posts.trashed');
    //     Route::delete('posts/trashed/destroy/{id}', 'Backend\Modules\Post\PostsController@destroyTrash')->name('posts.trashed.destroy');
    //     Route::put('posts/trashed/revert/{id}', 'Backend\Modules\Post\PostsController@revertFromTrash')->name('posts.trashed.revert');
    // });

    /**
     * Page Management Routes
     */
    // Route::group(['prefix' => ''], function () {
    //     Route::resource('pages', 'Backend\Modules\Page\PagesController');
    //     Route::get('pages/trashed/view', 'Backend\Modules\Page\PagesController@trashed')->name('pages.trashed');
    //     Route::delete('pages/trashed/destroy/{id}', 'Backend\Modules\Page\PagesController@destroyTrash')->name('pages.trashed.destroy');
    //     Route::put('pages/trashed/revert/{id}', 'Backend\Modules\Page\PagesController@revertFromTrash')->name('pages.trashed.revert');
    // });

    /**
     * Blog Management Routes
     */
    // Route::group(['prefix' => ''], function () {
    //     Route::resource('blogs', 'Backend\Modules\Blog\BlogsController');
    //     Route::get('blogs/trashed/view', 'Backend\Modules\Blog\BlogsController@trashed')->name('blogs.trashed');
    //     Route::delete('blogs/trashed/destroy/{id}', 'Backend\Modules\Blog\BlogsController@destroyTrash')->name('blogs.trashed.destroy');
    //     Route::put('blogs/trashed/revert/{id}', 'Backend\Modules\Blog\BlogsController@revertFromTrash')->name('blogs.trashed.revert');
    // });

    /**
     * Tag Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('tags', 'Backend\Modules\Tag\TagController');
        Route::get('tags/trashed/view', 'Backend\Modules\Tag\TagController@trashed')->name('tags.trashed');
        Route::delete('tags/trashed/destroy/{id}', 'Backend\Modules\Tag\TagController@destroyTrash')->name('tags.trashed.destroy');
        Route::put('tags/trashed/revert/{id}', 'Backend\Modules\Tag\TagController@revertFromTrash')->name('tags.trashed.revert');
    });

    /**
     * Product Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('products', 'Backend\Modules\Product\ProductsController');
        Route::get('products/trashed/view', 'Backend\Modules\Product\ProductsController@trashed')->name('products.trashed');
        Route::get('products/stock/create/{id}', 'Backend\Modules\Product\ProductsController@createStockAndPrice')->name('stock-price');
        Route::post('products/stock/store/{id}', 'Backend\Modules\Product\ProductsController@storeStockAndPrice')->name('stock-price.store');
        Route::delete('products/trashed/destroy/{id}', 'Backend\Modules\Product\ProductsController@destroyTrash')->name('products.trashed.destroy');
        Route::post('products/product-image/{id}', 'Backend\Modules\Product\ProductsController@destroyProductImage')->name('products.image-delete');
        Route::put('products/trashed/revert/{id}', 'Backend\Modules\Product\ProductsController@revertFromTrash')->name('products.trashed.revert');
    });

    /**
     * Transaction Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('transactions', 'Backend\Modules\Transaction\TransactionsController');
        Route::get('transactions/trashed/view', 'Backend\Modules\Transaction\TransactionsController@trashed')->name('transactions.trashed');
        Route::delete('transactions/trashed/destroy/{id}', 'Backend\Modules\Transaction\TransactionsController@destroyTrash')->name('transactions.trashed.destroy');
        Route::put('transactions/trashed/revert/{id}', 'Backend\Modules\Transaction\TransactionsController@revertFromTrash')->name('transactions.trashed.revert');
    });

    /**
     * Slider Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('sliders', 'Backend\Modules\Slider\SlidersController');
        Route::get('sliders/trashed/view', 'Backend\Modules\Slider\SlidersController@trashed')->name('sliders.trashed');
        Route::delete('sliders/trashed/destroy/{id}', 'Backend\Modules\Slider\SlidersController@destroyTrash')->name('sliders.trashed.destroy');
        Route::put('sliders/trashed/revert/{id}', 'Backend\Modules\Slider\SlidersController@revertFromTrash')->name('sliders.trashed.revert');
    });

    /* Post Comment Management Routes */
    // Route::group(['prefix' => ''], function () {
    //     Route::resource('postcomments', 'Backend\Modules\PostComment\PostCommentsController');
    //     Route::get('postcomments/trashed/view', 'Backend\Modules\PostComment\PostCommentsController@trashed')->name('postcomments.trashed');
    //     Route::delete('postcomments/trashed/destroy/{id}', 'Backend\Modules\PostComment\PostCommentsController@destroyTrash')->name('postcomments.trashed.destroy');
    //     Route::put('postcomments/trashed/revert/{id}', 'Backend\Modules\PostComment\PostCommentsController@revertFromTrash')->name('postcomments.trashed.revert');
    // });

    /**
     * Document Management Routes
     */
    // Route::group(['prefix' => ''], function () {
    //     Route::get('documents/videos', 'Backend\Modules\Document\DocumentsController@getAllVideos')->name('documents.videos');
    //     Route::get('documents/all/images', 'Backend\Modules\Document\DocumentsController@getAllImages')->name('documents.images');
    //     Route::get('documents/all/documents', 'Backend\Modules\Document\DocumentsController@getAllDocuments')->name('documents.documents');
    //     Route::get('documents/all/audios', 'Backend\Modules\Document\DocumentsController@getAllAudios')->name('admin.documents.audios');

    //     Route::resource('documents', 'Backend\Modules\Document\DocumentsController');
    //     // admin/documents/images -> show()
    // });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
