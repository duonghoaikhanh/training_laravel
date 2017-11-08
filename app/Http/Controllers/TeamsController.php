<?php

namespace App\Http\Controllers;

use App\TbsMembers;
use App\TbsTeams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TeamsController extends Controller {

    /**
     * Get list team
     * @return array
     */
    public function index() {
        // Get Team
        $teams = DB::table('tbs_teams')
            ->paginate(5);

        return view('teams/index', ['teams' => $teams]);
    }

    /**
     * Create team
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // Get all role
        $members = DB::table('tbs_members')
            ->leftJoin('roles', 'tbs_members.role', '=', 'roles.id')
            ->select('tbs_members.*', 'roles.name as role_name')
            ->paginate(20);

        return view('teams/create', ['members' => $members]);
    }

    /**
     * Save DB
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // Get data
        $dataInput = Input::all();
        $keyTeams = ['name', 'description', 'total_member'];
        $inputTeam = $this->createQueryInput($keyTeams, $request);

        // Count total member
        $inputTeam['total_member'] = count($dataInput['memberIds']);

        // Insert teams
        $team = TbsTeams::create($inputTeam);
        $insertedId = $team->id;

        // Insert team_member
        if (count($dataInput['memberIds']) > 0) {
            // Array insert
            $arrayInsert = array();
            foreach ($dataInput['memberIds'] as $data) {
                $arrayInsert[] = array('team_id' => $insertedId, 'member_id' => $data);
            }
            DB::table('tbs_team_member')->insert($arrayInsert);
        }

        return redirect()->intended('/team');
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
