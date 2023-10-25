function closeModalDelete (event) {
  event.preventDefault();
  document.getElementById('delete-modal').style.visibility = "hidden"
}

function openModalDelete(event) {
  event.preventDefault();
  document.getElementById('delete-modal').style.visibility = "visible";
  const submitButton = document.getElementById("delete-btn");
  submitButton.style.backgroundColor = "grey";
  const inputField = document.getElementById("confirm-delete");
  inputField.value="";
}

// Get to the input field and the button
const inputField = document.getElementById("confirm-delete");
const submitButton = document.getElementById("delete-btn");

// update button style 
function updateButtonStyle() {
  if (inputField.value === "DELETE") {
    submitButton.disabled = false;
    submitButton.style.backgroundColor = "#E85555";
  } else {
    submitButton.disabled = true;
    submitButton.style.backgroundColor = "grey";
  }
}


inputField.addEventListener("input", updateButtonStyle);
inputField.addEventListener("blur", updateButtonStyle);