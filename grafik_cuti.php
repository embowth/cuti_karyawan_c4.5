<link rel="stylesheet" href="js/chartist/chartist.css" />
<style>
       .ct-chart {
           position: relative;
       }
       .ct-legend {
           position: relative;
           z-index: 10;
           list-style: none;
           text-align: center;
           margin-top:20px;
       }
       .ct-legend li {
           position: relative;
           padding-left: 23px;
           margin-right: 10px;
           margin-bottom: 3px;
           cursor: pointer;
           display: inline-block;
       }
       .ct-legend li:before {
           width: 12px;
           height: 12px;
           position: absolute;
           left: 0;
           content: '';
           border: 3px solid transparent;
           border-radius: 2px;
       }
       .ct-legend li.inactive:before {
           background: transparent;
       }
       .ct-legend.ct-legend-inside {
           position: absolute;
           top: 0;
           right: 0;
       }
       .ct-legend.ct-legend-inside li{
           display: block;
           margin: 0;
       }
       .ct-legend .ct-series-0:before {
           background-color: #d70206;
           border-color: #d70206;
       }
       .ct-legend .ct-series-1:before {
           background-color: #f05b4f;
           border-color: #f05b4f;
       }
       .ct-legend .ct-series-2:before {
           background-color: #f4c63d;
           border-color: #f4c63d;
       }
       .ct-legend .ct-series-3:before {
           background-color: #d17905;
           border-color: #d17905;
       }
       .ct-legend .ct-series-4:before {
           background-color: #453d3f;
           border-color: #453d3f;
       }
       .ct-legend .ct-series-5:before {
           background-color: #59922b;
           border-color: #59922b;
       }
       .ct-legend .ct-series-6:before {
           background-color: #0544d3;
           border-color: #0544d3;
       }
       .ct-legend .ct-series-7:before {
           background-color: #6b0392;
           border-color: #6b0392;
       }
       .ct-legend .ct-series-8:before {
           background-color: #f05b4f;
           border-color: #f05b4f;
       }
       .ct-legend .ct-series-9:before {
           background-color: #dda458;
           border-color: #dda458;
       }
       .ct-legend .ct-series-10:before {
           background-color: #eacf7d;
           border-color: #eacf7d;
       }
       .ct-legend .ct-series-11:before {
           background-color: #86797d;
           border-color: #86797d;
       }

       .ct-chart-line-multipleseries .ct-legend .ct-series-0:before {
          background-color: #d70206;
          border-color: #d70206;
       }

       .ct-chart-line-multipleseries .ct-legend .ct-series-1:before {
          background-color: #f4c63d;
          border-color: #f4c63d;
       }

       .ct-chart-line-multipleseries .ct-legend li.inactive:before {
          background: transparent;
        }

       .crazyPink li.ct-series-0:before {
          background-color: #C2185B;
          border-color: #C2185B;
       }

       .crazyPink li.ct-series-1:before {
          background-color: #E91E63;
          border-color: #E91E63;
       }

       .crazyPink li.ct-series-2:before {
          background-color: #F06292;
          border-color: #F06292;
       }
       .crazyPink li.inactive:before {
          background-color: transparent;
       }

       .crazyPink ~ svg .ct-series-a .ct-line, .crazyPink ~ svg .ct-series-a .ct-point {
          stroke: #C2185B;
       }

       .crazyPink ~ svg .ct-series-b .ct-line, .crazyPink ~ svg .ct-series-b .ct-point {
          stroke: #E91E63;
       }

       .crazyPink ~ svg .ct-series-c .ct-line, .crazyPink ~ svg .ct-series-c .ct-point {
          stroke: #F06292;
       }

       #any-div-anywhere{
           border: 1px solid #5b4421;
       }
    </style>

<div class="container-fluid">

    <div class="row-fluid">
        <div class="span12">
            <form>
                <input type='text' name="tahun" class="span2" placeholder="tahun" value="<?php echo (isset($_GET['tahun']) ? $_GET['tahun'] : date('Y'));?>">
                <input type="hidden" value="gr_app" name="p">
                <button type="submit" class="btn btn-primary btn-xs" style="margin-top:-10px;">Filter</button>
            </form>
        </div>
    </div>

    <div class="row-fluid">
	  <div class="span12">
	    <div class="widget-box">
	      	<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
	        	<h5>Grafik Total Cuti Per Divisi</h5>
	      	</div>
	      	<div class="widget-content nopadding"> 
	      		

	    		<div class="ct-chart" style="height:400px;">
				</div>

	    		<br>
	      	</div>
	    </div>
	  </div>
	</div>
</div>


<script src="js/chartist/chartist.min.js"></script>
<script src="js/chartist/chartist-plugin-legend.js"></script>


    <?php 

       $tahun = date('Y');
       if(isset($_GET['tahun'])){
           $tahun = $_GET['tahun'];
       }

		$query = "SELECT * FROM ct_divisi WHERE kd_divisi > 1";
		$sql = mysqli_query($connect, $query);

        $dv = '';
        $arr_div = array();
		while($div = mysqli_fetch_array($sql, MYSQLI_ASSOC)){
            $dv .= "'".$div['nama_divisi']."'".",";
            array_push($arr_div,$div);
		}

		$dv = rtrim($dv,',');

		$query = "SELECT
                    MONTH(c.tgl_mulai) AS bulan,
                    a.kd_divisi,
                    IFNULL(COUNT(c.id_cuti),0) as total_cuti
                FROM
                    ct_divisi a
                RIGHT JOIN ct_karyawan b ON
                    a.kd_divisi = b.kd_divisi
                LEFT JOIN ct_cuti c ON
                    c.id_karyawan = b.id_karyawan
                WHERE YEAR(c.tgl_mulai) = '$tahun'
                GROUP BY
                    a.kd_divisi,
                    MONTH(c.tgl_mulai)";

        $sql = mysqli_query($connect, $query);

        $arr_data = array();
        while ($data = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {

            array_push($arr_data, $data);

        }

        $graph_data = array();
        for($i=0;$i<12;$i++){
            $graph_data[$i] = array();
            foreach ($arr_div as $key => $value) {
                $graph_data[$i][$key] = 0;
            }
        }

        $count = 0;
        foreach ($arr_div as $key_div => $val_div) {
            foreach ($arr_data as $key => $value) {
                if($value['kd_divisi'] == $val_div['kd_divisi']){

                    // if($value['bulan'] == $count+1){                        
                        $graph_data[$count][$key_div] = $value['total_cuti'];
                    // }
                    
                    
                    $count++;
                }
            }
            $count = 0;
        }
        
        // echo "<pre>";
        // print_r($arr_data);
        // echo "</pre>";

        $month = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
	
	?>
<script>
	var data = {
		labels: [<?php echo $dv;?>],
		series: [
			<?php for($y = 0; $y < 12; $y++){ ?>
            <?php echo "{\"name\":\"".$month[$y]."\" ,\"data\":[".implode( ", ", array_values($graph_data[$y]) )."]},";?>
            <?php } ?>

		]
	};

	var options = {
        seriesBarDistance: 12,
        onlyInteger: true,
        axisY: {
            onlyInteger: true,
            offset: 20
        },        
        plugins: [
            Chartist.plugins.legend()
        ]
        
    };


    new Chartist.Bar('.ct-chart', data, options);
</script>