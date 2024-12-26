<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TournamentRepositoryInterface;

class TournamentController extends Controller
{

    protected $tournamentRepository;

    /**
     * TournamentController constructor.
     *
     * @param TournamentRepositoryInterface $tournamentRepository
    */
    public function __construct(TournamentRepositoryInterface $tournamentRepository)
    {
        $this->tournamentRepository = $tournamentRepository;
    }

    /**
     * Index page for add users and start tournament.
     *
     * @param 
     * @return \Illuminate\View\View
    */

    public function index()
    {
        return view('tournament');
    }

    /**
     * Start the tournament and display the results.
     *
     * @param Request $request
     * @return \Illuminate\View\View
    */
    public function startTournament(Request $request)
    {
        $users = $request->input('users'); // Get users from the form
        $result = $this->tournamentRepository->runTournament($users);

        return view('tournament-result', [
            'rounds' => $result['rounds'],
            'finalWinner' => $result['finalWinner'],
        ]);
    }
    
}
