document.addEventListener('DOMContentLoaded', () => {
    const grid = document.getElementById('wcgl-category-grid');
    const loadMore = document.getElementById('wcgl-load-more');

    if (!grid || !loadMore) return;

    let page = parseInt(grid.dataset.page, 10);
    const perPage = parseInt(grid.dataset.perPage, 10);

    const loadCategories = () => {
        const formData = new FormData();
        formData.append('action', 'load_product_categories');
        formData.append('nonce', WCGL_DATA.nonce);
        formData.append('page', page);
        formData.append('per_page', perPage);

        loadMore.disabled = true;
        loadMore.textContent = 'Loading...';

        fetch(WCGL_DATA.ajax_url, {
            method: 'POST',
            body: formData,
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const { html, has_more } = data.data;

                const temp = document.createElement('div');
                temp.innerHTML = html;

                // Separate category grid and has_more
                const categories = temp.querySelectorAll('.wcgl-category');
                categories.forEach(cat => grid.appendChild(cat));

                page++;
                grid.dataset.page = page;

                if (!has_more) {
                    loadMore.style.display = 'none';
                } else {
                    loadMore.disabled = false;
                    loadMore.textContent = 'Load More';
                }
            } else {
                loadMore.style.display = 'none';
            }
        })
        .catch(() => {
            loadMore.style.display = 'none';
        });
    };

    loadCategories(); // Initial load
    loadMore.addEventListener('click', loadCategories);
});
