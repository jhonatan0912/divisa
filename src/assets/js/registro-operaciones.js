const inputTime = document.getElementById('input-time')
const time = () => {
  setInterval(() => {
    let date = new Date();
    inputTime.value = `${date.toLocaleTimeString()}`
  }, 1000)
}
time()

const inputDate = document.getElementById('input-date')
const showActualDate = () => {
  let date = new Date()
  inputDate.value = `${date.toLocaleDateString()}`
}
showActualDate()