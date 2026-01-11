/**
 * Admin Sortable Module
 *
 * Handles drag-and-drop reordering for sections and questions
 * using jQuery UI Sortable.
 *
 * Dependencies:
 * - jQuery 2.1.1+
 * - jQuery UI 1.11.4+ (Sortable)
 * - SweetAlert2 (optional, for notifications)
 */

(function($) {
    'use strict';

    /**
     * Initialize sortable functionality for sections
     *
     * @param {string} selector - The selector for the sections container
     * @param {string} reorderUrl - The URL to POST reorder data to
     */
    window.initSectionsSortable = function(selector, reorderUrl) {
        var $container = $(selector);

        if (!$container.length) {
            return;
        }

        $container.sortable({
            handle: '.section-header .drag-handle',
            placeholder: 'ui-sortable-placeholder section-card',
            tolerance: 'pointer',
            opacity: 0.8,
            cursor: 'move',

            start: function(event, ui) {
                ui.placeholder.height(ui.item.outerHeight());
            },

            update: function(event, ui) {
                var items = [];

                $container.find('.section-card').each(function(index) {
                    items.push({
                        id: $(this).data('section-id'),
                        order: index + 1
                    });
                });

                saveOrder(reorderUrl, { items: items });
            }
        });
    };

    /**
     * Initialize sortable functionality for questions within a section
     *
     * @param {string} selector - The selector for questions containers
     * @param {function} urlBuilder - Function that returns the reorder URL given a section ID
     */
    window.initQuestionsSortable = function(selector, urlBuilder) {
        var $containers = $(selector);

        if (!$containers.length) {
            return;
        }

        $containers.sortable({
            handle: '.drag-handle',
            placeholder: 'ui-sortable-placeholder question-item',
            tolerance: 'pointer',
            opacity: 0.8,
            cursor: 'move',

            start: function(event, ui) {
                ui.placeholder.height(ui.item.outerHeight());
            },

            update: function(event, ui) {
                var $container = $(this);
                var sectionId = $container.data('section-id');
                var items = [];

                $container.find('.question-item').each(function(index) {
                    items.push({
                        id: $(this).data('question-id'),
                        order: index + 1
                    });
                });

                var url = urlBuilder(sectionId);
                saveOrder(url, { items: items });
            }
        });
    };

    /**
     * Save the new order to the server
     *
     * @param {string} url - The URL to POST to
     * @param {object} data - The data to send
     */
    function saveOrder(url, data) {
        $.ajax({
            url: url,
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) {
                if (response.success) {
                    showNotification('success', response.message || 'Order saved successfully.');
                } else {
                    showNotification('error', response.message || 'Failed to save order.');
                }
            },
            error: function(xhr) {
                var message = 'Failed to save order. Please try again.';

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }

                showNotification('error', message);
            }
        });
    }

    /**
     * Show a toast notification
     *
     * @param {string} type - 'success' or 'error'
     * @param {string} message - The message to display
     */
    function showNotification(type, message) {
        // Check if SweetAlert2 is available
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: type,
                title: message,
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true
            });
        } else {
            // Fallback to console
            if (type === 'error') {
                console.error(message);
            } else {
                console.log(message);
            }
        }
    }

    /**
     * Highlight an item temporarily (e.g., after drag)
     *
     * @param {jQuery} $element - The element to highlight
     */
    window.highlightItem = function($element) {
        $element.css('background-color', '#ffffcc');

        setTimeout(function() {
            $element.css('background-color', '');
        }, 1000);
    };

})(jQuery);
