<?php

Route::get('/','Front\homeController@index')->name('name_front.home');
Route::get('/divisima_product/{id}','Front\productController@getProducts')->name('name_front.product');
Route::get('/divisima_specific_product','Front\productController@getSpecificProducts')->name('name_front.specificProduct');
Route::post('/divisima_filter_product','Front\productController@getFilterProduct')->name('productController.getFilterProduct');
Route::get('/detail_product','Front\ProductDetail@index')->name('name.front.productDetail.index');
Route::get('/home_detail_product','Front\homeController@productDetail')->name('name.front.productDetail.productDetail');

Route::group(['prefix'=>'user_panel','middleware'=>'auth'],function (){

    Route::group(['prefix'=>'basket'],function (){
        Route::post('/','Front\ProductDetail@addtoBasket')->name('name_front.productDetail.addtoBasket');
        Route::get('/delete_basket','Front\productController@deleteProduct')->name('name.delete.product.at.basket');
        Route::get('/get_basket','Front\productController@getBasket')->name('name_front.get.basket');
        Route::get('/confirm_basket','Front\BuyProduct@confirmBasket')->name('name.front.BuyProduct.confirmBasket');
    });
    Route::group(['prefix'=>'favorite'],function (){
        Route::post('/','Front\FavoriteProductController@create')->name('name_front.favoriteController.create');
    });

    Route::get('/profile','Front\ProfileController@index')->name('name_front.favoriteController.index');
    Route::get('/delete_favorite_product','Front\ProfileController@deleteFavoriteProduct')->name('name_front.favoriteController.deleteFavoriteProduct');
    Route::post('/create_adress','Front\ContactInfoController@createContactInfo')->name('name_front.contactInfoController.createContactInfo');
    Route::post('/update_password','Front\ProfileController@updatePassword')->name('name_front.contactInfoController.updatePassword');
});

/*Route::get('/login',function (){
    return redirect()->route('login'); });*/

Auth::routes();


