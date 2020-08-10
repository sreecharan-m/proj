<!DOCTYPE html>
<html>
<head>
	<title>White Board</title>
	<meta charset="utf-8">


<style type="text/css">
	
  

</style>

</head>

<body>

    <canvas id="canvas" style="border: 2px solid black"></canvas>

    <script type="text/javascript">
    	

        const canvas= document.getElementById('canvas');
        const ctx= canvas.getContext('2d');

        canvas.width=window.innerWidth;
        canvas.height=window.innerHeight;

        let d=0;

        function startposition(e){
        	d=1;
        	draw(e);
        }

        function endposition(){
        	d=0;
        	ctx.beginPath();
        }

        canvas.addEventListener("mousedown", startposition);
        canvas.addEventListener("mouseup", endposition);
        canvas.addEventListener("mousemove", draw);

        function draw(e){

        	if(!d){
        		return;
        	}
        	
            console.log("hai");

        	ctx.lineWidth=5;
        	ctx.lineCap="round";
        	ctx.lineTo(e.clientX,e.clientY);
        	ctx.stroke();
        	ctx.beginPath();
        	ctx.moveTo(e.clientX,e.clientY);

        }


    </script>

</body>
</html>