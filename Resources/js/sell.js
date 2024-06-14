function addProduct() {

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var category = document.getElementById('category').value;
    var location = document.getElementById('location').value;

    var photoInput = document.getElementById('picture');
    var picture = '';
    
    if (photoInput.files.length > 0) {
        picture = URL.createObjectURL(photoInput.files[0]);
    }

    var description = document.getElementById('description').value;
    var socialMedia = document.getElementById('social-media').value;
    var price = document.getElementById('price').value;

    var product = {
        name: name,
        email: email,
        phone: phone,
        category: category,
        location: location,
        picture: picture,
        description: description,
        socialMedia: socialMedia,
        price: price
    };

    var products = JSON.parse(localStorage.getItem('products')) || [];
    products.push(product);
    localStorage.setItem('products', JSON.stringify(products));
    console.log(product.picture);
    alert('Product added successfully!');
    
    document.getElementById('name').value = '';
    document.getElementById('email').value = '';
    document.getElementById('phone').value = '';
    document.getElementById('category').value = '';
    document.getElementById('location').value = '';
    document.getElementById('picture').value = '';
    document.getElementById('description').value = '';
    document.getElementById('social-media').value = '';
    document.getElementById('price').value = '';

    window.location.href = "../../App/pages/home.html";
}

