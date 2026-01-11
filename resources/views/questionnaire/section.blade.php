<x-layout>
    <!-- Hero Section with Progress -->
    <section class="section-intro breadcrumbs-right bg-img stellar" data-stellar-background-ratio="0.4" style="background-image: url({{ asset('i/ss.jpg') }});">
        <div class="intro-with-floating-menu-topbar"></div>
        <div class="bg-overlay gradient-1"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <h1 class="intro-title text-left small mb0">{{ $questionnaire->title }}</h1>
                </div>
                <div class="col-sm-12 col-md-5">
                    <div class="page-breadcrumbs">
                        <a href="{{ route('home') }}">Home</a>
                        <span class="separator"> / </span>
                        <a href="{{ route('assessment.show', $questionnaire) }}">Assessment</a>
                        <span class="separator"> / </span>
                        <a class="active" id="breadcrumb-section">Section <span class="section-num-text">{{ $currentSectionIndex }}</span></a>
                    </div>
                </div>
            </div>
            <!-- Progress Bar in Hero -->
            <div class="row mt20">
                <div class="col-sm-12">
                    <div class="wizard-progress-bar">
                        <div class="progress-info">
                            <span id="progress-label">Section <span class="section-num-text">{{ $currentSectionIndex }}</span> of {{ $totalSections }}</span>
                            <span id="progress-percent">{{ round($progress) }}% Complete</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-fill" id="progress-bar" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Content -->
    <section class="section-bg mt0">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- Loading Overlay -->
                    <div class="loading-overlay" id="loadingOverlay" style="display: none;">
                        <div class="loading-spinner">
                            <i class="fa fa-spinner fa-spin fa-3x"></i>
                            <p>Saving your answers...</p>
                        </div>
                    </div>

                    <!-- Questions Container -->
                    <div id="questionsContainer">
                        <!-- Section Header -->
                        <div class="section-header-box mb30">
                            <span class="section-badge">Section <span class="section-num-text">{{ $currentSectionIndex }}</span></span>
                            <h2 class="title-uppercased hyt mb10" id="section-title">{{ $section->title }}</h2>
                            @if($section->description)
                                <p class="text-muted" id="section-description">{{ $section->description }}</p>
                            @endif
                        </div>

                        <div class="section-errors alert alert-danger" id="formErrors" style="display: none;">
                            <i class="fa fa-exclamation-circle"></i> <span class="error-message">Please correct the errors below to continue.</span>
                        </div>

                        <!-- Questions Form -->
                        <form id="sectionForm"
                              data-submit-url="{{ route('assessment.section.submit', [$questionnaire, $section]) }}"
                              data-questionnaire-id="{{ $questionnaire->id }}"
                              data-section-id="{{ $section->id }}">
                            @csrf

                            @foreach($section->questions as $index => $question)
                                @php
                                    $existingAnswer = $existingAnswers->get($question->id);
                                    $oldValue = old("answers.{$question->id}", $existingAnswer?->answer_text ?? $existingAnswer?->selected_options);
                                    $hasError = $errors->has("answers.{$question->id}");
                                @endphp

                                <div class="question-card {{ $hasError ? 'has-error' : '' }}" data-question-id="{{ $question->id }}">
                                    <div class="question-header">
                                        <span class="question-num">{{ $index + 1 }}</span>
                                        <div class="question-text">
                                            {{ $question->question_text }}
                                            @if($question->is_required)
                                                <span class="text-danger">*</span>
                                            @endif
                                        </div>
                                    </div>

                                    @if($question->help_text)
                                        <div class="question-help">
                                            <i class="fa fa-info-circle"></i> {{ $question->help_text }}
                                        </div>
                                    @endif

                                    <div class="question-input">
                                        @include('questionnaire.partials._' . $question->question_type, [
                                            'question' => $question,
                                            'oldValue' => $oldValue,
                                        ])
                                    </div>

                                    <div class="question-error" style="display: none;">
                                        <i class="fa fa-exclamation-circle"></i> <span class="error-text"></span>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Navigation -->
                            <div class="wizard-navigation">
                                @if($section->getPreviousSection())
                                    <button type="button" class="btn btn-default btn-lg btn-prev"
                                            data-section-id="{{ $section->getPreviousSection()->id }}">
                                        <i class="fa fa-arrow-left"></i> Previous
                                    </button>
                                @else
                                    <div></div>
                                @endif

                                @if($section->getNextSection())
                                    <button type="submit" class="btn btn-e btn-lg btn-next">
                                        Next Section <i class="fa fa-arrow-right"></i>
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-success btn-lg btn-complete">
                                        Complete Assessment <i class="fa fa-check"></i>
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials._footer')
</x-layout>

