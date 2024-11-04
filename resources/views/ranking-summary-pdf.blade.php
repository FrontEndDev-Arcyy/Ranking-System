<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summary</title>
    <style>
        * Styling directly in Blade for the header, logo, and text */

body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: white;
    line-height: 1.5;
}

.header {
    padding: 10px 20px;
    background-color: #007BFF;
}

.site-header {
    display: flex;           /* Flexbox for horizontal alignment */
    align-items: center;     /* Vertically center logo and text */
}

.logo {
    width: 50px;             /* Adjust logo size */
    height: auto;            /* Maintain logo aspect ratio */
    margin-right: 10px;      /* Space between logo and text */
}

.site-title {
    color: black;          /* White text color */
    font-size: 24px;         /* Font size */
    margin: 0;               /* Remove default margin from h1 */
}

.title-header {
    max-width: 1500px; /* Increased from 800px */
    width: 95%; /* Added to ensure some margin on very wide screens */
    margin: 0 auto;
    padding: 30px; /* Increased from 20px for more internal space */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.title-header h1 {
    display: grid;
    place-items: center;
    margin-bottom: 30px;
}

.title-header h2 {
    display: grid;
    place-items: center;
    margin-bottom: 30px;
}

legend {
    display: block;
    margin-bottom: 5px;
    font-size: 1.5em; /* Increase font size */
}

.name-office {
    display: flex;
    justify-content: space-between;
}

.name-only, .office-only {
    width: 48%;
    margin-bottom: 10px;
}

.first-container {
    max-width: 1500px; /* Increased from 800px */
    width: 95%; /* Added to ensure some margin on very wide screens */
    margin: auto auto 10px auto;
    padding: 30px; /* Increased from 20px for more internal space */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.academic, .years, .ranks {
    font-size: 1.5em; /* Increase font size */
    margin-bottom: 15px; /* Space below legend */
}

.academic-area, .years-area, .rank-area {
    flex: 1 1 1 50%;
    margin: 0 0 10px 0;
}

.second-container {
    max-width: 1500px;
    width: 95%;
    margin: auto auto 10px auto;
    padding: 30px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #2EA2F1;
}

/* Styles for the table */
.second-container table {
    width: 100%;
    border-collapse: collapse;
}

.second-container th, .second-container td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.second-container th {
    background-color: #f2f2f2;
}


.signature-header, .footer {
    display: flex;
    justify-content: space-between;
    margin-bottom: 50px;
    margin-top: 20px;
}

.signature-header div, .footer div {
    flex-basis: 45%;
}
.signature-header div:last-child, .footer div:last-child {
    text-align: left;
}
.line {
    border-top: 1px solid black;
    margin-top: 30px;
}
.verified {
    text-align: center;
    margin: 100px 0;
}
.verified .line {
    width: 60%;
    margin: 0 auto 5px;
}
.signatures {
    display: flex;
    justify-content: space-between;
    margin-bottom: 100px;
}
.signature {
    flex-basis: 30%;
    text-align: center;
}
.footer .line {
    margin-top: 30px;
}
.president {
    text-align: center;
    margin-top: 5px;
    align-items: center;
    display: flex;
    flex-direction: column;
}
    </style>
</head>
<body>
    <div class="header">
        <header class="site-header">
            <img src="{{ public_path('Logo/fsuu2_1.png')}}" alt="University Logo" class="logo">
            <h2 class="site-title">{{ $title }}</h2>
        </header>
    </div>

    <br>

    <div class="title-header">
        <h1>S.Y. 2023-2024 Ranking Summary</h1>
        <br>
        <div class="name-office">
            <div class="name-only">
                <legend>Name: {{ $name }}</legend>
            </div>
            <div class="office-only">
                <legend>Office: {{ $office }}</legend>
            </div>
        </div>
    </div>

    <div class="first-container">
        <div class="academic-area">
            <legend class="academic">Academic Attainment</legend>
            <ol>
                <li>Bachelor of Arts in Philippine Literature</li>
                <li>Master of Arts</li>
            </ol>
        </div>
        <div class="years-area">
            <legend class="years">Years of Experience (FSUU)</legend>
            <ul>
                <li>4 years</li>
            </ul>
        </div>
        <div class="rank-area">
            <legend class="ranks">Rank:</legend>
            <ul>
                <li>Teacher 2</li>
            </ul>
        </div>
    </div>

    <div class="second-container">
        <table>
            <thead>
                <tr>
                    <th>Ranking Criteria</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A. Efficiency Rating</td>
                    <td></td>
                </tr>
                <tr>
                    <td>B. Productive Scholarship</td>
                    <td></td>
                </tr>
                <tr>
                    <td>C. Experience</td>
                    <td></td>
                </tr>
                <tr>
                    <td>D. Community Extension Services</td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total (Max of 70 pts)</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
<br>
    <div class="signature-header">
        <div class="prepared">
            Prepared by:
            <div class="line"></div>
        </div>
        <div class="date">
            Date:
            <div class="line"></div>
        </div>
    </div>

    <div class="verified">
        <div class="line"></div>
        Verified and Reviewed by Rank and Tenure Committee
    </div>

    <div class="signatures">
        <div class="signature">
            <div class="line"></div>
            Name & Signature of Member
        </div>
        <div class="signature">
            <div class="line"></div>
            Name & Signature of Member
        </div>
        <div class="signature">
            <div class="line"></div>
            Name & Signature of Chair
        </div>
    </div>

    <div class="footer">
        <div>
            Approved by:
            <div class="line"></div>
            <div class="president">President</div>
        </div>
        <div>
            Date:
            <div class="line"></div>
        </div>
    </div>
</body>
</html>