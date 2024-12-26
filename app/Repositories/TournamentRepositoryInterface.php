<?php
namespace App\Repositories;

interface TournamentRepositoryInterface
{
    /**
     * Run the tournament logic and determine the final winner.
     *
     * @param array $users List of user names participating in the tournament.
     * @return array Returns an array with all rounds and the final winner.
     */
    public function runTournament(array $users): array;
}
