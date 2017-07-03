<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Player;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($this->isPost()) {
            /* get player data */
            $playermodel = new Player();

            $columns = ['no', 'name', 'playerid', 'deposit'];
            $where = array(
                ['name', 'LIKE', '%' . $request['search']['value'] . '%', 'OR'],
                ['playerid', 'LIKE', '%' . $request['search']['value'] . '%']
            );
            $players = $playermodel->find_v2($where, true, ['*'], intval($request['length']), intval($request['start']), $columns[intval($request['order'][0]['column'])], $request['order'][0]['dir']);
            $number = intval($request['start']) + 1;
            foreach ($players as &$item) {
                $item['no'] = $number;
                $number++;
            }
            $response_json = array();
            $response_json['draw'] = $request['draw'];
            $response_json['data'] = $players;
            $response_json['recordsTotal'] = $playermodel->getTableCount($where);
            $response_json['recordsFiltered'] = $playermodel->getTableCount($where);
            return $this->__json($response_json);

        }
        $styles = array();
        $scripts = array();
        $scripts[] = 'player.js';
        $this->data['styles'] = $styles;
        $this->data['scripts'] = $scripts;
        $this->data['controller'] = 'player';
        $this->data['title'] = 'Player';
        return view('admin.player.index')->with('data', $this->data);
    }
}
