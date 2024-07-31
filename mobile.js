const proClassElements = document.querySelectorAll('.pro-con'); // Select elements by class
function closeProduct() {
    proClassElements.forEach(element => {
        element.style.display = 'none'; // Display the elements
    });
    document.documentElement.classList.remove("no-scroll");
}
// Example function to show the product details (you can call this when needed)
function mobile1(event) {
    event.preventDefault();
    document.getElementById('pro-con').style.display = 'block';
    document.documentElement.classList.add("no-scroll");
    document.getElementById('main-img').src = './products/mobile-computer/sfold6.png';
    document.getElementById('img1').src = './products/mobile-computer/sfold6.png';
    document.getElementById('img2').src = './products/mobile-computer/sfold6-2.png';
    document.getElementById('img3').src = './products/mobile-computer/sfold6-3.png';
    document.getElementById('img4').src = './products/mobile-computer/sfold6-4.png';
    document.getElementById('name').innerHTML = 'Samsung Fold 6';
    document.getElementById('category').innerHTML = 'Mobile Phone';
    document.getElementById('price').innerHTML = '₹ 1,64,990';
    document.getElementById('pro-details').innerHTML = '<ul><li">12 GB RAM | 256 GB ROM</li><br><li">19.3 cm (7.6 inch) QXGA+ Display</li><br><li">50MP + 12MP + 10MP | 10MP Front Camera</li><br><li">4400 mAh Lithium ion Battery</li><li">Snapdragon 8 Gen 3 Processor</li></ul>';
}

function laptop1(event) {
    event.preventDefault();
    document.getElementById('pro-con').style.display = 'block';
    document.documentElement.classList.add("no-scroll");
    document.getElementById('main-img').src = './products/mobile-computer/amacbook15.png';
    document.getElementById('img1').src = './products/mobile-computer/amacbook15.png';
    document.getElementById('img2').src = './products/mobile-computer/m15-2.png';
    document.getElementById('img3').src = './products/mobile-computer/m15-3.png';
    document.getElementById('img4').src = './products/mobile-computer/m15-4.png';
    document.getElementById('name').innerHTML = 'Macbook 15 M3';
    document.getElementById('category').innerHTML = 'Laptop';
    document.getElementById('price').innerHTML = '₹ 1,45,999';
    document.getElementById('pro-details').innerHTML = '<ul><li>Stylish &amp; Portable Thin and Light Laptop</li><br><li>15 Inch Liquid Retina display, LED-backlit Display with IPS Technology, Native Resolution at 224 pixels per inch, 500 nits Brightness</li><br><li>Light Laptop without Optical Disk Drive</li></ul>';
}

function mobile2(event) {
    event.preventDefault();
    document.getElementById('pro-con').style.display = 'block';
    document.documentElement.classList.add("no-scroll");
    document.getElementById('main-img').src = './products/mobile-computer/x14ultra.png';
    document.getElementById('img1').src = './products/mobile-computer/x14ultra.png';
    document.getElementById('img2').src = './products/mobile-computer/x14-2.png';
    document.getElementById('img3').src = './products/mobile-computer/x14-3.png';
    document.getElementById('img4').src = './products/mobile-computer/x14-4.png';
    document.getElementById('name').innerHTML = 'Xiaomi 14 Ultra';
    document.getElementById('category').innerHTML = 'Mobile Phone';
    document.getElementById('price').innerHTML = '₹ 99,999';
    document.getElementById('pro-details').innerHTML = '<ul><li>16 GB RAM | 512 GB ROM</li><li>17.09 cm (6.73 inch) Display</li><li>50MP + 50MP + 50MP + 50MP | 32MP Front Camera</li><li>5000 mAh Battery</li><li>Snapdragon 8 Gen 3 Mobile Platform Processor</li></ul>';
}

function laptop2(event) {
    event.preventDefault();
    document.getElementById('pro-con').style.display = 'block';
    document.documentElement.classList.add("no-scroll");
    document.getElementById('main-img').src = './products/mobile-computer/asus-rog.png';
    document.getElementById('img1').src = './products/mobile-computer/asus-rog.png';
    document.getElementById('img2').src = './products/mobile-computer/a16-2.png';
    document.getElementById('img3').src = './products/mobile-computer/a16-3.png';
    document.getElementById('img4').src = './products/mobile-computer/a16-4.png';
    document.getElementById('name').innerHTML = 'Asus Zephyrus Duo 16';
    document.getElementById('category').innerHTML = 'Laptop';
    document.getElementById('price').innerHTML = '₹ 3,19,999';
    document.getElementById('pro-details').innerHTML = '<ul><li>14 Inch Full HD</li><li> OLED 16:10 aspect ratio, 0.2ms response time</li><li> 60Hz refresh rate</li><li> 400nits 500nits HDR peak brightness</li><li> 100% DCI-P3 color gamut</li><li> 1,000,000:1, VESA CERTIFIED Display HDR True Black 500</li><li>1.07 billion colors, PANTONE Validated</li><li> Glossy display, 70% less harmful blue light</li><li>Light Laptop without Optical Disk Drive</li></ul>';
}