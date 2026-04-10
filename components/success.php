<?php if (isset($_GET['success'])): ?>
    <div class="fixed inset-0 bg-black/30 backdrop-blur-sm z-[60] flex items-center justify-center" id="successModal">
        <div
            class="bg-white p-8 rounded-2xl shadow-2xl flex flex-col items-center text-center w-80 transform transition-all scale-100">
            <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Success!</h2>
            <p class="text-gray-600 mt-2">New employee has been added to the registry.</p>
            <button onclick="closeSuccessModal()"
                class="mt-6 w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg transition-colors">
                Continue
            </button>
        </div>
    </div>
    <script>
        function closeSuccessModal() {
            const successModal = document.getElementById('successModal');
            if (successModal) {
                successModal.classList.add('hidden');
                // This removes the "?success=1" from the URL without reloading the page
                window.history.replaceState({}, document.title, window.location.pathname);
            }
        }
    </script>
<?php endif; ?>