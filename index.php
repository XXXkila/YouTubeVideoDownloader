<?php include "header.html" ?>
<body style="font-family: 'Architects Daughter', cursive; ">
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="padding: 0; border: 1px solid #CCC; ">
                <img src="header.png" alt="Header Image" style="width: 100%">                
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3" style="border: 1px solid #CCC;">
                <p style="text-align: center; font-size: 35px; font-weight: 100;">Go get it tiger</p>
                <hr>
                <form action="convert.php" method="get" autocomplete="off">
                    <label for="link">YouTube Video Link</label>
                    <input name="link"  style="border-radius: 0;" class="form-control" type="text">
                    <br>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Run for it</button>
                    <br><hr>
                </form>
            </div>
        </div>
    </div> 

</body>
</html>