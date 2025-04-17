<!DOCTYPE html>
<html>
<head>
    <title>Job Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            max-width: 100px;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .section-title {
            font-size: 18px;
            margin-top: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
        }
        .subheading {
            font-size: 16px;
            margin-top: 10px;
            font-weight: bold;
        }
        .job-details, .phase-details, .task-details {
            margin-top: 15px;
        }
        .job-details td, .phase-details td, .task-details td {
            padding: 5px 10px;
        }
        .job-details th, .phase-details th, .task-details th {
            text-align: left;
        }
        .job-details, .phase-details, .task-details {
            width: 100%;
            border-collapse: collapse;
        }
        .job-details tr, .phase-details tr, .task-details tr {
            border-bottom: 1px solid #ddd;
        }

        /* Responsive layout for smaller screens */
        @media (max-width: 768px) {
            .phase-task-container {
                flex-direction: column;
            }
            .phase-container, .task-container {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header with Logo -->
        <div class="header">
            <img src="{{ public_path('images/logo-sm.png') }}" alt="Logo">
            <h1>Job Report</h1>
        </div>

        <!-- Job Listing Information -->
        <div class="job-details">
            <h2 class="section-title">Job Details</h2>
            <table>
                <tr>
                    <th>Job Number:</th>
                    <td>{{ $job_listing->job_number }}</td>
                </tr>
                <tr>
                    <th>Title:</th>
                    <td>{{ $job_listing->title }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $job_listing->description }}</td>
                </tr>
                <tr>
                    <th>Start Date:</th>
                    <td>{{ $job_listing->start_date->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>End Date:</th>
                    <td>{{ $job_listing->end_date->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Job Phases:</th>
                    <td>{{ count($job_listing->job_phases) }}</td>
                </tr>
                <tr>
                    <th>Key Employees:</th>
                    <td>{{ implode(', ', $job_listing->user_assigned_roles->pluck('name')->toArray()) }}</td>
                </tr>
                <tr>
                    <th>Regular Employees:</th>
                    <td>{{ implode(', ', $job_listing->users->pluck('name')->toArray()) }}</td>
                </tr>
                <tr>
                    <th>Site:</th>
                    <td>{{ $job_listing->site->name }}</td>
                </tr>
            </table>
        </div>

        <!-- Job Phases -->
        @foreach($job_listing->job_phases as $phase)
            <div class="phase-details">
                <h2 class="section-title">Job Phase: {{ $phase->title }}</h2>
                
                <!-- Flexbox container for Phase Details and Task Details -->
                <div class="phase-task-container">
                    <!-- Phase Details -->
                    <div class="phase-container">
                        <table>
                            <tr>
                                <th>Description:</th>
                                <td>{{ $phase->description }}</td>
                            </tr>
                            <tr>
                                <th>Start Date:</th>
                                <td>{{ $phase->start_date->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>End Date:</th>
                                <td>{{ $phase->end_date->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Job Tasks:</th>
                                <td>{{ count($phase->job_tasks) }}</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Job Tasks for this Phase -->
                    <div class="task-container">
                        @foreach($phase->job_tasks as $task)
                            <h3 class="subheading">Job Task: {{ $task->title }}</h3>
                            <table>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $task->description }}</td>
                                </tr>
                                <tr>
                                    <th>Start Date:</th>
                                    <td>{{ $task->start_date->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>End Date:</th>
                                    <td>{{ $task->end_date->format('d-m-Y') }}</td>
                                </tr>
                                @if($task->is_quality_critical)
                                    <tr>
                                        <th>Quality Critical:</th>
                                        <td>{{ $task->quality_critical_details }}</td>
                                    </tr>
                                @endif
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</body>
</html>
