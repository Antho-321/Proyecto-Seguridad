<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Color Example</title>
</head>
<body>
    <img id="myImage" src="../imagenes/1004285324.jpg" alt="Sample Image">
    <p>Click on the image to get the color of the specified pixel:</p>
    <p id="colorDisplay"></p>

    <script>
        const image = document.getElementById('myImage');
        const colorDisplay = document.getElementById('colorDisplay');

        // Define the x and y coordinates (in pixels)
        const x = 29; // Replace with your desired x-coordinate
        const y = 346;  // Replace with your desired y-coordinate

        image.addEventListener('click', () => {
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            context.drawImage(image, 0, 0, image.width, image.height);

            const pixelData = context.getImageData(x, y, 1, 1).data;
            const color = `rgb(${pixelData[0]}, ${pixelData[1]}, ${pixelData[2]})`;

            colorDisplay.textContent = `Color at (${x}, ${y}): ${color}`;
        });
    </script>
</body>
</html>
