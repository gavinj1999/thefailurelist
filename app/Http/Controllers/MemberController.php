<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Constituency;
use Inertia\Inertia;
use App\Models\Party;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('party_id')->with('constituency')->with('election')->with(['opposition', 'party', 'government'])->get();
        $constituencies = Constituency::with('geometry')->get();
        $parties = Party::orderBy('name')->get();
        return Inertia::render(
            'Members/Index',
            [
                'members' => $members,
                'parties' => $parties,
                'constituencies' => $constituencies
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $member = Member::where('slug', $slug)->with(['party','government','opposition','election'])->first();
        $constituency = Constituency::where('currentRepresentationId',$member->member_id)->with('geometry')->first();

        return Inertia::render(
            'Members/Show',
            [
                'member' => $member,
                'constituency' => $constituency
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
