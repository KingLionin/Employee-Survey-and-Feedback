@extends('layouts.layout')

@section('title', 'Survey')

@section('content')

@push('styles')

@endpush

<div class="survey-card card mb-4">
    <div class="heading d-flex justify-content-between align-content-center">
        <h1 class="whr-survey-heading mt-3">Survey Table</h1>
        <div class="survey-button-container">
            <a href="{{ url('Mainpage/surveycreate') }}" id="createSurveyButton" class="btn btn-primary survey-button mt-3">Create New Survey</a>
        </div>
    </div>
    <hr class="border border-dark border-3 opacity-75" />
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">Survey ID</th>
                        <th scope="col"></th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Middlename</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Your table row content goes here -->
                        <!-- Example: -->
                        <td>1</td>
                        <td></td>
                        <td>John</td>
                        <td>Michael</td>
                        <td>john.doe@example.com</td>
                        <td>
                            <!-- Actions buttons go here -->
                            <!-- Example: -->
                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
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
