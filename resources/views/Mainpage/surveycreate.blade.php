@extends('layouts.layout')

@section('title', 'Create Survey')

@section('content')

<div class="survey-card card mb-4">
  <div class="heading d-flex justify-content-between align-content-center">
    <h1 class="whr-survey-heading mt-3">Create Survey</h1>
  </div>
  <hr class="border border-dark border-3 opacity-75" />
  <div class="card-body">
    <form>
      <div class="mb-3">
        <label for="surveyTitle" class="form-label">Survey Title:</label>
        <input type="text" class="form-control" id="surveyTitle" placeholder="Enter survey title">
      </div>
      <div class="mb-3">
        <label for="surveyDescription" class="form-label">Survey Description:</label>
        <textarea class="form-control" id="surveyDescription" rows="4" placeholder="Enter survey description"></textarea>
      </div>
      <div class="mb-3">
        <label for="surveyType" class="form-label">Survey Type:</label>
        <select class="form-select" id="surveyType" aria-label="Select survey type">
          <option selected disabled>Select Survey Type</option>
          <option value="now">Distribute Now</option>
          <option value="events">Events</option>
          <option value="datetime">Date and Time</option>
        </select>
      </div>

      <!-- Conditional elements based on survey type -->
      <div class="mb-3" id="eventsDropdown" style="display:none;">
        <label for="eventSelection" class="form-label">Select Event Type:</label>
        <select class="form-select" id="eventSelection" aria-label="Select event type">
          <option selected disabled>Select Event Type</option>
          <option value="payroll">Payroll</option>
          <option value="offboarding">Offboarding</option>
        </select>
      </div>

      <div class="mb-3" id="datetimePickers" style="display:none;">
        <label for="startDate" class="form-label">Start Date:</label>
        <input type="date" class="form-control" id="startDate">

        <label for="endDate" class="form-label mt-2">End Date:</label>
        <input type="date" class="form-control" id="endDate">
      </div>

      <!-- Questions section -->
      <div class="mb-3">
        <h2 class="whr-survey-subheading">Add Questions</h2>
        <div id="questionContainer">
          <!-- Initial question (You can remove this if you want to start with no questions) -->
          <div class="question" data-question-number="1">
            <label for="questionText1" class="form-label">Question Number 1:</label>
            <textarea class="form-control" id="questionText1" rows="4" placeholder="Enter your question"></textarea>

            <div class="mb-3">
              <label for="responseType1" class="form-label">Response Type:</label>
              <select class="form-select responseType" id="responseType1" aria-label="Select response type">
                <option selected disabled>Select Response Type</option>
                <option value="radio">Radio Buttons</option>
                <option value="checkbox">Checkboxes</option>
                <option value="textarea">Text Area</option>
              </select>
            </div>

            <div class="mb-3 dynamicResponseInput" id="dynamicResponseInput1" style="display:none;">
              <!-- This div will be dynamically replaced with a textarea or text input based on selection -->
            </div>
          </div>
        </div>

        <button type="button" class="btn btn-sm btn-secondary mt-2" id="addQuestionBtn">Add Question</button>
      </div>

      <!-- Example: add a submit button -->
      <button type="submit" class="btn btn-primary">Create Survey</button>
    </form>
  </div>
</div>

