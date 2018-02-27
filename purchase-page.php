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
    // for validation and storing data on the forms still to add to this.
// define variables and set to empty values
    $emailErr = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);

            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
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

        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <section class="product__summary__wrapper">
                            <img src="/static/img/poster-mockup.png" alt="So Salty Poster" />
                            <ul>
                                <li>Subtotal</li>
                                <li>£12.99</li>
                                <li>Shipping</li>
                                <li>£10.75</li>
                                <li>Total</li>
                                <li>£23.74</li>
                            </ul>
                        </section>
                    </div>
                    <div class="col-md-push-1 col-md-8">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default basic__details--panel">
                                <div class="panel-heading" role="tab" id="basics">
                                    <h1 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#basicDetails" aria-expanded="true" aria-controls="basicDetails">The basics</a></h1>
                                </div>
                                <div id="basicDetails" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="basics">
                                    <div class="panel-body">

                                        <form>
                                            <div class="form-group">
                                                <span class="error"><?php echo $emailErr; ?></span>
                                                <label>Email</label>
                                                <input type="email" name="email" id="email"  class="form-control" placeholder="Email Address">
                                                <label>Shipping to</label>
                                                <select class="form-control">
                                                    <option>England</option>
                                                    <option>Scotland</option>
                                                    <option>Wales</option>
                                                    <option>Ireland</option>
                                                    <option>Rest of World</option>
                                                </select>
                                                <label>Shipping options</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                        Royal Mail Special Delivery <span>£10.75</span>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                        Royal Mail 1st Class <span>£6.75</span>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                                        Royal Mail 2nd Class <span>£3.75</span>
                                                    </label>
                                                </div>

                                                <label>Payment options</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="paymentOption" id="paymentOption1" value="Payment Type" checked>
                                                        Credit or debit card <span></span>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="paymentOption" id="paymentOption2" value="Payment Type">
                                                        Paypal <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-default"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#basicDetails" aria-expanded="true" aria-controls="basicDetails">Next</a></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default shipping__details--panel">
                                <div class="panel-heading" role="tab" id="shippingDetails">
                                    <h1 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#shipDetails" aria-expanded="false" aria-controls="shipDetails">Shipping details</a></h1>
                                </div>
                                <div id="shipDetails" class="panel-collapse collapse" role="tabpanel" aria-labelledby="shippingDetails">
                                    <div class="panel-body">
                                        <form>
                                            This will contain form elements
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default secure__payment--panel">
                                <div class="panel-heading" role="tab" id="shippingDetails">
                                    <h1 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#securePayment" aria-expanded="false" aria-controls="shipDetails">Secure payment</a></h1>
                                </div>
                                <div id="securePayment" class="panel-collapse collapse" role="tabpanel" aria-labelledby="securePayments">
                                    <div class="panel-body">
                                        <form>
                                            This will contain form elements
                                        </form>
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

        <script src="/static/js/master.js"></script>
    </body>
</html>