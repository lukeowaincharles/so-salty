<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
        <title>So Salty shop</title>
        <meta name="description" content="">

        <link rel="stylesheet" href="/static/ext/bootstrap-3.3.7/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/static/ext/bootstrap-3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,700" rel="stylesheet">
        <link rel="stylesheet" href="/static/css/master.css">
    </head>
   <?php
    $nameErr = $emailErr = $shippingErr = $areaErr = $paymentErr = "";
    $name = $email = $shipping = $area = $payment = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);

            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["shippingOpt"])) {
            $shippingErr = "Shipping option is required";
        } else {
            $shipping = test_input($_POST["shippingOpt"]);
        }
        if (empty($_POST["area"])) {
            $areaErr = "Postal area option is required";
        } else {
            $area = test_input($_POST["area"]);
        }
        
        if (empty($_POST["paymentOption"])) {
            $paymentErr = "Payment option is required";
        } else {
            $payment = test_input($_POST["paymentOption"]);
        }
        
        
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <body data-spy="scroll">
        <div id="pageLoader">
            <div class="background">
                <div class="circle-1"></div>
                <div class="circle-2"></div>
                <div class="circle-3"></div>    
            </div>
        </div>

        <main class="purchase-page">
            <div class="container">
                <div class="row" data-sticky-container>
                    <div class="col-md-4">
                        <section class="product__summary__wrapper sticky">
                            <img src="/static/img/poster-mockup.png" alt="So Salty Poster" />
                            <ul class="product__list">
                                <li class="product__list--item">Subtotal</li>
                                <li class="product__list--item">£12.99</li>
                                <li class="product__list--item">Shipping</li>
                                <li class="product__list--item">£10.75</li>
                                <li class="product__list--item last">Total</li>
                                <li class="product__list--item last">£23.74</li>
                            </ul>
                        </section>
                    </div>
                    <div class="col-md-push-2 col-md-6">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default basic__details--panel">
                                <div class="panel-heading" role="tab" id="basics">
                                    <h3 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#basicDetails" aria-expanded="true" aria-controls="basicDetails">The basics</a></h3>
                                </div>
                                <div id="basicDetails" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="basics">
                                    <div class="panel-body">

                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                            <div class="form-group">
                                                <label class="label__title">Email</label>
                                                <input type="text" name="email" id="email" class="form-control" placeholder="">
                                                <span><?php echo $emailErr;?></span>
                                                <label class="label__title">Shipping to</label>
                                                <select class="form-control">
                                                    <option>Please select</option>
                                                    <option name="area" value="England">England</option>
                                                    <option name="area" value="Scotland">Scotland</option>
                                                    <option name="area" value="Wales">Wales</option>
                                                    <option name="area" value="Ireland">Ireland</option>
                                                    <option name="area" value="Rest of World">Rest of World</option>
                                                </select>
                                                <label class="label__title">Shipping options</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="shippingOpt" id="optionsRadios1" value="Royal Mail Special Delivery" checked>
                                                        Royal Mail Special Delivery <span>£10.75</span>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="shippingOpt" id="optionsRadios2" value="Royal Mail 1st Class">
                                                        Royal Mail 1st Class <span>£6.75</span>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="shippingOpt" id="optionsRadios3" value="Royal Mail 2nd Class">
                                                        Royal Mail 2nd Class <span>£3.75</span>
                                                    </label>
                                                </div>

                                                <label class="label__title">Payment options</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="paymentOption" id="paymentOption1" value="Credit or debit card" checked>
                                                        Credit or debit card <span></span>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="paymentOption" id="paymentOption2" value="Paypal">
                                                        Paypal <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" name="submit" value="Next"><a>Next</a></button>
                                        </form>
                                        <div class="basic__details--input" style="display: none;">
                                            <?php
                                            echo "<p>Email: <span>{$email}</span></p>";
                                            echo "<p>Shipping to: <span>{$area}</span></p>";
                                            echo "<p>Delivery: <span>{$shipping}</span></p>";
                                            echo "<p>Payment option: <span>{$payment}</span></p>";
                                            echo "<button type='' class'button'><a role='button' href='#'>Edit</a> ";
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default shipping__details--panel">
                                <div class="panel-heading" role="tab" id="shippingDetails">
                                    <h3 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#shipDetails" aria-expanded="false" aria-controls="shipDetails">Shipping details</a></h3>
                                </div>
                                <div id="shipDetails" class="panel-collapse collapse" role="tabpanel" aria-labelledby="shippingDetails">
                                    <div class="panel-body">
                                        <form>
                                            <div class="form-group">
                                                <span class="error"><?php echo $nameErr; ?></span>
                                                <label class="label__title">Full name</label>
                                                <input name="name" type="text" class="form-control" placeholder="" aria-describedby="name" autocomplete="name">
                                                <span class="error"><?php echo $addressErr; ?></span>
                                                <label class="label__title">Address line 1</label>
                                                <input type="address" name="address" id="address_1"  class="form-control" placeholder="" autocomplete="address-line1">
                                                <label class="label__title">Address line 2 (Optional)</label>
                                                <input type="address" name="address_opt" id="address_2"  class="form-control" placeholder="" autocomplete="address-line2">
                                                <div class="label__group__wrapper">
                                                    <div class="label__wrapper">
                                                        <label class="label__title city">City</label>
                                                        <input type="address" name="city" id="city"  class="form-control" placeholder="" autocomplete="address-level2">
                                                    </div>
                                                    <div class="label__wrapper">
                                                        <label class="label__title">Post code</label>
                                                        <input type="address" name="post code" id="post__code"  class="form-control" placeholder="" autocomplete="postal-code">
                                                    </div>
                                                </div>
                                                <label class="label__title">Phone number (Optional)</label>
                                                <input type="number" name="phone number" id="phone__number"  class="form-control" placeholder="" autocomplete="tel tel-national">
                                            </div>
                                            <button type="submit" class="button"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#securePayment" aria-expanded="true" aria-controls="securePayment">Next</a></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default secure__payment--panel">
                                <div class="panel-heading" role="tab" id="shippingDetails">
                                    <h3 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#securePayment" aria-expanded="false" aria-controls="shipDetails">Secure payment</a></h3>
                                </div>
                                <div id="securePayment" class="panel-collapse collapse" role="tabpanel" aria-labelledby="securePayments">
                                    <div class="panel-body">
                                        <form>
                                            <div class="form-group">
                                                <div class="label__group__wrapper label__group__wrapper--card-details">
                                                    <div class="label__wrapper label__wrapper--card">
                                                        <label class="label__title">Card number</label>
                                                        <input type="number" name="card number" id="card__number"  class="form-control" placeholder="">
                                                    </div>
                                                    <div class="label__wrapper label__wrapper--security">
                                                        <label class="label__title">Security code</label>
                                                        <input type="number" name="security code" id="security__code"  class="form-control" placeholder="">
                                                    </div>

                                                </div>
                                                <div class="label__group__wrapper label__group__wrapper--extra-details">
                                                    <div class="label__wrapper">
                                                        <label class="label__title">Expiry month</label>
                                                        <select class="form-control">
                                                            <option>Month</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                            <option>11</option>
                                                            <option>12</option>
                                                        </select>
                                                    </div>
                                                    <div class="label__wrapper">
                                                        <label class="label__title">Expiry year</label>
                                                        <select class="form-control">
                                                            <option>Year</option>
                                                            <?php
                                                            $year = date("Y");
                                                            for ($i = 0; $i <= 10; ++$i) {
                                                                echo "<option>{$year}</option>";
                                                                ++$year;
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="label__wrapper">
                                                        <label class="label__title">Post code</label>
                                                        <input type="address" name="post code" id="post__code"  class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <p>By continuing, you accept the <a href="#">terms and conditions</a> by So Salty Studio and the <a href="#">privacy policy</a> by the studio.</p>
                                        <button type="submit" class="button"><a role="button" href="#">Complete purchase</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>  

                    </div>
                </div>
            </div>
        </main>

        <footer>
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="#">Contact</a></li>
                        <li class="seperator"></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </nav>
            </div>
        </footer>

        <script src="/static/js/broozr.js"></script>
        <script src="/static/js/modernizr-custom.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="/static/ext/bootstrap-3.3.7/js/bootstrap.min.js"></script>
        <script src="../public_html/static/js/sticky.js"></script>
        <script src="/static/js/master.js"></script>

        <script>
            var sticky = new Sticky('.sticky');
        </script>
    </body>
</html>