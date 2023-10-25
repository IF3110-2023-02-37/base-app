function closeModalDelete (event) {
    event.preventDefault();
    document.getElementById('delete-modal').style.visibility = "hidden";
    console.log("test");
  }
  
  function openModalDelete(event) {
    event.preventDefault();
    document.getElementById('delete-modal').style.visibility = "visible";
  }
  
  // Get references to the input field and the button
  const inputField = document.getElementById("confirm-delete");
  const submitButton = document.getElementById("delete-btn");
  
  // Add an input event listener to the input field
  inputField.addEventListener("input", function() {
  
    // Check if the input value is "DELETE" and enable/disable the button accordingly
    if (inputField.value === "DELETE") {
      submitButton.disabled = false;
      submitButton.style.backgroundColor = "#E85555";
    } else {
      submitButton.disabled = true;
    }
  });