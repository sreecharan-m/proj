<!DOCTYPE html>
<html lang="en">
  
  <head>
    <title>Simple Screen Record!</title>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/comlinkjs@3.0.2/umd/comlink.js"></script>
    <script src="script.js" async></script>
    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="style.css">
  
  </head>  
  
  <body>
    

    <p id="warning">
      Enable chrome://flags/#enable-experimental-web-platform-features
    </p>
    
    <video id="videoElement" autoplay muted></video>
    <br />
    
    <button id="captureBtn">Capture</button>
    
    <button id="startBtn" disabled>Start Recording</button>
    
    <button id="stopBtn" disabled>Stop Capture</button>
    <br>
    
    <input type="checkbox" id="audioToggle" />
    <label for="audioToggle">Capture Audio from Desktop</label>
    <input type="checkbox" id="micAudioToggle" />
    <label for="micAudioToggle">Capture Audio from Microphone</label>
    
    <a id="download" href="#" style="display: none;">Download</a>
  

  </body>
</html>