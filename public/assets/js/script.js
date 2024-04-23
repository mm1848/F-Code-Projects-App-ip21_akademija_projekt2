document.querySelectorAll('.favorite-btn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const selectElement = this.closest('.favorite-btn-container').querySelector('select');
        const currencyId = selectElement.value.split(' - ')[0];
        const isFavorited = this.classList.contains('favorited');

        const actionUrl = isFavorited ? `/favourites/delete/${currencyId}` : '/favourites/add';
        const method = isFavorited ? 'DELETE' : 'POST';
        
        fetch(actionUrl, {
            method: method,  // Uporabite dejansko metodo glede na stanje
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: `currency_name=${currencyId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                this.classList.toggle('favorited', !isFavorited);
                console.log('Updated favourites list:', data.favourites);
            } else {
                alert('Failed to update favourite: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

function updateFavouriteList(favourites) {
    const dropdownElement = document.getElementById('favouriteCurrenciesDropdown');
    if (!dropdownElement) {
        console.error('Dropdown element for favourite currencies not found.');
        return;
    }
    while (dropdownElement.options.length > 1) {
        dropdownElement.remove(1);
    }
    favourites.forEach(favourite => {
        const option = new Option(favourite.currency_name, favourite.currency_id);
        dropdownElement.add(option);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('priceForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(form);

        fetch(`${form.action}?${new URLSearchParams(formData)}`, {
            method: 'GET'
        })
        .then(response => response.text())
        .then(data => {
            const resultDiv = document.getElementById('priceResult');
            resultDiv.innerHTML = data;
            resultDiv.style.display = 'block';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});