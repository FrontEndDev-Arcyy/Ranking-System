<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('CSS/summary.css')}}">
    <title>Summary</title>
</head>
<body>
    <div class="header">
    <h1>SY 2024-2025</h1>
    <h1>SUMMARY</h1></div>  

    <div>
    <h2>A. Academic Attainment:</h2>
    <h3>1. attaintment and growth here</h3>
  </div>

  <div>
    <h2>Years of experience:</h2>
  </div>

  @php
$points = [
    'A. Efficiency Rating' => 31.0,
    'B. Productive Scholarship' => 0.80,
    'C. Experience' => 3.332,
    'Community Extension Services' => 1.60,
];

// Calculate total points
$totalPoints = array_sum($points);
@endphp


  <div class="table-content">
    <table class="R-C-table">
        <tr>
            <th>Ranking Criteria</th>
            <th>Points</th>
        </tr>
        @foreach ($points as $criteria  => $point)
        <tr>
            <td>{{ $criteria }}</td>
            <td align="center">{{number_format($point, 2) }}</td>
        </tr>
        @endforeach
        <tr>
            <td>Total (Maximum of 70 points)</td>
            <td align="center">{{number_format($totalPoints, 2) }}</td>
        </tr>
    </table>
  </div>

  <div class="signature-form">
    <h2>Rank:</h2>
    <h3>Prepared by:</h3>
    <h3>Verified and Reviewed by Rank and Tenure COmmittee</h3>
    <h3>Date:</h3>
    <h3>Name & signiture of member</h3>
    <h3>Name & signiture of chair</h3>

        <div class="approved-section">
            <h3>Approved</h3>
            <h3>Date:</h3>
            <h3>President</h3>
        </div>
  </div>

</body>
</html>