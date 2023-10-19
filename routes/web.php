<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedUserController;
use App\Http\Livewire\Auth\SetPasswordComponent;


//profile
use App\Http\Livewire\Profile\ProfileComponent;
use App\Http\Livewire\Profile\StaffActivityLog;
use App\Http\Livewire\Profile\ChangePasswordComponent;
use App\Http\Livewire\Profile\UpdateProfilePhoto;

use App\Http\Livewire\SuperAdmin\SuperAdminDashboard;
use App\Http\Livewire\Staff\StaffDashboardComponent;

//transactions routes
use App\Http\Livewire\SuperAdmin\Transactions\TransactionsComponent;
use App\Http\Livewire\SuperAdmin\Transactions\DepositComponent;
use App\Http\Livewire\SuperAdmin\Transactions\WithdrawComponent;


//trades routes
use App\Http\Livewire\SuperAdmin\Trades\TradesComponent;
use App\Http\Livewire\SuperAdmin\Trades\CreateTradeComponent;
use App\Http\Livewire\SuperAdmin\Trades\ShowTradeComponent;
use App\Http\Livewire\SuperAdmin\Trades\TraderHistoryComponent;

//accounts routes
use App\Http\Livewire\SuperAdmin\Accounts\AccountsComponent;
use App\Http\Livewire\SuperAdmin\Accounts\CreateAccountComponent;
use App\Http\Livewire\SuperAdmin\Accounts\ShowAccountComponent;
use App\Http\Livewire\SuperAdmin\Accounts\ExchangeRateComponent;

//users
use App\Http\Livewire\SuperAdmin\Users\UsersComponent;
use App\Http\Livewire\SuperAdmin\Users\EditUserComponent;
use App\Http\Livewire\SuperAdmin\Users\ShowUserComponent;
use App\Http\Livewire\SuperAdmin\Users\CreateUserComponent;
use App\Http\Livewire\SuperAdmin\Users\SendMailtoUser;



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
Route::middleware(['isLoggedIn'])->group(function(){
    Route::get('/', function () {
    return redirect()->route('login');
    })->name('welcome');

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('forget-password');

    Route::get('/set-password/{email}/{token}',SetPasswordComponent::class)->name('set-password'); //applicant verification
    Route::post('/forget-password',[AuthenticatedUserController::class,'forgetpassword'])->name('guest.forget-password'); //applicant verification
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard',[ AuthenticatedUserController::class,'AuthenticatedUserController'])->name('dashboard');
    Route::get('user-logout', [AuthenticatedUserController::class, 'logOutUser'])->name('user.logout');


    //dashboards
    //Route::get('/staff/dashboard',ChampionDashboard::class)->name('staff.dashboard');
    Route::get('/super-admin/dashboard',SuperAdminDashboard::class)->name('super-admin.dashboard');
    Route::get('/staff/dashboard',StaffDashboardComponent::class)->name('staff.dashboard');


    //profile routes
    Route::get('/staff-profile',ProfileComponent::class)->name('profile');
    Route::get('/activity-log',StaffActivityLog::class)->name('activity-log');
    Route::get('/update-profile-photo',UpdateProfilePhoto::class)->name('profile-photo');
    Route::get('/change-password',ChangePasswordComponent::class)->name('change-password');

    //transactions routes
    Route::get('/super-admin/transactions/deposit',DepositComponent::class)->name('transactions.deposit');
    Route::get('/super-admin/transactions/withdraw',WithdrawComponent::class)->name('transactions.withdraw');
    Route::get('/super-admin/transactions',TransactionsComponent::class)->name('transactions.index');

    //trades routes
    Route::get('/trades/create',CreateTradeComponent::class)->name('trades.create');
    Route::get('/trades',TradesComponent::class)->name('trades.index');
    Route::get('/trades/{id}',ShowTradeComponent::class)->name('trades.show');

    //accounts routes
    Route::get('/super-admin/accounts/create',CreateAccountComponent::class)->name('accounts.create');
    Route::get('/super-admin/accounts',AccountsComponent::class)->name('accounts.index');
    Route::get('/super-admin/exchange-rate',ExchangeRateComponent::class)->name('accounts.rate');
    Route::get('/super-admin/accounts/{id}',ShowAccountComponent::class)->name('accounts.show');

    //senior risk manager routes
    Route::middleware(['super-admin'])->group(function(){
        //users routes
        Route::get('/super-admin/users/create',CreateUserComponent::class)->name('users.create');
        Route::get('/super-admin/users',UsersComponent::class)->name('users.index');
        Route::get('/super-admin/users/{id}/edit',EditUserComponent::class)->name('users.edit');
        Route::get('/super-admin/users/{id}/show',ShowUserComponent::class)->name('users.show');
        Route::get('/super-admin/send-mail/{id}',SendMailtoUser::class)->name('users.sendmail');
        Route::get('/trader-history/{id}',TraderHistoryComponent::class)->name('trader.history');

    });

    //risk owner routes
    Route::middleware(['staff'])->group(function(){

    });
});
