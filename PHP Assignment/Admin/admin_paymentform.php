<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="../Participants/img/logo.png" type="image/gif" sizes="16x16">
        <title>Payment Table</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
       
        <link rel="stylesheet" href="css/admintable.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <!--Upper Header-->
        
        <!--Header-->
        <?php include("../include/admin_header.php"); ?>
        
                    <!--Content-->
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: admin</div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4" style="margin-bottom: 100px;">
                    <h2>Payment Form</h2>
                        <div class="row">
                        <div class="admintable">
                        
        <p>Filter: All  | Online Payment | Cash Payment</p>
        <table class="admintable">
            <thead>
                <tr>
                <th>No.</th>
                <th>Class</th>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>Cash Payment</th>
                <th>Online Payment</th>
                <th>Payee Full Name</th>
                <th>Payee Email Address</th>
                <th>Card Number</th>
                <th>Card CVV</th>
                <th>Expiry (MM/YY)</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <td colspan="14">
                        <div class="links">? records(s) found</div>
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Latin</td>
                    <td>Zheng Shuang</td>
                    <td>bushuang@gmail.com</td>
                    <td>Cash Payment</td>
                    <td>NULL</td>
                    <td>NULL</td>
                    <td>NULL</td>
                    <td>NULL</td>
                    <td>NULL</td>
                    <td>NULL</td>
                    <td><button type="button">Edit</button></td>
                    <td><button type="button">Delete</button></td> 
                </tr>
                <tr>
                    <td>2</td>
                    <td>Cheerleading</td>
                    <td>Grace Chow</td>
                    <td>gracechow@gmail.com</td>
                    <td>NULL</td>
                    <td>Online Payment</td>
                    <td>Luo Zhi Xiang</td>
                    <td>noshow@gmail.com</td>
                    <td>1234123412341234</td>
                    <td>123</td>
                    <td>12/2022</td>
                    <td><button type="button">Edit</button></td>
                    <td><button type="button">Delete</button></td> 
                </tr>
                <tr>
                    <td>3</td>
                    <td>KPOP</td>
                    <td>Du Mei Zhu</td>
                    <td>dumz@gmail.com</td>
                    <td>NULL</td>
                    <td>Online Payment</td>
                    <td>Wu Yi Fan</td>
                    <td>wuqian@gmail.com</td>
                    <td>234523452345</td>
                    <td>234</td>
                    <td>09/2022</td>
                    <td><button type="button">Edit</button></td>
                    <td><button type="button">Delete</button></td> 
                </tr>
            </tbody>
        </table>
    </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted" style="margin: auto">Copyright &copy; Dance Society</div>
                    <div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./js/admin.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  
    </body>
</html>
