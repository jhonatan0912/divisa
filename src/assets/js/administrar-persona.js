const searchIcon = document.getElementById('search-icon')
const formSearch = document.getElementById('form-search')
const closeIcon = document.getElementById('close')

searchIcon.addEventListener('click', () => {
  formSearch.classList.remove('oculto')
  formSearch.classList.add('mostrar')
})

closeIcon.addEventListener('click', () => {
  formSearch.classList.remove('mostrar')
  formSearch.classList.add('oculto')
})
