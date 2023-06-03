<?php 
    session_start();
    ob_start();
    include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diblock.top</title>
    <link rel="stylesheet" href="st.css">
    <link rel="icon" href="img/logo1.png" type="image/x-icon" />
</head>

<body onkeydown="return false">
    <!-- chong refesh nhieu lan -->
    <div class="main">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit dolorum porro sunt, repellat ab officiis et
            reiciendis hic voluptatum, numquam, adipisci nihil dicta! Nostrum quaerat suscipit dolorem quos aperiam
            corporis?
        </p>
        <div>
            <img id="img1" src="https://api.qrserver.com/v1/create-qr-code/?data=<?php // api qrcode (giong qrcode cua momoapi)
                echo " https://www.youtube.com/watch?v=NqiElKcXZsw&list=WL&index=21&t=48s"; ?>" width="320px"
            height="320px">
        </div>
    </div>
    <div class="cursor"></div>
    <script type='text/javascript'>
        // lay vi tri chuot
        let cursor = document.querySelector(' .cursor'); document.addEventListener('mousemove', (e) => {
            cursor.style.display = 'block';
            cursor.style.left = e.pageX + 'px';
            cursor.style.top = e.pageY + 'px';
        });
    </script>
</body>

</html>