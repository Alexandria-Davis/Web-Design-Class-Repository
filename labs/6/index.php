<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>OtterMart Product Search</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
          <script src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
		  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="scriptgoeshere.js"></script>
    </head>
    <body>
        <div>
            <h1>OtterMart Product Search</h1>
            <form>
                Product: <input type="text" name="product"/>
                <br>
                
                Category: 
                <select name="category" id="categories">
                    <option value=""> Select One </option>
                </select>
                <br />
                
                Price: From <input type="text" name="priceFrom" size="7"/>
                To <input type="text" name="priceTo" size="7"/>
                <br />
                
                Order results by:
                <br />
                <input type="radio" name="orderBy" value="price"/> Price
                <br />
                <input type="radio" name="orderBy" value="name"/> Name
                <br /><br />
            </form>
            <br /><!-- This was in the tutorial, so it's here as well -->
            <button id="searchForm">Search</button> <!-- Why is this outside the form? If all you want to do is prevent it from sending the form, type=button also works -->
        </div>
        <br />
        <hr>
        <div class="resultbox">
            <div class="results"id="results"></div>
            <table id='results_table'></table>
        </div>
        
        <div class="modal" tabindex="-1" id="purchaseHistoryModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Purchace History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="history"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        
    </body>
</html>