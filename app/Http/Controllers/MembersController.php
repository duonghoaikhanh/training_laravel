<?php

namespace App\Http\Controllers;

use App\Roles;
use App\TbsMembers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller {
    /**
     * Get list member
     * @return array
     */
    public function index() {
        // Get member
        $members = DB::table('tbs_members')
            ->leftJoin('roles', 'tbs_members.role', '=', 'roles.id')
            ->select('tbs_members.*', 'roles.name as role_name')
            ->paginate(5);

        return view('members/index', ['members' => $members]);
    }

    /**
     * Create member
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // Get all role
        $roles = Roles::all();

        return view('members/create', ['roles' => $roles]);
    }

    /**
     * Save DB
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //$this->validateInput($request);
        $keys = ['fullname', 'email', 'birthday', 'gender', 'role'];
        $input = $this->createQueryInput($keys, $request);
        TbsMembers::create($input);

        return redirect()->intended('/member');
    }

    /**
     * Show info member update
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $member = TbsMembers::find($id);
        // Redirect to state list if updating state wasn't existed
        if ($member == null || count($member) == 0) {
            return redirect()->intended('/member');
        }

        // Get all role
        $roles = Roles::all();

        return view('members/edit', ['member' => $member, 'roles' => $roles]);
    }

    /**
     * Update save db
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request) {
        $member = TbsMembers::findOrFail($id);
        if ($member == null || count($member) == 0) {
            return redirect()->intended('/member/edit');
        }
        $keys = ['fullname', 'email', 'birthday', 'gender', 'role'];
        $input = $this->createQueryInput($keys, $request);
        TbsMembers::where('id', $id)
            ->update($input);

        return redirect()->intended('/member');
    }

    /**
     * Remove member
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        TbsMembers::where('id', $id)->delete();
        return redirect()->intended('/member');
    }

    /**
     * validateInput
     * @param $request
     */
    private function validateInput($request) {
        $this->validate($request, [
            'fullname' => 'required|max:256',
            'email' => 'required|max:256',
            'birthdate' => 'required',
            'gender' => 'required',
            'role' => 'required'
        ]);
    }

    /**
     * createQueryInput
     *
     * @param $keys
     * @param $request
     * @return array
     */
    private function createQueryInput($keys, $request) {
        $queryInput = [];
        for($i = 0; $i < sizeof($keys); $i++) {
            $key = $keys[$i];
            $queryInput[$key] = $request[$key];
        }

        return $queryInput;
    }
}
