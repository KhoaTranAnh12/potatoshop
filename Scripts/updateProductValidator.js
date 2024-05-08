document.getElementById('updateProductForm').addEventListener('submit', function(event) {
    let pType = document.getElementById('potatoType').value;
    let q = Number(document.getElementById('quantity').value);
    let desc = document.getElementById('description').value;
    console.log('desc: ' + desc);

    let pTypeErr = document.getElementById('potatoTypeError');
    let qErr = document.getElementById('quantityError');
    let descErr = document.getElementById('descriptionError');
    
    let valid = true;

    if (pType == '') {
        pTypeErr.textContent = 'Loại khoai không được để trống!';
        valid = false;
    } else {
        pTypeErr.textContent = '';
    }

    if(q == 0){
        qErr.textContent = 'Số lượng không được rỗng!';
        valid = false;
    } else {
        qErr.textContent = '';
    }

    if (desc == '') {
        descErr.textContent = 'Mô tả không được để trống!';
        valid = false;
    } else {
        descErr.textContent = '';
    }

    if (!valid) {
        event.preventDefault(); // Prevent the form from submitting if there are validation errors
    }
});