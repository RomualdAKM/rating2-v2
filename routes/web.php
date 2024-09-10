<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EvaluateController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\UserPrintController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\MailMessageController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\SolicitationController;
use App\Http\Controllers\FaceRecognitionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::post('lang', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::match(['get', 'post'], '/y$10$wHsZAdDo8uF2YZpyoZiQesGDTOdXRh1BQjFcTs/{id}', [WelcomeController::class, 'index']);
Route::match(['get', 'post'], '/y$10$wHsZAdDo8uF2YZpyoZiQesGDTOdXRh1BQ/{id}', [RequestController::class, 'index']);


Route::post('pay', [PaymentController::class, 'pay'])->name('payment');
Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);


Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');


Route::match(['get', 'post'], '/information', [InfoController::class, 'info'])->name('information.info');

Route::post('/saveinfo', [InfoController::class, 'store'])->name('saveinfo.store');


Route::get('/conditions', function () {
    return view('cgu');
});
Route::get('/mentions', function () {
    return view('mention');
});

Route::get('/merci', function () {
    return view('thank');
});

Route::get('/clauses', function () {
    return view('rgpd');
});

Route::get('/', function () {
    return view('landing');
});
Route::get('/rgpd', function () {
    return view('rgpd');
});

Route::get('/tarif', function () {
    return view('pricing');
})->name('pricing');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login2', function () {
    return view('auth.login2');
})->name('login2');


Route::get('/done', function () {
    return view('done');
});

Route::get('/order-done', function () {
    return view('order-done');
});

Route::get('/complain-done', function () {
    return view('complain-done');
});

Route::post('/voice', [WelcomeController::class, 'voice']);
Route::post('/order-store', [WelcomeController::class, 'order'])->name('store.order');
Route::post('/complain-store', [WelcomeController::class, 'complain'])->name('store.complain');

Route::get('/migrate', function () {
    Artisan::call('migrate');
    dd('migrated!');
});

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    dd('optimize!');
});

Route::get('/fresh', function () {
    Artisan::call('migrate:fresh');
    dd('fresh!');
});

Route::get('/valid', [PlaceController::class,'valid'])->name('valid');
Route::get('/valided', [PlaceController::class,'valided'])->name('valided');


Route::middleware('auth')->group(function () {
    Route::post('/markAsRead', function () {
        foreach (Auth::user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return back();
    })->name('markAsRead');

    Route::post('/notifications/{id}', function ($id) {
        $notification = Auth::user()->unreadNotifications->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        }
        return back();
    })->name('notifications.read');

    Route::get('/dashboard', HomeController::class)->name('dashboard');
    Route::get('/user/print/{user}', [UserController::class, 'print'])->name('user.print');
    Route::get('/solicitation/print', [SolicitationController::class, 'print'])->name('solicitation.print');
    Route::get('/user/print2/{user}', [UserPrintController::class, 'print'])->name('user.print2');
    Route::resource('/structure', StructureController::class);
    Route::resource('/faq', FaqController::class);
   
    Route::get('/faq-structure', [FaqController::class, 'structure'])->name('faq-structure.index');
    // Route::resource('faq', FAQController::class);

    Route::resource('/place', PlaceController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/collaborator', CollaboratorController::class);
    Route::resource('/solicitation', SolicitationController::class);
    Route::resource('/quiz', QuizController::class);
    Route::resource('/evaluate', EvaluateController::class);
    Route::resource('/staff', StaffController::class);
    Route::get('/voices', [VoiceController::class, 'index'])->name('voice.index');
    Route::resource('/customer', CustomerController::class);
    Route::resource('/chat', ChatController::class);
    Route::resource('/message', MailMessageController::class);
    Route::resource('/complain', ComplainController::class);
    Route::resource('/order', OrderController::class);
    Route::get('/answer/{id}', [EvaluateController::class, 'answer'])->name('answer.list');
    //Route::get('/checkin', [FaceRecognitionController::class, 'checkin'])->name('attendance.checkin');
    Route::get('/attendance/verify-id', [FaceRecognitionController::class, 'showVerifyIdForm'])->name('attendance.verify-id');
    Route::post('/attendance/verify-id', [FaceRecognitionController::class, 'verifyId'])->name('attendance.verify-id');
    Route::post('/attendance/facial-analysis', [FaceRecognitionController::class, 'facialAnalysis'])->name('attendance.facial-analysis');
    Route::post('/attendance/mark-arrival', [FaceRecognitionController::class, 'markArrival'])->name('attendance.mark-arrival');
    Route::post('/attendance/mark-departure', [FaceRecognitionController::class, 'markDeparture'])->name('attendance.mark-departure');
    Route::post('/consent', function () {
        $user = User::find(Auth::id());
        $user->consent = true;
        $user->save();
        return back();
    })->name('chat.consent');
});


if (!function_exists('setEnvValue')) {
    function setEnvValue($key, $value)
    {
        $path = base_path('.env');

        if (file_exists($path)) {
            // Lire le fichier .env
            $env = file_get_contents($path);

            // Échapper la valeur si elle contient des espaces
            // if (strpos($value, ' ') !== false) {
            //     $value = '"' . $value . '"';
            // }

            // Vérifier si la clé existe déjà dans le fichier
            if (strpos($env, "{$key}=") !== false) {
                // Remplacer la ligne existante
                $env = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $env);
            } else {
                // Ajouter la nouvelle clé à la fin du fichier
                $env .= "\n{$key}={$value}";
            }

            // Écrire les modifications dans le fichier .env
            file_put_contents($path, $env);
        }
    }
}

Route::get('/env', function () {
    setEnvValue('APP_NAME', 'Avis Client');

    // Recharger la configuration
    Artisan::call('config:clear');
    Artisan::call('config:cache');

    // Vérifier la nouvelle valeur
    $avis = config('app.name');
    dd($avis);
});

Route::get('/envtrue', function () {
    setEnvValue('APP_NAME', 'Avis-Client');

    // Recharger la configuration
    Artisan::call('config:clear');
    Artisan::call('config:cache');

    // Vérifier la nouvelle valeur
    $avis = config('app.name');
    dd($avis);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::post('/newsletter', [NewsletterController::class, 'save'])->name('newsletter.save');

Route::post('/contact', [ContactController::class, 'store'])->name('save.contact');

require __DIR__ . '/auth.php';
