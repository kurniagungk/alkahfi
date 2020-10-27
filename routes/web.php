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

use App\Http\Controllers\{
    asramaController,
    KelasControler,
    SantriController,
    TagihanController,
    TahunAjaran,
    TransaksiController,
    Auth\LoginController
};
use Illuminate\Support\Facades\{Route, Auth};

Route::group(['middleware' => ['get.menu']], function () {

    Route::get('/cektunggakan', \App\Http\Livewire\cektunggakan\Index::class);

    Route::get('/', [LoginController::class, 'showLoginForm']);

    /*
    Route::group(['middleware' => ['role:admin']], function () {

        Route::get('/colors', function () {
            return view('dashboard.colors');
        });
        Route::get('/typography', function () {
            return view('dashboard.typography');
        });
        Route::get('/charts', function () {
            return view('dashboard.charts');
        });
        Route::get('/widgets', function () {
            return view('dashboard.widgets');
        });
        Route::get('/404', function () {
            return view('dashboard.404');
        });
        Route::get('/500', function () {
            return view('dashboard.500');
        });
        Route::prefix('base')->group(function () {
            Route::get('/breadcrumb', function () {
                return view('dashboard.base.breadcrumb');
            });
            Route::get('/cards', function () {
                return view('dashboard.base.cards');
            });
            Route::get('/carousel', function () {
                return view('dashboard.base.carousel');
            });
            Route::get('/collapse', function () {
                return view('dashboard.base.collapse');
            });

            Route::get('/forms', function () {
                return view('dashboard.base.forms');
            });
            Route::get('/jumbotron', function () {
                return view('dashboard.base.jumbotron');
            });
            Route::get('/list-group', function () {
                return view('dashboard.base.list-group');
            });
            Route::get('/navs', function () {
                return view('dashboard.base.navs');
            });

            Route::get('/pagination', function () {
                return view('dashboard.base.pagination');
            });
            Route::get('/popovers', function () {
                return view('dashboard.base.popovers');
            });
            Route::get('/progress', function () {
                return view('dashboard.base.progress');
            });
            Route::get('/scrollspy', function () {
                return view('dashboard.base.scrollspy');
            });

            Route::get('/switches', function () {
                return view('dashboard.base.switches');
            });
            Route::get('/tables', function () {
                return view('dashboard.base.tables');
            });
            Route::get('/tabs', function () {
                return view('dashboard.base.tabs');
            });
            Route::get('/tooltips', function () {
                return view('dashboard.base.tooltips');
            });
        });
        Route::prefix('buttons')->group(function () {
            Route::get('/buttons', function () {
                return view('dashboard.buttons.buttons');
            });
            Route::get('/button-group', function () {
                return view('dashboard.buttons.button-group');
            });
            Route::get('/dropdowns', function () {
                return view('dashboard.buttons.dropdowns');
            });
            Route::get('/brand-buttons', function () {
                return view('dashboard.buttons.brand-buttons');
            });
        });
        Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
            Route::get('/coreui-icons', function () {
                return view('dashboard.icons.coreui-icons');
            });
            Route::get('/flags', function () {
                return view('dashboard.icons.flags');
            });
            Route::get('/brands', function () {
                return view('dashboard.icons.brands');
            });
        });
        Route::prefix('notifications')->group(function () {
            Route::get('/alerts', function () {
                return view('dashboard.notifications.alerts');
            });
            Route::get('/badge', function () {
                return view('dashboard.notifications.badge');
            });
            Route::get('/modals', function () {
                return view('dashboard.notifications.modals');
            });
        });
        Route::resource('notes', 'NotesController');
    });
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('bread',  'BreadController');   //create BREAD (resource)
        Route::resource('users',        'UsersController')->except(['create', 'store']);
        Route::resource('roles',        'RolesController');
        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');
        Route::prefix('menu/element')->group(function () {
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () {
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });
        Route::prefix('media')->group(function () {
            Route::get('/',                 'MediaController@index')->name('media.folder.index');
            Route::get('/folder/store',     'MediaController@folderAdd')->name('media.folder.add');
            Route::post('/folder/update',   'MediaController@folderUpdate')->name('media.folder.update');
            Route::get('/folder',           'MediaController@folder')->name('media.folder');
            Route::post('/folder/move',     'MediaController@folderMove')->name('media.folder.move');
            Route::post('/folder/delete',   'MediaController@folderDelete')->name('media.folder.delete');;

            Route::post('/file/store',      'MediaController@fileAdd')->name('media.file.add');
            Route::get('/file',             'MediaController@file');
            Route::post('/file/delete',     'MediaController@fileDelete')->name('media.file.delete');
            Route::post('/file/update',     'MediaController@fileUpdate')->name('media.file.update');
            Route::post('/file/move',       'MediaController@fileMove')->name('media.file.move');
            Route::post('/file/cropp',      'MediaController@cropp');
            Route::get('/file/copy',        'MediaController@fileCopy')->name('media.file.copy');
        });
        route::prefix('pondok')->group(function () {

            Route::get('/', 'AlkahfiController@index');
            Route::get('/pengurus', 'AlkahfiController@pengurus');
            Route::get('/asrama', 'AlkahfiController@asrama');
            Route::get('/pos_uang', 'AlkahfiController@pos_uang');
            Route::get('/jns_bayar', 'AlkahfiController@jns_bayar');
            Route::get('/jurnal', 'AlkahfiController@jurnal');
            Route::get('/lap_byr_santri', 'AlkahfiController@lap_byr_santri');
            Route::get('/lap_syahriah', 'AlkahfiController@lap_syahriah');
            Route::get('/thn_ajaran', 'AlkahfiController@thn_ajaran');
            Route::get('/lap_maulid', 'AlkahfiController@lap_maulid');
            Route::get('/lap_khaul', 'AlkahfiController@lap_khaul');
            Route::get('/lap_daftarbaru', 'AlkahfiController@lap_daftarbaru');
            Route::get('/mutasi', 'AlkahfiController@mutasi');
            Route::get('/akun', 'AlkahfiController@akun');
        });



        Route::get('tagihan/tambah', 'TagihanController@tambah')->name('tagihan.tambah');
        Route::get('/transaksi/cetakb/{Idsantri}/{Idtagihan}', 'TransaksiController@printTagihanBulanan')->name('transaksi.cetak');
        Route::get('/transaksi/cetakc/{Idsantri}/{Idtagihan}', 'TransaksiController@printTagihanCicil')->name('transaksi.cetakc');
        Route::get('/transaksi/kwitansi/{id}', 'TransaksiController@kwitansiBulanan')->name('transaksi.kwitansi');
        Route::get('/transaksi/kwitansicicilan/{id}', 'TransaksiController@kwitansicicilan')->name('transaksi.kwitansicicilan');


        Route::resources([
            'santri' => 'SantriController',
            'asrama' => 'asramaController',
            'tagihan' => 'TagihanController',
            'tahun' => 'TahunAjaran',
            'kelas' => 'KelasControler'
        ]);


        Route::resource('transaksi', 'TransaksiController', [
            'only' => ['index', 'create', 'store']
        ]);

        route::prefix('asrama')->group(function () {
            Route::POST('/getBasicData', 'asramaController@getBasicData')->name('asrama.GetData');
        });

        Route::get('/print', 'Laporan@printTagihanBulanan');
        Route::get('/prints', 'Laporan@printTagihanCicil');

        route::prefix('pengurus')->group(function () {
            Route::get('/', 'pengurus@index');
            Route::get('/create', 'pengurus@create');
            Route::get('/photos/{asrama}/edit', 'pengurus@edit');
        });

        route::prefix('pengguna')->group(function () {
            Route::get('/', 'pengguna@index');
            Route::get('/create', 'pengguna@create');
            Route::get('/photos/{asrama}/edit', 'pengguna@edit');
        });

        route::prefix('bayarjenis')->group(function () {
            Route::get('/', 'bayarjenis@index');
            Route::get('/create', 'bayarjenis@create');
            Route::get('/{asrama}/edit', 'bayarjenis@edit');
            Route::get('/tertagih', 'bayarjenis@tertagih');
        });

        route::prefix('bayarpos')->group(function () {
            Route::get('/', 'bayarpos@index');
            Route::get('/create', 'bayarpos@create');
            Route::get('/{asrama}/edit', 'bayarpos@edit');
        });

        route::prefix('jurnal')->group(function () {
            Route::get('/', 'jurnal@index');
            Route::get('/create', 'jurnal@create');
            Route::get('/{asrama}/edit', 'jurnal@edit');
        });

        route::prefix('laporan')->group(function () {
            Route::get('/', 'laporan@index');
            Route::get('/create', 'laporan@create');
            Route::get('/{asrama}/edit', 'laporan@edit');
        });

        route::prefix('santrimutasi')->group(function () {
            Route::get('/', 'santrimutasi@index');
            Route::get('/create', 'santrimutasi@create');
            Route::get('/{asrama}/edit', 'santrimutasi@edit');
        });



        route::prefix('pengeluaran')->group(function () {
            Route::get('/', 'pengeluaran@index');
            Route::get('/create', 'pengeluaran@create');
            Route::get('/{asrama}/edit', 'pengeluaran@edit');
        });
    });
    Route::resource('resource/{table}/resource', 'ResourceController')->names([
        'index'     => 'resource.index',
        'create'    => 'resource.create',
        'store'     => 'resource.store',
        'show'      => 'resource.show',
        'edit'      => 'resource.edit',
        'update'    => 'resource.update',
        'destroy'   => 'resource.destroy'
    ]);
*/


    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    Route::group(['middleware' => ['role:admin']], function () {
        //Route::livewire('setting/user/create', 'setting.create-user')->layout('dashboard.base')->name('user.create');
        //Route::livewire('setting/user', 'setting.index-user')->layout('dashboard.base')->name('setting.user');
        //  Route::livewire('setting/user/{id}/edit', 'setting.useredit')->layout('dashboard.base')->name('user.edit');
    });


    Route::group(['middleware' => ['role:bendahara']], function () {



        Route::get('/dashboard', \App\Http\Livewire\Dashboard\Index::class);


        Route::get('tagihan/tambah', [TagihanController::class, 'tambah'])->name('tagihan.tambah');
        Route::get('/transaksi/cetakb/{santri_id}/{tagihan_id}', [TransaksiController::class, 'printTagihanBulanan'])->name('transaksi.cetak');
        Route::get('/transaksi/cetakc/{tagihan_id}', [TransaksiController::class, 'printTagihanCicil'])->name('transaksi.cetakc');
        Route::get('/transaksi/kwitansi/{id}', [TransaksiController::class, 'kwitansiBulanan'])->name('transaksi.kwitansi');
        Route::get('/transaksi/kwitansicicilan/{id}', [TransaksiController::class, 'kwitansicicilan'])->name('transaksi.kwitansicicilan');



        Route::resources([
            'santri' => SantriController::class,
            'asrama' => asramaController::class,
            'tagihan' => TagihanController::class,
            'tahun' => TahunAjaran::class
        ]);
        Route::resource('kelas', KelasControler::class, [
            'only' => ['index', 'create', 'store', 'edit']
        ]);

        Route::get('/sekolah', \App\Http\Livewire\Sekolah\Index::class)->name('sekolah');
        Route::get('/sekolah/create', \App\Http\Livewire\Sekolah\Create::class)->name('sekolah.create');
        Route::get('/sekolah/{sekolah}/edit', \App\Http\Livewire\Sekolah\Edit::class)->name('sekolah.edit');

        Route::get('/tagihan/{id}/show', \App\Http\Livewire\Tagihan\Tampil::class)->name('tagihan.tampil');
        Route::get('/transaksi/keluar', \App\Http\Livewire\Transaksi\Keluar::class)->name('transaksi.keluar');

        Route::get('/kelas/naik', \App\Http\Livewire\Kelas\Naik::class)->name('kelas.naik');

        Route::resource('transaksi', TransaksiController::class, [
            'only' => ['index', 'create', 'store']
        ]);





        route::prefix('laporan')->group(function () {
            Route::get('/umum', \App\Http\Livewire\Laporan\Harian::class);
            Route::get('/bulanan', \App\Http\Livewire\Laporan\Bulanan::class);
            //   Route::get('/umum', 'laporan.umum')->layout('dashboard.base');
            //    Route::get('/layout', 'laporan.layout')->layout('dashboard.kosong');
        });

        route::prefix('tunggakan')->group(function () {
            Route::get('/', \App\Http\Livewire\Tunggakan\Index::class);
            // Route::livewire('/cek', 'tunggakan.cek')->layout('dashboard.kosong');
        });
        // Route::get('/tagihan/tampil', function () {
        //     return view('livewire.tagihan.tampil');
        // });





    });
});



/* route::get('/dashboard1', function () {

    return view  ('menu.dashboard')
}); */
