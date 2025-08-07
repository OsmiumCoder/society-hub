<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocietyMemberRequest;
use App\Http\Requests\UpdateSocietyMemberRequest;
use App\Models\Society;
use App\Models\SocietyMember;
use Inertia\Inertia;

class SocietyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Society $society)
    {
        $this->authorize('viewAny', [SocietyMember::class, $society]);

        return Inertia::render('society-members/Index', [
            'university' => $society->university,
            'society' => $society,
            'members' => $society->members()->paginate(20),
            'can' => [
                'create' => auth()->user()->can('create', [SocietyMember::class, $society]),
                'update' => auth()->user()->can('update', [SocietyMember::class, $society]),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocietyMemberRequest $request, Society $society)
    {
        $this->authorize('create', [SocietyMember::class, $society]);

        // TODO

        return redirect()->route('societies.society-members.index', $society)
            ->with('success', 'Society member created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocietyMemberRequest $request, Society $society, SocietyMember $societyMember)
    {
        $this->authorize('update', [SocietyMember::class, $society, $societyMember]);

        // TODO

        return redirect()->route('societies.society-members.index', $society)
            ->with('success', 'Society member updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Society $society, SocietyMember $societyMember)
    {
        $this->authorize('delete', [SocietyMember::class, $society, $societyMember]);

        // TODO

        return redirect()->route('societies.society-members.index', $society)
            ->with('success', 'Society member deleted successfully.');
    }
}
