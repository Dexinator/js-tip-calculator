<?php
require "obtener_carta.php";
$_AVT = new obtener_Productos();
$carta=$_AVT->obtplatillos();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tip Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Tip Calculator</h1>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-currency-dollar"></i>
                            </span>

                            <input type="text" list="listproductos" oninput=onInput() id="myproduct" name="inputProds"
                                class="form-control form-control-lg lista" placeholder="Agrega productos" />
                            <datalist id="listproductos">
                                <?php foreach ($carta as $producto){
                                echo "<option value='{$producto['Nombre']}, {$producto['Precio']}'></option>";
                                } ?>
                            </datalist>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-currency-dollar"></i>
                            </span>

                            <input type="number" id="cuenta" class="form-control form-control-lg total" min="0"
                                step="0.01" placeholder="Total Check">
                        </div>
                        <div class="input-group">
                            <table id="myTable">
                                <tr>
                                    <td>Producto</td>
                                    <td>Precio</td>
                                </tr>
                            </table>

                        </div>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-people-fill"></i>
                            </span>
                            <input type="number" class="form-control form-control-lg people" min="1"
                                placeholder="Total # of Guests">
                        </div>
                        <div class="text-center">
                            <label class="form-label">Select Tip Percentage</label>
                            <div class="form-check">
                                <div class="radio-button-label">
                                    <input type="radio" name="percentage" id="percentage0" class="percentage" checked
                                        value="0">
                                    <label for="percentage0">0%</label>
                                </div>
                                <div class="radio-button-label">
                                    <input type="radio" name="percentage" id="percentage10" class="percentage"
                                        value="10">
                                    <label for="percentage10">10%</label>
                                </div>
                                <div class="radio-button-label">
                                    <input type="radio" name="percentage" id="percentage15" class="percentage"
                                        value="15">
                                    <label for="percentage15">15%</label>
                                </div>
                                <div class="radio-button-label">
                                    <input type="radio" name="percentage" id="percentage18" class="percentage"
                                        value="18">
                                    <label for="percentage18">18%</label>
                                </div>
                                <div class="radio-button-label">
                                    <input type="radio" name="percentage" id="percentage20" class="percentage"
                                        value="20">
                                    <label for="percentage20">20%</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <p class="text-center">
                            <button type="button" class="btn btn-primary btn-lg calculateBtn">Calculate Tips</button>
                        </p>
                    </div>
                </div>
                <br>
                <div class="result">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Total<span>Per Person</span></h3>
                                    <span class="perperson">$0.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Tip<span>Per Person</span></h3>
                                    <span class="tipamount">$0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="calculator.js"></script>
    <script>
    function onInput() {
        var val = document.getElementById("myproduct").value;
        var opts = document.getElementById('listproductos').children;
        for (var i = 0; i < opts.length; i++) {
            if (opts[i].value === val) {
                // An item was selected from the list!
                // yourCallbackHere()
                var selected_prod = opts[i].value;
                var selected_array = selected_prod.split(", ");
                doTheInsert(selected_array[0], selected_array[1]);
                document.getElementById("myproduct").value = "";
                break;
            }
        }
        var table = document.querySelector('table');
        var sum = 0;

        for (var i = 1; i < table.rows.length; i++) {
            sum = sum + parseFloat(table.rows[i].cells[1].textContent);
        }
        console.log(sum);
        document.getElementById("cuenta").value=sum;
    }


    function doTheInsert(nombre, precio) {
        var newRow = document.getElementById('myTable').insertRow();
        newRow.innerHTML = "<td>" + nombre + "</td><td>" + precio + "</td>";
    }
    </script>
</body>

</html>