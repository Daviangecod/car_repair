document.addEventListener('DOMContentLoaded', () => {
    
    const addShopForm = document.querySelector('#addShopForm');

   

    if(addShopForm !== null) {
        
        const locationField = addShopForm.querySelector('#location');
        const otherLocationField = addShopForm.querySelector('#otherLocation');

        
        locationField.addEventListener('change', () => {
            if(locationField.value === "other") {
                otherLocationField.classList.remove('d-none');
            }
            else {
                otherLocationField.classList.add('d-none');
            }
        });
    }

});