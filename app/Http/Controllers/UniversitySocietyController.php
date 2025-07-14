<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocietyRequest;
use App\Http\Requests\UpdateSocietyRequest;
use App\Models\Society;
use App\Models\University;
use App\SocietyMemberRole;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UniversitySocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(University $university)
    {
        $this->authorize('viewAny', [Society::class, $university]);

        $societies = $university->societies()
            ->paginate(10);

        return Inertia::render('societies/Index', [
            'university' => $university,
            'societies' => $societies,
            'can' => [
                'create' => auth()->user()->can('create', Society::class),
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     */
    public function create(University $university): Response
    {
        $this->authorize('create', [Society::class, $university]);

        return Inertia::render('societies/Create', [
            'university' => $university,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocietyRequest $request, University $university): RedirectResponse
    {
        $society = $university->societies()->create($request->validated());

        $society->members()->attach(auth()->id(), ['role' => SocietyMemberRole::OWNER]);

        return redirect()->route('universities.societies.show', [$university, $society])
            ->with('success', 'Society created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @throws AuthorizationException
     */
    public function show(University $university, Society $society): Response
    {
        $this->authorize('view', $society);

        return Inertia::render('societies/Show', [
            'university' => $university,
            'society' => $society,
            'can' => [
                'update' => auth()->user()->can('update', $society),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @throws AuthorizationException
     */
    public function edit(University $university, Society $society): Response
    {
        $this->authorize('update', $society);

        return Inertia::render('societies/Edit', [
            'university' => $university,
            'society' => $society,
            'can' => [
                'update' => auth()->user()->can('update', $society),
                'delete' => auth()->user()->can('delete', $society),
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocietyRequest $request, University $university, Society $society): RedirectResponse
    {
        $society->update($request->validated());

        return redirect()->route('universities.societies.show', [$university, $society])
            ->with('success', 'Society updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws AuthorizationException
     */
    public function destroy(University $university, Society $society): RedirectResponse
    {
        $this->authorize('delete', $society);

        $society->delete();

        return redirect()->route('universities.societies.index', $university)
            ->with('success', 'Society deleted successfully.');
    }
}
