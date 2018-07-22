
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCRPU</title>
    <link rel="stylesheet" href="public/css/easy-responsive-tabs.css " />
    <link rel="stylesheet" href="assets/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/styles.css">
    <link rel="stylesheet" href="public/css/estilo.css">
    <link rel="stylesheet" href="assets/jquery-ui/jquery-ui.css">

</head>
<body>
    <div id="container">
        <br/>
        <!--Horizontal Tab-->
        <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
                <li>Retrasados 1</li>
                <li>Nuevos 2</li>
                <li>En Inspección 3</li>
                <li>En oficina 4</li>
                <li>Aceptados 5</li>
                <li>Denegados 6</li>
            </ul>

            <div class="resp-tabs-container hor_1">
                <div class="container1">
                    <!-- contenido de tab 1 -->

                </div>
                <div class="container2">
                    <!-- contenido de tab 2 -->
                    <br>
                    <br>
                    <p>Tab 2 Container</p>
                </div>
                <div class="container3">
                    <!-- contenido de tab 3 -->
                    <br>
                    <br>
                    <p>Tab 3 Container</p>
                </div>
                  <div class="container4">
                    <!-- contenido de tab 4 -->
                    <br>
                    <br>
                    <p>Tab 4 Container</p>
                </div>
                  <div class="container">
                    <!-- contenido de tab 5 -->
                    <br>
                    <br>
                    <p>Tab 5 Container</p>
                </div>
                  <div class="container">
                    <!-- contenido de tab 6 -->
                    <br>
                    <br>
                    <p>Tab 6 Container</p>
                </div>
            </div>
        </div>

        <br/>
        <div id="nested-tabInfo">
            Selected tab: <span class="tabName"></span>
        </div>
        <br/>
        <br/>

    </div>
    <script src="assets/bootstrap/js/jquery.min.js"></script>
    <script src="public/js/easyResponsiveTabs.js"></script>
    <script src="public/js/funcionesResponsiveTab.js"></script>
  <script src="assets/jquery-ui/jquery-ui.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
  <script src="public/js/rutasVistas.js"></script>
  <script src="public/js/indicetablas.js"></script>
  <script src="public/js/fechas-jquery.js"></script>
    <!--Plug-in Initialisation-->
 <style type="text/css" rel="stylesheet">
        body {
            background: #fff;
        }
        #container {
            width: 940px;
            margin: 0 auto;
        }
        @media only screen and (max-width: 768px) {
            #container {
                width: 90%;
                margin: 0 auto;
            }
        }
    </style>


</body>
</html>