Route::get('/exit',function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::group(['prefix'=>'admin_panel','middleware'=>'auth'],function (){

    Route::get('/','Auth\AuthController@controlAdmin')->name('name_admin.main');

    Route::group(['prefix'=>'category'],function (){
        Route::get('/add_main_category','Category\mainCategoryController@index')->name('name_add.main.menu');
        Route::post('/add_main_category_post','Category\mainCategoryController@addMainCategory')->name('name_add.main.menu.post');

        Route::get('/add_sub_cate_1','Category\subCategory1Controller@index')->name('name_add.sub.cate1');
        Route::post('/add_sub_cate_1_post','Category\subCategory1Controller@add_sub_category')->name('name_add.sub.cate1_post');

        Route::get('/select_main_category','Category\subCategory2Controller@index_main')->name('name_select_main_cate');
        Route::post('/select_sub_category_1','Category\subCategory2Controller@index_sub_category1')->name('name_select_sub_cate1');
        Route::post('/add_sub_cate_2','Category\subCategory2Controller@add_sub_category2_post')->name('name_add_sub_cate2');

        Route::get('/list_category','Category\listController@getCategories')->name('name_list_category');
        Route::get('/delete_main_category','Category\listController@deleteMainCategory')->name('category.listController.deleteMain');
        Route::get('/delete_sub_category_1','Category\listController@deleteSubCategory1')->name('category.listController.deleteSub1');
        Route::get('/delete_sub_category_2','Category\listController@deleteSubCategory2')->name('category.listController.deleteSub2');
        Route::get('/update_main_category,','Category\listController@editMainCategory')->name('category.listController.updateMain');
        Route::post('/update_main_category_post,','Category\listController@editMainCategoryPost')->name('category.listController.updateMainPost');
        Route::get('/update_sub1_category,','Category\listController@editSub1Category')->name('category.listController.updateSubCategory');
        Route::post('/update_sub1_category_post,','Category\listController@editSub1CategoryPost')->name('category.listController.updateSubCategoryPost');
        Route::get('/update_sub2_category,','Category\listController@editSub2Category')->name('category.listController.updateSub2Category');
        Route::post('/update_sub2_category_post,','Category\listController@editSub2CategoryPost')->name('category.listController.updateSub2CategoryPost');
    });

    Route::group(['prefix'=>'property'],function (){
       Route::get('/add_main_property','Property\mainPropertyController@index_main')->name('name_add_main_property');
       Route::post('/add_main_property_post','Property\mainPropertyController@add_main_property')->name('name_add_main_property_post');

       Route::get('/add_sub_property','Property\subPropertyController@index')->name('name_add.sub.property');
       Route::post('/add_sub_property_post','Property\subPropertyController@add_sub_property')->name('name_add.sub.property_post');
        // BURDAYIM */*/*/*/*/*/*/*/*/
       Route::get('/add_property_to_category','Property\AddPropertyToCategory@index')->name('name_add.property.to.category');
       Route::get('/add_property_to_category_sub1','Property\AddPropertyToCategory@get_sub1_categories_ajax')->name('name_add.property.to.category.sub1');
       Route::get('/add_property_to_category_sub2','Property\AddPropertyToCategory@get_sub2_categories_ajax')->name('name_add.property.to.category.sub2');
        Route::get('/add_property_to_category_property','Property\AddPropertyToCategory@getProperties')->name('name_add.property.to.category.property');
        Route::post('create_category_property','Property\AddPropertyToCategory@createCategoryPropery')->name('name_add.property.to.category.create');
        ///*****
       Route::get('/property_list','Property\listController@get_list')->name('name_get_list');
       Route::get('/delete_main_property','Property\listController@deleteMainProperty')->name('property.listController.deleteMainProp');
       Route::get('/delete_sub_property','Property\listController@deleteSubProperty')->name('property.listController.deleteSubProp');
       Route::get('/edit_main_property','Property\listController@editMainProperty')->name('property.listController.editMainProp');
       Route::post('/edit_main_property_post','Property\listController@editMainPropertyPost')->name('property.listController.editMainPropPost');
       Route::get('/edit_sub_property','Property\listController@editSubProperty')->name('property.listController.edit');
       Route::post('/edit_sub_property_post','Property\listController@editSubPropertyPost')->name('property.listController.editPost');
    });

    Route::group(['prefix'=>'product'],function (){
        Route::get('/select_main_category','Product\mainCategoryController@index')->name('name_product.main.controller');
        Route::post('/select_main_category_post','Product\mainCategoryController@select_sub_category')->name('name_product.main.controller_post');
        Route::post('/select_sub_category_post','Product\subCategory1Controller@select_sub_category')->name('name_product.sub1.controller_post');
        Route::post('/create_product_category','Product\productCategoryController@create_product_category')->name('name_create_product_category_post');

        Route::get('/select_categories','Product\AddProperty\selectCategories@index')->name('product.addProperty.selectCategories');
        Route::post('/select_sub_category1','Product\AddProperty\selectCategories@select_sub_category_1')->name('product.addProperty.selectSubCategory1');
        Route::post('/select_sub_category2','Product\AddProperty\selectCategories@select_sub_category_2')->name('product.addProperty.selectSubCategory2');
        Route::post('/select_product','Product\AddProperty\selectCategories@select_product')->name('product.addProperty.selectProduct');
        Route::post('/select_main_property','Product\AddProperty\selectProperties@select_main_property')->name('product.addProperty.selectMainProperty');
        Route::post('/select_sub_property','Product\AddProperty\selectProperties@select_sub_property')->name('product.addProperty.selectSubProperty');
        Route::post('/add_property','Product\AddProperty\selectProperties@add_property')->name('product.addProperty.addProperty');

        Route::get('/select_category','Product\AddPrice\selectCategory@index')->name('product.addPrice.selectCategory');
        Route::post('createProductPrice','Product\AddPrice\selectCategory@createProductPrice')->name('product.price.create');

        Route::get('/get_sub1_categories_ajax','Product\AddProperty\selectCategories@get_sub1_categories_ajax')->name('product.addProperty.get_sub1_categories_ajax');
        Route::get('/get_sub2_categories_ajax','Product\AddProperty\selectCategories@get_sub2_categories_ajax')->name('product.addProperty.get_sub2_categories_ajax');
        Route::get('/get_products_ajax','Product\AddProperty\selectCategories@get_products_ajax')->name('product.addProperty.get_products_ajax');

        Route::get('/get_product_list','Product\listController@getProductList')->name('product.listController.getProductList');
        Route::get('/delete_product','Product\listController@delete')->name('product.listController.delete');
        Route::get('/edit_product','Product\Edit\editController@editProduct')->name('product.edit.editController.editProduct');
        Route::post('/edit_product_post','Product\Edit\editController@editProductPost')->name('product.edit.editController.editProductPost');
    });

    Route::get('/roles','Role\roleController@getRoleList')->name('role.roleController');
    Route::get('/user_role','Role\roleController@getUserRoleList')->name('role.roleController.getUserRoleList');
    Route::get('/create_role','Role\roleController@createRole')->name('role.roleController.createRole');
    Route::post('create_role_post','Role\roleController@createRolePost')->name('role.roleController.createRolePost');
    Route::get('edit_role','Role\EditController@editRole')->name('role.editController.editRole');
    Route::post('edit_role_post','Role\EditController@editRolePost')->name('role.editController.editRolePost');
    Route::get('edit_user_role','Role\EditController@editUserRole')->name('role.editController.editUserRole');
    Route::post('edit_user_role_post','Role\EditController@editUserRolePost')->name('role.editController.editUserRolePost');
    Route::get('delete_user_role','Role\deleteController@delete')->name('role.deleteController.delete');
});






