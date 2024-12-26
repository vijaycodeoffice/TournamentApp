<?php
namespace App\Repositories;

class TournamentRepository implements TournamentRepositoryInterface
{
    /**
     * Run the tournament logic and determine the final winner.
     *
     * @param array $users List of user names participating in the tournament.
     * @return array Returns an array with all rounds and the final winner.
     */
    public function runTournament(array $users): array
    {
        $rounds = []; // Store all rounds, including groups and results
        $currentRoundUsers = $users; // Start with all users

        // Repeat until we have one final winner
        while (count($currentRoundUsers) > 1) {
            $groups = array_chunk($currentRoundUsers, 2); // Group users into pairs
            $roundResults = []; // To store the current round's results
            $winners = []; // Winners who move to the next round

            foreach ($groups as $group) {
                if (count($group) === 1) {
                    // If only one user is in the group, they win by default
                    $winner = $group[0];
                    $loser = null;
                } else {
                    // Randomly select a winner from the group
                    $winnerIndex = array_rand($group);
                    $winner = $group[$winnerIndex];
                    $loser = $group[1 - $winnerIndex];
                }

                $winners[] = $winner;

                // Store the group result
                $roundResults[] = [
                    'group' => $group,
                    'winner' => $winner,
                    'loser' => $loser,
                ];
            }

            // Save this round's results
            $rounds[] = $roundResults;

            // Winners move to the next round
            $currentRoundUsers = $winners;
        }

        $finalWinner = $currentRoundUsers[0]; // The last remaining user is the final winner

        return [
            'rounds' => $rounds,
            'finalWinner' => $finalWinner,
        ];
    }
}
