    function toggleDropdown(event) {
        event.stopPropagation(); // Prevent click from bubbling
        const menu = document.getElementById('profileMenu');
        menu.classList.toggle('active');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('profileMenu');
        if (menu && !menu.contains(event.target)) {
            menu.classList.remove('active');
        }
    });