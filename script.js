function increaseCount(a, b) {
  var input = b.previousElementSibling;
  var value = parseInt(input.value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  input.value = value;
}

function decreaseCount(a, b) {
  var input = b.nextElementSibling;
  var value = parseInt(input.value, 10);
  if (value > 1) {
    value = isNaN(value) ? 0 : value;
    value--;
    input.value = value;
  }
}


/* form validation */
function validateForm() {
      const itemName = document.getElementById('item_name').value;
      const itemType = document.getElementById('item_type').value;
      const itemSize = document.getElementById('item_size').value;
      const itemColor = document.getElementById('item_color').value;
      const itemPrice = document.getElementById('item_price').value;

      if (itemName === '' || itemType === '' || itemSize === '' || itemColor === '' || itemPrice === '') {
        alert('Please fill in all fields.');
        return false; // Prevent form submission
      }

      // Additional validation logic can be added here for specific fields

      return true; // Allow form submission
    }

    // Attach the form validation function to the form submission event
    document.querySelector('form').addEventListener('submit', function(event) {
      if (!validateForm()) {
        event.preventDefault(); // Prevent form submission if validation fails
      }
    });