function toggleContent(videoId, descriptionId) {
    var videoContainer = document.getElementById(videoId);
    var descriptionContainer = document.getElementById(descriptionId);
    var triangle = document.getElementById('triangle' + descriptionId.charAt(descriptionId.length - 1));

    if (videoContainer.style.display === 'none' && descriptionContainer.style.display === 'none') {
        videoContainer.style.display = 'block';
        descriptionContainer.style.display = 'block';
        triangle.classList.add('triangle-up');
    } else {
        videoContainer.style.display = 'none';
        descriptionContainer.style.display = 'none';
        triangle.classList.remove('triangle-up');
    }
}