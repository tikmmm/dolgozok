document.addEventListener('DOMContentLoaded', () => {
    const setSortOrder = () => {
        // Rendezés frissítése
        const urlParams = new URLSearchParams(window.location.search);
        const sortBy = urlParams.get('sort_by') || 'id';
        const sortOrder = urlParams.get('sort_order') || 'asc';

        // Korábbi rendezés eltávolítása
        document.querySelectorAll('th a').forEach(link => {
            link.classList.remove('sort-asc', 'sort-desc');
        });

        // Rendezési állapot beállítása
        const updateSortClass = (selector, order) => {
            const header = document.querySelector(selector);
            if (header) {
                header.classList.add(order === 'asc' ? 'sort-asc' : 'sort-desc');
            }
        };

        // ID oszlop esetén más logika, mert már eleve rendezve van
        if (sortBy === 'id') {
            updateSortClass(`th a[href*='sort_by=id']`, sortOrder);
        } else {
            updateSortClass(`th a[href*='sort_by=${sortBy}']`, sortOrder);
        }
    };

    // Rendezés frissítése kattintáskor
    document.querySelectorAll('th a').forEach(link => {
        link.addEventListener('click', event => {
            const urlParams = new URLSearchParams(window.location.search);
            const sortBy = new URL(link.href).searchParams.get('sort_by');
            const currentSortOrder = urlParams.get('sort_order') || 'asc';
            const newSortOrder = sortBy === 'id' ?
                (currentSortOrder === 'asc' ? 'desc' : 'asc') :
                (urlParams.get('sort_by') === sortBy ? (currentSortOrder === 'asc' ? 'desc' : 'asc') : 'asc');

            urlParams.set('sort_by', sortBy);
            urlParams.set('sort_order', newSortOrder);
            window.location.search = urlParams.toString();
            event.preventDefault();
        });
    });

    setSortOrder();
});
