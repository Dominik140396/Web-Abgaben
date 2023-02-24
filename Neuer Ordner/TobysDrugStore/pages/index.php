<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toby´s Drug Store</title>
    <link rel="stylesheet" href="../styling/style.css">
</head>
<body>

<h1>Toby´s Drug Store</h1>
<h2><a href="orders.php">Accepted Orders</a></h2>


<div>
    <h2>Choose your Order</h2>
    <form action="..\logic\logicInsert.php" method="post">

        <section class="flex">
            <label for="deliveryLocation">Delivery place</label>
            <input type="text" id="deliveryLocation" name="deliveryLocation" required placeholder="Delivery place">
        </section>

        <section class="flex">
            <label for="deliveryInfo">Delivery place Information</label>
            <textarea id="deliveryInfo" name="deliveryInfo" placeholder="Delivery place Information" required></textarea>
        </section>


        <section class="flex">
            <label>Desire drug</label>
            <div class="radio">
                <div>
                    <select name="drugType" id="drugType">
                        <option value="Heroin">Heroin</option>
                        <option value="Fentanyl">Fentanyl</option>
                        <option value="Kokain">Kokain</option>
                        <option value="CrystalMeth">Crystal Meth</option>
                        <option value="Cannabis">Cannabis</option>
                    </select>

                </div>
            </div>
        </section>


        <section class="flex">
            <label>Weight</label>
            <div>
                <div class="radio">
                    <input type="radio" name="weight" value="Gramm" required>gramm
                </div>
                <div class="radio">
                    <input type="radio" name="weight" value="Kilogramm" required>kilogramm
                </div>
        </section>


        <section class="flex">
            <label for="quantity">Quantity of weight</label>
            <div class="radio">
                <input type="number" id="quantity" name="quantity" min="1" max="100" required>
            </div>
        </section>


        <section class="flex">
            <label>Purity Grade</label>
            <div>
                <div class="checkBoxen">50%
                    <input type="range" name="purityGrade" min="50" max="99" step=1 >99%
                </div>
            </div>
        </section>


        <section class="flex">
            <button type="reset" class="btn btn-cancel">Reset</button>
            <button type="submit" class="btn btn-send">Order</button>
        </section>


    </form>
</div>

</body>
</html>