<style>
/* Progress Bar in Hero */
.wizard-progress-bar {
    background: rgba(255,255,255,0.15);
    border-radius: 8px;
    padding: 15px 20px;
    margin-top: 20px;
}

.progress-info {
    display: flex;
    justify-content: space-between;
    color: #fff;
    font-size: 14px;
    margin-bottom: 10px;
}

.progress-track {
    height: 8px;
    background: rgba(255,255,255,0.3);
    border-radius: 4px;
    overflow: hidden;
}

.progress-fill {
    height: 100%;
    background: #DAA520;
    border-radius: 4px;
    transition: width 0.5s ease;
}

/* Loading Overlay */
.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255,255,255,0.9);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.loading-spinner {
    text-align: center;
    color: #DAA520;
}

.loading-spinner p {
    margin-top: 15px;
    color: #666;
    font-size: 16px;
}

/* Section Header */
.section-header-box {
    text-align: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #eee;
}

.section-badge {
    display: inline-block;
    background: #DAA520;
    color: #fff;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 15px;
}

/* Question Cards */
.question-card {
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 25px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.question-card:hover {
    border-color: #DAA520;
    box-shadow: 0 3px 15px rgba(218, 165, 32, 0.1);
}

.question-card.has-error {
    border-color: #dc3545;
    background: #fff8f8;
}

.question-header {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
}

.question-num {
    width: 32px;
    height: 32px;
    background: #DAA520;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 600;
    margin-right: 15px;
    flex-shrink: 0;
}

.question-text {
    font-size: 16px;
    font-weight: 600;
    color: #333;
    line-height: 1.5;
    padding-top: 4px;
}

.question-help {
    font-size: 13px;
    color: #888;
    margin-bottom: 15px;
    padding-left: 47px;
}

.question-help i {
    color: #DAA520;
    margin-right: 5px;
}

.question-input {
    padding-left: 47px;
}

.question-error {
    color: #dc3545;
    font-size: 13px;
    margin-top: 10px;
    padding-left: 47px;
}

.question-error i {
    margin-right: 5px;
}

/* Form Controls */
.question-input .form-control {
    border-radius: 4px;
    border: 1px solid #ddd;
    padding: 12px 15px;
    font-size: 14px;
    height: auto;
}

.question-input .form-control:focus {
    border-color: #DAA520;
    box-shadow: 0 0 0 3px rgba(218, 165, 32, 0.15);
    outline: none;
}

.question-input textarea.form-control {
    min-height: 120px;
    resize: vertical;
}

/* Radio & Checkbox Options */
.option-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.option-item {
    margin-bottom: 10px;
}

.option-label {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.option-label:hover {
    border-color: #DAA520;
    background: #fffdf5;
}

.option-label input[type="radio"],
.option-label input[type="checkbox"] {
    margin-right: 12px;
    accent-color: #DAA520;
    width: 18px;
    height: 18px;
}

.option-label.selected {
    border-color: #DAA520;
    background: #fffdf5;
}

.option-label.selected span {
    color: #B8860B;
    font-weight: 600;
}

/* Yes/No Toggle */
.yesno-group {
    display: flex;
    gap: 15px;
}

.yesno-option {
    flex: 1;
}

.yesno-label {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 15px 20px;
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
}

.yesno-label:hover {
    border-color: #DAA520;
}

.yesno-label input {
    display: none;
}

.yesno-label.yes-selected {
    background: #d4edda;
    border-color: #28a745;
    color: #28a745;
}

.yesno-label.no-selected {
    background: #f8d7da;
    border-color: #dc3545;
    color: #dc3545;
}

.yesno-label i {
    margin-right: 8px;
    font-size: 18px;
}

/* Select Dropdown */
.question-input select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
    padding-right: 40px;
}

/* Navigation */
.wizard-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 30px;
    margin-top: 30px;
    border-top: 1px solid #eee;
}

.btn-e {
    background: #DAA520;
    color: #fff;
    border: none;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-e:hover {
    background: #B8860B;
    color: #fff;
}

.btn-success {
    background: #28a745;
    border-color: #28a745;
}

.btn-success:hover {
    background: #218838;
}

/* Alert */
.alert {
    border-radius: 4px;
    margin-bottom: 20px;
}

/* Fade animation for section transitions */
#questionsContainer {
    transition: opacity 0.3s ease;
}

#questionsContainer.loading {
    opacity: 0.5;
    pointer-events: none;
}

