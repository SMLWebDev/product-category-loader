document.addEventListener('DOMContentLoaded', () => {
  let page = 1;
  const loadMoreBtn = document.getElementById('load-more-categories');
  const grid = document.getElementById('category-grid');

  async function loadCategories() {
    try {
      const formData = new FormData();
      formData.append('action', 'load_product_categories');
      formData.append('nonce', wcgl_ajax.nonce);
      formData.append('page', page);
      formData.append('per_page', wcgl_settings.per_page)

      const response = await fetch(wcgl_ajax.ajax_url, {
        method: 'POST',
        body: formData,
      });

      const data = await response.json();

      if (data.success) {
        const div = document.createElement('div');
        div.innerHTML = data.data;
        [...div.children].forEach(child => grid.appendChild(child));
        page++;
      } else {
        loadMoreBtn.style.display = 'none';
      }
    } catch (err) {
      console.error('Failed to load categories:', err);
    }
  }

  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', loadCategories);
    loadCategories(); // Load initial batch
  }
});
