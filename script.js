window.onload = function () {
    const modal = document.querySelector('#addEmployeeModal');
    const modalContent = document.querySelector('#modalContent');
    const openBtn = document.querySelector('#addEmployee');
    const closeIcon = document.querySelector('#closeIcon');
    const closeBtn = document.querySelector('#closeBtn');

    openBtn.addEventListener('click', function () {
        modal.classList.remove('hidden');

        setTimeout(() => {
            modal.classList.add('opacity-100');
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);
    });

    closeIcon.addEventListener('click', function () {
        closeAddEmployeeModal();
    });

    closeBtn.addEventListener('click', function () {
        closeAddEmployeeModal();
    });

    window.onclick = function(event) {
        if (event.target == modal) {
            closeAddEmployeeModal();
        }
    }

    function closeAddEmployeeModal(){
        const modal = document.getElementById('addEmployeeModal');
        const content = document.getElementById('modalContent');
        const form = modal.querySelector('form'); // Get the form inside the modal

        // 1. Start Scale Out animation
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');

        // 2. Wait for transition (300ms) then hide and RESET
        setTimeout(() => {
            modal.classList.add('hidden');
            form.reset(); // This clears all text fields and select values
            
            // Remove error messages if they are visible
            const errors = modal.querySelectorAll('.text-red-700');
            errors.forEach(error => error.remove());
        }, 300);
    }
}

function closeSuccessModal() {
    const successModal = document.getElementById('successModal');
    if (successModal) {
        successModal.classList.add('hidden');
        // This removes the "?success=1" from the URL without reloading the page
        window.history.replaceState({}, document.title, window.location.pathname);
    }
}