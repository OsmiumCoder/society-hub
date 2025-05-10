<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\University;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @throws AuthorizationException
     */
    public function index(): Response
    {
        $this->authorize('viewAny', University::class);

        return Inertia::render('Universities/Index', [
            'universities' => University::paginate(10),
            'can' => [
                'create' => auth()->user()->can('create', University::class),
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @throws AuthorizationException
     */
    public function create(): Response
    {
        $this->authorize('create', University::class);

        return Inertia::render('Universities/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @throws AuthorizationException
     */
    public function store(StoreUniversityRequest $request): RedirectResponse
    {
        $this->authorize('create', University::class);

        University::create($request->validated());

        return redirect()->route('universities.index')
            ->with('success', 'University created successfully.');
    }

    /**
     * Display the specified resource.
     * @throws AuthorizationException
     */
    public function show(University $university): Response
    {
        $this->authorize('view', $university);

        return Inertia::render('Universities/Show', [
            'university' => $university,
            'can' => [
                'update' => auth()->user()->can('update', $university),
                'delete' => auth()->user()->can('delete', $university),
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @throws AuthorizationException
     */
    public function edit(University $university): Response
    {
        $this->authorize('update', $university);

        return Inertia::render('Universities/Edit', [
            'university' => $university,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws AuthorizationException
     */
    public function update(UpdateUniversityRequest $request, University $university): RedirectResponse
    {
        $this->authorize('update', $university);

        $university->update($request->validated());

        return redirect()->route('universities.index')
            ->with('success', 'University updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @throws AuthorizationException
     */
    public function destroy(University $university): RedirectResponse
    {
        $this->authorize('delete', $university);

        $university->delete();

        return redirect()->route('universities.index')
            ->with('success', 'University deleted successfully.');
    }
}
