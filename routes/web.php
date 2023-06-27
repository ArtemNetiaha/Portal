<?php



use Web\SubscribeController;
use Admin\ImageTypeController;
use App\Http\Controllers as Web;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as Admin;



Route::redirect('/', 'posts');

Route::resources([
    'posts' => Web\PostController::class,
    'comments' => Web\CommentController::class,
]);
Route::post('contacts', [Web\ContactController::class, 'store'])->name('contacts.store');
Route::post('changeLocale',[Web\LocaleController::class, 'changeLocale'])->name('change-locale');
Route::get('posts/{post}/add-block',[Web\PostController::class,'addBlock'])->name('posts.add-block');
Route::post('posts/{post}/store-block', [Web\PostController::class, 'storeBlock'])->name('posts.store-block');
Route::get('authors', [Web\AuthorController::class, 'index'])->name('authors.index');
Route::post('blocks/store', [Web\BlockController::class, 'store'])->name('blocks.store');

Route::get('admin', [Admin\AdminController::class, 'index'])
    ->name('admin.index')->middleware(['admin']);

Route::group(['middleware' => 'auth'], function () {

    Route::put('sort', [Admin\AdminController::class, 'sort'])->name('admin.sort');
    Route::put('on-off', [Admin\AdminController::class, 'onOff'])->name('admin.on-off');
    Route::delete('delete-item', [Admin\AdminController::class, 'deleteItem'])->name('admin.deleteItem');

    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource('categories', Admin\CategoryController::class);
        Route::resource('tags', Admin\TagController::class);
        Route::resource('posts', Admin\PostController::class);
        Route::resource('imagetypes', Admin\ImageTypeController::class);
        Route::resource('image', Admin\ImageController::class);
        Route::get('backups/create-from-file', [Admin\BackupController::class, 'createFromFile'])->name('backups.create-from-file');
        Route::resource('backups', Admin\BackupController::class);
        Route::post('backups/{backup}/recover', [Admin\BackupController::class, 'recover'])->name('backups.recover');
        Route::post('backups/store-from-file', [Admin\BackupController::class, 'StoreFromFile'])->name('backups.store-from-file');
        Route::get('backups/{backup}/download', [Admin\BackupController::class, 'download'])->name('backups.download');
        Route::get('contacts',[Admin\ContactController::class, 'index'])->name('contacts.index');
        Route::get('contacts/export',[Admin\ContactController::class, 'export'])->name('contacts.export');
        Route::delete('contacts/{contact}',[Admin\ContactController::class, 'destroy'])->name('contacts.destroy');

       


        Route::resource('settings', Admin\SettingController::class);
        Route::delete('events/truncate', [Admin\EventController::class, 'truncate'])->name('events.truncate');
        Route::delete('events/delete-day', [Admin\EventController::class, 'deleteDay'])->name('events.delete-day');
        Route::resource('events', Admin\EventController::class);
        

    });

    Route::group(['controller' => Web\SubscribeController::class], function () {
        Route::post('subscribe/{user}', 'subscribe')->name('subscribe');
        Route::delete('subscribe/{user}', 'unsubscribe')->name('unsubscribe');
    });

    Route::group(['controller' => Web\UserController::class, 'as' => 'users.'], function () {
        Route::get('users/feed', 'feed')->name('feed');
        Route::get('users/authors', 'authors')->name('authors');
        Route::get('users/readers', 'readers')->name('readers');
        Route::get('users/posts', 'posts')->name('posts');
    });

    Route::group(['controller' => Web\ReactionController::class], function () {
        Route::post('reactions/{post}', 'store')->name('reactions.store');
        Route::delete('reactions/{post}', 'destroy')->name('reactions.destroy');
    });
});
require __DIR__ . '/auth.php';
