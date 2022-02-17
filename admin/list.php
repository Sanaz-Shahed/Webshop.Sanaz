<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <div class="table-responsive">
            <table id="data_list" class="table table-striped">
                <thead class="">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Parent</th>
                    <th>action</th>
                </tr>

                </thead>

                <tbody id="tbody">

                </tbody>

            </table>

        </div>
    </div>

<script>
    async function getAllProducts() {
        const action = "getAll";
        let products = await makeRequest(`../../receivers/productReceiver.php?action=${action}`, "GET")
        console.log(products)
        let html = '';
        for (const x in products){
            let product = products[x]
            html += `<tr>
                        <td>${product['id']}</td>
                        <td>${product['name']}</td>
                        <td><input id="quantity${product['id']}" name="quantity" value="${product['quantity']}"onchange="updateProductQuantity(${product['id']})"</td>
                        <td>${product['price']}</td>

                    </tr>`;

        }
        document.getElementById('tbody').innerHTML = html;

    }
    getAllProducts()
    async function updateProductQuantity(id) {
        let quantity = document.getElementById(`quantity${id}`).value;
        const action = "updateProduct";
        let result = await makeRequest(`../../receivers/productReceiver.php?action=${action}&id=${id}&quantity=${quantity}`, "GET")
       if (result.status){
           Swal.fire({
               title: 'Done!',
               text: `Product ${result.id} Quantity Changed to ${result.quantity}`,
               icon: 'success',
               confirmButtonText: 'OK'
           })
       }
    }
    $(document).ready( function () {
        $('#data_list').DataTable();
    } );
</script>
    
</body>
</html>