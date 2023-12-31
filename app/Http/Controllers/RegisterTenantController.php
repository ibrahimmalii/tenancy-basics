<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterTenantRequest;
use App\Models\Tenant;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterTenantController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(RegisterTenantRequest $request)
    {
        $validated = $request->validated();
        $tenant = Tenant::create($validated);
        $tenant->createDomain(['domain' => $request->domain]);

        redirect(tenant_route($tenant->domains()->first()->domain, 'dashboard'));
    }
}
