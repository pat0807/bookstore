const verify = document.getElementById('verify')
const input_code = document.getElementById('input_code')
const register_btn = document.getElementById('register_btn')
const form = document.getElementById('form')

let code = ""

register_btn.addEventListener('click', ()=>{
    if(code != input_code.value) {
        alert("驗證碼錯誤!")
        generate_code()
        return
    }
    form.submit()
})

generate_code()

function generate_code(){
    let code1 = Math.floor(Math.random() * 10)
    let code2 = Math.floor(Math.random() * 10)
    let code3 = Math.floor(Math.random() * 10)
    let code4 = Math.floor(Math.random() * 10)

    const arr = []

    arr.push(code1,code2,code3,code4)

    code = arr.join('')
    verify.innerHTML = code
}