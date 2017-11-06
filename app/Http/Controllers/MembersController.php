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
        $members = DB::table('tbs_members')->paginate(5);

        return view('members.index', ['members' => $members]);
    }

    /**
     * Create member
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Roles::all();

        return view('members.create', ['roles' => $roles]);
    }

    public function store(Request $request) {
        $this->validateInput($request);
        $keys = ['fullname', 'email', 'birthday', 'gender', 'role'];
        $input = $this->createQueryInput($keys, $request);
        var_dump($input);die;
        TbsMembers::create($input);

        return redirect()->intended('/member');
    }

    public function edit() {
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
