<!doctype html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Visor de Reportes PBI</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-Vk7tk4y6z5+Yi54gyCN+DmxbWQPKK1lLZL6yCwuK7cV9Wm+j1l0lRlLU98e2vNLRr6t98kKGy3RlsJSzdF8uw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="./dist/powerbi.js"></script>
</head>
<body>
	<div id="reportContainer" style="background-color:white"></div>
	<!--class="h-100 h-720-sm h-1080-lg -->
	<?php 
		
//obtengo parámetros de URL
		 if(!is_null($_GET['group']) && !is_null($_GET['reports']))
		{
		$group = $_GET['group'];
		$reports = $_GET['reports'];
        $filters = $_GET['filters'];
        $refresh = $_GET['refresh'];
		$params = $_GET['p'];
			include 'procesar.php';
        //echo $params;
		}; 
	?>
	<script>
        // Obtener el alto de la pantalla
        //var screenHeight = window.innerHeight;
        
        // Definir las alturas para pantallas pequeñas y grandes
        //var smallScreenHeight = 720;
        //var largeScreenHeight = 1080;
        
        // Definir la altura del div en función del tamaño de la pantalla
        //var reportContainer = document.getElementById('reportContainer');
        //if (screenHeight < largeScreenHeight) {
        //    reportContainer.style.height = smallScreenHeight + 'px';
        //} else {
        //    reportContainer.style.height = largeScreenHeight + 'px';
        //}
        // Obtener el alto de la pantalla
        var screenHeight = window.innerHeight;
        var devicePixelRatio = window.devicePixelRatio || 1;
        
        // Definir la altura del div en función de la pantalla
        var reportContainer = document.getElementById('reportContainer');
        reportContainer.style.height = (screenHeight) + 'px';
    // Obtengo los modelos para configuración de pbiEmbed
    var models = window['powerbi-client'].models;
    var embedConfiguration= {
        type: 'report',       
        embedUrl: "<?php echo $embedUrl; ?>",
        accessToken: "<?php echo $token; ?>",
        permissions: models.Permissions.Read,
        settings: {
            //background: models.BackgroundType.Transparent,
            panes:{
                bookmarks: {
                    visible: false
                },
                fields: {
                    expanded: true
                },
                filters: {
                    expanded: false,
                    visible: <?php if($filters == "1"){
                        echo "true";
                        }else{
                            echo "false";}?>
                },
                pageNavigation: {
                    visible: true
                },
                selection: {
                    visible: true
                },
                syncSlicers: {
                    visible: true
                },
                visualizations: {
                    expanded: true
                }
            }
        }
    };

    var $reportContainer = $('#reportContainer');
    var report = powerbi.embed($reportContainer.get(0), embedConfiguration);

</script>
</body>
</html>