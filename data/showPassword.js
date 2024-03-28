const showPassword = (inputId) => {
    const passwordInput = document.getElementById(inputId)
    passwordInput.type = (passwordInput.type === "password") ? "text" : "password"
}

document.getElementById('button-pass').addEventListener('click', (e) => {
    e.preventDefault()
    showPassword('input-password')
}) 

document.getElementById('button-pass2').addEventListener('click', (e) => {
    e.preventDefault()
    showPassword('input-password2')
})

document.getElementById('button-pass3').addEventListener('click', (e) => {
    e.preventDefault()
    showPassword('input-password3')
})