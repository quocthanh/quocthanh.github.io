<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hoclaravel', function() {
    echo 'Hahaha cái ca!';
});

Route::get('thongtin', 'WelcomeController@hello');
Route::get('anbanhda', 'WelcomeController@food');

Route::get('chaomung/{ten}', function($ten) {
    echo "Chao $ten :)";
});

Route::get('chaomung_2/{ten?}', function($ten = 'thanh dep trai') {
    echo "Chao $ten :)";
});

Route::get('haclong', function() {
    $ten = 'thanh super';
    return view('view_1', compact('ten'));
});

Route::get('bachdieu', ['as' => 'bd', function() {
    echo 'Tao ko pik đặt tên j nữa';
}]);
Route::get('nuoc', 'WelcomeController@hoa');

Route::group(['prefix' => 'phim'], function() {
    Route::get('ma', function() {
        echo 'phim ma haaa ';
    });
    Route::get('hài', function() {
        echo 'hêhe';
    });
   Route::get('đen', function() {
       echo 'xxx';
   });
});

Route::get('phuonghoanglua', function() {
   return view('animals/dragon/lala');
});

View::share('glo', 'some TXT');

Route::get('checkView', function() {
    if (!view()->exists('welcome')) {
       echo 'ko có view này.' . '<br>';
       return;
    }
   echo 'có view này.';
});

Route::get('blade', function() {
   return view('animals.phoenix.aaa');
});

Route::get('blade2', function() {
   return view('animals.phoenix.bbb');
});

Route::get('blade3', function() {
   return view('animals.phoenix.ccc');
});

Route::get('blade4', function() {
   return view('animals.phoenix.ddd');
});
/*URL ------------------------------------------------------------*/
/*----------------------------------------------------------------*/
Route::get('url', function() {
   //return URL::full();
    return URL::asset('css/mystyle.css');
});

Route::get('daibang', function() {
    return view('animals.phoenix.eee');
});

Route::get('chimUng', function() {
    return URL::to('chaomunggggg', ['tomorrow']);
});

Route::get('url/url', function() {
    echo url('aaa/bbb/ccc');
});
/*SCHEMA BUILDER -----------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------*/
Route::get('schema/create', function() {
    /*Schema::create('table_1', function($table) {
        $table->increments('id');
        $table->string('ten');
        $table->integer('weight');
        $table->text('cmt')->nullable();
        $table->timestamps();
    });*/
    Schema::create('courses', function($table) {
        $table->increments('id');
        $table->string('MonHoc');
        $table->integer('GiaTien');
        $table->string('GiangVien');
        $table->timestamps();
    });
});

Route::get('schema/rename', function() {
    Schema::rename('table_1', 'bang_1');
});

Route::get('schema/drop', function() {
    Schema::drop('table_1');
});

Route::get('schema/changeAtt', function() {
    Schema::table('table_1', function($table) {
        $table->string('ten', 50)->change();
    });
});

Route::get('schema/dropCol', function() {
    Schema::table('table_1', function($table) {
        $table->dropColumn('weight');
    });
});

Route::get('schema/create/cate', function() {
    Schema::create('category', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});
Route::get('schema/create/product', function() {
    Schema::create('product', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('price');
        $table->integer('cate_id')->unsigned();
        $table->foreign('cate_id')->references('id')->on('category');
        $table->timestamps();
    });
});

Route::get('schema/create/cate2', function() {
    Schema::create('category_2', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});
Route::get('schema/create/product2', function() {
    Schema::create('product_2', function($table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('price');
        $table->integer('cate_id')->unsigned();
        $table->foreign('cate_id')->references('id')->on('category_2')->onDelete('cascade');
        $table->timestamps();
    });
});

/*QUERY BUILDER--------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------*/
Route::get('query/selectAll', function() {
    $data = DB::table('product')->get();

    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

Route::get('query/selectCol', function() {
    $data = DB::table('product')->select('name')->where('id', 7)->get();

    echo '<pre>';
    print_r($data);
    print_r($data[0]->name);
    echo '</pre>';
});

Route::get('query/or', function() {
    $data = DB::table('product')
                ->select('name')
                ->where('id', 7)
                ->orWhere('price', 58500)
                ->get();

    echo '<pre>';
    print_r($data);
    print_r($data[0]->name);
    echo '</pre>';
});

Route::get('query/and', function() {
    $data = DB::table('product')
                ->select('name')
                ->where('id', 7)
                ->where('cate_id', 2)
                ->get();

    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

Route::get('query/limit', function() {
    $data = DB::table('product')
                ->skip(2)->take(3)
                ->get();

    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

Route::get('query/lists', function() {
    //$data = DB::table('courses')->where('MonHoc', 'Aura')->value('GiaTien');
    //$data = DB::table('courses')->where('MonHoc', 'Aura')->select('GiaTien')->get();
    //$data = DB::table('courses')->lists('GiangVien');
    $data = DB::table('courses')->select('GiangVien')->get();

    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

Route::get('query/whereNull', function() {
    $data = DB::table('user_infor')
                //5.1 doesnt sp
                /*->where([
                    ['id', '=', 3],
                    ['name', '=', 'thanh'],
                ])*/
                ->where('id', '=', 3)
                ->where('name', '=', 'tuan')
                ->get();

    echo '<pre>';
    print_r($data);
    echo '</pre>';
    echo '<br>';

    var_dump(empty($data));
    echo '<br>';
});

/*ELoquent ORM -------------------------------------------------------------*/
/*--------------------------------------------------------------------------*/

Route::get('model/selectAll', function() {
    $data = App\qt_240::all()->tojSon();

    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

Route::get('model/where', function() {
    $data = App\qt_240::where('id', 2)->get()->toArray();

    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

Route::get('model/insert', function() {
    $table = new App\qt_240;

    $table->monhoc = 'angularJS';
    $table->giatien = 456000;
    $table->giangvien = 'someOne';
    $table->save();
});

Route::get('model/destroy', function() {
    App\qt_240::destroy(2);
});
//relation------------------------------------------
Route::get('relation/1-n_1', function() {
    $data = App\Product::find(8)->images()->get()->toArray();

    echo '<pre>';
    print_r($data);
    echo '</pre>';
});

/*FORM REQUEST --------------------------------------------------------*/
/*---------------------------------------------------------------------*/

Route::get('form/layout', function() {
    return view('form.layout');
});

Route::get('form/dang-ky', function() {
    return view('form.dangky');
});
Route::post('form/dang-ky-thanh-vien', [
    'as'    => 'postDangKy',
    'uses'   => 'FormController@them'
]);

/*RESPONSES ----------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------*/

Route::get('response/macro', function() {
    return response()->cap('nhanh quá rồi');
});

/*DEMO LOGIN LOGOUT ---------------------------------------------------------------*/
/*---------------------------------------------------------------------------------*/

Route::get('SportNews', 'SportNews\SportNewsController@show');
Route::get('SportNews/LogIn', function() {
    return view('SportNews.login');
});
Route::post('SportNews/CheckLogIn', 'SportNews\SportNewsController@checkLogIn');
Route::get('SportNews/LogOut', 'SportNews\SportNewsController@logOut');
Route::get('SportNews/SignUp', function() {
    return view('SportNews.signup');
});
Route::post('SportNews/MemberRegister', 'SportNews\SportNewsController@register');


