@media (max-width: 768px) {
    .question-input,
    .question-help,
    .question-error {
        padding-left: 0;
    }

    .question-header {
        flex-direction: column;
    }

    .question-num {
        margin-bottom: 10px;
    }

    .wizard-navigation {
        flex-direction: column;
        gap: 15px;
    }

    .wizard-navigation .btn {
        width: 100%;
    }

    .yesno-group {
        flex-direction: column;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('sectionForm');
    var loadingOverlay = document.getElementById('loadingOverlay');
    var questionsContainer = document.getElementById('questionsContainer');
    var formErrors = document.getElementById('formErrors');
    var questionnaireId = form.dataset.questionnaireId;
    var totalSections = {{ $totalSections }};

    // Initialize visual feedback handlers
    initializeInputHandlers();

    // Form submission via AJAX
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        submitSection();
    });

    // Previous button handler
    document.querySelectorAll('.btn-prev').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var sectionId = this.dataset.sectionId;
            loadSection(sectionId);
        });
    });

    function submitSection() {
        // Show loading
        loadingOverlay.style.display = 'flex';
        clearErrors();

        var formData = new FormData(form);
        var submitUrl = form.dataset.submitUrl;

        fetch(submitUrl, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(function(response) {
            return response.json().then(function(data) {
                return { status: response.status, data: data };
            });
        })
        .then(function(result) {
            loadingOverlay.style.display = 'none';

            if (result.status === 422) {
                // Validation errors
                showErrors(result.data.errors || {});
                return;
            }

            if (result.data.success) {
                if (result.data.completed) {
                    // Assessment completed - redirect to thank you page
                    window.location.href = result.data.redirect;
                } else if (result.data.redirect) {
                    // Update progress bar
                    updateProgress(result.data.progress);

                    // Load next section via AJAX
                    loadSectionFromUrl(result.data.redirect);
                }
            } else {
                // Error occurred
                if (result.data.redirect) {
                    window.location.href = result.data.redirect;
                } else {
                    alert(result.data.message || 'An error occurred. Please try again.');
                }
            }
        })
        .catch(function(error) {
            loadingOverlay.style.display = 'none';
            console.error('Error:', error);
            alert('A network error occurred. Please check your connection and try again.');
        });
    }

    function loadSection(sectionId) {
        loadingOverlay.style.display = 'flex';
        questionsContainer.classList.add('loading');

        var url = '/assessment/{{ $questionnaire->slug }}/section/' + sectionId + '/content';

        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            loadingOverlay.style.display = 'none';
            questionsContainer.classList.remove('loading');

            if (data.success) {
                updateSectionContent(data);
            } else {
                if (data.redirect) {
                    window.location.href = data.redirect;
                }
            }
        })
        .catch(function(error) {
            loadingOverlay.style.display = 'none';
            questionsContainer.classList.remove('loading');
            console.error('Error:', error);
        });
    }

    function loadSectionFromUrl(url) {
        // Extract section ID from URL and load content
        var match = url.match(/section\/(\d+)/);
        if (match) {
            loadSection(match[1]);
        } else {
            window.location.href = url;
        }
    }

    function updateSectionContent(data) {
        // Update progress
        updateProgress(data.progress);

        // Update breadcrumb and progress label
        document.querySelectorAll('.section-num-text').forEach(function(el) {
            el.textContent = data.section.index;
        });
        document.getElementById('progress-percent').textContent = Math.round(data.progress) + '% Complete';

        // Update section header
        document.getElementById('section-title').textContent = data.section.title;
        var descEl = document.getElementById('section-description');
        if (descEl) {
            descEl.textContent = data.section.description || '';
        }

        // Update questions container with new HTML
        var tempDiv = document.createElement('div');
        tempDiv.innerHTML = data.html;

        // Find the questions form container and update
        var questionsForm = document.getElementById('sectionForm');
        var newQuestions = tempDiv.querySelectorAll('.question-card');

        // Clear existing questions (keep header and navigation)
        var existingCards = questionsForm.querySelectorAll('.question-card');
        existingCards.forEach(function(card) {
            card.remove();
        });

        // Insert new questions before navigation
        var navigation = questionsForm.querySelector('.wizard-navigation');
        newQuestions.forEach(function(card) {
            questionsForm.insertBefore(card.cloneNode(true), navigation);
        });

        // Update form action URL (POST to section without /submit suffix)
        form.dataset.submitUrl = '/assessment/{{ $questionnaire->slug }}/section/' + data.section.id;
        form.dataset.sectionId = data.section.id;

        // Update navigation buttons
        updateNavigationButtons(data);

        // Reinitialize input handlers
        initializeInputHandlers();

        // Scroll to top smoothly
        window.scrollTo({ top: 0, behavior: 'smooth' });

        // Update browser URL without reload
        var newUrl = '/assessment/{{ $questionnaire->slug }}/section/' + data.section.id;
        history.pushState({ sectionId: data.section.id }, '', newUrl);
    }

    function updateNavigationButtons(data) {
        var navigation = form.querySelector('.wizard-navigation');

        // Update previous button
        var prevBtn = navigation.querySelector('.btn-prev');
        if (data.hasPrevious && data.previousSectionId) {
            if (!prevBtn) {
                prevBtn = document.createElement('button');
                prevBtn.type = 'button';
                prevBtn.className = 'btn btn-default btn-lg btn-prev';
                prevBtn.innerHTML = '<i class="fa fa-arrow-left"></i> Previous';
                navigation.insertBefore(prevBtn, navigation.firstChild);
            }
            prevBtn.dataset.sectionId = data.previousSectionId;
            prevBtn.addEventListener('click', function() {
                loadSection(this.dataset.sectionId);
            });
        } else if (prevBtn) {
            prevBtn.remove();
            // Add empty div for spacing
            var spacer = document.createElement('div');
            navigation.insertBefore(spacer, navigation.firstChild);
        }

        // Update next/complete button
        var nextBtn = navigation.querySelector('.btn-next, .btn-complete');
        if (data.hasNext) {
            nextBtn.className = 'btn btn-e btn-lg btn-next';
            nextBtn.innerHTML = 'Next Section <i class="fa fa-arrow-right"></i>';
        } else {
            nextBtn.className = 'btn btn-success btn-lg btn-complete';
            nextBtn.innerHTML = 'Complete Assessment <i class="fa fa-check"></i>';
        }
    }

    function updateProgress(progress) {
        var progressBar = document.getElementById('progress-bar');
        progressBar.style.width = progress + '%';
        document.getElementById('progress-percent').textContent = Math.round(progress) + '% Complete';
    }

    function showErrors(errors) {
        formErrors.style.display = 'block';

        // Scroll to top to show error message
        window.scrollTo({ top: formErrors.offsetTop - 100, behavior: 'smooth' });

        // Show individual field errors
        for (var field in errors) {
            if (errors.hasOwnProperty(field)) {
                // Field format is "answers.{question_id}"
                var match = field.match(/answers\.(\d+)/);
                if (match) {
                    var questionId = match[1];
                    var card = document.querySelector('.question-card[data-question-id="' + questionId + '"]');
                    if (card) {
                        card.classList.add('has-error');
                        var errorDiv = card.querySelector('.question-error');
                        if (errorDiv) {
                            errorDiv.style.display = 'block';
                            var errorText = errorDiv.querySelector('.error-text');
                            if (errorText) {
                                errorText.textContent = errors[field][0];
                            }
                        }
                    }
                }
            }
        }
    }

    function clearErrors() {
        formErrors.style.display = 'none';

        document.querySelectorAll('.question-card.has-error').forEach(function(card) {
            card.classList.remove('has-error');
        });

        document.querySelectorAll('.question-error').forEach(function(errorDiv) {
            errorDiv.style.display = 'none';
        });
    }

    function initializeInputHandlers() {
        // Yes/No toggle visual feedback
        document.querySelectorAll('.yesno-label input').forEach(function(input) {
            input.addEventListener('change', function() {
                var group = this.closest('.yesno-group');
                group.querySelectorAll('.yesno-label').forEach(function(label) {
                    label.classList.remove('yes-selected', 'no-selected');
                });

                if (this.checked) {
                    var label = this.closest('.yesno-label');
                    if (this.value === 'yes') {
                        label.classList.add('yes-selected');
                    } else {
                        label.classList.add('no-selected');
                    }
                }
            });

            // Trigger on page load for existing values
            if (input.checked) {
                input.dispatchEvent(new Event('change'));
            }
        });

        // Option selection visual feedback
        document.querySelectorAll('.option-label input').forEach(function(input) {
            input.addEventListener('change', function() {
                var list = this.closest('.option-list');
                var isRadio = this.type === 'radio';

                if (isRadio) {
                    list.querySelectorAll('.option-label').forEach(function(label) {
                        label.classList.remove('selected');
                    });
                }

                if (this.checked) {
                    this.closest('.option-label').classList.add('selected');
                } else {
                    this.closest('.option-label').classList.remove('selected');
                }
            });

            // Trigger on page load
            if (input.checked) {
                input.closest('.option-label').classList.add('selected');
            }
        });

        // Clear error on input change
        document.querySelectorAll('.question-card input, .question-card textarea, .question-card select').forEach(function(input) {
            input.addEventListener('change', function() {
                var card = this.closest('.question-card');
                if (card) {
                    card.classList.remove('has-error');
                    var errorDiv = card.querySelector('.question-error');
                    if (errorDiv) {
                        errorDiv.style.display = 'none';
                    }
                }
            });
        });
    }

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function(e) {
        if (e.state && e.state.sectionId) {
            loadSection(e.state.sectionId);
        }
    });
});
</script>
