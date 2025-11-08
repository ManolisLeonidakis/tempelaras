document.addEventListener('DOMContentLoaded', function() {
    const wishlistBtn = document.getElementById('wishlist-btn');
    const wishlistText = document.getElementById('wishlist-text');

    if (wishlistBtn) {
        wishlistBtn.addEventListener('click', function() {
            const userId = this.dataset.userId;
            const route = this.dataset.route;
            const csrfToken = this.dataset.csrf;

            // Disable button during request
            wishlistBtn.disabled = true;

            fetch(route, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (data.in_wishlist) {
                        wishlistBtn.className = 'w-full inline-flex items-center justify-center px-6 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg wishlist-btn bg-red-500 hover:bg-red-600 text-white';
                        wishlistText.textContent = 'Αφαίρεση από Αγαπημένα';
                        wishlistBtn.querySelector('svg').classList.add('text-white');
                        wishlistBtn.querySelector('svg').classList.remove('text-red-500');
                        wishlistBtn.querySelector('svg').setAttribute('fill', 'white');
                    } else {
                        wishlistBtn.className = 'w-full inline-flex items-center justify-center px-6 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg wishlist-btn bg-gray-100 hover:bg-gray-200 text-gray-700';
                        wishlistText.textContent = 'Προσθήκη στα Αγαπημένα';
                        wishlistBtn.querySelector('svg').classList.add('text-red-500');
                        wishlistBtn.querySelector('svg').classList.remove('text-white');
                        wishlistBtn.querySelector('svg').setAttribute('fill', 'none');
                    }

                    // Update header wishlist count
                    updateWishlistCount(data.count);

                    // Show success message
                    showNotification(data.action === 'added' ? 'Προστέθηκε στα αγαπημένα!' : 'Αφαιρέθηκε από τα αγαπημένα!', 'success');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Σφάλμα κατά την ενημέρωση των αγαπημένων', 'error');
            })
            .finally(() => {
                // Re-enable button
                wishlistBtn.disabled = false;
            });
        });
    }

    function updateWishlistCount(count) {
        // Update Alpine.js count data
        if (window.Alpine) {
            // Find the wishlist count element and update its Alpine data
            const wishlistIcon = document.querySelector('a[href*="wishlist"]');
            if (wishlistIcon) {
                const countSpan = wishlistIcon.querySelector('span[x-data]');
                if (countSpan && countSpan._x_dataStack) {
                    // Update Alpine.js reactive data
                    countSpan._x_dataStack[0].count = count;
                }
            }
        }

        // Fallback: Update DOM directly if Alpine isn't available
        const countElements = document.querySelectorAll('a[href*="wishlist"] span.absolute');
        countElements.forEach(element => {
            element.textContent = count;
            if (count > 0) {
                element.style.display = 'flex';
            } else {
                element.style.display = 'none';
            }
        });
    }

    function showNotification(message, type = 'success') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg font-semibold shadow-lg transform transition-all duration-300 translate-x-full ${
            type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
        }`;
        notification.textContent = message;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
});
