<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css')}}">
    <title>FSUU Ranking System</title>
</head>
<body>
    <div class="header">
        <header class="site-header">
            <img src="{{ asset('Logo/fsuu2_1.png')}}" alt="University Logo" class="logo">
            <h2 class="site-title">Father Saturnino Urios University</h2>
        </header>
    </div>
    <div class="nav-header">
        <form action="">
        <h1>S.Y. 2023-2024 Ranking System</h1>
            <div class="name-date">
                <div class="name-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="date-group">
                    <label for="date-hired">Date Hired:</label>
                    <input type="date" id="date-hired" name="date-hired">
                </div>
            </div>
    
            <div class="form-group">
                <label for="office">Office Place:</label>
                <input type="text" id="office" name="office">
            </div>
            </form>
    </div>

    &nbsp;
    <div class="container">
        <table class="first-table">
            <legend>Based on Ranks and Control</legend>
            <thead>
                <tr>
                    <th>Present Rank</th>
                    <th>Next Rank</th>
                    <th>Requirements</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <form method="POST" action="{{ route('update.rank') }}">
                            @csrf
                            <select name="present_rank" onchange="this.form.submit()">
                                <option value="">Select Rank</option>
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank }}" {{ $presentRank == $rank ? 'selected' : '' }}>{{ $rank }}</option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('update.next-rank') }}">
                            @csrf
                            <select name="next_rank" onchange="this.form.submit()">
                                <option value="">Select Next Rank</option>
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank }}" {{ $nextRank == $rank ? 'selected' : '' }}>{{ $rank }}</option>
                                @endforeach
                            </select>
                        </form>
                    </td>
                    <td>
                        @if(!empty($currentRequirements))
                            <ul>
                                @foreach($currentRequirements as $requirement)
                                    <li>{{ $requirement }}</li>
                                @endforeach
                            </ul>
                        @else
                            No specific requirements
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    &nbsp;
    <div class="second-container">
        <legend>A. Academic Attainment and Growth</legend>
        
        <form method="POST" action="{{ route('list.store') }}">
            @csrf
            <!-- Add List Item Form -->
            <div>
                <input type="text" name="new_item" placeholder="Enter a new item" required>
                <button type="submit">Add List</button>
            </div>
        </form>

        <!-- Display the List of Items -->
        @if (session('items'))
            <ul>
                @foreach (session('items') as $index => $item)
                    <li>
                        <!-- Display item with Edit and Delete options -->
                        <form method="POST" action="{{ route('list.update', $index) }}" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="text" name="edited_item" value="{{ $item }}" required>
                            <button type="submit">Edit</button>
                        </form>

                        <form method="POST" action="{{ route('list.destroy', $index) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif

        &nbsp;
        <legend>B. Performance</legend>
        <table>
            <thead>
                <tr>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="number"></td>
                </tr>
            </tbody>
        </table>
    </div>

    &nbsp;


    <div class="third-container"><h2>C. Productive Scholarship</h2><br>
        <legend>C.1 Seminar</legend>
        <table class="seminar-table">
            <thead>
                <tr>
                    <th>Documents</th>
                    <th>Topic</th>
                    <th>No. of days</th>
                    <th>Inclusive Dates</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="choices" id="option">
                            <option value="certificate">Certificate</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                    <td><select name="certificate" id="title">
                        <option value="select-title">Select Title</option>
                        <option value="title-1">Identifying Psychosocial Support in the Workplace</option>
                        <option value="title-2">Webinar: Psychological First Aid: Supporting yourself and others in the now normal</option>
                        </select>
                    </td>
                    <td><input type="number" id="days"></td>
                    <td><input type="date" id="dates"></td>
                    <td><input type="number" id="points"></td>
                </tr>
                <tr>
                    <td>
                        <select name="choices" id="option">
                            <option value="certificate">Certificate</option>
                            <option value="other">Other</option>
                        </select>
                    </td>
                    <td><select name="certificate" id="title">
                        <option value="select-title">Select Title</option>
                        <option value="title-1">Identifying Psychosocial Support in the Workplace</option>
                        <option value="title-2">Webinar: Psychological First Aid: Supporting yourself and others in the now normal</option>
                        </select>
                    </td>
                    <td><input type="number" id="days"></td>
                    <td><input type="date" id="dates"></td>
                    <td><input type="number" id="points"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total</td>
                    <td colspan="3"></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <br>

        <legend>C.2 Honors and Awards</legend>
        <div class="action-buttons">
            <button onclick="addRow()">Add Row</button>
            <button onclick="deleteLastRow()">Delete Last Row</button>
        </div>
        <table id="honorsTable">
            <thead>
                <tr>
                    <th>Documents</th>
                    <th>Title</th>
                    <th>Sponsor</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Rows will be added dynamically -->
            </tbody>
            <tfoot>
                <tr>
                    <td>Sub-Total</td>
                    <td colspan="2"></td>
                    <td id="subTotal">0</td>
                </tr>
            </tfoot>
        </table>

        <br>

        <legend>C.3 Membership</legend>
        <table>
            <thead>
                <tr>
                    <td>Documents</td>
                    <td>Organization</td>
                    <td>Designation</td>
                    <td>Points</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Sub-Total</td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <br>

        <legend>C.4 Scholarship, Activities & Creative Efforts</legend>
        <table>
            <thead>
                <tr>
                    <td>Documents</td>
                    <td>Title/Topic/Activity</td>
                    <td>Designation/Role</td>
                    <td>Inclusive Dates</td>
                    <td>Points</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total</td>
                    <td colspan="3"></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>

    &nbsp;
    <div class="fourth-container">
        <h2>Distribution of Points on Productive Scholarship & Creative Efforts based on Rank</h2>
        <br>
        <legend>Rank: Teacher 2</legend>
        <table>
            <thead>
                <tr>
                    <th rowspan="2 ">Ranking Criteria</th>
                    <th>Group A</th>
                    <th>Group B</th>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li>Seminars</li>
                            <li>Membership</li>
                            <li>Thesis/Dessertation</li>
                            <li>Adviser, Panelist</li>
                            <li>Instructional Materials</li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li>Honors and Awards</li>
                            <li>Trainer/Coach</li>
                            <li>Researcher</li>
                            <li>Speaker</li>
                            <li>Consultant</li>
                            <li>Authorship of Books</li>
                        </ul>
                    </td>
            </thead>
            <tbody>
                <tr>
                    <td>% distribution based on Rank</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
                <tr>
                    <td>Maximum Points each Group</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total Points</td>
                    <td colspan="2">*</td>
                </tr>
            </tfoot>
        </table>

        <br>

        <table>
            <thead>
                <tr>
                    <th>Criteria-Group A</th>
                    <th>Points</th>
                    <th>Criteria-Group B</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Seminars</td>
                    <td></td>
                    <td>Honors and Awards</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Membership</td>
                    <td></td>
                    <td>Researcher</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Adviser-Dissertation Thesis</td>
                    <td></td>
                    <td>Speaker, Coach</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Panelist</td>
                    <td></td>
                    <td>Consultant</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Author-workbook</td>
                    <td></td>
                    <td>Trainer</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Author-Book</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Sub-total</td>
                    <td></td>
                    <td>Sub-total</td>
                    <td></td>
                </tr>
                <tr>
                    <td>% distribution</td>
                    <td></td>
                    <td>% distribution</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Points Earned</td>
                    <td></td>
                    <td>Points Earned</td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total Points Credited</td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
    </div>

    &nbsp;
    <div class="fifth-container"><h2>D. Years of Experience (FSUU)</h2><br>
        <table>
            <thead>
                <tr>
                    <th scope="col">Years of Experience</th>
                    <th scope="col">Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="year" id="year-choice">
                            <option value="">Select Year</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </td>
                    <td id="points-display">-</td>
                </tr>
            </tbody>
        </table>        
    </div>
    

    &nbsp;
    <div class="sixth-container"><h2>E. Community Extension Points</h2><br>
        <h3>E.1 On Campus-Activities</h3><br>
        <legend>E.1.A Services to Students</legend>
        <table>
            <thead>
                <tr>
                    <th>Documents</th>
                    <th>Description</th>
                    <th>Sponsor/Source</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Sub-Total</td>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <br>

        <legend>E.1.B Service to the Department</legend>
        <table>
            <thead>
                <tr>
                    <th>Documents</th>
                    <th>Description</th>
                    <th>Sponsor/Source</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Sub-Total</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <br>

        <legend>E.1.C Service to the Institution</legend>
        <table>
            <thead>
                <tr>
                    <th>Documents</th>
                    <th>Description</th>
                    <th>Sponsor/Source</th>
                    <th>Inclusive Dates</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Sub-Total</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <br>

        <h3>E.2 Off Campus-Activities</h3>
        <table>
            <thead>
                <tr>
                    <th>Documents</th>
                    <th>Description</th>
                    <th>Sponsor/Source</th>
                    <th>Inclusive Dates</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Sub-Total</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <br>

        <legend>E.2.A Active Participation in different organization</legend>
        <table>
            <thead>
                <tr>
                    <th>Documents</th>
                    <th>Description</th>
                    <th>Sponsor/Source</th>
                    <th>Inclusive Dates</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Sub-Total</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <br>

        <legend>E.2.B Active Involvement in department/school sponsored CES</legend>
        <table>
            <thead>
                <tr>
                    <th>Documents</th>
                    <th>Description</th>
                    <th>Sponsor/Source</th>
                    <th>Inclusive Dates</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Sub-Total</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    
    <br>

    <div class="last-container">
        <h2>Distribution of Points on Community Extension Service based on Rank</h2><br>
        <legend>Rank: Teacher 2</legend>
        <br>
        <table>
            <thead>
                <tr>
                    <th rowspan="2">Ranking Criteria</th>
                    <th>Group A</th>
                    <th>Group B</th>
                </tr>
                <tr>
                    <td>On Campus-Activities
                        <ul>
                            <li>Service to Students</li>
                            <li>Service to Department</li>
                            <li>Service to Institution</li>
                        </ul>
                    </td>
                    <td>Off Campus-Activities
                        <ul>
                            <li>Active Participation in different organization</li>
                            <li>Active Involvement in Department/school Sponsored CES</li>
                        </ul>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total Points</td>
                    <td colspan="2"></td>
                </tr>
            </tfoot>
        </table>

        <br>

        <table>
            <thead>
                <tr>
                    <th>Criteria-Group A</th>
                    <th>Points</th>
                    <th>Criteria-Group B</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>E.1 On Campus-Activities</td>
                    <td></td>
                    <td>E.2 Off Campus-Activities</td>
                    <td></td>
                </tr>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
                <tr>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                    <td>*</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total Points Credited</td>
                    <td colspan="3"></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="done-btn">
        <a href="{{ url('/ranking-summary')}}"><button id="button">Done</button></a>
    </div>
