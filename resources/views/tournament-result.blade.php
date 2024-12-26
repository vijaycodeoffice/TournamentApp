<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f8fc;
            font-family: 'Arial', sans-serif;
        }

        .tournament-header {
            background: linear-gradient(135deg, #6c63ff, #4ca1af);
            color: white;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .round-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
        }

        .round-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .group-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .group {
            text-align: center;
            padding: 10px 15px;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            min-width: 120px;
        }

        .group span {
            display: block;
            font-size: 14px;
        }

        .winner {
            color: #28a745;
            font-weight: bold;
        }

        .loser {
            color: #dc3545;
            font-style: italic;
        }

        .arrow {
            font-size: 1.2rem;
            color: #6c63ff;
            margin: 20px 0;
        }

        .final-winner-card {
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: white;
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .final-winner {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <!-- Header -->
    <div class="tournament-header">
        <h1>Tournament Results</h1>
        <p>Follow the arrows to see how the champion emerged!</p>
    </div>

    <!-- Rounds -->
    @foreach ($rounds as $roundIndex => $groups)
        <div class="round-container">
            <div class="round-title">Round {{ $roundIndex + 1 }}</div>
            <div class="group-container">
                @foreach ($groups as $groupResult)
                    <div class="group">
                        @foreach ($groupResult['group'] as $user)
                            <span class="{{ $user === $groupResult['winner'] ? 'winner' : 'loser' }}">
                                {{ $user }}
                                @if ($user === $groupResult['winner'])
                                    (Winner)
                                @else
                                    (Loser)
                                @endif
                            </span>
                        @endforeach
                    </div>
                @endforeach
            </div>
            @if (!$loop->last)
                <div class="arrow">⬇</div>
            @endif
        </div>
    @endforeach

    <!-- Final Winner -->
    <div class="final-winner-card mt-5">
        <h3>The Champion Is:</h3>
        <div class="final-winner">{{ $finalWinner }}</div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
