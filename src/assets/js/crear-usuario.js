let nameInput = document.getElementById('name')
let lastNameInput = document.getElementById('lastName')
nameInput.addEventListener('keydown', (e) => {

  if (e.key == "1" ||
    e.key == "2" ||
    e.key == "3" ||
    e.key == "4" ||
    e.key == "5" ||
    e.key == "6" ||
    e.key == "7" ||
    e.key == "8" ||
    e.key == "9" ||
    e.key == "0"
  ) {
    nameInput.style.border = "3px solid red"

  } else {
    nameInput.style.border = "3px solid green"

  }
})
lastNameInput.addEventListener('keydown', (e) => {

  if (e.key == "1" ||
    e.key == "2" ||
    e.key == "3" ||
    e.key == "4" ||
    e.key == "5" ||
    e.key == "6" ||
    e.key == "7" ||
    e.key == "8" ||
    e.key == "9" ||
    e.key == "0"
  ) {
    lastNameInput.style.border = "3px solid red"

  } else {
    lastNameInput.style.border = "3px solid green"

  }
})