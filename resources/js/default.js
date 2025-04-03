function createDataTable(tableId, columns, endpoint, action, data={}) {
    // Validate inputs
    if (!tableId || !columns || !endpoint) {
        console.error('Missing required parameters');
        return null;
    }

    // Ensure the table exists in the DOM
    if ($(`#${tableId}`).length === 0) {
        console.error(`Table with ID ${tableId} not found`);
        return null;
    }

    // Prepare column configuration for DataTable
    const columnConfig = columns.map(col => ({
        data: col,
        title: col.charAt(0).toUpperCase() + col.slice(1)
    }));

    // Initialize DataTable
    return $(`#${tableId}`).DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: endpoint,
            type: 'GET',
            contentType: 'application/x-www-form-urlencoded',
        },
        columns: columnConfig,
        // Optional additional DataTable configurations
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        responsive: true,
        language: {
            processing: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
        },
        // Error handling
        error: function(xhr, error, thrown) {
            console.error('DataTables error:', error, thrown);
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    $('.ajax-request').on('submit', (event) => {
        event.preventDefault();
        const form = $(event.target);
        
        // Check if the form has file inputs
        const hasFileInputs = form.find('input[type="file"]').length > 0;
        
        // Prepare data based on whether files are present
        let formData;
        if (hasFileInputs) {
            // Use FormData to handle files
            formData = new FormData(form[0]);
        } else {
            // Use serialize for non-file forms
            formData = form.serialize();
        }
        
        // Configure AJAX options
        const ajaxOptions = {
            url: form.attr('action'),
            dataType: 'json',
            method: 'POST',
            data: formData,
            success: async function (data) {
                new Notify({
                    status: 'success',
                    text: "Gegevens opgeslagen!",
                });

                if (form.hasClass('reload-on-success')) {
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                }

                if(data.redirect !== undefined) {
                    setTimeout(() => {
                        location.href = data.redirect;
                    }, 1000);
                }
            }
        };
        
        // Add necessary options for FormData/file uploads
        if (hasFileInputs) {
            ajaxOptions.processData = false;
            ajaxOptions.contentType = false;
        }
        
        // Send the request
        $.ajax(ajaxOptions);
    });
});