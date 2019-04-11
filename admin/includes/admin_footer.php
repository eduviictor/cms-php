    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        	['Data', 'Count'],

	      	<?php  

	      	$element_text = ['Ative Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories'];
	      	$element_count = [$number_posts, $number_posts_draft, $number_comments, $number_comments_unaproved, $number_users, $number_users_subscribers, $number_categories];

	      	for($i = 0; $i < 7; $i++){
	      		echo "['{$element_text[$i]}', {$element_count[$i]}],";
	      	}

	      	?>

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

</body>

</html>