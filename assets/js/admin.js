document.addEventListener('DOMContentLoaded', function() {
    // Updated selectors to match new HTML structure
    const inputs = document.querySelectorAll('.wcgl-generator input, .wcgl-generator select');
    const output = document.getElementById('wcgl_shortcode');
    const copyButton = document.querySelector('.wcgl-generator-output__copy');
    const generateButton = document.querySelector('.wcgl-generator-output__generate');

    const generateShortcode = () => {
        const perPage = document.getElementById('wcgl_per_page').value || 6;
        const columns = document.getElementById('wcgl_columns').value || 3;
        const order = document.getElementById('wcgl_order').value || 'ASC';
        const orderby = document.getElementById('wcgl_orderby').value || 'name';
        const hideEmpty = document.getElementById('wcgl_hide_empty').checked ? 'true' : 'false';
        const layout = document.getElementById('wcgl_layout_option').value || 'grid';

        output.value = `[woo_category_grid per_page='${perPage}' columns='${columns}' orderby='${orderby}' order='${order}' hide_empty='${hideEmpty}' layout='${layout}']`;
    };

    // Add event listeners to all inputs and selects
    inputs.forEach(input => {
        input.addEventListener('input', generateShortcode);
    });

    // Generate button click handler
    generateButton.addEventListener('click', generateShortcode);

    // Copy button click handler
    copyButton.addEventListener('click', function() {
        output.select();
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(output.value).then(() => {
                copyButton.textContent = 'Copied!';
            }).catch(err => {
                console.error('Clipboard copy failed:', err);
            });
        } else {
            // Fallback method for insecure context or unsupported browsers
            output.select();
            document.execCommand('copy');
            copyButton.textContent = 'Copied!';
        }
        setTimeout(() => {
            copyButton.textContent = 'Copy Shortcode';
        }, 5000);
    });

    // Initial generation with default values
    generateShortcode();
});