document.addEventListener('DOMContentLoaded', () => {
    
    const addShopForm = document.querySelector('#addShopForm');

    if(addShopForm !== null) {
        
        const locationField = addShopForm.querySelector('#location');
        const hiddenTextField = addShopForm.querySelector('#otherLocation');
        
        locationField.addEventListener('change', () => {
            if(locationField.value === "other") {
                hiddenTextField.classList.remove('d-none');
            }
            else {
                hiddenTextField.classList.add('d-none');
            }
        });
    }

});