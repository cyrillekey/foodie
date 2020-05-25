<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
		@import url(https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css);
        @media only screen and (max-width: 800px) {
    
    /* Force table to not be like tables anymore */
	#no-more-tables table, 
	#no-more-tables thead, 
	#no-more-tables tbody, 
	#no-more-tables th, 
	#no-more-tables td, 
	#no-more-tables tr { 
		display: block; 
	}
 
	/* Hide table headers (but not display: none;, for accessibility) */
	#no-more-tables thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
 
	#no-more-tables tr { border: 1px solid #ccc; }
 
	#no-more-tables td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
		white-space: normal;
		text-align:left;
	}
 
	#no-more-tables td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		text-align:left;
		font-weight: bold;
	}
 
	/*
	Label the data
	*/
	#no-more-tables td:before { content: attr(data-title); }
}
    </style>
    <title>Registered users</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Users
            </h1>
            <h3 class="text-center">
                Registered users.
            </h3>
        </div>
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf">
        			<tr>
        				<th>Number</th>
        				<th>User ID</th>
        				<th class="numeric">User_email</th>
        			</tr>
        		</thead>
        		<tbody>
                    <?php
                     include('../../conf/pdo_conf.php');
                     $sql="SELECT * FROM users_table";
                     $stmt=$pdo->prepare($sql);
                     $stmt->execute();
                     while($row=$stmt->fetch(PDO::FETCH_OBJ)){
                         echo'<tr>
                         <td data-title="Code">'.$row->user_number.'.</td>
                         <td data-title="Company">'.$row->user_id.'.</td>
                         <td data-title="Price" class="numeric">'.$row->user_email.'</td>
                            </tr>';
                     }
                    
                    ?>
        			
        		</tbody>
        	</table>
        </div>
    </div>
    <div class="row">
        <p class="bg-success" style="padding:10px;margin-top:20px"><small><a href="http://elvery.net/demo/responsive-tables/#no-more-tables" target="_blank">Link</a> to original article</small></p>
    </div>
</div>
</body>
</html>