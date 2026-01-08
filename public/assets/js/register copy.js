    function togglePassword(fieldId) {
        const pass = document.getElementById(fieldId);
        pass.type = pass.type === 'password' ? 'text' : 'password';
    }

    // Auto hide alert after 5 seconds
    const alerts = document.querySelectorAll('.alert.show');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.3s';
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 300);
        }, 5000);
    });

