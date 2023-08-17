<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberStoreRequest;
use App\Http\Requests\MemberUpdateRequest;
use App\Http\Resources\MemberCollection;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MemberController extends Controller
{
    public function index(Request $request): Response
    {
        $members = Member::all();

        return new MemberCollection($members);
    }

    public function store(MemberStoreRequest $request): Response
    {
        $member = Member::create($request->validated());

        return new MemberResource($member);
    }

    public function show(Request $request, Member $member): Response
    {
        return new MemberResource($member);
    }

    public function update(MemberUpdateRequest $request, Member $member): Response
    {
        $member->update($request->validated());

        return new MemberResource($member);
    }

    public function destroy(Request $request, Member $member): Response
    {
        $member->delete();

        return response()->noContent();
    }
}
