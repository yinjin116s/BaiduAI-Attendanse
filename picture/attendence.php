<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>jQuery-webcam-master</title>
    <link href="../css/style.css" rel="stylesheet">
    <script src="jquery-1.7.2.min.js"></script>
    <script src="jquery.webcam.min.js"></script>
    <table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
        <tr>
            <td height="33" id="list"> Webcam Module-Say CHEESE
            </td>
        </tr>
    </table>
    <script type="text/javascript">
        $(function() {
            var pos = 0, ctx = null, saveCB, image = [];
            var canvas = document.createElement("canvas");
            canvas.setAttribute('width', 320);
            canvas.setAttribute('height', 240);
            if (canvas.toDataURL) {
                ctx = canvas.getContext("2d");
                image = ctx.getImageData(0, 0, 320, 240);
                saveCB = function(data) {
                    var col = data.split(";");
                    var img = image;
                    for(var i = 0; i < 320; i++) {
                        //转换为十进制
                        var tmp = parseInt(col[i]);
                        img.data[pos + 0] = (tmp >> 16) & 0xff;
                        img.data[pos + 1] = (tmp >> 8) & 0xff;
                        img.data[pos + 2] = tmp & 0xff;
                        img.data[pos + 3] = 0xff;
                        pos+= 4;
                    }
                    if (pos >= 4 * 320 * 240) {
                        ctx.putImageData(img, 0, 0);
                        $.post("attdenceupload.php", {type: "data", image: canvas.toDataURL("image/png")});
                        pos = 0;
                    }
                };

            } else {
                saveCB = function(data) {
                    image.push(data);
                    pos+= 4 * 320;
                    if (pos >= 4 * 320 * 240) {
                        $.post("attdenceupload.php", {type: "pixel", image: image.join('|')});
                        pos = 0;
                    }
                };
            }
            $("#webcam").webcam({
                width: 320,
                height: 240,
                mode: "callback",
                swffile: "jscam_canvas_only.swf",
                onSave: saveCB,
                onCapture: function () {
                    webcam.save();
                },
                debug: function (type, string) {
                    console.log(type + ": " + string);
                }
            });
        });
    </script>
</head>
<body>
<div id="webcam"></div>
<input type="button" onclick="webcam.capture();alert('Press Enter to continue the process.. DO NOT CLOSE THE WINDOW');window.location.href='attdence_baidu.php?id=<?php echo $_GET[id];?>';" value="Capture" >
</body>

</html>