</body>

<script>

function addRow() {
            const tbody = document.getElementById('tableBody');
            const newRow = tbody.insertRow();
            for (let i = 0; i < 4; i++) {
                let cell = newRow.insertCell(i);
                let input = document.createElement('input');
                input.type = 'text';
                if (i === 3) { // Points column
                    input.type = 'number';
                    input.step = '0.01';
                    input.onchange = updateSubTotal;
                }
                cell.appendChild(input);
            }
            updateSubTotal();
        }

        function deleteLastRow() {
            const tbody = document.getElementById('tableBody');
            if (tbody.rows.length > 0) {
                tbody.deleteRow(-1);
                updateSubTotal();
            }
        }

        function updateSubTotal() {
            const tbody = document.getElementById('tableBody');
            let total = 0;
            for (let i = 0; i < tbody.rows.length; i++) {
                let pointsInput = tbody.rows[i].cells[3].querySelector('input');
                total += Number(pointsInput.value) || 0;
            }
            document.getElementById('subTotal').textContent = total.toFixed(2);
        }

        // Initialize with one row
        addRow();
        
    const yearToPoints = {
            1: 0.83,
            2: 1.666,
            3: 2.499,
            4: 3.332,
            5: 4.165,
            6: 4.998,
            7: 5.831,
            8: 6.664,
            9: 7.497,
            10: 8.33,
            11: 9.163,
            12: 10.00
        };

        const yearSelect = document.getElementById('year-choice');
        const pointsDisplay = document.getElementById('points-display');

        yearSelect.addEventListener('change', function() {
            const selectedYear = this.value;
            if (selectedYear in yearToPoints) {
                pointsDisplay.textContent = yearToPoints[selectedYear].toFixed(3);
            } else {
                pointsDisplay.textContent = '-';
            }
        });
</script>
</html>