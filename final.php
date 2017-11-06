<?php include "header.html"; ?>

<body style="font-family: 'Architects Daughter', cursive; ">
    <div class="container" style="margin-top: 50px; margin-bottom: 150px;">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="padding: 0; border: 1px solid #CCC; ">
                <a href="index.php"><img src="header.png" alt="Header Image" style="width: 100%"> </a>               
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3" style="border: 1px solid #CCC; ">
                <br>
                <h4 style="font-weight: 300;padding-left: 10px;"><?php echo $fetch->title ; ?></h4>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        
                        <img src="<?php echo $fetch->vtu ;?>" alt="Video Thumbnail" style="width:100%;">
                    </div>
                    <div class="col-md-8">
                        <h6 style="font-weight: 700;">Channel</h6>
                        <h6 style="font-size: 80%;"><?php echo $fetch->author; ?></h6>
                        <h6 style="font-weight: 700;">Duration</h6>
                        <h6 style="font-size: 80%;"><?php echo $fetch->duration; ?></h6>
                        <h6 style="font-weight: 700;">Views</h6>
                        <h6 style="font-size: 80%;"><?php echo $fetch->views; ?></h6>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="text-align: center;">Video and Audio Formats</h5>
                        <br>
                        <?php foreach ($cStreams as $stream): ?>
                            <?php $stream = json_decode(json_encode($stream)) ;?>
                            <div class="row" style="text-align: center;">
                                <div class="col-md-3"><?php echo $stream->type ?></div>
                                <div class="col-md-3"><?php echo $stream->quality ?></div>
                                <div class="col-md-3"><?php echo $stream->size ?></div>
                                <div class="col-md-3"><a href="<?php echo $stream->url; ?>" download ><button class="btn btn-sm btn-outline-success">Download</button></a></div>

                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <?php if (isset($pStreams)): ?>
                <hr>    
                <div class="row">
                    <div class="col-md-12">
                        <h5 style="text-align: center;">Video and Audio Formats</h5>
                        <br>
                        <?php foreach ($pStreams as $stream): ?>
                            <?php $stream = json_decode(json_encode($stream)) ;?>
                            <div class="row" style="text-align: center;">
                                <div class="col-md-3"><?php echo $stream->type ?></div>
                                <div class="col-md-3"><?php echo $stream->quality ?></div>
                                <div class="col-md-3"><?php echo $stream->size ?></div>
                                <div class="col-md-3"><a href="<?php echo $stream->url; ?>" download ><button class="btn btn-sm btn-outline-success">Download</button></a></div>

                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <?php endif ?>
                <hr>
            </div>
            <hr>
            
        </div>
    </div> 
</body>
</html>