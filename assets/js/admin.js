document.addEventListener('DOMContentLoaded', function() {
                const inputs = document.querySelectorAll('.wcgl_generator input, .wcgl_generator select')
                const output = document.getElementById('wcgl_shortcode')
                const button = document.querySelector('.wcgl_shortcode_copy')
                const generateButton = document.querySelector('.wcgl_generate')

                const generateShortcode = () => {
                    const perPage = document.getElementById('wcgl_per_page').value || 6
                    const columns = document.getElementById('wcgl_columns').value || 3
                    const order = document.getElementById('wcgl_order').value || 'ASC'
                    const orderby = document.getElementById('wcgl_orderby').value || 'name'
                    const layout = document.getElementById('wcgl_layout_option').value || 'grid'

                    output.value = `[woo_category_grid per_page='${perPage}' columns='${columns}' orderby='${orderby}' order='${order}' layout='${layout}']`
                };

                inputs.forEach(input => {
                    input.addEventListener('input', generateShortcode)
                })

                generateButton.addEventListener('click', generateShortcode)

                button.addEventListener('click', function() {
                    output.select()
                    if (navigator.clipboard && window.isSecureContext) {
                        navigator.clipboard.writeText(output.value).then(() => {
                            button.textContent = 'Copied!';
                        }).catch(err => {
                            console.error('Clipboard copy failed:', err);
                        });
                    } else {
                        // Fallback method for insecure context or unsupported browsers
                        output.select();
                        document.execCommand('copy');
                        button.textContent = 'Copied!';
                    }
                    setTimeout(() => {
                        button.textContent = 'Copy Shortcode'
                    }, 5000)
                })

                generateShortcode(); // Initial generation with default values
            });