<?php
$prost = 1;
include("includes/header.php");
include("conn.php");
$pid  =  $_GET['proid'];
$sql="SELECT * FROM products where prod_id=$pid";
//echo $sql;
$resultrec = mysqli_query($con, $sql);
$arrprod = mysqli_fetch_array($resultrec);
$results = mysqli_query($con, "select * from products");
			
$prod_id = $arrprod['prod_id'];
$branch_id = $arrprod['branch_id'];
$name = $arrprod['name'];
$product_type = $arrprod['product_type'];
$sub_type = $arrprod['sub_type'];
$image = $arrprod['image'];
$color = $arrprod['color'];
$cost = $arrprod['cost'];
$quantity = $arrprod['quantity'];

				if($image=="")
				{
				$img = "upload/noimage.jpg";
				}	
				else
				{
				$img = "upload/".$image;	
				}
?>
    
    <div id="templatemo_main">
   		<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<?php
				include("sidebar.php");
				products1();
				?>
            </div>
         
        </div>
        
 <div id="content" class="float_r">
        	
            <h1><?php echo $name; ?></h1>
            <div class="content_half float_l">
        	<a  rel="lightbox[portfolio]" href="images/"><img src="<?php echo $img; ?>" alt="Image 01" height="300" width="300" /></a>
            </div>
            <div class="content_half float_r">
				<table>
                    <tr>
                        <td height="30" width="160">Product Type:</td>
                        <td>&nbsp;<?php echo $product_type; ?></td>
                    </tr>
                    <tr>
                    	<td height="30">Sub Type:</td>
                        <td><?php echo $sub_type; ?></td>
                    </tr>
                    <tr>
                      <td height="30">Color:</td>
                      <td width="20" height="20" bgcolor="<?php echo $color; ?>"></td>
                    </tr>
                    <tr>
                      <td height="30">Cost:</td>
                      <td><?php echo $cost; ?></td>
                    </tr>
                    <tr><td height="30">Quantity:</td><td><?php echo $quantity; ?></td></tr>
                    <tr><td height="30">Product Stock Status:</td><td>
					<?php 
					if($quantity>1) 
					{
						$disp= "<font color='#009900'>IN STOCK</font>";
						echo $disp;
					}
					?></td></tr>
                    
                </table>
                <div class="cleaner h20"></div>
		<?php
        if(isset($_GET["testids"]) )
        {
		  if($_SESSION["logtype"]=='Administrator')
			{
        ?>
                <a href="shoppingcart.php?proid=<?php echo $prod_id; ?>&testids=<?php echo $_GET['testids']; ?>">Place Order</a>
				<?php
                }}
				?>
				
			<p> <input type="button" onClick="history.go(-1);" value="Go Back" />	 </p>
			</div>
            <div class="cleaner h30"></div>
            
            <div class="cleaner h50"></div>
 
            
      </div> 
        <div class="cleaner"></div>
    </div>
    <?php
include("includes/footer.php");
?>