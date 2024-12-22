const addShopForm = document.querySelector('#addShopForm');
const locationField = addShopForm.querySelector('#location');
const hiddenTextField = addShopForm.querySelector('#otherLocation');

console.log(locationField);


locationField.addEventListener('change', () => {
    if(locationField.value === "other") {
        hiddenTextField.classList.remove('d-none');
    }
    else {
        hiddenTextField.classList.add('d-none');
    }
});