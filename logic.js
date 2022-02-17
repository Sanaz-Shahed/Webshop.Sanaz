document.getElementById("getAll").addEventListener("click", getAllProducts)
document.getElementById("getById").addEventListener("click", getProductFromId)
document.getElementById("add").addEventListener("click", addProduct)
document.getElementById("delete").addEventListener("click", deleteProduct)
document.getElementById("order_getAll").addEventListener("click", getAllOrders)

async function makeRequest(url, method, body) {
    try {
        let response = await fetch(url, {
            method,
            body
        })
        let result = await response.json();
        return result
    } catch(err) {
        console.error(err)
    }
}

async function getAllProducts() {
    const action = "getAll";

    let allProducts = await makeRequest(`./receivers/productReceiver.php?action=${action}`, "GET")
    console.log(allProducts)
}

async function getProductFromId() {
    const action = "getById";
    const idToGet = 3;

    let specificProduct = await makeRequest(`./receivers/productReceiver.php?action=${action}&id=${idToGet}`, "GET")
    console.log(specificProduct)
}

async function addProduct() {
    const action = "add";
    const productToAdd = {
        name: "Sony a7 III",
        quantity: 4, 
        price: 21980,
        description: "Full-frame Mirrorless Interchangeable-Lens Camera with 28-70mm Lens with 3-Inch LCD, Black",
        image: "https://www.gotaplatsensfoto.se/pub_images/original/sony-a7-iii-kit.jpg" 
    }

    var body = new FormData()
    body.append("action", action)
    body.append("product", JSON.stringify(productToAdd))

    let status = await makeRequest(`./receivers/productReceiver.php`, "POST", body)
    console.log(status)
}

async function deleteProduct() {

    const action = "delete";
    const idToDelete = 18;

    var body = new FormData()
    body.append("action", action)
    body.append("id", idToDelete)

    let status = await makeRequest(`./receivers/productReceiver.php`, "POST", body)
    console.log(status)
}


async function getAllOrders() {
    alert('hi')
    const action = "getAll";

    let allProducts = await makeRequest(`./receivers/orderReceiver.php?action=${action}`, "GET")
    console.log(allProducts)
}
