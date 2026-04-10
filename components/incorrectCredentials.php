<div id="errorModal"
    class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div id="modalContent"
        class="bg-white rounded-xl shadow-2xl p-8 w-full max-w-sm transform scale-95 transition-transform duration-300">
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-12 h-12 text-red-600">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>

            <h3 class="text-xl font-bold text-zinc-900">Login Failed</h3>
            <p class="text-zinc-500 mt-2">The username or password you entered is incorrect. Please try again.</p>

            <button id="closeModal"
                class="cursor-pointer mt-6 w-full py-2 bg-zinc-900 text-white rounded-lg hover:bg-zinc-800 transition-colors font-semibold">
                Try Again
            </button>
        </div>
    </div>
</div>