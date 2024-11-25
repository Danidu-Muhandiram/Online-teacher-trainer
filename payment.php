<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>TeachConnect</title>
        <link rel="stylesheet" href="danidu_css/payment.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
    </head>

    <body>

    <nav>
    <nav class="navbar">
                <div class="payment_cancel">
                    <button onclick="window.location.href='home.html';" class="register_button">Cancel Payment</button>
                </div>
    </nav>
        <section class="payment_container">
            <div class="payment_details">
                <h1>Payment Details</h1>
                <div class="billing_address">
                    <h2>Billing Address</h2>
                    <form action="" method="POST" onsubmit="return validatePayment()">
                        <div class="input_box">
                            <label>Name</label>
                            <input id="billing_name" type="text" class="input" placeholder="Name" required>
                        </div>
                        <div class="input_box">
                            <label>Country</label>
                            <input id="billing_country" type="text" class="input" placeholder="Country Name" required>
                        </div>
                   
                </div>

                <div class="payment_method">
                    <h2>Choose Payment Method</h2>
                    <div class="payment_option">
                        <label>
                            <input type="radio" name="payment" value="visa" required>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa">
                        </label>

                        <label>
                            <input type="radio" name="payment" value="paypal">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/PayPal_logo.svg" alt="PayPal">
                        </label>
                    </div>
                    
                    <div class="billing_box">
                        <div class="input_box">
                            <label>Card Holder Name</label>
                            <input id="payment_card_name" type="text" class="input" placeholder="Card Holder Name" required>
                        </div>

                        <div class="input_box">
                            <label>Card Number</label>
                            <input id="payment_card_number" type="text" class="input" placeholder="Card Number" required>
                        </div>

                        <div class="date_cvv">
                            <div class="input_box">
                                <label>Expiration Date</label>
                                <input id="payment_card_date" type="date" class="input" placeholder="expir date" required>
                            </div>

                            <div class="input_box">
                                <label>CVV</label>
                                <input id="payment_card_cvv" type="text" class="input" placeholder="CVV Number" required>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="submit_button">Submit</button>
                    </form>
                 </div>
            </div>

            <div class="order_summery">
                <h1>Order Summery </h1> 
    
            </div>
        </section>







        <script src="danidu_js/script.js"></script>
        <script src="danidu_js/payment.js"></script>
    </body>






</html>