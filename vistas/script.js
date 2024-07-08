document.addEventListener('DOMContentLoaded', function() {
    var dropZone = document.getElementById('drop_zone');

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    // Highlight drop zone when item is dragged over it
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    // Handle dropped files
    dropZone.addEventListener('drop', handleDrop, false);

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    function highlight() {
        dropZone.style.borderColor = 'green';
    }

    function unhighlight() {
        dropZone.style.borderColor = '#0087F7';
    }

    function handleDrop(e) {
        var dt = e.dataTransfer;
        var files = dt.files;

        if (files.length) {
            // If file is dropped, we assume it's an image file
            handleFiles(files);
        } else {
            // If no files, try to retrieve and display the image URL
            var html = dt.getData('text/html');
            var match = html && html.match(/src\s*=\s*"?(.+?)"?\s/);
            var url = match && match[1];
            if (url) {
                displayImageFromUrl(url);
            }
        }
    }

    function handleFiles(files) {
        for (var i = 0, len = files.length; i < len; i++) {
            var file = files[i];
            var reader = new FileReader();
            
            reader.onloadend = function(event) {
                displayImage(event.target.result);
            };
            reader.readAsDataURL(file);
        }
    }

    function displayImageFromUrl(url) {
        console.log(url);
        var img = document.createElement('img');
        img.src = url;
        dropZone.innerHTML = ''; // Clear the drop zone
        dropZone.appendChild(img);
    }

    function displayImage(src) {
        console.log(src);
        var img = document.createElement('img');
        img.src = src;
        dropZone.innerHTML = ''; // Clear the drop zone
        dropZone.appendChild(img);
    }
});
