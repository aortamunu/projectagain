let emailField = document.querySelector("#email")
let emailField_op = document.querySelector("#email_op")

emailField.addEventListener("keyup",function(event) {
    emailField_op.innerText = event.target.value
})

let genderFields = document.querySelectorAll("input[type='radio'][name='gender']")
let genderField_op = document.querySelector("#gender_op")

console.log(genderField_op);

genderFields.forEach(genderField => {
    console.log(genderField);
    genderField.addEventListener("click",function(event){
        console.dir(genderField)
        genderField_op.innerText = event.target.value
    })
});
