<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\ProfileController;
use App\Http\Controllers\Tenant\UserController;
use App\Models\Project;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Features\UserImpersonation;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/


Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    /*
    Route::get('/', function () {
        dd(tenant()->toArray());
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    */

    Route::get('/', function () {
        return view('tenant.welcome');
    });


    Route::get('/dashboard', function () {
        return view('tenant.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users', UserController::class);
        // });


        Route::get('projects', function () {
            return Project::all();
        })->name('projects.index');


        Route::get('projects', function () {
            return Project::all(); // Returns all projects for the current tenant
        })->name('projects.index');

        Route::post('projects', function (Request $request) {
            $project = Project::create($request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]));
            return response()->json($project, 201);
        })->name('projects.store');

        Route::get('projects/{project}', function (Project $project) {
            return $project; // Automatic tenant scoping ensures only tenant-specific projects are accessible
        })->name('projects.show');

        Route::put('projects/{project}', function (Request $request, Project $project) {
            $project->update($request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]));
            return response()->json($project);
        })->name('projects.update');

        Route::delete('projects/{project}', function (Project $project) {
            $project->delete();
            return response()->noContent();
        })->name('projects.destroy');
    });

    Route::get('/impersonate/{token}', function ($token) {
        return UserImpersonation::makeResponse($token);
    });


    require __DIR__ . '/tenant-auth.php';
});
