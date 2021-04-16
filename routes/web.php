    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PostController;
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

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/table', function () {
        return view('table.table');
    });

    Route::get('/data-table', function () {
        return view('table.data-table');
    });


        // Route::get('/post/create',[App\Http\Controllers\PostController::class,'create']);
        // Route::post('/post/store',[App\Http\Controllers\PostController::class,'store']);
        // Route::get('/post',[App\Http\Controllers\PostController::class,'index']);
        // Route::get('/post/{id}',[App\Http\Controllers\PostController::class,'show']);
        // Route::get('/post/{id}/edit',[App\Http\Controllers\PostController::class,'edit']);
        // Route::put('/post/{id}',[App\Http\Controllers\PostController::class,'update']);
        // Route::delete('/post/{id}',[App\Http\Controllers\PostController::class,'destroy']);

        Route::resource('post', PostController::class);


    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
