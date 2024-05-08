function isPasswordComplex(pwd) {
    const uppercaseRegex = /[A-Z]/;
    const lowercaseRegex = /[a-z]/;
    const numberRegex = /[0-9]/;
    const specialCharRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

    const hasUppercase = uppercaseRegex.test(pwd);
    const hasLowercase = lowercaseRegex.test(pwd);
    const hasNumber = numberRegex.test(pwd);
    const hasSpecialChar = specialCharRegex.test(pwd);

    return hasLowercase && hasNumber && hasSpecialChar && hasLowercase;
}
function isPhoneNumValid(pN){
    const phoneRegex = /^0\d{9}$/;
    return phoneRegex.test(pN);
}
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let username = document.getElementById('username').value;
    let password = document.getElementById('pwd').value;
    let confPassword = document.getElementById('confPwd').value;
    let phoneNum = document.getElementById('pNum').value;

    let usernameErr = document.getElementById('usernameError');
    let passwordErr = document.getElementById('passwordError');
    let confPasswordErr = document.getElementById('confPasswordError');
    let phoneNumErr = document.getElementById('phoneNumError');
    
    let valid = true;

    if (username === '') {
        usernameErr.textContent = 'Username không được để trống!';
        valid = false;
    } else if (username.length < 6) {
        usernameErr.textContent = 'Username phải có ít nhất 6 ký tự!';
        valid = false;
    } 

    if (password === '') {
        passwordErr.textContent = 'Mật khẩu không được để trống!';
        valid = false;
    } else if (password.length < 8) {
        passwordErr.textContent = 'Mật khẩu phải có ít nhất 8 ký tự!';
        valid = false;
    } else if (!isPasswordComplex(password)) {
        passwordErr.textContent = 'Mật khẩu phải có chữ thường, chữ in hoa, số và kí tự đặc biệt!';
        valid = false;
    } else {
        passwordErr.textContent = '';
    }

    if(confPassword !== password){
        confPasswordErr.textContent = 'Xác nhận mật khẩu không trùng khớp với mật khẩu đã ghi!';
        valid = false;
    } else {
        confPasswordErr.textContent = '';
    }

    if(!isPhoneNumValid(phoneNum)){
        phoneNumErr.textContent = 'Số điện thoại không đúng!'
        valid = false;
    } else {
        phoneNumErr.textContent = '';
    }

    if (!valid) {
        event.preventDefault(); // Prevent the form from submitting if there are validation errors
    }
});