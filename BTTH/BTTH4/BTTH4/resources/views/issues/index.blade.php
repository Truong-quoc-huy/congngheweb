<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidents</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn-action {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .alert {
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">computer lab manager</h1>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('issues.create') }}" class="btn btn-primary">➕ New Incident</a>
        </div>

        <div class="table-responsive">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <table class="table table-bordered table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Computer Name</th>
                        <th>Model</th>
                        <th>Reported By</th>
                        <th>Reported Date</th>
                        <th>Urgency</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($issues as $issue)
                    <tr>
                        <td>{{ $issue->id }}</td>
                        <td>{{ $issue->computer->computer_name }}</td>
                        <td>{{ $issue->computer->model }}</td>
                        <td>{{ $issue->reported_by ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($issue->reported_date)->format('d-m-Y H:i') }}</td>
                        <td>
                            <span class="badge text-bg-{{ $issue->urgency === 'High' ? 'danger' : ($issue->urgency === 'Medium' ? 'warning' : 'success') }}">
                                {{ ucfirst($issue->urgency) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge text-bg-{{ $issue->status === 'Resolved' ? 'success' : ($issue->status === 'In Progress' ? 'primary' : 'secondary') }}">
                                {{ ucfirst($issue->status) }}
                            </span>
                        </td>
                        <td class="btn-action">
                            <a href="{{ route('issues.edit', $issue) }}" class="btn btn-sm btn-outline-primary">✏️ Edit</a>
                            <form action="{{ route('issues.destroy', $issue) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this incident?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">🗑️ Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No incidents found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-between align-items-center mt-4">
            <!-- Left side: Showing info -->
            <div class="hint-text">Showing <b>{{ $issues->count() }}</b> to <b>{{ $issues->count() * $issues->currentPage() }}</b> of <b>{{ $issues->total() }}</b> results</div>
        
            <!-- Right side: Pagination -->
            <div>
                {{ $issues->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
