document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.pcl-categories');
    const loadMore = document.getElementById('pcl-load-more');

    if (!container || !loadMore) return;

    const loadCategories = () => {
        loadMore.disabled = true;
        loadMore.textContent = 'Loading...';

        fetch(PCL_DATA.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'load_product_categories',
                nonce: PCL_DATA.nonce,
                page: container.dataset.page,
                per_page: container.dataset.perPage,
                orderby: container.dataset.orderby || 'name',
                order: container.dataset.order || 'ASC',
                hide_empty: container.dataset.hideEmpty === 'true' ? '1' : '0',
                layout: container.dataset.layout || 'grid'
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const temp = document.createElement('div');
                temp.innerHTML = data.data.html;
                container.append(...temp.children);
                container.dataset.page = parseInt(container.dataset.page) + 1;
                loadMore.style.display = data.data.has_more ? '' : 'none';
            } else {
                loadMore.style.display = 'none';
            }
        })
        .catch(() => {
            loadMore.style.display = 'none';
        })
        .finally(() => {
            loadMore.disabled = false;
            loadMore.textContent = 'Load More';
        });
    };

    loadMore.addEventListener('click', loadCategories);
    loadCategories(); // Initial load
});