@push('scripts')
<script>
  // Counter for unique IDs
  var questionCounter = 2; // Starting with 2 since the initial question is already present

  // Function to handle response type change for a specific question
  function handleResponseTypeChange(questionNumber) {
    $('#responseType' + questionNumber).change(function () {
      var selectedResponseType = $(this).val();
      var dynamicResponseInput = $('#dynamicResponseInput' + questionNumber);

      // Hide all dynamic response input elements
      dynamicResponseInput.hide();

      // Show relevant dynamic response input based on selected type
      if (selectedResponseType === 'textarea' || selectedResponseType === 'text') {
        dynamicResponseInput.html('<textarea class="form-control" id="userResponse' + questionNumber + '" rows="4" placeholder="Enter your answer"></textarea>');
        dynamicResponseInput.show();
      } else if (selectedResponseType === 'checkbox' || selectedResponseType === 'radio') {
        // Clear previous content
        dynamicResponseInput.html('');

        // Number of default options
        var numOptions = 3; // You can change this as needed

        for (var i = 1; i <= numOptions; i++) {
          // Create checkbox or radio button with an input field for description
          var inputType = selectedResponseType === 'checkbox' ? 'checkbox' : 'radio';
          var inputId = 'option' + questionNumber + '-' + i;
          var label = 'Option ' + i;

          dynamicResponseInput.append('<div class="form-check mb-2"><input class="form-check-input" type="' + inputType + '" value="' + label + '" id="' + inputId + '"><input type="text" class="form-control ml-2" placeholder="Enter description for ' + label + '"></div>');
        }

        // Button to add more options
        dynamicResponseInput.append('<button type="button" class="btn btn-sm btn-secondary mt-2" id="addOptionBtn' + questionNumber + '">Add Option</button>');

        // Handle click on "Add Option" button
        $('#addOptionBtn' + questionNumber).click(function () {
          var newOptionId = 'option' + questionNumber + '-' + (numOptions + 1);
          var newLabel = 'Option ' + (numOptions + 1);

          // Add new option with an input field for description
          $('#addOptionBtn' + questionNumber).before('<div class="form-check mb-2"><input class="form-check-input" type="' + inputType + '" value="' + newLabel + '" id="' + newOptionId + '"><input type="text" class="form-control ml-2" placeholder="Enter description for ' + newLabel + '"></div>');

          numOptions++;
        });

        dynamicResponseInput.show();
      } else if (selectedResponseType === 'text') {
        // For "Text Field" option
        dynamicResponseInput.html('<input type="text" class="form-control" id="userResponse' + questionNumber + '" placeholder="Enter your answer">');
        dynamicResponseInput.show();
      }
    });
  }

  // Handle response type change for the initial question
  handleResponseTypeChange(1);

  // Handle click on "Add Question" button
  $('#addQuestionBtn').click(function () {
    var newQuestionNumber = questionCounter;
    var newQuestionId = 'question' + newQuestionNumber;

    // Add new question field with a response type dropdown
    var newQuestionField =
      '<div class="question" data-question-number="' + newQuestionNumber + '">' +
      '<label for="' + newQuestionId + '" class="form-label">Question Number ' + newQuestionNumber + ':</label>' +
      '<textarea class="form-control" id="' + newQuestionId + '" rows="4" placeholder="Enter your question"></textarea>' +
      '<div class="mb-3">' +
      '<label for="responseType' + newQuestionNumber + '" class="form-label">Response Type:</label>' +
      '<select class="form-select responseType" id="responseType' + newQuestionNumber + '" aria-label="Select response type">' +
      '<option selected disabled>Select Response Type</option>' +
      '<option value="radio">Radio Buttons</option>' +
      '<option value="checkbox">Checkboxes</option>' +
      '<option value="textarea">Text Area</option>' +
      '<option value="text">Text Field</option>' +
      '</select>' +
      '</div>' +
      '<div class="mb-3 dynamicResponseInput" id="dynamicResponseInput' + newQuestionNumber + '" style="display:none;"></div>' +
      '</div>';

    // Append the new question field below the current question
    $('#questionContainer').append(newQuestionField);

    // Increment the counter for unique IDs
    questionCounter++;

    // Bind the event listener for the new question
    handleResponseTypeChange(newQuestionNumber);
  });

  // Handle survey type change
  $('#surveyType').change(function () {
    var selectedSurveyType = $(this).val();
    var eventsDropdown = $('#eventsDropdown');
    var datetimePickers = $('#datetimePickers');

    // Hide all conditional elements
    eventsDropdown.hide();
    datetimePickers.hide();

    // Show relevant conditional elements based on selected survey type
    if (selectedSurveyType === 'events') {
      eventsDropdown.show();
    } else if (selectedSurveyType === 'datetime') {
      datetimePickers.show();
    }
  });

</script>
@endpush

@endsection
