@extends('layouts.layout')

@section('title', 'Responses')

@section('content')

<div class="response-card card mb-4">
    <div class="heading d-flex justify-content-between align-content-center">
        <h1 class="whr-response-heading mt-3">Response Table</h1>
    </div>
    <hr class="border border-dark border-3 opacity-75" />
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Survey ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Survey Title</th>
                        <th scope="col">Survey Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Your table row content goes here -->
                        <!-- Example: -->
                        <td>1</td>
                        <td>123</td>
                        <td>Survey Title</td>
                        <td>Survey Description</td>
                        <td>
                            <!-- Actions buttons go here -->
                            <!-- Example: -->
                            <a href="#" class="btn btn-primary">View Responses</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <!-- Repeat this structure for each response row -->
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')

<script type="text/javascript">
    // Your JavaScript code goes here
</script>

@endpush

@endsection
