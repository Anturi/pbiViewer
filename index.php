<!doctype html>
<html lang="en">
  <head>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="./dist/powerbi.js"></script>
   <title>Visor de Reportes PBI</title>
  </head>
  <body>
  <div id="reportContainer" style="height: 720px; width: auto; background-color:white;"></div>
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
    // Obtengo los modelos para configuración de pbiEmbed
    var models = window['powerbi-client'].models;
    var embedConfiguration= {
        type: 'report',       
        embedUrl: "<?php echo $embedUrl; ?>",
        accessToken: "<?php echo $token; ?>",
        permissions: models.Permissions.Read,
        settings: {
            background: models.BackgroundType.Transparent,
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